<?php

namespace App\Http\Controllers\Master\Pembayaran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

// Models
use App\Models\Mahasiswa;
use App\Models\Keuangan\TagihanKuliah;
use App\Models\Keuangan\Pembayaran;
use App\Models\Keuangan\JenisPembayaran;
use App\Models\Keuangan\TarifPembayaran;
use App\Models\Keuangan\Bank;
use App\Models\Keuangan\CicilanPembayaran;
use App\Models\Akademik\TahunAkademik;
use App\Models\Akademik\ProgramStudi;
use App\Models\Pengaturan\WebSetting;

// Services
use App\Services\EnhancedBillingService;
use App\Services\TripayPaymentService;

// Traits
use App\Traits\HasLogAktivitas;

class PembayaranController extends Controller
{
    use HasLogAktivitas;

    protected $billingService;
    protected $tripayService;

    public function __construct(
        EnhancedBillingService $billingService,
        TripayPaymentService $tripayService
    ) {
        $this->billingService = $billingService;
        $this->tripayService = $tripayService;
    }

    /**
     * Payment dashboard
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $data = $this->getBaseData();
        
        // Get payment statistics
        $data['statistics'] = $this->getPaymentStatistics();
        
        // Get recent payments
        $data['recentPayments'] = Pembayaran::with(['mahasiswa', 'tagihan', 'jenisPembayaran'])
            ->whereDate('created_at', '>=', Carbon::now()->subDays(7))
            ->latest()
            ->take(10)
            ->get();
        
        return view('master.pembayaran.dashboard', $data, compact('user'));
    }

    /**
     * Payment reference management - Tarif settings
     */
    public function tarifManagement(Request $request)
    {
        $user = Auth::user();
        $data = $this->getBaseData();
        
        $query = TarifPembayaran::with(['programStudi', 'tahunAkademik', 'jenisPembayaran']);
        
        if ($request->filled('prodi_id')) {
            $query->where('prodi_id', $request->prodi_id);
        }
        
        if ($request->filled('tahun_akademik_id')) {
            $query->where('tahun_akademik_id', $request->tahun_akademik_id);
        }
        
        $data['tarifs'] = $query->paginate(20);
        
        return view('master.pembayaran.tarif-management', $data, compact('user'));
    }

    /**
     * Store new tarif
     */
    public function storeTarif(Request $request)
    {
        $request->validate([
            'jenis_pembayaran_id' => 'required|exists:jenis_pembayarans,id',
            'prodi_id' => 'required|exists:program_studis,id',
            'tahun_akademik_id' => 'required|exists:tahun_akademiks,id',
            'angkatan' => 'required|integer|min:2000|max:2050',
            'nominal' => 'required|numeric|min:0',
            'cicilan_tersedia' => 'boolean',
            'max_cicilan' => 'nullable|integer|min:1|max:12',
        ]);

        try {
            DB::beginTransaction();
            
            $tarif = TarifPembayaran::create([
                'jenis_pembayaran_id' => $request->jenis_pembayaran_id,
                'prodi_id' => $request->prodi_id,
                'tahun_akademik_id' => $request->tahun_akademik_id,
                'angkatan' => $request->angkatan,
                'nominal' => $request->nominal,
                'cicilan_tersedia' => $request->boolean('cicilan_tersedia'),
                'max_cicilan' => $request->max_cicilan,
                'denda_per_hari' => $request->denda_per_hari ?? 0,
                'status' => 'Aktif',
                'created_by' => Auth::id(),
            ]);
            
            $this->logActivity(
                'create',
                'TarifPembayaran',
                $tarif->id,
                "Membuat tarif baru: {$tarif->jenisPembayaran->nama} - Rp " . number_format($tarif->nominal)
            );
            
            DB::commit();
            
            return redirect()->back()->with('success', 'Tarif pembayaran berhasil ditambahkan');
            
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    /**
     * Billing management - Generate tagihan
     */
    public function tagihanManagement(Request $request)
    {
        $user = Auth::user();
        $data = $this->getBaseData();
        
        // Get tagihan with filters
        $query = TagihanKuliah::with(['mahasiswa.programStudi', 'tahunAkademik', 'jenisPembayaran']);
        
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        if ($request->filled('prodi_id')) {
            $query->whereHas('mahasiswa', function($q) use ($request) {
                $q->where('prodi_id', $request->prodi_id);
            });
        }
        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('mahasiswa', function($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('nim', 'LIKE', "%{$search}%");
            });
        }
        
        $data['tagihans'] = $query->paginate(20);
        
        // Get students without billing
        $data['studentsWithoutBilling'] = $this->getStudentsWithoutBilling();
        
        return view('master.pembayaran.tagihan-management', $data, compact('user'));
    }

    /**
     * Generate billing for students
     */
    public function generateTagihan(Request $request)
    {
        $request->validate([
            'tahun_akademik_id' => 'required|exists:tahun_akademiks,id',
            'prodi_id' => 'required|exists:program_studis,id',
            'jenis_pembayaran_id' => 'required|exists:jenis_pembayarans,id',
            'mahasiswa_ids' => 'nullable|array',
            'mahasiswa_ids.*' => 'exists:mahasiswas,id',
        ]);

        try {
            $results = $this->billingService->generateBulkBilling(
                $request->tahun_akademik_id,
                $request->prodi_id,
                $request->jenis_pembayaran_id,
                $request->mahasiswa_ids
            );
            
            $message = "Berhasil generate {$results['success']} tagihan.";
            if ($results['failed'] > 0) {
                $message .= " {$results['failed']} gagal diproses.";
            }
            
            return redirect()->back()->with('success', $message);
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    /**
     * Payment transaction management
     */
    public function transaksiPembayaran(Request $request)
    {
        $user = Auth::user();
        $data = $this->getBaseData();
        
        $query = Pembayaran::with(['mahasiswa', 'tagihan', 'bank', 'jenisPembayaran']);
        
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        if ($request->filled('payment_method')) {
            $query->where('payment_method', $request->payment_method);
        }
        
        if ($request->filled('date_from') && $request->filled('date_to')) {
            $query->whereBetween('payment_date', [
                $request->date_from,
                $request->date_to
            ]);
        }
        
        $data['payments'] = $query->latest()->paginate(20);
        
        return view('master.pembayaran.transaksi-pembayaran', $data, compact('user'));
    }

    /**
     * Manual payment input
     */
    public function inputPembayaranManual(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'tagihan_id' => 'required|exists:tagihan_kuliahs,id',
            'amount' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
            'payment_method' => 'required|in:Cash,Transfer,VA,Tripay',
            'bank_id' => 'nullable|exists:banks,id',
            'reference_number' => 'nullable|string|max:100',
            'keterangan' => 'nullable|string|max:500',
        ]);

        try {
            DB::beginTransaction();
            
            $tagihan = TagihanKuliah::findOrFail($request->tagihan_id);
            $mahasiswa = Mahasiswa::findOrFail($request->mahasiswa_id);
            
            // Create payment record
            $payment = Pembayaran::create([
                'mahasiswa_id' => $request->mahasiswa_id,
                'tagihan_id' => $request->tagihan_id,
                'jenis_pembayaran_id' => $tagihan->jenis_pembayaran_id,
                'amount' => $request->amount,
                'payment_date' => $request->payment_date,
                'payment_method' => $request->payment_method,
                'bank_id' => $request->bank_id,
                'reference_number' => $request->reference_number,
                'keterangan' => $request->keterangan,
                'status' => 'Verified',
                'verified_by' => Auth::id(),
                'verified_at' => now(),
                'created_by' => Auth::id(),
            ]);
            
            // Update tagihan status
            $this->billingService->updateTagihanStatus($tagihan, $request->amount);
            
            // Log activity
            $this->logActivity(
                'create',
                'Pembayaran',
                $payment->id,
                "Input pembayaran manual: {$mahasiswa->name} (NIM: {$mahasiswa->nim}) - Rp " . number_format($request->amount)
            );
            
            DB::commit();
            
            return redirect()->back()->with('success', 'Pembayaran berhasil diinput');
            
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    /**
     * Verify payment
     */
    public function verifyPayment($id)
    {
        try {
            $payment = Pembayaran::findOrFail($id);
            
            $payment->update([
                'status' => 'Verified',
                'verified_by' => Auth::id(),
                'verified_at' => now(),
            ]);
            
            // Update related tagihan
            if ($payment->tagihan) {
                $this->billingService->updateTagihanStatus($payment->tagihan, $payment->amount);
            }
            
            $this->logActivity(
                'update',
                'Pembayaran',
                $payment->id,
                "Verifikasi pembayaran: Rp " . number_format($payment->amount)
            );
            
            return response()->json(['success' => true, 'message' => 'Pembayaran berhasil diverifikasi']);
            
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }

    /**
     * Unverify payment
     */
    public function unverifyPayment($id)
    {
        try {
            $payment = Pembayaran::findOrFail($id);
            
            $payment->update([
                'status' => 'Pending',
                'verified_by' => null,
                'verified_at' => null,
            ]);
            
            $this->logActivity(
                'update',
                'Pembayaran',
                $payment->id,
                "Batal verifikasi pembayaran: Rp " . number_format($payment->amount)
            );
            
            return response()->json(['success' => true, 'message' => 'Verifikasi pembayaran dibatalkan']);
            
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }

    /**
     * Cancel payment
     */
    public function cancelPayment(Request $request, $id)
    {
        $request->validate([
            'cancel_reason' => 'required|string|max:500'
        ]);

        try {
            $payment = Pembayaran::findOrFail($id);
            
            $payment->update([
                'status' => 'Cancelled',
                'cancel_reason' => $request->cancel_reason,
                'cancelled_by' => Auth::id(),
                'cancelled_at' => now(),
            ]);
            
            $this->logActivity(
                'update',
                'Pembayaran',
                $payment->id,
                "Batalkan pembayaran: {$request->cancel_reason}"
            );
            
            return redirect()->back()->with('success', 'Pembayaran berhasil dibatalkan');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    /**
     * Print receipt
     */
    public function printReceipt($id)
    {
        $payment = Pembayaran::with(['mahasiswa.programStudi', 'tagihan', 'bank'])
            ->findOrFail($id);
        
        $data = [
            'payment' => $payment,
            'webs' => WebSetting::first(),
        ];
        
        return view('master.pembayaran.receipt', $data);
    }

    /**
     * Bank reconciliation
     */
    public function bankReconciliation(Request $request)
    {
        $user = Auth::user();
        $data = $this->getBaseData();
        
        // Get bank payments that need reconciliation
        $query = Pembayaran::with(['mahasiswa', 'bank', 'tagihan'])
            ->where('payment_method', '!=', 'Cash')
            ->where('status', 'Pending');
        
        if ($request->filled('bank_id')) {
            $query->where('bank_id', $request->bank_id);
        }
        
        $data['pendingPayments'] = $query->paginate(20);
        
        return view('master.pembayaran.bank-reconciliation', $data, compact('user'));
    }

    /**
     * Get base data for views
     */
    protected function getBaseData()
    {
        return [
            'webs' => WebSetting::first(),
            'spref' => Auth::user()->prefix ?? '',
            'menus' => "Pembayaran",
            'pages' => "Manajemen Pembayaran",
            'academy' => "SIAKAD PT by Neco Academy",
            'tahunAkademiks' => TahunAkademik::orderBy('name', 'desc')->get(),
            'programStudis' => ProgramStudi::where('status', 'Aktif')->get(),
            'jenisPembayarans' => JenisPembayaran::where('status', 'Aktif')->get(),
            'banks' => Bank::where('status', 'Aktif')->get(),
        ];
    }

    /**
     * Get payment statistics
     */
    protected function getPaymentStatistics()
    {
        $currentMonth = Carbon::now()->startOfMonth();
        
        return [
            'total_tagihan' => TagihanKuliah::count(),
            'tagihan_pending' => TagihanKuliah::where('status', 'Pending')->count(),
            'tagihan_lunas' => TagihanKuliah::where('status', 'Paid')->count(),
            'pembayaran_bulan_ini' => Pembayaran::where('payment_date', '>=', $currentMonth)->count(),
            'total_pendapatan_bulan_ini' => Pembayaran::where('payment_date', '>=', $currentMonth)
                ->where('status', 'Verified')->sum('amount'),
            'pembayaran_pending_verifikasi' => Pembayaran::where('status', 'Pending')->count(),
            'total_tunggakan' => TagihanKuliah::where('status', 'Pending')
                ->where('due_date', '<', now())->sum('remaining_amount'),
        ];
    }

    /**
     * Get students without billing
     */
    protected function getStudentsWithoutBilling()
    {
        $activeTahunAkademik = TahunAkademik::where('is_active', true)->first();
        
        if (!$activeTahunAkademik) {
            return collect();
        }
        
        return Mahasiswa::where('type', 1) // Active students
            ->whereDoesntHave('tagihans', function($query) use ($activeTahunAkademik) {
                $query->where('tahun_akademik_id', $activeTahunAkademik->id);
            })
            ->with('programStudi')
            ->take(20)
            ->get();
    }
}