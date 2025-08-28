<?php

namespace App\Http\Controllers\Integration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
// USE MODELS
use App\Models\Pengaturan\WebSetting;
use App\Models\Integration\TripaySetting;
use App\Models\Integration\TripayTransaction;
use App\Models\Keuangan\TagihanKuliah;
use App\Models\Keuangan\RiwayatPembayaran;
use App\Models\Keuangan\VirtualAccount;
use App\Models\Mahasiswa;
use App\Traits\HasLogAktivitas;

class TripayController extends Controller
{
    use HasLogAktivitas;

    private $apiKey;
    private $privateKey;
    private $merchantCode;
    private $baseUrl;
    private $isProduction;

    public function __construct()
    {
        $this->loadTripayConfig();
    }

    /**
     * Load Tripay configuration
     */
    private function loadTripayConfig()
    {
        try {
            $setting = TripaySettings::first();
            
            if ($setting) {
                $this->apiKey = $setting->api_key;
                $this->privateKey = decrypt($setting->private_key);
                $this->merchantCode = $setting->merchant_code;
                $this->isProduction = $setting->is_production;
                $this->baseUrl = $this->isProduction 
                    ? 'https://tripay.co.id/api' 
                    : 'https://tripay.co.id/api-sandbox';
            }
        } catch (\Exception $e) {
            // Handle case where table doesn't exist yet
            Log::info('Tripay settings table not found, using defaults');
        }
    }

    /**
     * Tripay Dashboard
     */
    public function dashboard()
    {
        $data['webs'] = WebSetting::first();
        $data['menus'] = "Tripay Integration";
        $data['pages'] = "Dashboard Pembayaran";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;

        // Get payment statistics
        $this->getPaymentStats($data);
        
        // Get recent transactions
        $this->getRecentTransactions($data);
        
        // Get payment methods
        $this->getAvailablePaymentMethods($data);

        return view('integration.tripay.dashboard', $data);
    }

    /**
     * Get payment statistics
     */
    private function getPaymentStats(&$data)
    {
        $today = Carbon::today();
        $thisMonth = Carbon::now()->startOfMonth();
        
        $data['stats'] = [
            'total_transactions' => TripayTransaction::count(),
            'successful_payments' => TripayTransaction::where('status', 'PAID')->count(),
            'pending_payments' => TripayTransaction::where('status', 'UNPAID')->count(),
            'failed_payments' => TripayTransaction::whereIn('status', ['FAILED', 'EXPIRED'])->count(),
            'total_amount_today' => TripayTransaction::where('status', 'PAID')
                ->whereDate('created_at', $today)
                ->sum('amount'),
            'total_amount_month' => TripayTransaction::where('status', 'PAID')
                ->where('created_at', '>=', $thisMonth)
                ->sum('amount'),
            'outstanding_bills' => TagihanKuliah::where('status', 'Pending')->sum('amount'),
            'active_virtual_accounts' => VirtualAccount::where('status', 'Aktif')->count()
        ];

        // Calculate success rate
        $totalTransactions = $data['stats']['total_transactions'];
        $data['stats']['success_rate'] = $totalTransactions > 0 
            ? round(($data['stats']['successful_payments'] / $totalTransactions) * 100, 1)
            : 0;
    }

    /**
     * Get recent transactions
     */
    private function getRecentTransactions(&$data)
    {
        $data['recent_transactions'] = TripayTransaction::with(['tagihanKuliah.mahasiswa'])
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get()
            ->map(function($transaction) {
                return [
                    'reference' => $transaction->reference,
                    'merchant_ref' => $transaction->merchant_ref,
                    'mahasiswa_name' => $transaction->tagihanKuliah?->mahasiswa?->name ?? 'Unknown',
                    'amount' => $transaction->amount,
                    'fee' => $transaction->total_fee,
                    'payment_method' => $transaction->payment_method,
                    'status' => $transaction->status,
                    'created_at' => $transaction->created_at,
                    'paid_at' => $transaction->paid_at
                ];
            });
    }

    /**
     * Get available payment methods from Tripay
     */
    private function getAvailablePaymentMethods(&$data)
    {
        try {
            $signature = hash_hmac('sha256', $this->merchantCode, $this->privateKey);
            
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey,
                'X-Signature' => $signature
            ])->get($this->baseUrl . '/merchant/payment-channel');

            if ($response->successful()) {
                $result = $response->json();
                $data['payment_methods'] = collect($result['data'])->map(function($method) {
                    return [
                        'code' => $method['code'],
                        'name' => $method['name'],
                        'type' => $method['type'],
                        'fee_flat' => $method['fee_merchant']['flat'],
                        'fee_percent' => $method['fee_merchant']['percent'],
                        'minimum_fee' => $method['minimum_fee'],
                        'maximum_fee' => $method['maximum_fee'],
                        'active' => $method['active']
                    ];
                });
            } else {
                $data['payment_methods'] = collect([]);
            }
        } catch (\Exception $e) {
            Log::error('Failed to get Tripay payment methods: ' . $e->getMessage());
            $data['payment_methods'] = collect([]);
        }
    }

    /**
     * Create payment transaction
     */
    public function createTransaction(Request $request)
    {
        $request->validate([
            'tagihan_id' => 'required|exists:tagihan_kuliahs,id',
            'payment_method' => 'required|string'
        ]);

        try {
            $tagihan = TagihanKuliah::with(['mahasiswa', 'tahunAkademik'])->findOrFail($request->tagihan_id);
            
            if ($tagihan->status !== 'Pending') {
                return response()->json([
                    'success' => false,
                    'message' => 'Tagihan sudah dibayar atau tidak valid'
                ], 400);
            }

            $merchantRef = 'INV-' . $tagihan->id . '-' . time();
            
            // Calculate fees
            $paymentMethod = $this->getPaymentMethodDetails($request->payment_method);
            $fee = $this->calculateFee($tagihan->amount, $paymentMethod);
            
            $data = [
                'method' => $request->payment_method,
                'merchant_ref' => $merchantRef,
                'amount' => $tagihan->amount,
                'customer_name' => $tagihan->mahasiswa->name,
                'customer_email' => $tagihan->mahasiswa->email,
                'customer_phone' => $tagihan->mahasiswa->phone,
                'order_items' => [
                    [
                        'sku' => 'TAGIHAN-' . $tagihan->id,
                        'name' => $tagihan->desc ?: 'Tagihan ' . ($tagihan->tahunAkademik ? $tagihan->tahunAkademik->nama_tahun_akademik : ''),
                        'price' => $tagihan->amount,
                        'quantity' => 1
                    ]
                ],
                'callback_url' => route('tripay.callback'),
                'return_url' => route('mahasiswa.pembayaran.success'),
                'expired_time' => (time() + (24 * 60 * 60)), // 24 hours
            ];

            $signature = $this->generateSignature($data);
            
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey,
                'X-Signature' => $signature
            ])->post($this->baseUrl . '/transaction/create', $data);

            if ($response->successful()) {
                $result = $response->json();
                
                if ($result['success']) {
                    $transactionData = $result['data'];
                    
                    // Save transaction to database
                    $transaction = TripayTransaction::create([
                        'reference' => $transactionData['reference'],
                        'merchant_ref' => $merchantRef,
                        'tagihan_kuliah_id' => $tagihan->id,
                        'payment_method' => $request->payment_method,
                        'payment_name' => $transactionData['payment_name'],
                        'amount' => $tagihan->amount,
                        'fee_merchant' => $fee['merchant'],
                        'fee_customer' => $fee['customer'],
                        'total_fee' => $fee['total'],
                        'amount_received' => $transactionData['amount_received'],
                        'checkout_url' => $transactionData['checkout_url'],
                        'status' => 'UNPAID',
                        'expired_time' => Carbon::createFromTimestamp($transactionData['expired_time']),
                        'instructions' => json_encode($transactionData['instructions'] ?? []),
                        'qr_url' => $transactionData['qr_url'] ?? null
                    ]);

                    // Log the transaction creation
                    $this->logActivity([
                        'aksi' => 'create_payment',
                        'model_type' => 'TripayTransaction',
                        'model_id' => $transaction->id,
                        'deskripsi' => "Transaksi pembayaran dibuat untuk tagihan {$tagihan->desc} - {$tagihan->mahasiswa->name}",
                        'user_name' => $tagihan->mahasiswa->name,
                        'user_type' => 'mahasiswa',
                        'ip_address' => request()->ip()
                    ]);

                    return response()->json([
                        'success' => true,
                        'message' => 'Transaksi berhasil dibuat',
                        'data' => [
                            'reference' => $transaction->reference,
                            'checkout_url' => $transaction->checkout_url,
                            'qr_url' => $transaction->qr_url,
                            'instructions' => json_decode($transaction->instructions, true),
                            'expired_time' => $transaction->expired_time->format('Y-m-d H:i:s')
                        ]
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => $result['message']
                    ], 400);
                }
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal membuat transaksi: ' . $response->body()
                ], 500);
            }

        } catch (\Exception $e) {
            Log::error('Failed to create Tripay transaction: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan internal: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Handle payment callback from Tripay
     */
    public function handleCallback(Request $request)
    {
        try {
            // Verify callback signature
            $callbackSignature = $request->server('HTTP_X_CALLBACK_SIGNATURE');
            $json = $request->getContent();
            $signature = hash_hmac('sha256', $json, $this->privateKey);

            if ($callbackSignature !== $signature) {
                Log::warning('Invalid Tripay callback signature');
                return response()->json(['success' => false], 400);
            }

            $data = $request->json()->all();
            
            // Find transaction
            $transaction = TripayTransaction::where('reference', $data['reference'])->first();
            
            if (!$transaction) {
                Log::warning('Tripay transaction not found: ' . $data['reference']);
                return response()->json(['success' => false], 404);
            }

            // Update transaction status
            $oldStatus = $transaction->status;
            $transaction->update([
                'status' => $data['status'],
                'paid_at' => $data['status'] === 'PAID' ? Carbon::createFromTimestamp($data['paid_at']) : null,
                'callback_data' => json_encode($data)
            ]);

            // Process payment if successful
            if ($data['status'] === 'PAID' && $oldStatus !== 'PAID') {
                $this->processSuccessfulPayment($transaction);
            }

            // Log status change
            $this->logActivity([
                'aksi' => 'payment_status_update',
                'model_type' => 'TripayTransaction',
                'model_id' => $transaction->id,
                'deskripsi' => "Status pembayaran berubah dari {$oldStatus} ke {$data['status']}",
                'user_name' => 'System',
                'user_type' => 'system',
                'ip_address' => request()->ip()
            ]);

            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            Log::error('Tripay callback error: ' . $e->getMessage());
            return response()->json(['success' => false], 500);
        }
    }

    /**
     * Process successful payment
     */
    private function processSuccessfulPayment($transaction)
    {
        try {
            DB::transaction(function() use ($transaction) {
                $tagihan = $transaction->tagihanKuliah;
                
                // Update tagihan status
                $tagihan->update(['status' => 'Lunas']);
                
                // Create payment record
                RiwayatPembayaran::create([
                    'mahasiswa_id' => $tagihan->mahasiswa_id,
                    'tagihan_kuliah_id' => $tagihan->id,
                    'tripay_transaction_id' => $transaction->id,
                    'jumlah_bayar' => $transaction->amount,
                    'metode_pembayaran' => $transaction->payment_name,
                    'referensi_pembayaran' => $transaction->reference,
                    'tgl_pembayaran' => $transaction->paid_at,
                    'status_pembayaran' => 'Sukses',
                    'fee_admin' => $transaction->total_fee,
                    'bukti_pembayaran' => 'tripay_' . $transaction->reference . '.pdf'
                ]);

                // Log successful payment
                $this->logActivity([
                    'aksi' => 'payment_success',
                    'model_type' => 'RiwayatPembayaran',
                    'model_id' => $tagihan->id,
                    'deskripsi' => "Pembayaran berhasil untuk tagihan {$tagihan->desc} - {$tagihan->mahasiswa->name}",
                    'user_name' => $tagihan->mahasiswa->name,
                    'user_type' => 'mahasiswa',
                    'ip_address' => request()->ip()
                ]);
            });

            // Send notification (email, WhatsApp, etc.)
            // $this->sendPaymentNotification($transaction);

        } catch (\Exception $e) {
            Log::error('Failed to process successful payment: ' . $e->getMessage());
        }
    }

    /**
     * Get payment method details
     */
    private function getPaymentMethodDetails($code)
    {
        try {
            $signature = hash_hmac('sha256', $this->merchantCode, $this->privateKey);
            
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey,
                'X-Signature' => $signature
            ])->get($this->baseUrl . '/merchant/payment-channel');

            if ($response->successful()) {
                $result = $response->json();
                $methods = collect($result['data']);
                
                return $methods->firstWhere('code', $code);
            }
            
            return null;
        } catch (\Exception $e) {
            Log::error('Failed to get payment method details: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Calculate payment fees
     */
    private function calculateFee($amount, $paymentMethod)
    {
        if (!$paymentMethod) {
            return ['merchant' => 0, 'customer' => 0, 'total' => 0];
        }

        $merchantFee = $paymentMethod['fee_merchant']['flat'] + 
                      ($amount * $paymentMethod['fee_merchant']['percent'] / 100);
        
        $customerFee = $paymentMethod['fee_customer']['flat'] + 
                      ($amount * $paymentMethod['fee_customer']['percent'] / 100);

        // Apply minimum and maximum fee limits
        if ($paymentMethod['minimum_fee'] > 0) {
            $merchantFee = max($merchantFee, $paymentMethod['minimum_fee']);
            $customerFee = max($customerFee, $paymentMethod['minimum_fee']);
        }

        if ($paymentMethod['maximum_fee'] > 0) {
            $merchantFee = min($merchantFee, $paymentMethod['maximum_fee']);
            $customerFee = min($customerFee, $paymentMethod['maximum_fee']);
        }

        return [
            'merchant' => round($merchantFee),
            'customer' => round($customerFee),
            'total' => round($merchantFee + $customerFee)
        ];
    }

    /**
     * Generate transaction signature
     */
    private function generateSignature($data)
    {
        $payload = $this->merchantCode . $data['merchant_ref'] . $data['amount'];
        return hash_hmac('sha256', $payload, $this->privateKey);
    }

    /**
     * Check transaction status
     */
    public function checkTransactionStatus($reference)
    {
        try {
            $signature = hash_hmac('sha256', $this->merchantCode . $reference, $this->privateKey);
            
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey,
                'X-Signature' => $signature
            ])->get($this->baseUrl . '/transaction/detail', ['reference' => $reference]);

            if ($response->successful()) {
                $result = $response->json();
                
                if ($result['success']) {
                    $transactionData = $result['data'];
                    
                    // Update local transaction record
                    $transaction = TripayTransaction::where('reference', $reference)->first();
                    if ($transaction) {
                        $transaction->update([
                            'status' => $transactionData['status'],
                            'paid_at' => $transactionData['status'] === 'PAID' && $transactionData['paid_at'] 
                                ? Carbon::createFromTimestamp($transactionData['paid_at']) 
                                : null
                        ]);

                        // Process payment if newly paid
                        if ($transactionData['status'] === 'PAID' && $transaction->status !== 'PAID') {
                            $this->processSuccessfulPayment($transaction);
                        }
                    }

                    return response()->json([
                        'success' => true,
                        'data' => $transactionData
                    ]);
                }
            }

            return response()->json([
                'success' => false,
                'message' => 'Gagal mengecek status transaksi'
            ], 400);

        } catch (\Exception $e) {
            Log::error('Failed to check transaction status: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan internal'
            ], 500);
        }
    }

    /**
     * Create Virtual Account
     */
    public function createVirtualAccount(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'bank_code' => 'required|string'
        ]);

        try {
            $mahasiswa = Mahasiswa::findOrFail($request->mahasiswa_id);
            
            // Check if VA already exists
            $existingVA = VirtualAccount::where('mahasiswa_id', $mahasiswa->id)
                ->where('bank_code', $request->bank_code)
                ->where('status', 'Aktif')
                ->first();

            if ($existingVA) {
                return response()->json([
                    'success' => false,
                    'message' => 'Virtual Account sudah ada untuk mahasiswa ini'
                ], 400);
            }

            $data = [
                'method' => $request->bank_code,
                'merchant_ref' => 'VA-' . $mahasiswa->id . '-' . time(),
                'customer_name' => $mahasiswa->name,
                'customer_email' => $mahasiswa->email,
                'customer_phone' => $mahasiswa->phone,
                'amount' => 0, // Open amount VA
                'is_open_payment' => true
            ];

            $signature = $this->generateSignature($data);
            
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey,
                'X-Signature' => $signature
            ])->post($this->baseUrl . '/open-payment/create', $data);

            if ($response->successful()) {
                $result = $response->json();
                
                if ($result['success']) {
                    $vaData = $result['data'];
                    
                    // Save VA to database
                    $virtualAccount = VirtualAccount::create([
                        'mahasiswa_id' => $mahasiswa->id,
                        'bank_code' => $request->bank_code,
                        'bank_name' => $vaData['payment_name'],
                        'account_number' => $vaData['pay_code'],
                        'reference' => $vaData['reference'],
                        'status' => 'Aktif',
                        'is_open_payment' => true
                    ]);

                    return response()->json([
                        'success' => true,
                        'message' => 'Virtual Account berhasil dibuat',
                        'data' => [
                            'account_number' => $virtualAccount->account_number,
                            'bank_name' => $virtualAccount->bank_name,
                            'reference' => $virtualAccount->reference
                        ]
                    ]);
                }
            }

            return response()->json([
                'success' => false,
                'message' => 'Gagal membuat Virtual Account'
            ], 400);

        } catch (\Exception $e) {
            Log::error('Failed to create Virtual Account: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan internal'
            ], 500);
        }
    }

    /**
     * Settings page
     */
    public function settings()
    {
        $data['webs'] = WebSetting::first();
        $data['menus'] = "Tripay Integration";
        $data['pages'] = "Pengaturan Tripay";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        
        $data['setting'] = TripaySettings::first();

        return view('integration.tripay.settings', $data);
    }

    /**
     * Update settings
     */
    public function updateSettings(Request $request)
    {
        $request->validate([
            'api_key' => 'required|string',
            'private_key' => 'required|string',
            'merchant_code' => 'required|string'
        ]);

        try {
            $setting = TripaySettings::first();
            
            if ($setting) {
                $setting->update([
                    'api_key' => $request->api_key,
                    'private_key' => encrypt($request->private_key),
                    'merchant_code' => $request->merchant_code,
                    'is_production' => $request->has('is_production'),
                    'is_active' => $request->has('is_active')
                ]);
            } else {
                TripaySettings::create([
                    'api_key' => $request->api_key,
                    'private_key' => encrypt($request->private_key),
                    'merchant_code' => $request->merchant_code,
                    'is_production' => $request->has('is_production'),
                    'is_active' => $request->has('is_active')
                ]);
            }

            // Update configuration
            $this->loadTripayConfig();

            return redirect()->back()
                ->with('success', 'Pengaturan Tripay berhasil diperbarui');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal memperbarui pengaturan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Transaction logs page
     */
    public function transactions(Request $request)
    {
        $data['webs'] = WebSetting::first();
        $data['menus'] = "Tripay Integration";
        $data['pages'] = "Transaksi Pembayaran";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;

        $query = TripayTransaction::with(['tagihanKuliah.mahasiswa']);

        // Filter by status
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        // Filter by payment method
        if ($request->has('payment_method') && $request->payment_method) {
            $query->where('payment_method', $request->payment_method);
        }

        // Filter by date range
        if ($request->has('date_from') && $request->date_from) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->has('date_to') && $request->date_to) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        // Search by reference or mahasiswa name
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('reference', 'like', "%{$search}%")
                  ->orWhere('merchant_ref', 'like', "%{$search}%")
                  ->orWhereHas('tagihanKuliah.mahasiswa', function($q2) use ($search) {
                      $q2->where('name', 'like', "%{$search}%")
                        ->orWhere('numb_nim', 'like', "%{$search}%");
                  });
            });
        }

        $data['transactions'] = $query->orderBy('created_at', 'desc')->paginate(20);
        $data['filters'] = $request->only(['status', 'payment_method', 'date_from', 'date_to', 'search']);

        return view('integration.tripay.transactions', $data);
    }
}