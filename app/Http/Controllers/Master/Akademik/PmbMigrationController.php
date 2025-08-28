<?php

namespace App\Http\Controllers\Master\Akademik;

use App\Http\Controllers\Controller;
use App\Services\PmbToAcademicMigrationService;
use App\Models\Pendaftaran\Pendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PmbMigrationController extends Controller
{
    protected $migrationService;

    public function __construct(PmbToAcademicMigrationService $migrationService)
    {
        $this->migrationService = $migrationService;
    }

    /**
     * Display PMB migration candidates
     */
    public function index()
    {
        $candidates = $this->migrationService->getMigrationCandidates();
        
        return view('private.master.akademik.pmb-migration.index', compact('candidates'));
    }

    /**
     * Show migration details for specific pendaftar
     */
    public function show($id)
    {
        $pendaftar = Pendaftar::with(['prodi1', 'prodi2', 'jalur', 'gelombang', 'dokumen'])
                             ->findOrFail($id);
        
        return view('private.master.akademik.pmb-migration.show', compact('pendaftar'));
    }

    /**
     * Migrate single pendaftar to mahasiswa
     */
    public function migrate(Request $request, $id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        
        $result = $this->migrationService->migratePendaftarToMahasiswa($pendaftar);
        
        if ($result['success']) {
            return response()->json([
                'success' => true,
                'message' => $result['message'],
                'data' => [
                    'mahasiswa_id' => $result['data']['mahasiswa']->id,
                    'nim' => $result['data']['nim'],
                    'redirect_url' => route('admin.mahasiswa.show', $result['data']['mahasiswa']->code)
                ]
            ]);
        }
        
        return response()->json([
            'success' => false,
            'message' => $result['message']
        ], 400);
    }

    /**
     * Bulk migrate multiple pendaftar
     */
    public function bulkMigrate(Request $request)
    {
        $request->validate([
            'pendaftar_ids' => 'required|array',
            'pendaftar_ids.*' => 'exists:pendaftars,id'
        ]);

        $result = $this->migrationService->bulkMigrate($request->pendaftar_ids);
        
        return response()->json([
            'success' => true,
            'message' => "Migrasi selesai: {$result['summary']['success_count']} berhasil, {$result['summary']['failed_count']} gagal",
            'data' => $result
        ]);
    }

    /**
     * Preview migration data before actual migration
     */
    public function preview($id)
    {
        $pendaftar = Pendaftar::with(['prodi1', 'prodi2', 'jalur', 'gelombang'])
                             ->findOrFail($id);
        
        // Check eligibility
        $eligible = ($pendaftar->status === 'Diterima' && 
                    $pendaftar->payment_status === 'Verified' && 
                    $pendaftar->mahasiswa_id == 0);
        
        $previewData = [
            'eligible' => $eligible,
            'pendaftar' => $pendaftar,
            'preview_nim' => $this->generatePreviewNIM($pendaftar),
            'target_prodi' => $pendaftar->prodi1,
            'missing_data' => $this->checkMissingData($pendaftar)
        ];
        
        return response()->json($previewData);
    }

    /**
     * Generate preview NIM (similar to service but without saving)
     */
    private function generatePreviewNIM(Pendaftar $pendaftar): string
    {
        $currentYear = date('Y');
        $yearSuffix = substr($currentYear, -2);
        
        $prodi = $pendaftar->prodi1;
        $prodiCode = $prodi ? str_pad($prodi->id, 2, '0', STR_PAD_LEFT) : '00';
        
        return $yearSuffix . $prodiCode . 'XXXX'; // Preview format
    }

    /**
     * Check for missing required data
     */
    private function checkMissingData(Pendaftar $pendaftar): array
    {
        $missing = [];
        
        $requiredFields = [
            'name' => 'Nama Lengkap',
            'email' => 'Email',
            'phone' => 'Nomor Telepon',
            'nik' => 'NIK',
            'jenis_kelamin' => 'Jenis Kelamin',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'agama' => 'Agama',
            'alamat_lengkap' => 'Alamat Lengkap',
        ];
        
        foreach ($requiredFields as $field => $label) {
            if (empty($pendaftar->$field)) {
                $missing[] = $label;
            }
        }
        
        return $missing;
    }

    /**
     * Export migration report
     */
    public function exportReport(Request $request)
    {
        $candidates = $this->migrationService->getMigrationCandidates();
        
        // Create Excel export logic here
        // For now, return JSON
        return response()->json([
            'total_candidates' => $candidates->count(),
            'candidates' => $candidates->map(function($candidate) {
                return [
                    'id' => $candidate->id,
                    'name' => $candidate->name,
                    'email' => $candidate->email,
                    'phone' => $candidate->phone,
                    'program_studi' => $candidate->prodi1->name ?? 'N/A',
                    'jalur' => $candidate->jalur->name ?? 'N/A',
                    'gelombang' => $candidate->gelombang->name ?? 'N/A',
                    'payment_status' => $candidate->payment_status,
                    'registration_date' => $candidate->created_at->format('d/m/Y')
                ];
            })
        ]);
    }
}