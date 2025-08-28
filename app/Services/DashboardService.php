<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

// Models
use App\Models\User;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Akademik\TahunAkademik;
use App\Models\Akademik\ProgramStudi;
use App\Models\Akademik\Fakultas;
use App\Models\Akademik\JadwalKuliah;
use App\Models\Akademik\KRS;
use App\Models\Akademik\KHS;
use App\Models\Akademik\Nilai;
use App\Models\Keuangan\TagihanKuliah;
use App\Models\Keuangan\Saldo;
use App\Models\Pendaftaran\Pendaftar;

class DashboardService
{
    protected $cacheTime = 300; // 5 minutes

    /**
     * Get cached dashboard data
     */
    public function getCachedDashboardData($tahunAkademikId)
    {
        $cacheKey = "dashboard_data_{$tahunAkademikId}";
        
        return Cache::remember($cacheKey, $this->cacheTime, function () use ($tahunAkademikId) {
            return $this->generateDashboardData($tahunAkademikId);
        });
    }

    /**
     * Clear dashboard cache
     */
    public function clearDashboardCache($tahunAkademikId = null)
    {
        if ($tahunAkademikId) {
            Cache::forget("dashboard_data_{$tahunAkademikId}");
        } else {
            // Clear all dashboard cache
            $tahunAkademiks = TahunAkademik::all();
            foreach ($tahunAkademiks as $taka) {
                Cache::forget("dashboard_data_{$taka->id}");
            }
        }
    }

    /**
     * Generate comprehensive dashboard data
     */
    protected function generateDashboardData($tahunAkademikId)
    {
        return [
            'studentStats' => $this->getStudentStatistics($tahunAkademikId),
            'academicPerformance' => $this->getAcademicPerformance($tahunAkademikId),
            'courseRealization' => $this->getCourseRealization($tahunAkademikId),
            'pddiktiReporting' => $this->getPDDiktiReporting($tahunAkademikId),
            'humanResources' => $this->getHumanResourcesData(),
            'studentAttendance' => $this->getStudentAttendance($tahunAkademikId),
            'accreditation' => $this->getAccreditationData(),
            'financialAcademic' => $this->getFinancialAcademicData($tahunAkademikId),
            'studentAdmission' => $this->getStudentAdmissionData($tahunAkademikId),
            'graduateStats' => $this->getGraduateStatistics($tahunAkademikId),
        ];
    }

    /**
     * Get student statistics with optimized queries
     */
    protected function getStudentStatistics($tahunAkademikId)
    {
        $query = Mahasiswa::query();
        
        if ($tahunAkademikId) {
            $query->where('taka_active', $tahunAkademikId);
        }

        // Use single query with conditional counting
        $stats = $query->selectRaw('
            COUNT(CASE WHEN type = 1 THEN 1 END) as active,
            COUNT(CASE WHEN type = 1 AND status_km = "Aktif" THEN 1 END) as kampus_merdeka,
            COUNT(CASE WHEN type = 2 THEN 1 END) as inactive,
            COUNT(CASE WHEN type = 4 THEN 1 END) as cuti,
            COUNT(CASE WHEN type IN (1, 4) THEN 1 END) as total_active,
            COUNT(CASE WHEN type = 3 THEN 1 END) as graduated,
            COUNT(CASE WHEN type = 5 THEN 1 END) as transfer,
            COUNT(CASE WHEN status = "Wafat" THEN 1 END) as deceased
        ')->first();

        // Get average IPS
        $averageIPS = $this->getAverageIPS($tahunAkademikId);

        return [
            'active' => $stats->active ?? 0,
            'kampusMerdeka' => $stats->kampus_merdeka ?? 0,
            'inactive' => $stats->inactive ?? 0,
            'cuti' => $stats->cuti ?? 0,
            'totalActive' => $stats->total_active ?? 0,
            'averageIPS' => $averageIPS,
            'mutations' => [
                'graduated' => $stats->graduated ?? 0,
                'dropout' => $stats->inactive ?? 0,
                'transfer' => $stats->transfer ?? 0,
                'deceased' => $stats->deceased ?? 0,
            ]
        ];
    }

    /**
     * Get average IPS for the academic year
     */
    protected function getAverageIPS($tahunAkademikId)
    {
        if (!$tahunAkademikId) {
            return 0;
        }

        return KHS::where('taka_id', $tahunAkademikId)
                  ->where('ips', '>', 0)
                  ->avg('ips') ?? 0;
    }

    /**
     * Get academic performance metrics
     */
    protected function getAcademicPerformance($tahunAkademikId)
    {
        $courseRealizationPercentage = $this->getCourseRealizationPercentage($tahunAkademikId);
        $programStudiRealization = $this->getProgramStudiRealization($tahunAkademikId);

        return [
            'courseRealizationPercentage' => $courseRealizationPercentage,
            'programStudiRealization' => $programStudiRealization,
        ];
    }

    /**
     * Get course realization percentage
     */
    protected function getCourseRealizationPercentage($tahunAkademikId)
    {
        if (!$tahunAkademikId) {
            return 66; // Default fallback
        }

        $realization = JadwalKuliah::where('taka_id', $tahunAkademikId)
            ->selectRaw('
                COUNT(*) as total_scheduled,
                COUNT(CASE WHEN status = "Completed" THEN 1 END) as total_completed
            ')
            ->first();

        if (!$realization || $realization->total_scheduled == 0) {
            return 66; // Default fallback
        }

        return round(($realization->total_completed / $realization->total_scheduled) * 100, 2);
    }

    /**
     * Get program studi realization details
     */
    protected function getProgramStudiRealization($tahunAkademikId)
    {
        $programStudis = ProgramStudi::with('jenjang')
            ->where('status', 'Aktif')
            ->take(3)
            ->get();

        $realization = [];

        foreach ($programStudis as $prodi) {
            $classStats = DB::table('jadwal_kuliahs')
                ->join('mata_kuliahs', 'jadwal_kuliahs.matkul_id', '=', 'mata_kuliahs.id')
                ->where('mata_kuliahs.prodi_id', $prodi->id)
                ->where('jadwal_kuliahs.taka_id', $tahunAkademikId)
                ->selectRaw('
                    COUNT(*) as total_classes,
                    COUNT(CASE WHEN jadwal_kuliahs.status = "Completed" THEN 1 END) as completed_classes
                ')
                ->first();

            $percentage = 0;
            if ($classStats && $classStats->total_classes > 0) {
                $percentage = round(($classStats->completed_classes / $classStats->total_classes) * 100, 2);
            }

            $realization[] = [
                'name' => ($prodi->jenjang->name ?? 'Unknown') . ' - ' . $prodi->name,
                'percentage' => $percentage,
            ];
        }

        return $realization;
    }

    /**
     * Get course realization data
     */
    protected function getCourseRealization($tahunAkademikId)
    {
        return [
            'percentage' => $this->getCourseRealizationPercentage($tahunAkademikId),
            'weekProgress' => $this->getCurrentWeekProgress(),
            'programDetails' => $this->getProgramStudiRealization($tahunAkademikId),
        ];
    }

    /**
     * Calculate current week progress in semester
     */
    protected function getCurrentWeekProgress()
    {
        // This is a simplified calculation - you might want to implement
        // based on actual academic calendar
        $currentDate = Carbon::now();
        $semesterStart = Carbon::now()->startOfYear()->addMonth(2); // March as semester start
        $weeksDiff = $currentDate->diffInWeeks($semesterStart);
        
        return min(max($weeksDiff, 1), 18); // Between 1-18 weeks
    }

    /**
     * Get PDDikti reporting status
     */
    protected function getPDDiktiReporting($tahunAkademikId)
    {
        // This would integrate with actual Neo Feeder service
        // For now, return mock data
        return [
            'percentage' => 100.01,
            'status' => 'warning',
            'message' => 'Jumlah AKM Feeder Anda lebih banyak dari pada AKM Siakad. Silakan lakukan pengecekan data sebelum 31 Oktober 2025',
        ];
    }

    /**
     * Get human resources data
     */
    protected function getHumanResourcesData()
    {
        // Optimized queries for HR data
        $dosenStats = Dosen::selectRaw('
            COUNT(*) as total,
            COUNT(CASE WHEN (nidn IS NULL OR nidn = "") THEN 1 END) as without_nidn,
            COUNT(CASE WHEN (pendidikan_terakhir IS NULL OR homebase IS NULL OR hubungan_kerja IS NULL) THEN 1 END) as incomplete_education
        ')
        ->where('status', 'Aktif')
        ->first();

        $mahasiswaCount = Mahasiswa::where('type', 1)->count();
        $ratio = $mahasiswaCount > 0 && $dosenStats->total > 0 ? 
            round($mahasiswaCount / $dosenStats->total) : 0;

        $tendikStats = User::where('role', 'Staff')
            ->selectRaw('
                COUNT(*) as total,
                COUNT(CASE WHEN status_kepegawaian = "Kontrak" THEN 1 END) as kontrak,
                COUNT(CASE WHEN status_kepegawaian = "Tetap" THEN 1 END) as tetap_dosen,
                COUNT(CASE WHEN status_kepegawaian = "Kontrak Fakultas" THEN 1 END) as kontrak_fakultas,
                COUNT(CASE WHEN status_kepegawaian = "Tetap Karyawan" THEN 1 END) as tetap_karyawan,
                COUNT(CASE WHEN status_kepegawaian IS NULL THEN 1 END) as belum_terdata
            ')
            ->first();

        return [
            'dosen' => [
                'total' => $dosenStats->total ?? 0,
                'ratio' => "1:$ratio",
                'withoutNIDN' => $dosenStats->without_nidn ?? 0,
                'incompleteEducation' => $dosenStats->incomplete_education ?? 0,
            ],
            'tendik' => [
                'total' => $tendikStats->total ?? 0,
                'hubunganKerja' => [
                    'Kontrak' => $tendikStats->kontrak ?? 0,
                    'Tetap Yayasan Dosen' => $tendikStats->tetap_dosen ?? 0,
                    'Kontrak Fakultas' => $tendikStats->kontrak_fakultas ?? 0,
                    'Tetap Yayasan Karyawan' => $tendikStats->tetap_karyawan ?? 0,
                    'Belum terdata' => $tendikStats->belum_terdata ?? 0,
                ],
            ]
        ];
    }

    /**
     * Get student attendance data
     */
    protected function getStudentAttendance($tahunAkademikId)
    {
        // This would integrate with actual attendance system
        // For now, return mock data
        return [
            'averagePercentage' => 95,
            'programDetails' => [
                ['name' => 'S3 - Pendidikan Agama Islam (S3)', 'percentage' => 0],
                ['name' => 'S1 - Teknik Mesin', 'percentage' => 65.56],
                ['name' => 'S1 - Ilmu Lingkungan', 'percentage' => 63.99],
            ]
        ];
    }

    /**
     * Get accreditation data
     */
    protected function getAccreditationData()
    {
        $accreditationStats = ProgramStudi::where('status', 'Aktif')
            ->selectRaw('
                COUNT(*) as total,
                COUNT(CASE WHEN akreditasi = "Unggul" THEN 1 END) as unggul,
                COUNT(CASE WHEN akreditasi = "Baik Sekali" THEN 1 END) as baik_sekali,
                COUNT(CASE WHEN akreditasi = "Baik" THEN 1 END) as baik,
                COUNT(CASE WHEN akreditasi = "Kedaluwarsa" THEN 1 END) as kedaluwarsa
            ')
            ->first();

        return [
            'universityAccreditation' => 'B',
            'programAccreditation' => [
                'Unggul' => $accreditationStats->unggul ?? 0,
                'Baik Sekali' => $accreditationStats->baik_sekali ?? 0,
                'Baik' => $accreditationStats->baik ?? 0,
                'Kedaluwarsa' => $accreditationStats->kedaluwarsa ?? 0,
            ],
            'total' => $accreditationStats->total ?? 0,
            'expiringCount' => 6, // Mock data - would be calculated from expiry dates
            'conversionNeeded' => 5, // Mock data
        ];
    }

    /**
     * Get financial academic data
     */
    protected function getFinancialAcademicData($tahunAkademikId)
    {
        $currentPeriodStats = TagihanKuliah::where('taka_id', $tahunAkademikId)
            ->selectRaw('
                SUM(amount) as total_amount,
                SUM(CASE WHEN status = "Pending" THEN remaining_amount ELSE 0 END) as total_piutang
            ')
            ->first();

        $previousPeriodStats = TagihanKuliah::where('taka_id', '!=', $tahunAkademikId)
            ->selectRaw('
                SUM(amount) as total_amount,
                SUM(CASE WHEN status = "Pending" THEN remaining_amount ELSE 0 END) as total_piutang
            ')
            ->first();

        $currentPendapatan = $currentPeriodStats->total_amount ?? 0;
        $previousPendapatan = $previousPeriodStats->total_amount ?? 1; // Avoid division by zero
        
        $currentPiutang = $currentPeriodStats->total_piutang ?? 0;
        $previousPiutang = $previousPeriodStats->total_piutang ?? 1; // Avoid division by zero

        $pendapatanGrowth = $previousPendapatan > 0 ? 
            round((($currentPendapatan - $previousPendapatan) / $previousPendapatan) * 100) : 0;
        
        $piutangGrowth = $previousPiutang > 0 ? 
            round((($currentPiutang - $previousPiutang) / $previousPiutang) * 100) : 0;

        return [
            'pendapatan' => [
                'amount' => $currentPendapatan,
                'growth' => $pendapatanGrowth,
            ],
            'piutang' => [
                'amount' => $currentPiutang,
                'growth' => $piutangGrowth,
            ]
        ];
    }

    /**
     * Get student admission data
     */
    protected function getStudentAdmissionData($tahunAkademikId)
    {
        $tahunAkademik = TahunAkademik::find($tahunAkademikId);
        $tahun = $tahunAkademik->tahun ?? date('Y');

        $admissionStats = Pendaftar::whereYear('created_at', $tahun)
            ->selectRaw('
                COUNT(*) as peminat,
                COUNT(CASE WHEN status != "Draft" THEN 1 END) as pendaftar,
                COUNT(CASE WHEN status = "Lulus" THEN 1 END) as lulus_seleksi,
                COUNT(CASE WHEN status = "Daftar Ulang" THEN 1 END) as daftar_ulang
            ')
            ->first();

        $peminat = $admissionStats->peminat ?? 0;
        $pendaftar = $admissionStats->pendaftar ?? 0;
        $lulusSeleksi = $admissionStats->lulus_seleksi ?? 0;
        $daftarUlang = $admissionStats->daftar_ulang ?? 0;

        return [
            'peminat' => $peminat,
            'pendaftar' => $pendaftar,
            'lulusSeleksi' => $lulusSeleksi,
            'daftarUlang' => $daftarUlang,
            'konversiSeleksi' => $pendaftar > 0 ? round(($lulusSeleksi / $pendaftar) * 100) : 0,
            'konversiDaftarUlang' => $lulusSeleksi > 0 ? round(($daftarUlang / $lulusSeleksi) * 100) : 0,
        ];
    }

    /**
     * Get graduate statistics
     */
    protected function getGraduateStatistics($tahunAkademikId)
    {
        $tahunAkademik = TahunAkademik::find($tahunAkademikId);
        $tahun = $tahunAkademik->tahun ?? date('Y');

        $graduateStats = Mahasiswa::where('type', 3) // Lulus
            ->whereYear('updated_at', $tahun)
            ->selectRaw('
                AVG(CASE WHEN ipk > 0 THEN ipk END) as avg_ipk,
                AVG(CASE WHEN masa_studi > 0 THEN masa_studi END) as avg_masa_studi,
                COUNT(*) as total_graduates
            ')
            ->first();

        return [
            'averageIPK' => round($graduateStats->avg_ipk ?? 0, 2),
            'averageStudyPeriod' => round($graduateStats->avg_masa_studi ?? 0),
            'waitingTime' => 0, // Mock data - would integrate with tracer study
            'fieldSuitability' => [
                'tinggi' => 0,
                'sedang' => 0,
                'rendah' => 0,
            ],
            'surveyResponse' => 0, // Mock data
        ];
    }
}