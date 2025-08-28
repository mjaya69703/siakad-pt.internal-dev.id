<?php

namespace App\Http\Controllers\Master\Registrasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

// Models
use App\Models\Mahasiswa;
use App\Models\Pendaftaran\Pendaftar;
use App\Models\Akademik\TahunAkademik;
use App\Models\Akademik\ProgramStudi;
use App\Models\Akademik\Fakultas;
use App\Models\Keuangan\TagihanKuliah;
use App\Models\Pengaturan\WebSetting;

// Services
use App\Services\PmbToAcademicMigrationService;
use App\Services\EnhancedBillingService;

// Traits
use App\Traits\HasLogAktivitas;

class RegistrasiController extends Controller
{
    use HasLogAktivitas;

    protected $migrationService;
    protected $billingService;

    public function __construct(
        PmbToAcademicMigrationService $migrationService,
        EnhancedBillingService $billingService
    ) {
        $this->migrationService = $migrationService;
        $this->billingService = $billingService;
    }

    /**
     * Display registration dashboard
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $data = $this->getBaseData();
        
        // Get registration statistics
        $data['statistics'] = $this->getRegistrationStatistics();
        
        // Get recent registrations
        $data['recentRegistrations'] = Mahasiswa::with(['programStudi', 'tahunAkademikRegistrasi'])
            ->whereDate('created_at', '>=', Carbon::now()->subDays(7))
            ->latest()
            ->take(10)
            ->get();
        
        return view('master.registrasi.dashboard', $data, compact('user'));
    }

    /**
     * Show pending PMB applications for migration
     */
    public function pendingPmb(Request $request)
    {
        $user = Auth::user();
        $data = $this->getBaseData();
        
        // Get pending PMB applications ready for migration
        $query = Pendaftar::where('status', 'Lulus')
            ->whereNull('mahasiswa_id')
            ->with(['programStudi1', 'jalur', 'gelombang']);
        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('numb_reg', 'LIKE', "%{$search}%")
                  ->orWhere('nik', 'LIKE', "%{$search}%");
            });
        }
        
        if ($request->filled('jalur_id')) {
            $query->where('jalur_id', $request->jalur_id);
        }
        
        $data['pendingApplicants'] = $query->paginate(20);
        
        return view('master.registrasi.pending-pmb', $data, compact('user'));
    }

    /**
     * Migrate PMB applicant to student (single)
     */
    public function migrateSingle(Request $request, $pendaftarId)
    {
        try {
            DB::beginTransaction();
            
            $pendaftar = Pendaftar::findOrFail($pendaftarId);
            
            if ($pendaftar->mahasiswa_id) {
                return redirect()->back()->with('error', 'Pendaftar sudah dimigrasikan');
            }
            
            // Generate NIM
            $nim = $this->generateNIM($pendaftar->prodi_1, $pendaftar->tahun_akademik_id);
            
            // Create student record
            $mahasiswa = $this->migrationService->migratePendaftarToMahasiswa($pendaftar, $nim);
            
            // Generate initial billing
            $this->billingService->generateInitialBilling($mahasiswa);
            
            // Log activity
            $this->logActivity(
                'create',
                'Mahasiswa',
                $mahasiswa->id,
                "Migrasi mahasiswa dari PMB: {$mahasiswa->name} (NIM: {$mahasiswa->nim})"
            );
            
            DB::commit();
            
            return redirect()->back()->with('success', "Berhasil migrasi pendaftar menjadi mahasiswa dengan NIM: {$nim}");
            
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    /**
     * Bulk migrate PMB applicants
     */
    public function migrateBulk(Request $request)
    {
        $request->validate([
            'selected_applicants' => 'required|array',
            'selected_applicants.*' => 'exists:pendaftars,id'
        ]);

        try {
            DB::beginTransaction();
            
            $successCount = 0;
            $errors = [];
            
            foreach ($request->selected_applicants as $pendaftarId) {
                try {
                    $pendaftar = Pendaftar::find($pendaftarId);
                    
                    if (!$pendaftar || $pendaftar->mahasiswa_id) {
                        continue;
                    }
                    
                    $nim = $this->generateNIM($pendaftar->prodi_1, $pendaftar->tahun_akademik_id);
                    $mahasiswa = $this->migrationService->migratePendaftarToMahasiswa($pendaftar, $nim);
                    $this->billingService->generateInitialBilling($mahasiswa);
                    
                    $successCount++;
                    
                } catch (\Exception $e) {
                    $errors[] = "Error migrasi {$pendaftar->name}: {$e->getMessage()}";
                }
            }
            
            DB::commit();
            
            $message = "Berhasil migrasi {$successCount} pendaftar menjadi mahasiswa.";
            if (!empty($errors)) {
                $message .= " Errors: " . implode(', ', $errors);
            }
            
            return redirect()->back()->with('success', $message);
            
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Bulk migration error: ' . $e->getMessage());
        }
    }

    /**
     * Show student management page
     */
    public function manajemenMahasiswa(Request $request)
    {
        $user = Auth::user();
        $data = $this->getBaseData();
        
        $query = Mahasiswa::with(['programStudi', 'kelas', 'tahunAkademikAktif']);
        
        // Search filters
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('nim', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%");
            });
        }
        
        if ($request->filled('prodi_id')) {
            $query->where('prodi_id', $request->prodi_id);
        }
        
        if ($request->filled('status')) {
            $query->where('type', $request->status);
        }
        
        if ($request->filled('tahun_masuk')) {
            $query->where('taka_regist', $request->tahun_masuk);
        }
        
        $data['mahasiswas'] = $query->paginate(20);
        
        return view('master.registrasi.manajemen-mahasiswa', $data, compact('user'));
    }

    /**
     * Show student detail
     */
    public function detailMahasiswa($id)
    {
        $user = Auth::user();
        $data = $this->getBaseData();
        
        $data['mahasiswa'] = Mahasiswa::with([
            'programStudi.fakultas',
            'kelas',
            'tahunAkademikRegistrasi',
            'tahunAkademikAktif'
        ])->findOrFail($id);
        
        // Get billing history
        $data['tagihans'] = TagihanKuliah::where('mahasiswa_id', $id)
            ->with('tahunAkademik')
            ->latest()
            ->get();
        
        // Get academic history
        $data['academicHistory'] = $this->getAcademicHistory($id);
        
        return view('master.registrasi.detail-mahasiswa', $data, compact('user'));
    }

    /**
     * Update student status
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|integer|in:1,2,3,4,5',
            'keterangan' => 'nullable|string|max:500'
        ]);

        try {
            $mahasiswa = Mahasiswa::findOrFail($id);
            $oldStatus = $mahasiswa->type;
            
            $mahasiswa->update([
                'type' => $request->status,
                'status_keterangan' => $request->keterangan,
                'status_updated_at' => now()
            ]);
            
            // Log activity
            $statusLabels = [
                1 => 'Aktif', 2 => 'Tidak Aktif', 3 => 'Lulus',
                4 => 'Cuti', 5 => 'Pindah'
            ];
            
            $this->logActivity(
                'update',
                'Mahasiswa',
                $mahasiswa->id,
                "Perubahan status dari {$statusLabels[$oldStatus]} ke {$statusLabels[$request->status]}: {$request->keterangan}"
            );
            
            return redirect()->back()->with('success', 'Status mahasiswa berhasil diperbarui');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    /**
     * Generate student card (KTM)
     */
    public function generateKTM($id)
    {
        $mahasiswa = Mahasiswa::with(['programStudi.fakultas'])->findOrFail($id);
        
        // Here you would implement KTM generation logic
        // For now, return a placeholder
        
        return response()->json([
            'success' => true,
            'message' => 'KTM berhasil digenerate',
            'download_url' => route('registrasi.download-ktm', $id)
        ]);
    }

    /**
     * Generate NIM automatically
     */
    protected function generateNIM($prodiId, $tahunAkademikId)
    {
        $prodi = ProgramStudi::findOrFail($prodiId);
        $tahunAkademik = TahunAkademik::find($tahunAkademikId);
        
        // Get year from academic year or current year
        $year = $tahunAkademik ? 
            substr($tahunAkademik->name, 0, 4) : 
            date('Y');
        
        // Format: YYPPNNNN (YY=year, PP=prodi code, NNNN=sequential)
        $yearCode = substr($year, -2);
        $prodiCode = str_pad($prodi->code, 2, '0', STR_PAD_LEFT);
        
        // Get next sequential number
        $lastNim = Mahasiswa::where('nim', 'LIKE', $yearCode . $prodiCode . '%')
            ->orderBy('nim', 'desc')
            ->first();
        
        $sequentialNumber = 1;
        if ($lastNim) {
            $lastSequence = substr($lastNim->nim, -4);
            $sequentialNumber = intval($lastSequence) + 1;
        }
        
        $sequenceCode = str_pad($sequentialNumber, 4, '0', STR_PAD_LEFT);
        
        return $yearCode . $prodiCode . $sequenceCode;
    }

    /**
     * Get base data for views
     */
    protected function getBaseData()
    {
        return [
            'webs' => WebSetting::first(),
            'spref' => Auth::user()->prefix ?? '',
            'menus' => "Registrasi",
            'pages' => "Manajemen Registrasi",
            'academy' => "SIAKAD PT by Neco Academy",
            'tahunAkademiks' => TahunAkademik::orderBy('name', 'desc')->get(),
            'programStudis' => ProgramStudi::where('status', 'Aktif')->get(),
            'fakultas' => Fakultas::where('status', 'Aktif')->get(),
        ];
    }

    /**
     * Get registration statistics
     */
    protected function getRegistrationStatistics()
    {
        $currentYear = date('Y');
        
        return [
            'total_mahasiswa' => Mahasiswa::count(),
            'mahasiswa_aktif' => Mahasiswa::where('type', 1)->count(),
            'mahasiswa_baru' => Mahasiswa::whereYear('created_at', $currentYear)->count(),
            'pending_pmb' => Pendaftar::where('status', 'Lulus')->whereNull('mahasiswa_id')->count(),
            'registrasi_hari_ini' => Mahasiswa::whereDate('created_at', today())->count(),
            'mahasiswa_cuti' => Mahasiswa::where('type', 4)->count(),
            'mahasiswa_lulus' => Mahasiswa::where('type', 3)->count(),
            'mahasiswa_tidak_aktif' => Mahasiswa::where('type', 2)->count(),
        ];
    }

    /**
     * Get academic history for student
     */
    protected function getAcademicHistory($mahasiswaId)
    {
        // This would typically include KRS, KHS, grades, etc.
        // For now, return basic status changes
        return [
            'status_changes' => [],
            'academic_records' => []
        ];
    }
}