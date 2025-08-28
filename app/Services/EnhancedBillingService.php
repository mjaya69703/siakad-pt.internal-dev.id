<?php

namespace App\Services;

use App\Models\Mahasiswa;
use App\Models\Keuangan\TagihanKuliah;
use App\Models\Keuangan\TagihanKuliahGroup;
use App\Models\Keuangan\RiwayatPembayaran;
use App\Models\Akademik\TahunAkademik;
use App\Jobs\ProcessActivityLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Exception;

class EnhancedBillingService
{
    /**
     * Billing types available for students
     */
    const BILLING_TYPES = [
        'SPP' => 'Sumbangan Pembinaan Pendidikan',
        'SKS' => 'Biaya per SKS',
        'UTS' => 'Ujian Tengah Semester',
        'UAS' => 'Ujian Akhir Semester',
        'WISUDA' => 'Biaya Wisuda',
        'KKN' => 'Kuliah Kerja Nyata',
        'PRAKTIKUM' => 'Biaya Praktikum',
        'IJAZAH' => 'Biaya Ijazah',
        'TRANSKRIP' => 'Biaya Transkrip Nilai',
        'SKPI' => 'Surat Keterangan Pendamping Ijazah',
        'DAFTAR_ULANG' => 'Daftar Ulang Semester',
        'KEMAHASISWAAN' => 'Biaya Kemahasiswaan',
        'PERPUSTAKAAN' => 'Biaya Perpustakaan',
        'LABORATORIUM' => 'Biaya Laboratorium',
        'SEMINAR_PROPOSAL' => 'Seminar Proposal',
        'SEMINAR_HASIL' => 'Seminar Hasil',
        'SIDANG_SKRIPSI' => 'Sidang Skripsi/Tugas Akhir',
        'REMEDIAL' => 'Biaya Ujian Remedial',
        'CUTI_AKADEMIK' => 'Biaya Cuti Akademik',
        'PINDAH_PRODI' => 'Biaya Pindah Program Studi',
        'PENGGANTIAN_KARTU' => 'Penggantian Kartu Mahasiswa',
        'LEGALISIR' => 'Biaya Legalisir Dokumen',
        'SURAT_KETERANGAN' => 'Surat Keterangan Mahasiswa',
        'REREGISTER' => 'Re-registrasi',
        'LAINNYA' => 'Biaya Lainnya'
    ];

    /**
     * Generate comprehensive billing for new academic student
     */
    public function generateInitialBilling(Mahasiswa $mahasiswa): array
    {
        try {
            DB::beginTransaction();

            $activeAcademicYear = TahunAkademik::where('status', 'Aktif')->first();
            if (!$activeAcademicYear) {
                throw new Exception('Tidak ada tahun akademik yang aktif');
            }

            $billings = [];

            // 1. SPP (Sumbangan Pembinaan Pendidikan) - Monthly
            $sppBilling = $this->createBilling($mahasiswa, [
                'type' => 'SPP',
                'academic_year_id' => $activeAcademicYear->id,
                'amount' => $this->getSPPAmount($mahasiswa),
                'due_date' => Carbon::now()->endOfMonth(),
                'description' => 'SPP Semester ' . $mahasiswa->semester . ' - ' . $activeAcademicYear->name,
                'is_recurring' => true,
                'recurring_type' => 'monthly'
            ]);
            $billings[] = $sppBilling;

            // 2. Daftar Ulang Semester
            $daftarUlangBilling = $this->createBilling($mahasiswa, [
                'type' => 'DAFTAR_ULANG',
                'academic_year_id' => $activeAcademicYear->id,
                'amount' => 150000, // Default amount
                'due_date' => Carbon::now()->addDays(30),
                'description' => 'Daftar Ulang Semester ' . $mahasiswa->semester,
                'is_mandatory' => true
            ]);
            $billings[] = $daftarUlangBilling;

            // 3. Biaya Kemahasiswaan
            $kemahasiswaanBilling = $this->createBilling($mahasiswa, [
                'type' => 'KEMAHASISWAAN',
                'academic_year_id' => $activeAcademicYear->id,
                'amount' => 100000,
                'due_date' => Carbon::now()->addDays(45),
                'description' => 'Biaya Kemahasiswaan dan Kegiatan Mahasiswa',
                'is_mandatory' => true
            ]);
            $billings[] = $kemahasiswaanBilling;

            // 4. Biaya Perpustakaan
            $perpustakaanBilling = $this->createBilling($mahasiswa, [
                'type' => 'PERPUSTAKAAN',
                'academic_year_id' => $activeAcademicYear->id,
                'amount' => 50000,
                'due_date' => Carbon::now()->addDays(30),
                'description' => 'Biaya Perpustakaan dan Akses Digital',
                'is_mandatory' => true
            ]);
            $billings[] = $perpustakaanBilling;

            // Log activity
            ProcessActivityLog::dispatch(
                auth()->user(),
                'Billing Generation',
                'Generate Initial Billing untuk Mahasiswa Baru',
                'success',
                [
                    'mahasiswa_id' => $mahasiswa->id,
                    'nim' => $mahasiswa->nim,
                    'total_billings' => count($billings),
                    'total_amount' => array_sum(array_column($billings, 'amount'))
                ]
            );

            DB::commit();

            return [
                'success' => true,
                'message' => 'Tagihan awal berhasil digenerate',
                'data' => $billings
            ];

        } catch (Exception $e) {
            DB::rollBack();
            
            return [
                'success' => false,
                'message' => 'Gagal generate tagihan: ' . $e->getMessage(),
                'data' => null
            ];
        }
    }

    /**
     * Create individual billing record
     */
    public function createBilling(Mahasiswa $mahasiswa, array $billingData): TagihanKuliah
    {
        return TagihanKuliah::create([
            'code' => $this->generateBillingCode($billingData['type']),
            'mahasiswa_id' => $mahasiswa->id,
            'taka_id' => $billingData['academic_year_id'],
            'billing_type' => $billingData['type'],
            'amount' => $billingData['amount'],
            'due_date' => $billingData['due_date'],
            'status' => 'Pending',
            'description' => $billingData['description'],
            'is_mandatory' => $billingData['is_mandatory'] ?? false,
            'is_recurring' => $billingData['is_recurring'] ?? false,
            'recurring_type' => $billingData['recurring_type'] ?? null,
            'semester' => $mahasiswa->semester,
            'created_by' => auth()->id(),
        ]);
    }

    /**
     * Generate semester-specific billings (UTS, UAS, etc.)
     */
    public function generateSemesterBilling(Mahasiswa $mahasiswa, $semester = null): array
    {
        try {
            DB::beginTransaction();

            $currentSemester = $semester ?? $mahasiswa->semester;
            $activeAcademicYear = TahunAkademik::where('status', 'Aktif')->first();
            
            $billings = [];

            // UTS Billing
            $utsBilling = $this->createBilling($mahasiswa, [
                'type' => 'UTS',
                'academic_year_id' => $activeAcademicYear->id,
                'amount' => 75000,
                'due_date' => Carbon::now()->addMonths(2),
                'description' => 'Ujian Tengah Semester ' . $currentSemester,
                'is_mandatory' => true
            ]);
            $billings[] = $utsBilling;

            // UAS Billing
            $uasBilling = $this->createBilling($mahasiswa, [
                'type' => 'UAS',
                'academic_year_id' => $activeAcademicYear->id,
                'amount' => 100000,
                'due_date' => Carbon::now()->addMonths(4),
                'description' => 'Ujian Akhir Semester ' . $currentSemester,
                'is_mandatory' => true
            ]);
            $billings[] = $uasBilling;

            // SKS-based billing (if applicable)
            if ($mahasiswa->total_sks > 0) {
                $sksBilling = $this->createBilling($mahasiswa, [
                    'type' => 'SKS',
                    'academic_year_id' => $activeAcademicYear->id,
                    'amount' => $mahasiswa->total_sks * 150000, // 150k per SKS
                    'due_date' => Carbon::now()->addDays(30),
                    'description' => 'Biaya SKS Semester ' . $currentSemester . ' (' . $mahasiswa->total_sks . ' SKS)',
                    'is_mandatory' => true
                ]);
                $billings[] = $sksBilling;
            }

            DB::commit();

            return [
                'success' => true,
                'message' => 'Tagihan semester berhasil digenerate',
                'data' => $billings
            ];

        } catch (Exception $e) {
            DB::rollBack();
            
            return [
                'success' => false,
                'message' => 'Gagal generate tagihan semester: ' . $e->getMessage(),
                'data' => null
            ];
        }
    }

    /**
     * Generate final year/graduation billings
     */
    public function generateGraduationBilling(Mahasiswa $mahasiswa): array
    {
        try {
            DB::beginTransaction();

            $activeAcademicYear = TahunAkademik::where('status', 'Aktif')->first();
            $billings = [];

            // Seminar Proposal
            $proposalBilling = $this->createBilling($mahasiswa, [
                'type' => 'SEMINAR_PROPOSAL',
                'academic_year_id' => $activeAcademicYear->id,
                'amount' => 200000,
                'due_date' => Carbon::now()->addDays(14),
                'description' => 'Seminar Proposal Tugas Akhir',
                'is_mandatory' => true
            ]);
            $billings[] = $proposalBilling;

            // Seminar Hasil
            $hasilBilling = $this->createBilling($mahasiswa, [
                'type' => 'SEMINAR_HASIL',
                'academic_year_id' => $activeAcademicYear->id,
                'amount' => 250000,
                'due_date' => Carbon::now()->addDays(30),
                'description' => 'Seminar Hasil Tugas Akhir',
                'is_mandatory' => true
            ]);
            $billings[] = $hasilBilling;

            // Sidang Skripsi
            $sidangBilling = $this->createBilling($mahasiswa, [
                'type' => 'SIDANG_SKRIPSI',
                'academic_year_id' => $activeAcademicYear->id,
                'amount' => 300000,
                'due_date' => Carbon::now()->addDays(45),
                'description' => 'Sidang Tugas Akhir/Skripsi',
                'is_mandatory' => true
            ]);
            $billings[] = $sidangBilling;

            // Wisuda
            $wisudaBilling = $this->createBilling($mahasiswa, [
                'type' => 'WISUDA',
                'academic_year_id' => $activeAcademicYear->id,
                'amount' => 500000,
                'due_date' => Carbon::now()->addDays(60),
                'description' => 'Biaya Wisuda dan Toga',
                'is_mandatory' => true
            ]);
            $billings[] = $wisudaBilling;

            // Ijazah
            $ijazahBilling = $this->createBilling($mahasiswa, [
                'type' => 'IJAZAH',
                'academic_year_id' => $activeAcademicYear->id,
                'amount' => 150000,
                'due_date' => Carbon::now()->addDays(60),
                'description' => 'Biaya Pembuatan Ijazah',
                'is_mandatory' => true
            ]);
            $billings[] = $ijazahBilling;

            // Transkrip
            $transkripBilling = $this->createBilling($mahasiswa, [
                'type' => 'TRANSKRIP',
                'academic_year_id' => $activeAcademicYear->id,
                'amount' => 100000,
                'due_date' => Carbon::now()->addDays(60),
                'description' => 'Biaya Pembuatan Transkrip Nilai',
                'is_mandatory' => true
            ]);
            $billings[] = $transkripBilling;

            // SKPI
            $skpiBilling = $this->createBilling($mahasiswa, [
                'type' => 'SKPI',
                'academic_year_id' => $activeAcademicYear->id,
                'amount' => 75000,
                'due_date' => Carbon::now()->addDays(60),
                'description' => 'Surat Keterangan Pendamping Ijazah',
                'is_mandatory' => false
            ]);
            $billings[] = $skpiBilling;

            DB::commit();

            return [
                'success' => true,
                'message' => 'Tagihan kelulusan berhasil digenerate',
                'data' => $billings
            ];

        } catch (Exception $e) {
            DB::rollBack();
            
            return [
                'success' => false,
                'message' => 'Gagal generate tagihan kelulusan: ' . $e->getMessage(),
                'data' => null
            ];
        }
    }

    /**
     * Create custom billing (for admin use)
     */
    public function createCustomBilling(Mahasiswa $mahasiswa, array $customData): array
    {
        try {
            $billing = $this->createBilling($mahasiswa, [
                'type' => $customData['type'],
                'academic_year_id' => $customData['academic_year_id'],
                'amount' => $customData['amount'],
                'due_date' => Carbon::parse($customData['due_date']),
                'description' => $customData['description'],
                'is_mandatory' => $customData['is_mandatory'] ?? false
            ]);

            return [
                'success' => true,
                'message' => 'Tagihan custom berhasil dibuat',
                'data' => $billing
            ];

        } catch (Exception $e) {
            return [
                'success' => false,
                'message' => 'Gagal membuat tagihan custom: ' . $e->getMessage(),
                'data' => null
            ];
        }
    }

    /**
     * Get student billing summary
     */
    public function getBillingSummary(Mahasiswa $mahasiswa): array
    {
        $billings = TagihanKuliah::where('mahasiswa_id', $mahasiswa->id)
                                ->orderBy('due_date', 'asc')
                                ->get();

        $summary = [
            'total_billings' => $billings->count(),
            'total_amount' => $billings->sum('amount'),
            'pending_amount' => $billings->where('status', 'Pending')->sum('amount'),
            'paid_amount' => $billings->where('status', 'Sukses')->sum('amount'),
            'overdue_count' => $billings->where('due_date', '<', now())->where('status', 'Pending')->count(),
            'overdue_amount' => $billings->where('due_date', '<', now())->where('status', 'Pending')->sum('amount'),
            'billings_by_type' => $billings->groupBy('billing_type')->map(function($items) {
                return [
                    'count' => $items->count(),
                    'total_amount' => $items->sum('amount'),
                    'pending_amount' => $items->where('status', 'Pending')->sum('amount')
                ];
            })
        ];

        return $summary;
    }

    /**
     * Generate billing code
     */
    private function generateBillingCode(string $type): string
    {
        $prefix = 'TGH';
        $typeCode = strtoupper(substr($type, 0, 3));
        $date = date('Ymd');
        $random = Str::random(4);
        
        return $prefix . '-' . $typeCode . '-' . $date . '-' . $random;
    }

    /**
     * Get SPP amount based on student's program
     */
    private function getSPPAmount(Mahasiswa $mahasiswa): int
    {
        // Base SPP amounts by program level
        $sppRates = [
            'D3' => 800000,  // Diploma
            'S1' => 1200000, // Sarjana
            'S2' => 2000000, // Magister
            'S3' => 3000000, // Doktor
        ];

        $programLevel = $mahasiswa->programStudi->jenjang->code ?? 'S1';
        
        return $sppRates[$programLevel] ?? $sppRates['S1'];
    }
}