<?php

namespace App\Http\Controllers\Admin\Academic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
// USE MODELS
use App\Models\Pengaturan\WebSetting;
use App\Models\Akademik\ProgramStudi;
use App\Models\Akademik\MataKuliah;
use App\Models\Akademik\KRS;
use App\Models\Akademik\JadwalKuliah;
use App\Models\Akademik\Kelas;
use App\Models\Akademik\RuangKuliah;
use App\Models\Akademik\WaktuKuliah;
use App\Models\Akademik\TahunAkademik;
use App\Models\Akademik\Kurikulum;
use App\Models\Akademik\Nilai;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Traits\HasLogAktivitas;

class BackOfficeController extends Controller
{
    use HasLogAktivitas;

    /**
     * Display academic dashboard
     */
    public function dashboard()
    {
        $data['webs'] = WebSetting::first();
        $data['menus'] = "Back Office Academic";
        $data['pages'] = "Dashboard Akademik";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;

        // Get academic statistics
        $this->getAcademicStats($data);
        
        // Get recent academic activities
        $this->getRecentAcademicActivities($data);
        
        // Get semester overview
        $this->getSemesterOverview($data);

        return view('admin.academic.dashboard', $data);
    }

    /**
     * Get academic statistics
     */
    private function getAcademicStats(&$data)
    {
        $currentYear = TahunAkademik::where('is_active', true)->first();
        
        $data['stats'] = [
            'total_mahasiswa' => Mahasiswa::where('type', 'Aktif')->count(),
            'total_dosen' => Dosen::where('status', 'Aktif')->count(),
            'total_prodi' => ProgramStudi::where('status', 'Aktif')->count(),
            'total_matakuliah' => MataKuliah::where('status', 'Aktif')->count(),
            'total_kelas' => Kelas::count(),
            'krs_pending' => KRS::where('status', 'Pending')->count(),
            'krs_approved' => KRS::where('status', 'Approved')->count(),
            'jadwal_semester_ini' => $currentYear ? 
                JadwalKuliah::where('tahun_akademik_id', $currentYear->id)->count() : 0,
            'ruang_tersedia' => RuangKuliah::where('status', 'Aktif')->count()
        ];

        // Calculate semester metrics
        if ($currentYear) {
            $data['semester_metrics'] = [
                'tahun_akademik' => $currentYear->nama_tahun_akademik,
                'semester' => $currentYear->semester,
                'status' => $currentYear->is_active ? 'Aktif' : 'Tidak Aktif',
                'mahasiswa_registrasi' => KRS::where('tahun_akademik_id', $currentYear->id)->distinct('mahasiswa_id')->count(),
                'mata_kuliah_dibuka' => JadwalKuliah::where('tahun_akademik_id', $currentYear->id)->distinct('mata_kuliah_id')->count()
            ];
        }
    }

    /**
     * Get recent academic activities
     */
    private function getRecentAcademicActivities(&$data)
    {
        $data['recent_activities'] = [
            [
                'type' => 'krs',
                'title' => 'KRS Diajukan',
                'description' => '15 mahasiswa mengajukan KRS hari ini',
                'time' => Carbon::now()->subHours(1),
                'icon' => 'clipboard-list',
                'color' => 'primary'
            ],
            [
                'type' => 'jadwal',
                'title' => 'Jadwal Kuliah Diperbarui',
                'description' => 'Jadwal mata kuliah Algoritma dan Pemrograman telah diperbarui',
                'time' => Carbon::now()->subHours(3),
                'icon' => 'calendar',
                'color' => 'info'
            ],
            [
                'type' => 'nilai',
                'title' => 'Input Nilai',
                'description' => 'Dr. Ahmad Fauzi menginput nilai UTS Matematika Diskrit',
                'time' => Carbon::now()->subHours(5),
                'icon' => 'star',
                'color' => 'success'
            ]
        ];
    }

    /**
     * Get semester overview
     */
    private function getSemesterOverview(&$data)
    {
        $currentYear = TahunAkademik::where('is_active', true)->first();
        
        if ($currentYear) {
            $data['semester_overview'] = [
                'mulai_semester' => $currentYear->tgl_mulai,
                'akhir_semester' => $currentYear->tgl_selesai,
                'batas_krs' => $currentYear->batas_krs,
                'status_krs' => Carbon::now()->lt($currentYear->batas_krs) ? 'Terbuka' : 'Tertutup',
                'hari_tersisa_krs' => Carbon::now()->diffInDays($currentYear->batas_krs, false),
                'progress_semester' => $this->calculateSemesterProgress($currentYear)
            ];
        }
    }

    /**
     * Calculate semester progress percentage
     */
    private function calculateSemesterProgress($tahunAkademik)
    {
        $mulai = Carbon::parse($tahunAkademik->tgl_mulai);
        $selesai = Carbon::parse($tahunAkademik->tgl_selesai);
        $sekarang = Carbon::now();
        
        if ($sekarang->lt($mulai)) {
            return 0;
        } elseif ($sekarang->gt($selesai)) {
            return 100;
        }
        
        $totalHari = $selesai->diffInDays($mulai);
        $hariTerlalui = $sekarang->diffInDays($mulai);
        
        return round(($hariTerlalui / $totalHari) * 100, 1);
    }

    /**
     * Program Studi Management
     */
    public function programStudi(Request $request)
    {
        $data['webs'] = WebSetting::first();
        $data['menus'] = "Back Office Academic";
        $data['pages'] = "Manajemen Program Studi";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;

        $query = ProgramStudi::with(['fakultas', 'jenjang']);

        // Filter by search
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama_prodi', 'like', "%{$search}%")
                  ->orWhere('kode_prodi', 'like', "%{$search}%");
            });
        }

        // Filter by status
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        $data['program_studis'] = $query->orderBy('nama_prodi')->paginate(20);
        $data['fakultas'] = \App\Models\Akademik\Fakultas::where('status', 'Aktif')->get();
        $data['jenjangs'] = \App\Models\Akademik\Jenjang::where('status', 'Aktif')->get();
        $data['filters'] = $request->only(['search', 'status']);

        return view('admin.academic.program-studi.index', $data);
    }

    /**
     * Store new program studi
     */
    public function storeProgramStudi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_prodi' => 'required|string|max:20|unique:program_studis',
            'nama_prodi' => 'required|string|max:255',
            'fakultas_id' => 'required|exists:fakultas,id',
            'jenjang_id' => 'required|exists:jenjangs,id',
            'akreditasi' => 'nullable|string|max:10',
            'sks_lulus' => 'required|integer|min:120|max:200',
            'gelar' => 'required|string|max:50',
            'status' => 'required|in:Aktif,Tidak Aktif'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            ProgramStudi::create($validator->validated());
            
            return redirect()->back()
                ->with('success', 'Program Studi berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menambahkan Program Studi: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Mata Kuliah Management
     */
    public function mataKuliah(Request $request)
    {
        $data['webs'] = WebSetting::first();
        $data['menus'] = "Back Office Academic";
        $data['pages'] = "Manajemen Mata Kuliah";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;

        $query = MataKuliah::with(['programStudi', 'kurikulum']);

        // Filter by search
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama_mk', 'like', "%{$search}%")
                  ->orWhere('kode_mk', 'like', "%{$search}%");
            });
        }

        // Filter by program studi
        if ($request->has('prodi') && $request->prodi) {
            $query->where('program_studi_id', $request->prodi);
        }

        // Filter by semester
        if ($request->has('semester') && $request->semester) {
            $query->where('semester', $request->semester);
        }

        $data['mata_kuliahs'] = $query->orderBy('nama_mk')->paginate(20);
        $data['program_studis'] = ProgramStudi::where('status', 'Aktif')->get();
        $data['kurikulums'] = Kurikulum::where('status', 'Aktif')->get();
        $data['filters'] = $request->only(['search', 'prodi', 'semester']);

        return view('admin.academic.mata-kuliah.index', $data);
    }

    /**
     * Store new mata kuliah
     */
    public function storeMataKuliah(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_mk' => 'required|string|max:20|unique:mata_kuliahs',
            'nama_mk' => 'required|string|max:255',
            'nama_mk_en' => 'nullable|string|max:255',
            'program_studi_id' => 'required|exists:program_studis,id',
            'kurikulum_id' => 'required|exists:kurikulums,id',
            'semester' => 'required|integer|min:1|max:14',
            'bsks' => 'required|integer|min:1|max:6',
            'sks_teori' => 'required|integer|min:0',
            'sks_praktek' => 'required|integer|min:0',
            'sks_lapangan' => 'required|integer|min:0',
            'jenis_mk' => 'required|in:Wajib,Pilihan',
            'kelompok_mk' => 'required|in:MPK,MKK,MKB,MPB,MBB',
            'status' => 'required|in:Aktif,Tidak Aktif'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Validate total SKS
        $totalSks = $request->sks_teori + $request->sks_praktek + $request->sks_lapangan;
        if ($totalSks != $request->bsks) {
            return redirect()->back()
                ->with('error', 'Total SKS (Teori + Praktek + Lapangan) harus sama dengan Beban SKS.')
                ->withInput();
        }

        try {
            MataKuliah::create($validator->validated());
            
            return redirect()->back()
                ->with('success', 'Mata Kuliah berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menambahkan Mata Kuliah: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Jadwal Kuliah Management
     */
    public function jadwalKuliah(Request $request)
    {
        $data['webs'] = WebSetting::first();
        $data['menus'] = "Back Office Academic";
        $data['pages'] = "Manajemen Jadwal Kuliah";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;

        $currentYear = TahunAkademik::where('is_active', true)->first();
        
        $query = JadwalKuliah::with(['mataKuliah.programStudi', 'dosen', 'kelas', 'ruang', 'waktuKuliah', 'tahunAkademik']);

        // Filter by current academic year by default
        if ($currentYear) {
            $query->where('tahun_akademik_id', $currentYear->id);
        }

        // Filter by search
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->whereHas('mataKuliah', function($q) use ($search) {
                $q->where('nama_mk', 'like', "%{$search}%")
                  ->orWhere('kode_mk', 'like', "%{$search}%");
            });
        }

        // Filter by program studi
        if ($request->has('prodi') && $request->prodi) {
            $query->whereHas('mataKuliah', function($q) use ($request) {
                $q->where('program_studi_id', $request->prodi);
            });
        }

        // Filter by hari
        if ($request->has('hari') && $request->hari) {
            $query->where('hari', $request->hari);
        }

        $data['jadwal_kuliahs'] = $query->orderBy('hari')->orderBy('waktu_kuliah_id')->paginate(20);
        $data['program_studis'] = ProgramStudi::where('status', 'Aktif')->get();
        $data['mata_kuliahs'] = MataKuliah::where('status', 'Aktif')->get();
        $data['dosens'] = Dosen::where('status', 'Aktif')->get();
        $data['kelas'] = Kelas::all();
        $data['ruangs'] = RuangKuliah::where('status', 'Aktif')->get();
        $data['waktu_kuliahs'] = WaktuKuliah::orderBy('time_start')->get();
        $data['tahun_akademiks'] = TahunAkademik::orderBy('created_at', 'desc')->get();
        $data['current_year'] = $currentYear;
        $data['filters'] = $request->only(['search', 'prodi', 'hari']);

        return view('admin.academic.jadwal-kuliah.index', $data);
    }

    /**
     * Store new jadwal kuliah
     */
    public function storeJadwalKuliah(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tahun_akademik_id' => 'required|exists:tahun_akademiks,id',
            'mata_kuliah_id' => 'required|exists:mata_kuliahs,id',
            'dosen_id' => 'required|exists:dosens,id',
            'kelas_id' => 'required|exists:kelas,id',
            'ruang_kuliah_id' => 'required|exists:ruang_kuliahs,id',
            'waktu_kuliah_id' => 'required|exists:waktu_kuliahs,id',
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'metode_pembelajaran' => 'required|in:Luring,Daring,Blended',
            'kapasitas' => 'required|integer|min:1|max:100'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Check for scheduling conflicts
        $conflict = JadwalKuliah::where('tahun_akademik_id', $request->tahun_akademik_id)
            ->where('hari', $request->hari)
            ->where('waktu_kuliah_id', $request->waktu_kuliah_id)
            ->where(function($q) use ($request) {
                $q->where('ruang_kuliah_id', $request->ruang_kuliah_id)
                  ->orWhere('dosen_id', $request->dosen_id);
            })
            ->exists();

        if ($conflict) {
            return redirect()->back()
                ->with('error', 'Konflik jadwal ditemukan. Ruang atau dosen sudah memiliki jadwal pada waktu tersebut.')
                ->withInput();
        }

        try {
            JadwalKuliah::create($validator->validated());
            
            return redirect()->back()
                ->with('success', 'Jadwal Kuliah berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menambahkan Jadwal Kuliah: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * KRS Management
     */
    public function krsManagement(Request $request)
    {
        $data['webs'] = WebSetting::first();
        $data['menus'] = "Back Office Academic";
        $data['pages'] = "Manajemen KRS";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;

        $currentYear = TahunAkademik::where('is_active', true)->first();
        
        $query = KRS::with(['mahasiswa.programStudi', 'tahunAkademik', 'dosenPembimbing']);

        // Filter by current academic year by default
        if ($currentYear) {
            $query->where('tahun_akademik_id', $currentYear->id);
        }

        // Filter by search
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->whereHas('mahasiswa', function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('numb_nim', 'like', "%{$search}%");
            });
        }

        // Filter by status
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        // Filter by program studi
        if ($request->has('prodi') && $request->prodi) {
            $query->whereHas('mahasiswa', function($q) use ($request) {
                $q->where('program_studi_id', $request->prodi);
            });
        }

        $data['krs_list'] = $query->orderBy('created_at', 'desc')->paginate(20);
        $data['program_studis'] = ProgramStudi::where('status', 'Aktif')->get();
        $data['current_year'] = $currentYear;
        $data['filters'] = $request->only(['search', 'status', 'prodi']);

        // Statistics
        $data['krs_stats'] = [
            'total' => $query->count(),
            'pending' => $query->where('status', 'Pending')->count(),
            'approved' => $query->where('status', 'Approved')->count(),
            'rejected' => $query->where('status', 'Rejected')->count()
        ];

        return view('admin.academic.krs-management.index', $data);
    }

    /**
     * Approve KRS
     */
    public function approveKRS(Request $request, $id)
    {
        try {
            $krs = KRS::findOrFail($id);
            
            $krs->update([
                'status' => 'Approved',
                'approved_by' => Auth::user()->id,
                'approved_at' => now(),
                'catatan_pembimbing' => $request->catatan
            ]);

            $this->logActivity([
                'aksi' => 'approve',
                'model_type' => 'KRS',
                'model_id' => $krs->id,
                'deskripsi' => "KRS mahasiswa {$krs->mahasiswa->name} ({$krs->mahasiswa->numb_nim}) telah disetujui",
                'user_name' => Auth::user()->name,
                'user_type' => 'admin',
                'ip_address' => request()->ip()
            ]);

            return redirect()->back()
                ->with('success', 'KRS berhasil disetujui.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menyetujui KRS: ' . $e->getMessage());
        }
    }

    /**
     * Reject KRS
     */
    public function rejectKRS(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'catatan' => 'required|string|max:500'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }

        try {
            $krs = KRS::findOrFail($id);
            
            $krs->update([
                'status' => 'Rejected',
                'rejected_by' => Auth::user()->id,
                'rejected_at' => now(),
                'catatan_pembimbing' => $request->catatan
            ]);

            $this->logActivity([
                'aksi' => 'reject',
                'model_type' => 'KRS',
                'model_id' => $krs->id,
                'deskripsi' => "KRS mahasiswa {$krs->mahasiswa->name} ({$krs->mahasiswa->numb_nim}) telah ditolak",
                'user_name' => Auth::user()->name,
                'user_type' => 'admin',
                'ip_address' => request()->ip()
            ]);

            return redirect()->back()
                ->with('success', 'KRS berhasil ditolak.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menolak KRS: ' . $e->getMessage());
        }
    }

    /**
     * Nilai Management
     */
    public function nilaiManagement(Request $request)
    {
        $data['webs'] = WebSetting::first();
        $data['menus'] = "Back Office Academic";
        $data['pages'] = "Manajemen Nilai";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;

        $currentYear = TahunAkademik::where('is_active', true)->first();
        
        $query = Nilai::with(['krsDetail.krs.mahasiswa', 'krsDetail.mataKuliah', 'krsDetail.krs.tahunAkademik']);

        // Filter by current academic year
        if ($currentYear) {
            $query->whereHas('krsDetail.krs', function($q) use ($currentYear) {
                $q->where('tahun_akademik_id', $currentYear->id);
            });
        }

        // Filter by search (mahasiswa)
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->whereHas('krsDetail.krs.mahasiswa', function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('numb_nim', 'like', "%{$search}%");
            });
        }

        // Filter by mata kuliah
        if ($request->has('matakuliah') && $request->matakuliah) {
            $query->whereHas('krsDetail.mataKuliah', function($q) use ($request) {
                $q->where('id', $request->matakuliah);
            });
        }

        $data['nilai_list'] = $query->orderBy('updated_at', 'desc')->paginate(20);
        $data['mata_kuliahs'] = MataKuliah::where('status', 'Aktif')->get();
        $data['current_year'] = $currentYear;
        $data['filters'] = $request->only(['search', 'matakuliah']);

        return view('admin.academic.nilai-management.index', $data);
    }

    /**
     * Laporan Akademik
     */
    public function laporanAkademik()
    {
        $data['webs'] = WebSetting::first();
        $data['menus'] = "Back Office Academic";
        $data['pages'] = "Laporan Akademik";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;

        $currentYear = TahunAkademik::where('is_active', true)->first();

        // Report statistics
        $data['report_stats'] = [
            'mahasiswa_aktif' => Mahasiswa::where('type', 'Aktif')->count(),
            'mahasiswa_registrasi' => $currentYear ? 
                KRS::where('tahun_akademik_id', $currentYear->id)->distinct('mahasiswa_id')->count() : 0,
            'mata_kuliah_dibuka' => $currentYear ? 
                JadwalKuliah::where('tahun_akademik_id', $currentYear->id)->distinct('mata_kuliah_id')->count() : 0,
            'kelas_aktif' => $currentYear ?
                JadwalKuliah::where('tahun_akademik_id', $currentYear->id)->distinct('kelas_id')->count() : 0
        ];

        // Academic performance by program studi
        $data['performance_by_prodi'] = ProgramStudi::with(['mahasiswas'])
            ->where('status', 'Aktif')
            ->get()
            ->map(function($prodi) {
                $mahasiswas = $prodi->mahasiswas->where('type', 'Aktif');
                
                // Calculate average IPK
                $totalIPK = 0;
                $countWithIPK = 0;
                
                foreach ($mahasiswas as $mahasiswa) {
                    $krs = $mahasiswa->krs;
                    $totalSks = 0;
                    $totalNilai = 0;
                    
                    foreach ($krs as $semester) {
                        foreach ($semester->details as $detail) {
                            if ($detail->nilai) {
                                $bobot = $this->convertNilaiToBobot($detail->nilai->nilai_akhir);
                                $totalNilai += $bobot * $detail->mataKuliah->bsks;
                                $totalSks += $detail->mataKuliah->bsks;
                            }
                        }
                    }
                    
                    if ($totalSks > 0) {
                        $totalIPK += $totalNilai / $totalSks;
                        $countWithIPK++;
                    }
                }
                
                return [
                    'nama_prodi' => $prodi->nama_prodi,
                    'total_mahasiswa' => $mahasiswas->count(),
                    'rata_ipk' => $countWithIPK > 0 ? round($totalIPK / $countWithIPK, 2) : 0
                ];
            });

        $data['current_year'] = $currentYear;

        return view('admin.academic.laporan.index', $data);
    }

    /**
     * Convert nilai to bobot
     */
    private function convertNilaiToBobot($nilai)
    {
        if ($nilai >= 85) return 4.0;
        if ($nilai >= 80) return 3.7;
        if ($nilai >= 75) return 3.3;
        if ($nilai >= 70) return 3.0;
        if ($nilai >= 65) return 2.7;
        if ($nilai >= 60) return 2.0;
        if ($nilai >= 55) return 1.0;
        return 0.0;
    }
}