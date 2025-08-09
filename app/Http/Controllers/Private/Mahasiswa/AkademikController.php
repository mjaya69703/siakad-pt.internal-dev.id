<?php

namespace App\Http\Controllers\Private\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// USE SYSTEM
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
// USE MODELS
use App\Models\Pengaturan\WebSetting;
use App\Models\Akademik\KRS;
use App\Models\Akademik\JadwalKuliah;
use App\Models\Akademik\Presensi;
use App\Models\Akademik\Nilai;
use App\Models\Akademik\MataKuliah;
use App\Models\Akademik\TahunAkademik;
use App\Models\Akademik\Kelas;
use App\Models\Akademik\Dosen;
use App\Models\Akademik\WaktuKuliah;
use App\Models\Akademik\Ruang;

class AkademikController extends Controller
{
    /**
     * Display KRS (Kartu Rencana Studi) page
     * 
     * @return \Illuminate\View\View
     */

    public function krsRender(){
        $user = Auth::guard('mahasiswa')->user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Detail";
        $data['pages'] = "Kartu Rencana Studi (KRS)";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['currentSemester'] = TahunAkademik::where('status', 'Aktif')->first();
        $data['krs'] = KRS::where('mahasiswa_id', $user->id)
        ->where('taka_id', $data['currentSemester']->id)
        ->with(['mataKuliah', 'dosen', 'kelas'])
        ->get();

        dd($data['currentSemester']->type);
        dd($data['krs']);
        
        return view('private.mahasiswa.akademik.krs', $data, compact('user'));
    }

    // public function krs()
    // {
        
    //     $user = Auth::guard('mahasiswa')->user();
    //     $currentSemester = $this->getCurrentSemester();
        
    //     // Get KRS for current semester or create a new one
    //     $krs = KRS::firstOrCreate(
    //         [
    //             'mahasiswa_id' => $user->id,
    //             'taka_id' => $currentSemester->id
    //         ],
    //         [
    //             'code' => 'KRS-' . $user->nim . '-' . now()->format('YmdHis'),
    //             'status' => 'Draft',
    //             'total_sks' => 0,
    //             'ipk_sebelumnya' => $user->ipk ?? 0.00,
    //             'max_sks' => 24, // Default max SKS
    //             'semester' => $currentSemester->semester ?? 1
    //         ]
    //     );
        
    //     // Load related data with correct column names
    //     $krs->load([
    //         'details' => function($q) {
    //             $q->with(['mataKuliah' => function($q) {
    //                 $q->select('id', 'name', 'code', 'sks');
    //             }]);
    //         },
    //         'tahunAkademik' => function($q) {
    //             $q->select('id', 'name', 'type', 'start_date');
    //         }
    //     ]);
        
    //     // Get available courses for KRS
    //     $availableCourses = $this->getAvailableCourses($user);
        
    //     $data = [
    //         'menus' => 'Akademik',
    //         'pages' => 'Kartu Rencana Studi (KRS)',
    //         'user' => $user,
    //         'krs' => $krs,
    //         'availableCourses' => $availableCourses,
    //         'currentSemester' => $currentSemester,
    //         'maxSks' => $krs->max_sks ?? 24
    //     ];
        
    //     return view('private.mahasiswa.akademik.krs', $data);
    // }
    
    /**
     * Print KRS
     * 
     * @return \Illuminate\View\View
     */
    public function cetakKrs()
    {
        $user = Auth::guard('mahasiswa')->user();
        $currentSemester = $this->getCurrentSemester();
        
        $data = [
            'krs' => KRS::where('mahasiswa_id', $user->id)
                       ->where('taka_id', $currentSemester->id)
                       ->with(['mataKuliah', 'dosen', 'kelas'])
                       ->get(),
            'currentSemester' => $currentSemester,
            'mahasiswa' => $user
        ];
        
        return view('private.mahasiswa.akademik.cetak-krs', $data);
    }
    
    /**
     * Display Jadwal Kuliah page for the current semester
     * 
     * @return \Illuminate\View\View
     */
    public function jadwalKuliah()
    {
        try {
            $user = Auth::guard('mahasiswa')->user();
            $currentSemester = $this->getCurrentSemester();
            
            // Get all available semesters for the student
            $availableSemesters = $this->getAvailableSemesters($user);
            
            // Get class schedule for the current semester
            $jadwal = $this->getJadwalKuliah($user->id, $currentSemester->id);
            
            $data = [
                'menus' => 'Akademik',
                'pages' => 'Jadwal Kuliah',
                'user' => $user,
                'currentSemester' => $currentSemester,
                'availableSemesters' => $availableSemesters,
                'jadwal' => $jadwal,
                'isCurrentSemester' => true
            ];
            
            return view('private.mahasiswa.akademik.jadwal-kuliah', $data);
            
        } catch (\Exception $e) {
            return redirect()->route('mahasiswa.dashboard-render')
                           ->with('error', 'Terjadi kesalahan saat memuat jadwal kuliah: ' . $e->getMessage());
        }
    }
    
    /**
     * Display Jadwal Kuliah by Semester
     * 
     * @param int $semesterId
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function jadwalBySemester($semesterId)
    {
        try {
            // Validate semesterId
            if (!is_numeric($semesterId) || $semesterId <= 0) {
                return redirect()->route('mahasiswa.akademik.jadwal-kuliah')
                               ->with('error', 'ID semester tidak valid');
            }
            
            $user = Auth::guard('mahasiswa')->user();
            $currentSemester = $this->getCurrentSemester();
            
            // Get the requested semester
            $tahunAkademik = TahunAkademik::findOrFail($semesterId);
            
            // Get all available semesters for the student
            $availableSemesters = $this->getAvailableSemesters($user);
            
            // Get class schedule for the requested semester
            $jadwal = $this->getJadwalKuliah($user->id, $tahunAkademik->id);
            
            $data = [
                'menus' => 'Akademik',
                'pages' => 'Jadwal Kuliah ' . $tahunAkademik->name,
                'user' => $user,
                'currentSemester' => $tahunAkademik,
                'availableSemesters' => $availableSemesters,
                'jadwal' => $jadwal,
                'isCurrentSemester' => ($tahunAkademik->id == $currentSemester->id)
            ];
            
            return view('private.mahasiswa.akademik.jadwal-kuliah', $data);
            
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('mahasiswa.akademik.jadwal-kuliah')
                           ->with('error', 'Tahun akademik tidak ditemukan');
                            
        } catch (\Exception $e) {
            return redirect()->route('mahasiswa.akademik.jadwal-kuliah')
                           ->with('error', 'Terjadi kesalahan saat memuat jadwal: ' . $e->getMessage());
        }
    }
    
    /**
     * Display Presensi page
     * 
     * @return \Illuminate\View\View
     */
    public function presensi()
    {
        $user = Auth::guard('mahasiswa')->user();
        $currentSemester = $this->getCurrentSemester();
        
        $presensi = Presensi::where('mahasiswa_id', $user->id)
                          ->whereHas('jadwalKuliah', function($q) use ($currentSemester) {
                              $q->where('tahun_akademik_id', $currentSemester->id);
                          })
                          ->with(['jadwalKuliah.mataKuliah', 'dosen'])
                          ->get()
                          ->groupBy('jadwal_kuliah_id');
        
        $summary = [];
        foreach ($presensi as $jadwalId => $kehadiran) {
            $total = $kehadiran->count();
            $hadir = $kehadiran->where('status', 'H')->count();
            $izin = $kehadiran->where('status', 'I')->count();
            $sakit = $kehadiran->where('status', 'S')->count();
            $alpha = $kehadiran->where('status', 'A')->count();
            
            $summary[$jadwalId] = [
                'mata_kuliah' => $kehadiran->first()->jadwalKuliah->mataKuliah->nama,
                'kode_mk' => $kehadiran->first()->jadwalKuliah->mataKuliah->kode_mk,
                'total' => $total,
                'hadir' => $hadir,
                'izin' => $izin,
                'sakit' => $sakit,
                'alpha' => $alpha,
                'persentase' => $total > 0 ? round(($hadir / $total) * 100) : 0
            ];
        }
        
        $data = [
            'menus' => 'Akademik',
            'pages' => 'Presensi Mahasiswa',
            'user' => $user,
            'currentSemester' => $currentSemester,
            'summary' => $summary
        ];
        
        return view('private.mahasiswa.akademik.presensi', $data);
    }
    
    /**
     * Display detail presensi for a course
     * 
     * @param string $kodeMk
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function detailPresensi($kodeMk)
    {
        $user = Auth::guard('mahasiswa')->user();
        
        $mataKuliah = MataKuliah::where('kode_mk', $kodeMk)->first();
        if (!$mataKuliah) {
            return redirect()->route('mahasiswa.akademik.presensi')
                           ->with('error', 'Mata kuliah tidak ditemukan');
        }
        
        $presensi = Presensi::where('mahasiswa_id', $user->id)
                          ->whereHas('jadwalKuliah', function($q) use ($kodeMk) {
                              $q->whereHas('mataKuliah', function($q2) use ($kodeMk) {
                                  $q2->where('kode_mk', $kodeMk);
                              });
                          })
                          ->with(['jadwalKuliah', 'dosen'])
                          ->orderBy('tanggal', 'desc')
                          ->get();
        
        if ($presensi->isEmpty()) {
            return redirect()->route('mahasiswa.akademik.presensi')
                           ->with('error', 'Data presensi tidak ditemukan');
        }
        
        $data = [
            'menus' => 'Akademik',
            'pages' => 'Detail Presensi ' . $mataKuliah->nama,
            'user' => $user,
            'presensi' => $presensi,
            'mataKuliah' => $mataKuliah,
            'currentSemester' => $this->getCurrentSemester()
        ];
        
        return view('private.mahasiswa.akademik.detail-presensi', $data);
    }
    
    /**
     * Display Nilai & IPK page
     * 
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function nilai()
    {
        try {
            $user = Auth::guard('mahasiswa')->user();
            
            // Get all semesters with grades
            $semesters = $this->getNilaiSemester($user->id);
            
            // Calculate IPK
            $ipkData = $this->hitungIPK($semesters);
            
            // Get available semesters for navigation
            $availableSemesters = $this->getAvailableNilaiSemesters($user->id);
            
            $data = [
                'menus' => 'Akademik',
                'pages' => 'Nilai & IPK',
                'user' => $user,
                'semesters' => $semesters,
                'ipk' => number_format($ipkData['ipk'], 2),
                'totalSks' => $ipkData['totalSks'],
                'availableSemesters' => $availableSemesters,
                'currentSemester' => $this->getCurrentSemester(),
                'isAllSemesters' => true
            ];
            
            return view('private.mahasiswa.akademik.nilai', $data);
            
        } catch (\Exception $e) {
            return redirect()->route('mahasiswa.dashboard-render')
                           ->with('error', 'Terjadi kesalahan saat memuat nilai: ' . $e->getMessage());
        }
    }
    
    /**
     * Display Nilai by Semester
     * 
     * @param int $semesterId
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function nilaiBySemester($semesterId)
    {
        try {
            // Validate semesterId
            if (!is_numeric($semesterId) || $semesterId <= 0) {
                return redirect()->route('mahasiswa.akademik.nilai')
                               ->with('error', 'ID semester tidak valid');
            }
            
            $user = Auth::guard('mahasiswa')->user();
            $currentSemester = $this->getCurrentSemester();
            
            // Get the requested semester
            $tahunAkademik = TahunAkademik::select('id', 'name', 'type', 'start_date')
                                        ->findOrFail($semesterId);
            
            // Get grades for the semester
            $nilai = Nilai::where('mahasiswa_id', $user->id)
                         ->where('tahun_akademik_id', $semesterId)
                         ->with([
                             'mataKuliah' => function($q) {
                                 $q->select('id', 'kode_mk', 'nama', 'sks');
                             },
                             'tahunAkademik' => function($q) {
                                 $q->select('id', 'name', 'type', 'start_date');
                             }
                         ])
                         ->orderBy('mata_kuliah_id')
                         ->get();
            
            if ($nilai->isEmpty()) {
                return redirect()->route('mahasiswa.akademik.nilai')
                               ->with('error', 'Data nilai tidak ditemukan untuk semester ini');
            }
            
            // Calculate IPS (Indeks Prestasi Semester)
            $ipsData = $this->hitungIPS($nilai);
            
            // Get available semesters for navigation
            $availableSemesters = $this->getAvailableNilaiSemesters($user->id);
            
            $data = [
                'menus' => 'Akademik',
                'pages' => 'Nilai ' . $tahunAkademik->nama,
                'user' => $user,
                'nilai' => $nilai,
                'semester' => $tahunAkademik,
                'ips' => number_format($ipsData['ips'], 2),
                'totalSks' => $ipsData['totalSks'],
                'availableSemesters' => $availableSemesters,
                'currentSemester' => $currentSemester,
                'isAllSemesters' => false
            ];
            
            return view('private.mahasiswa.akademik.nilai-semester', $data);
            
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('mahasiswa.akademik.nilai')
                           ->with('error', 'Tahun akademik tidak ditemukan');
                            
        } catch (\Exception $e) {
            return redirect()->route('mahasiswa.akademik.nilai')
                           ->with('error', 'Terjadi kesalahan saat memuat nilai: ' . $e->getMessage());
        }
    }
    
    /**
     * Get current active semester
     * 
     * @return \App\Models\Akademik\TahunAkademik
     */
    private function getCurrentSemester()
    {
        $now = now();
        
        // Get active semester based on current date
        $semester = TahunAkademik::where('status', 'Aktif')
                                ->where('start_date', '<=', $now)
                                ->where('ended_date', '>=', $now)
                                ->first();
        
        // If no active semester found, get the latest one
        if (!$semester) {
            $semester = TahunAkademik::latest('start_date')->first();
        }
        
        // If still no semester, return a default one
        if (!$semester) {
            $semester = (object)[
                'id' => 1,
                'name' => 'Ganjil 2023/2024',
                'type' => 'Ganjil',
                'code' => '20231',
                'start_date' => '2023-09-01',
                'ended_date' => '2024-01-31',
                'status' => 'Aktif',
                'desc' => 'Semester Ganjil 2023/2024'
            ];
        }
        
        return $semester;
    }
    
    /**
     * Get available courses for KRS based on student's curriculum and prerequisites
     * 
     * @param \App\Models\Mahasiswa $user
     * @return \Illuminate\Database\Eloquent\Collection
     */
    private function getAvailableCourses($user)
    {
        $currentSemester = $this->getCurrentSemester();
        
        // Get student's program study and curriculum
        $prodi = $user->programStudi;
        if (!$prodi) {
            return collect([]);
        }
        
        // Get courses from student's curriculum that are not yet taken or failed
        $takenCourses = KRS::where('mahasiswa_id', $user->id)
                          ->whereHas('tahunAkademik', function($q) use ($currentSemester) {
                              $q->where('id', '<=', $currentSemester->id);
                          })
                          ->with('mataKuliah')
                          ->get();
        
        $passedCourseIds = $takenCourses->filter(function($krs) {
            return $krs->nilai && $krs->nilai->nilai_angka >= 50; // Passing grade is 50
        })->pluck('mata_kuliah_id')->toArray();
        
        $availableCourses = MataKuliah::where('prodi_id', $prodi->id)
                                    ->whereNotIn('id', $passedCourseIds)
                                    ->with('prasyarat')
                                    ->get()
                                    ->filter(function($course) use ($passedCourseIds) {
                                        // Check if all prerequisites are met
                                        $prerequisites = $course->prasyarat->pluck('id')->toArray();
                                        return empty(array_diff($prerequisites, $passedCourseIds));
                                    });
        
        return $availableCourses;
    }
    
    /**
     * Get class schedule for a specific student and semester
     * 
     * @param int $mahasiswaId
     * @param int $tahunAkademikId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    private function getJadwalKuliah($mahasiswaId, $tahunAkademikId)
    {
        return JadwalKuliah::whereHas('kelas.mahasiswas', function($q) use ($mahasiswaId) {
                $q->where('mahasiswa_id', $mahasiswaId);
            })
            ->where('tahun_akademik_id', $tahunAkademikId)
            ->with([
                'mataKuliah' => function($q) {
                    $q->select('id', 'kode_mk', 'nama', 'sks');
                },
                'dosen' => function($q) {
                    $q->select('id', 'nama');
                },
                'ruang' => function($q) {
                    $q->select('id', 'kode', 'nama');
                },
                'waktuKuliah' => function($q) {
                    $q->select('id', 'jam_mulai', 'jam_selesai');
                }
            ])
            ->orderBy('hari')
            ->orderBy('waktu_kuliah_id')
            ->get()
            ->groupBy('hari');
    }
    
    /**
     * Get all available semesters for a student's class schedule
     * 
     * @param \App\Models\Mahasiswa $user
     * @return \Illuminate\Database\Eloquent\Collection
     */
    private function getAvailableSemesters($user)
    {
        return TahunAkademik::whereHas('jadwalKuliah.kelas.mahasiswas', function($q) use ($user) {
                $q->where('mahasiswa_id', $user->id);
            })
            ->select('id', 'name', 'type', 'start_date')
            ->orderBy('start_date', 'desc')
            ->get();
    }
    
    /**
     * Get all available semesters where student has grades
     * 
     * @param int $mahasiswaId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    private function getAvailableNilaiSemesters($mahasiswaId)
    {
        return TahunAkademik::whereHas('nilai', function($q) use ($mahasiswaId) {
                $q->where('mahasiswa_id', $mahasiswaId);
            })
            ->select('id', 'name', 'type', 'start_date')
            ->orderBy('start_date', 'desc')
            ->get();
    }
    
    /**
     * Get all semesters with grades for a student
     * 
     * @param int $mahasiswaId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    private function getNilaiSemester($mahasiswaId)
    {
        return Nilai::where('mahasiswa_id', $mahasiswaId)
                   ->with([
                       'mataKuliah' => function($q) {
                           $q->select('id', 'kode_mk', 'nama', 'sks');
                       },
                       'tahunAkademik' => function($q) {
                           $q->select('id', 'name', 'type', 'start_date');
                       }
                   ])
                   ->orderBy('tahun_akademik_id', 'desc')
                   ->orderBy('mata_kuliah_id')
                   ->get()
                   ->groupBy('tahun_akademik_id');
    }
    
    /**
     * Calculate IPK (Cumulative GPA)
     * 
     * @param \Illuminate\Support\Collection $semesters
     * @return array
     */
    private function hitungIPK($semesters)
    {
        $totalSks = 0;
        $totalNilai = 0;
        
        foreach ($semesters as $semester) {
            foreach ($semester as $nilai) {
                if ($nilai->mataKuliah && $nilai->status !== 'Draft') {
                    $bobot = $this->hitungBobotNilai($nilai->nilai_angka);
                    $totalNilai += $bobot * $nilai->mataKuliah->sks;
                    $totalSks += $nilai->mataKuliah->sks;
                }
            }
        }
        
        return [
            'ipk' => $totalSks > 0 ? $totalNilai / $totalSks : 0,
            'totalSks' => $totalSks
        ];
    }
    
    /**
     * Calculate IPS (Semester GPA)
     * 
     * @param \Illuminate\Database\Eloquent\Collection $nilai
     * @return array
     */
    private function hitungIPS($nilai)
    {
        $totalSks = 0;
        $totalNilai = 0;
        
        foreach ($nilai as $n) {
            if ($n->mataKuliah && $n->status !== 'Draft') {
                $bobot = $this->hitungBobotNilai($n->nilai_angka);
                $totalNilai += $bobot * $n->mataKuliah->sks;
                $totalSks += $n->mataKuliah->sks;
            }
        }
        
        return [
            'ips' => $totalSks > 0 ? $totalNilai / $totalSks : 0,
            'totalSks' => $totalSks
        ];
    }
    
    /**
     * Calculate grade point from numeric score
     * 
     * @param float $nilaiAngka
     * @return float
     */
    private function hitungBobotNilai($nilaiAngka)
    {
        if ($nilaiAngka >= 85) return 4.00;   // A
        if ($nilaiAngka >= 80) return 3.70;   // A-
        if ($nilaiAngka >= 75) return 3.30;   // B+
        if ($nilaiAngka >= 70) return 3.00;   // B
        if ($nilaiAngka >= 65) return 2.70;   // B-
        if ($nilaiAngka >= 60) return 2.30;   // C+
        if ($nilaiAngka >= 55) return 2.00;   // C
        if ($nilaiAngka >= 50) return 1.70;   // C-
        if ($nilaiAngka >= 45) return 1.00;   // D
        return 0.00;                          // E
    }
}
