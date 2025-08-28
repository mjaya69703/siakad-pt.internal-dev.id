<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Keuangan\TagihanKuliah;
use App\Models\Keuangan\RiwayatPembayaran;
use App\Services\EnhancedBillingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class FinancialDashboardController extends Controller
{
    protected $billingService;

    public function __construct(EnhancedBillingService $billingService)
    {
        $this->billingService = $billingService;
    }

    /**
     * Main financial dashboard
     */
    public function index()
    {
        $mahasiswa = Auth::user();
        
        if (!$mahasiswa instanceof Mahasiswa) {
            return redirect()->route('auth.login')->with('error', 'Akses tidak diizinkan');
        }

        // Get billing summary
        $billingSummary = $this->billingService->getBillingSummary($mahasiswa);
        
        // Get recent billings
        $recentBillings = TagihanKuliah::where('mahasiswa_id', $mahasiswa->id)
                                     ->with(['tahunAkademik'])
                                     ->orderBy('created_at', 'desc')
                                     ->limit(5)
                                     ->get();
        
        // Get overdue billings
        $overdueBillings = TagihanKuliah::where('mahasiswa_id', $mahasiswa->id)
                                      ->where('due_date', '<', now())
                                      ->where('status', 'Pending')
                                      ->orderBy('due_date', 'asc')
                                      ->get();
        
        // Get upcoming billings (next 30 days)
        $upcomingBillings = TagihanKuliah::where('mahasiswa_id', $mahasiswa->id)
                                       ->where('due_date', '>=', now())
                                       ->where('due_date', '<=', now()->addDays(30))
                                       ->where('status', 'Pending')
                                       ->orderBy('due_date', 'asc')
                                       ->get();
        
        // Get payment history
        $paymentHistory = RiwayatPembayaran::whereHas('tagihanKuliah', function($query) use ($mahasiswa) {
                                         $query->where('mahasiswa_id', $mahasiswa->id);
                                     })
                                     ->with(['tagihanKuliah'])
                                     ->orderBy('tgl_pembayaran', 'desc')
                                     ->limit(10)
                                     ->get();

        // Financial analytics for charts
        $monthlyPayments = $this->getMonthlyPaymentData($mahasiswa);
        $billingByType = $this->getBillingByTypeData($mahasiswa);
        
        return view('student.financial.dashboard', compact(
            'mahasiswa',
            'billingSummary',
            'recentBillings',
            'overdueBillings',
            'upcomingBillings',
            'paymentHistory',
            'monthlyPayments',
            'billingByType'
        ));
    }

    /**
     * Show all billings with filtering
     */
    public function billings(Request $request)
    {
        $mahasiswa = Auth::user();
        
        $query = TagihanKuliah::where('mahasiswa_id', $mahasiswa->id)
                             ->with(['tahunAkademik']);

        // Apply filters
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('billing_type')) {
            $query->where('billing_type', $request->billing_type);
        }

        if ($request->filled('semester')) {
            $query->where('semester', $request->semester);
        }

        if ($request->filled('year')) {
            $query->whereHas('tahunAkademik', function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->year . '%');
            });
        }

        if ($request->filled('date_from')) {
            $query->where('due_date', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->where('due_date', '<=', $request->date_to);
        }

        $billings = $query->orderBy('due_date', 'desc')->paginate(15);
        
        // Get filter options
        $billingTypes = TagihanKuliah::BILLING_TYPES;
        $semesters = TagihanKuliah::where('mahasiswa_id', $mahasiswa->id)
                                ->distinct()
                                ->pluck('semester')
                                ->filter()
                                ->sort()
                                ->values();
        
        return view('student.financial.billings', compact(
            'mahasiswa',
            'billings',
            'billingTypes',
            'semesters'
        ));
    }

    /**
     * Show billing detail
     */
    public function billingDetail($id)
    {
        $mahasiswa = Auth::user();
        
        $billing = TagihanKuliah::where('mahasiswa_id', $mahasiswa->id)
                               ->with(['tahunAkademik', 'riwayatPembayaran'])
                               ->findOrFail($id);
        
        // Check if payment is overdue and apply penalty
        if ($billing->is_overdue && $billing->penalty_amount == 0) {
            $billing->applyLatePenalty();
        }
        
        return view('student.financial.billing-detail', compact('mahasiswa', 'billing'));
    }

    /**
     * Payment history
     */
    public function paymentHistory(Request $request)
    {
        $mahasiswa = Auth::user();
        
        $query = RiwayatPembayaran::whereHas('tagihanKuliah', function($q) use ($mahasiswa) {
                                 $q->where('mahasiswa_id', $mahasiswa->id);
                             })
                             ->with(['tagihanKuliah']);

        // Apply filters
        if ($request->filled('payment_method')) {
            $query->where('metode_pembayaran', $request->payment_method);
        }

        if ($request->filled('date_from')) {
            $query->where('tgl_pembayaran', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->where('tgl_pembayaran', '<=', $request->date_to);
        }

        $payments = $query->orderBy('tgl_pembayaran', 'desc')->paginate(15);
        
        $paymentMethods = RiwayatPembayaran::distinct()->pluck('metode_pembayaran')->filter();
        
        return view('student.financial.payment-history', compact(
            'mahasiswa',
            'payments',
            'paymentMethods'
        ));
    }

    /**
     * Financial reports and statements
     */
    public function reports(Request $request)
    {
        $mahasiswa = Auth::user();
        
        $reportType = $request->get('type', 'semester');
        $semester = $request->get('semester', $mahasiswa->semester);
        $year = $request->get('year', date('Y'));
        
        switch ($reportType) {
            case 'semester':
                return $this->semesterReport($mahasiswa, $semester);
            case 'annual':
                return $this->annualReport($mahasiswa, $year);
            case 'complete':
                return $this->completeReport($mahasiswa);
            default:
                return $this->semesterReport($mahasiswa, $semester);
        }
    }

    /**
     * Generate payment invoice/receipt
     */
    public function generateInvoice($billingId)
    {
        $mahasiswa = Auth::user();
        
        $billing = TagihanKuliah::where('mahasiswa_id', $mahasiswa->id)
                               ->with(['tahunAkademik', 'riwayatPembayaran'])
                               ->findOrFail($billingId);
        
        return view('student.financial.invoice', compact('mahasiswa', 'billing'));
    }

    /**
     * Process payment (redirect to payment gateway)
     */
    public function processPayment(Request $request, $billingId)
    {
        $mahasiswa = Auth::user();
        
        $billing = TagihanKuliah::where('mahasiswa_id', $mahasiswa->id)
                               ->findOrFail($billingId);
        
        if ($billing->status !== 'Pending') {
            return response()->json([
                'success' => false,
                'message' => 'Tagihan sudah dibayar atau tidak valid'
            ], 400);
        }

        // Initialize payment with Midtrans
        $paymentData = [
            'transaction_id' => 'TXN-' . $billingId . '-' . time(),
            'amount' => $billing->total_amount,
            'billing_id' => $billing->id,
            'customer' => [
                'name' => $mahasiswa->name,
                'email' => $mahasiswa->email,
                'phone' => $mahasiswa->phone,
                'nim' => $mahasiswa->nim,
            ],
            'item_details' => [
                [
                    'id' => $billing->id,
                    'name' => $billing->billing_type_name,
                    'price' => $billing->total_amount,
                    'quantity' => 1,
                ]
            ]
        ];

        // Here you would integrate with Midtrans or your payment gateway
        // For now, return mock response
        return response()->json([
            'success' => true,
            'message' => 'Redirect ke payment gateway',
            'payment_url' => route('student.financial.payment-gateway', $billing->id),
            'data' => $paymentData
        ]);
    }

    /**
     * Payment gateway interface
     */
    public function paymentGateway($billingId)
    {
        $mahasiswa = Auth::user();
        
        $billing = TagihanKuliah::where('mahasiswa_id', $mahasiswa->id)
                               ->findOrFail($billingId);
        
        if ($billing->status !== 'Pending') {
            return redirect()->route('student.financial.billings')
                           ->with('error', 'Tagihan sudah dibayar atau tidak valid');
        }
        
        return view('student.financial.payment-gateway', compact('mahasiswa', 'billing'));
    }

    /**
     * Handle payment callback
     */
    public function paymentCallback(Request $request)
    {
        // Handle payment gateway callback
        // This would process the actual payment response from Midtrans
        
        $billingId = $request->get('billing_id');
        $status = $request->get('status', 'success');
        $transactionId = $request->get('transaction_id');
        $amount = $request->get('amount');
        
        $billing = TagihanKuliah::findOrFail($billingId);
        
        if ($status === 'success') {
            // Record payment
            RiwayatPembayaran::create([
                'tagihan_kuliah_id' => $billing->id,
                'mahasiswa_id' => $billing->mahasiswa_id,
                'kode_pembayaran' => $transactionId,
                'jumlah_bayar' => $amount,
                'tgl_pembayaran' => now(),
                'metode_pembayaran' => 'Virtual Account',
                'status_pembayaran' => 'Sukses',
                'keterangan' => 'Pembayaran melalui gateway',
                'created_by' => $billing->mahasiswa_id,
            ]);
            
            // Update billing status
            $billing->update([
                'paid_amount' => $amount,
                'status' => 'Sukses',
                'paid_at' => now(),
                'payment_method' => 'Virtual Account',
                'payment_reference' => $transactionId,
            ]);
            
            return redirect()->route('student.financial.billing-detail', $billing->id)
                           ->with('success', 'Pembayaran berhasil diproses');
        }
        
        return redirect()->route('student.financial.billing-detail', $billing->id)
                       ->with('error', 'Pembayaran gagal atau dibatalkan');
    }

    /**
     * Download financial statements
     */
    public function downloadStatement(Request $request)
    {
        $mahasiswa = Auth::user();
        $type = $request->get('type', 'semester');
        
        // Generate PDF statement
        // This would use a PDF library like DomPDF or wkhtmltopdf
        
        return response()->json([
            'success' => true,
            'message' => 'Statement generated',
            'download_url' => route('student.financial.download-pdf', ['type' => $type])
        ]);
    }

    // Helper methods
    private function getMonthlyPaymentData(Mahasiswa $mahasiswa)
    {
        $payments = RiwayatPembayaran::whereHas('tagihanKuliah', function($query) use ($mahasiswa) {
                                   $query->where('mahasiswa_id', $mahasiswa->id);
                               })
                               ->where('tgl_pembayaran', '>=', now()->subMonths(12))
                               ->selectRaw('MONTH(tgl_pembayaran) as month, YEAR(tgl_pembayaran) as year, SUM(jumlah_bayar) as total')
                               ->groupBy('year', 'month')
                               ->orderBy('year', 'asc')
                               ->orderBy('month', 'asc')
                               ->get();

        $data = [];
        for ($i = 11; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $monthData = $payments->where('year', $date->year)
                                ->where('month', $date->month)
                                ->first();
            
            $data[] = [
                'month' => $date->format('M Y'),
                'amount' => $monthData ? $monthData->total : 0
            ];
        }
        
        return $data;
    }

    private function getBillingByTypeData(Mahasiswa $mahasiswa)
    {
        return TagihanKuliah::where('mahasiswa_id', $mahasiswa->id)
                           ->selectRaw('billing_type, COUNT(*) as count, SUM(amount) as total')
                           ->groupBy('billing_type')
                           ->get()
                           ->map(function($item) {
                               return [
                                   'type' => TagihanKuliah::BILLING_TYPES[$item->billing_type] ?? $item->billing_type,
                                   'count' => $item->count,
                                   'total' => $item->total
                               ];
                           });
    }

    private function semesterReport(Mahasiswa $mahasiswa, $semester)
    {
        $billings = TagihanKuliah::where('mahasiswa_id', $mahasiswa->id)
                                ->where('semester', $semester)
                                ->with(['riwayatPembayaran'])
                                ->get();
        
        $summary = [
            'total_billings' => $billings->count(),
            'total_amount' => $billings->sum('amount'),
            'paid_amount' => $billings->where('status', 'Sukses')->sum('amount'),
            'pending_amount' => $billings->where('status', 'Pending')->sum('amount'),
        ];
        
        return view('student.financial.reports.semester', compact(
            'mahasiswa',
            'billings',
            'summary',
            'semester'
        ));
    }

    private function annualReport(Mahasiswa $mahasiswa, $year)
    {
        $billings = TagihanKuliah::where('mahasiswa_id', $mahasiswa->id)
                                ->whereHas('tahunAkademik', function($query) use ($year) {
                                    $query->where('name', 'like', '%' . $year . '%');
                                })
                                ->with(['riwayatPembayaran', 'tahunAkademik'])
                                ->get();
        
        return view('student.financial.reports.annual', compact(
            'mahasiswa',
            'billings',
            'year'
        ));
    }

    private function completeReport(Mahasiswa $mahasiswa)
    {
        $billings = TagihanKuliah::where('mahasiswa_id', $mahasiswa->id)
                                ->with(['riwayatPembayaran', 'tahunAkademik'])
                                ->orderBy('created_at', 'desc')
                                ->get();
        
        return view('student.financial.reports.complete', compact(
            'mahasiswa',
            'billings'
        ));
    }
}