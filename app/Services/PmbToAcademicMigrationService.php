<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

// Models
use App\Models\Mahasiswa;
use App\Models\Pendaftaran\Pendaftar;
use App\Models\Akademik\TahunAkademik;
use App\Models\Akademik\ProgramStudi;
use App\Models\Akademik\Kelas;
use App\Models\User;

// Traits
use App\Traits\HasLogAktivitas;

// Services
use App\Services\LogAktivitasService;

class PmbToAcademicMigrationService
{
    use HasLogAktivitas;
    
    protected $logService;
    
    public function __construct()
    {
        $this->logService = new LogAktivitasService();
    }

    /**
     * Migrate PMB applicant to student
     */
    public function migratePendaftarToMahasiswa(Pendaftar $pendaftar, string $nim): Mahasiswa
    {
        DB::beginTransaction();
        
        try {
            // Create student record
            $mahasiswa = $this->createMahasiswaFromPendaftar($pendaftar, $nim);
            
            // Create user account for student portal
            $user = $this->createUserAccountForMahasiswa($mahasiswa);
            
            // Update mahasiswa with user_id
            $mahasiswa->update(['user_id' => $user->id]);
            
            // Assign to class if available
            $this->assignToClass($mahasiswa);
            
            // Update pendaftar record
            $pendaftar->update([
                'mahasiswa_id' => $mahasiswa->id,
                'status' => 'Daftar Ulang',
                'migrated_at' => now()
            ]);
            
            // Log the migration
            $this->logActivity(
                'create',
                'Mahasiswa',
                $mahasiswa->id,
                "Migrasi dari PMB: {$mahasiswa->name} (NIM: {$nim})"
            );
            
            DB::commit();
            
            return $mahasiswa;
            
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    /**
     * Create mahasiswa record from pendaftar data
     */
    protected function createMahasiswaFromPendaftar(Pendaftar $pendaftar, string $nim): Mahasiswa
    {
        $activeTahunAkademik = TahunAkademik::where('is_active', true)->first();
        
        $mahasiswaData = [
            'nim' => $nim,
            'name' => $pendaftar->name,
            'email' => $pendaftar->email,
            'phone' => $pendaftar->phone,
            'gender' => $this->mapGender($pendaftar->gender),
            'birth_date' => $pendaftar->birth_date,
            'birth_place' => $pendaftar->birth_place,
            'address' => $pendaftar->address,
            'religion' => $pendaftar->religion,
            'nationality' => $pendaftar->nationality ?? 'Indonesia',
            'nik' => $pendaftar->nik,
            
            // Academic information
            'prodi_id' => $pendaftar->prodi_1, // Use first choice
            'taka_regist' => $pendaftar->tahun_akademik_id ?? $activeTahunAkademik->id,
            'taka_active' => $activeTahunAkademik->id ?? $pendaftar->tahun_akademik_id,
            
            // Status
            'type' => 1, // Active student
            'status' => 'Aktif',
            'semester' => 1,
            
            // Additional fields
            'jalur_masuk' => $pendaftar->jalur_id,
            'gelombang_masuk' => $pendaftar->gelombang_id,
            'source_id' => $pendaftar->id,
            'source_type' => 'App\\Models\\Pendaftaran\\Pendaftar',
            
            // Parent information (if available)
            'father_name' => $pendaftar->father_name,
            'mother_name' => $pendaftar->mother_name,
            'parent_phone' => $pendaftar->parent_phone,
            'parent_address' => $pendaftar->parent_address,
            
            // Academic background
            'school_origin' => $pendaftar->school_origin,
            'graduation_year' => $pendaftar->graduation_year,
            'certificate_number' => $pendaftar->certificate_number,
            
            // Registration dates
            'registration_date' => now(),
            'admission_date' => now(),
            
            // Initial academic status
            'ipk' => 0.00,
            'total_sks' => 0,
            'sks_maksimal' => 24, // Standard initial max SKS
            
            'created_at' => now(),
            'updated_at' => now(),
        ];

        return Mahasiswa::create($mahasiswaData);
    }

    /**
     * Create user account for student portal access
     */
    protected function createUserAccountForMahasiswa(Mahasiswa $mahasiswa): User
    {
        $userData = [
            'name' => $mahasiswa->name,
            'username' => $mahasiswa->nim,
            'email' => $mahasiswa->email,
            'password' => Hash::make($mahasiswa->nim), // Default password is NIM
            'role' => 'Mahasiswa',
            'is_active' => true,
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ];

        return User::create($userData);
    }

    /**
     * Assign student to appropriate class
     */
    protected function assignToClass(Mahasiswa $mahasiswa): void
    {
        // Find available class for this program studi and academic year
        $kelas = Kelas::where('prodi_id', $mahasiswa->prodi_id)
            ->where('taka_id', $mahasiswa->taka_active)
            ->where('semester', 1) // First semester class
            ->whereRaw('capacity > (SELECT COUNT(*) FROM mahasiswas WHERE kelas_id = kelases.id)')
            ->first();

        if (!$kelas) {
            // Create new class if none available
            $kelas = $this->createNewClass($mahasiswa);
        }

        if ($kelas) {
            $mahasiswa->update(['kelas_id' => $kelas->id]);
        }
    }

    /**
     * Create new class for students
     */
    protected function createNewClass(Mahasiswa $mahasiswa): Kelas
    {
        $prodi = ProgramStudi::find($mahasiswa->prodi_id);
        $tahunAkademik = TahunAkademik::find($mahasiswa->taka_active);
        
        // Generate class name
        $existingClasses = Kelas::where('prodi_id', $mahasiswa->prodi_id)
            ->where('taka_id', $mahasiswa->taka_active)
            ->where('semester', 1)
            ->count();
        
        $className = $prodi->code . ' ' . substr($tahunAkademik->name, 0, 4) . ' - ' . chr(65 + $existingClasses);
        
        return Kelas::create([
            'name' => $className,
            'prodi_id' => $mahasiswa->prodi_id,
            'taka_id' => $mahasiswa->taka_active,
            'semester' => 1,
            'capacity' => 40, // Default class capacity
            'description' => 'Kelas otomatis untuk mahasiswa baru',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Map gender from PMB format to Mahasiswa format
     */
    protected function mapGender($gender): string
    {
        if (empty($gender)) {
            return '';
        }
        
        $gender = strtolower(trim($gender));
        
        switch ($gender) {
            case 'l':
            case 'laki-laki':
            case 'male':
                return 'Laki-laki';
            case 'p':
            case 'perempuan':
            case 'female':
                return 'Perempuan';
            default:
                return $gender;
        }
    }

    /**
     * Bulk migration of multiple applicants
     */
    public function bulkMigratePendaftar(array $pendaftarIds): array
    {
        $results = [
            'success' => 0,
            'failed' => 0,
            'errors' => []
        ];

        foreach ($pendaftarIds as $pendaftarId) {
            try {
                $pendaftar = Pendaftar::find($pendaftarId);
                
                if (!$pendaftar) {
                    $results['failed']++;
                    $results['errors'][] = "Pendaftar ID {$pendaftarId} tidak ditemukan";
                    continue;
                }

                if ($pendaftar->mahasiswa_id) {
                    $results['failed']++;
                    $results['errors'][] = "Pendaftar {$pendaftar->name} sudah dimigrasi";
                    continue;
                }

                // Generate NIM
                $nim = $this->generateNIM($pendaftar->prodi_1, $pendaftar->tahun_akademik_id);
                
                // Migrate
                $this->migratePendaftarToMahasiswa($pendaftar, $nim);
                
                $results['success']++;
                
            } catch (\Exception $e) {
                $results['failed']++;
                $results['errors'][] = "Error migrasi " . ($pendaftar->name ?? 'Unknown') . ": {$e->getMessage()}";
            }
        }

        return $results;
    }

    /**
     * Generate NIM for new student
     */
    protected function generateNIM($prodiId, $tahunAkademikId): string
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
     * Validate pendaftar data before migration
     */
    public function validatePendaftarForMigration(Pendaftar $pendaftar): array
    {
        $errors = [];

        // Check basic required fields
        if (empty($pendaftar->name)) {
            $errors[] = 'Nama lengkap harus diisi';
        }

        if (empty($pendaftar->email)) {
            $errors[] = 'Email harus diisi';
        }

        if (empty($pendaftar->prodi_1)) {
            $errors[] = 'Program studi pilihan harus dipilih';
        }

        // Check if already migrated
        if ($pendaftar->mahasiswa_id) {
            $errors[] = 'Pendaftar sudah dimigrasi sebelumnya';
        }

        // Check status
        if ($pendaftar->status !== 'Lulus') {
            $errors[] = 'Status pendaftar harus "Lulus" untuk dapat dimigrasi';
        }

        // Check if NIM would be unique
        if (!empty($pendaftar->prodi_1) && !empty($pendaftar->tahun_akademik_id)) {
            $proposedNim = $this->generateNIM($pendaftar->prodi_1, $pendaftar->tahun_akademik_id);
            if (Mahasiswa::where('nim', $proposedNim)->exists()) {
                $errors[] = 'NIM yang akan digenerate sudah ada dalam sistem';
            }
        }

        return $errors;
    }

    /**
     * Get migration statistics
     */
    public function getMigrationStatistics(): array
    {
        return [
            'total_pendaftar_lulus' => Pendaftar::where('status', 'Lulus')->count(),
            'sudah_migrasi' => Pendaftar::whereNotNull('mahasiswa_id')->count(),
            'belum_migrasi' => Pendaftar::where('status', 'Lulus')->whereNull('mahasiswa_id')->count(),
            'total_mahasiswa_baru' => Mahasiswa::whereYear('created_at', date('Y'))->count(),
        ];
    }
}