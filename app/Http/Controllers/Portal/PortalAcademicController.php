<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
// USE MODELS
use App\Models\Pengaturan\WebSetting;
use App\Models\Akademik\TahunAkademik;
use App\Models\Akademik\JadwalKuliah;
use App\Models\Akademik\KRS;
use App\Models\Akademik\Nilai;
use App\Models\Akademik\Presensi;
use App\Models\Keuangan\TagihanKuliah;
use App\Models\Keuangan\RiwayatPembayaran;
use App\Models\Publikasi\Pengumuman;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Traits\HasLogAktivitas;

class PortalAcademicController extends Controller
{
    use HasLogAktivitas;

    /**
     * Main portal entry point - redirects based on user role
     */
    public function index()
    {
        // Check authentication and redirect to appropriate dashboard
        if (Auth::guard('mahasiswa')->check()) {
            return redirect()->route('portal.mahasiswa.dashboard');
        } elseif (Auth::guard('dosen')->check()) {
            return redirect()->route('portal.dosen.dashboard');
        } elseif (Auth::check()) {
            return redirect()->route('portal.admin.dashboard');
        }
        
        return redirect()->route('login');
    }

    /**
     * Mahasiswa Portal Dashboard
     */
    public function mahasiswaDashboard()
    {
        $user = Auth::guard('mahasiswa')->user();
        $data['webs'] = WebSetting::first();
        $data['menus'] = "Portal Academic";
        $data['pages'] = "Portal Mahasiswa";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['user'] = $user;

        // Get current academic year
        $currentYear = TahunAkademik::where('is_active', true)->first();
        $data['current_year'] = $currentYear;

        // Get academic summary
        $this->getMahasiswaAcademicSummary($data, $user, $currentYear);
        
        // Get today's schedule
        $this->getMahasiswaTodaySchedule($data, $user);
        
        // Get announcements
        $this->getPortalAnnouncements($data);
        
        // Get quick stats
        $this->getMahasiswaQuickStats($data, $user);

        return view('portal.mahasiswa.dashboard', $data);
    }

    /**
     * Get mahasiswa academic summary
     */
    private function getMahasiswaAcademicSummary(&$data, $user, $currentYear)
    {
        // Get current semester KRS
        $currentKRS = null;
        if ($currentYear) {
            $currentKRS = KRS::where('mahasiswa_id', $user->id)
                ->where('tahun_akademik_id', $currentYear->id)
                ->with(['details.mataKuliah', 'details.nilai'])
                ->first();
        }

        // Calculate IPK and IPS
        $allKRS = KRS::where('mahasiswa_id', $user->id)
            ->with(['details.mataKuliah', 'details.nilai'])
            ->get();

        $totalSks = 0;
        $totalNilai = 0;
        $totalSksLulus = 0;
        $currentSemesterSks = 0;
        $currentSemesterNilai = 0;

        foreach ($allKRS as $krs) {
            $semesterSks = 0;
            $semesterNilaiTotal = 0;
            
            foreach ($krs->details as $detail) {
                if ($detail->nilai) {
                    $bobot = $this->convertNilaiToBobot($detail->nilai->nilai_akhir);
                    $totalNilai += $bobot * $detail->mataKuliah->bsks;
                    $totalSks += $detail->mataKuliah->bsks;
                    
                    if ($detail->nilai->nilai_akhir >= 60) {
                        $totalSksLulus += $detail->mataKuliah->bsks;
                    }

                    // Current semester calculation
                    if ($currentKRS && $krs->id === $currentKRS->id) {
                        $currentSemesterNilai += $bobot * $detail->mataKuliah->bsks;
                        $currentSemesterSks += $detail->mataKuliah->bsks;
                    }
                }
            }
        }

        $data['academic_summary'] = [
            'ipk' => $totalSks > 0 ? round($totalNilai / $totalSks, 2) : 0,
            'ips' => $currentSemesterSks > 0 ? round($currentSemesterNilai / $currentSemesterSks, 2) : 0,
            'total_sks' => $totalSks,
            'sks_lulus' => $totalSksLulus,
            'sks_target' => $user->programStudi ? ($user->programStudi->sks_lulus ?? 144) : 144,
            'semester_aktif' => $user->semester,
            'status_krs' => $currentKRS ? $currentKRS->status : 'Belum Mengisi',
            'current_krs' => $currentKRS
        ];

        // Progress calculation
        $sksTarget = $data['academic_summary']['sks_target'];
        $data['academic_summary']['progress_percentage'] = $sksTarget > 0 
            ? round(($totalSksLulus / $sksTarget) * 100, 1) 
            : 0;
    }

    /**
     * Get today's schedule for mahasiswa
     */
    private function getMahasiswaTodaySchedule(&$data, $user)
    {
        $dayMap = [0 => 'Minggu', 1 => 'Senin', 2 => 'Selasa', 3 => 'Rabu', 4 => 'Kamis', 5 => 'Jumat', 6 => 'Sabtu'];
        $today = $dayMap[Carbon::today()->dayOfWeek];

        $data['today_schedule'] = JadwalKuliah::whereHas('kelas.mahasiswas', function($q) use ($user) {
                $q->where('mahasiswa_id', $user->id);
            })
            ->where('hari', $today)
            ->with(['mataKuliah', 'dosen', 'ruang', 'waktuKuliah'])
            ->join('waktu_kuliahs', 'jadwal_kuliahs.waktu_kuliah_id', '=', 'waktu_kuliahs.id')
            ->orderBy('waktu_kuliahs.time_start')
            ->select('jadwal_kuliahs.*')
            ->get()
            ->map(function($jadwal) {
                $now = Carbon::now();
                $start = Carbon::parse($jadwal->waktuKuliah->time_start);
                $end = Carbon::parse($jadwal->waktuKuliah->time_ended);
                
                $status = 'upcoming';
                if ($now->between($start, $end)) {
                    $status = 'ongoing';
                } elseif ($now->gt($end)) {
                    $status = 'finished';
                }

                return [
                    'mata_kuliah' => $jadwal->mataKuliah->nama_mk,
                    'kode_mk' => $jadwal->mataKuliah->kode_mk,
                    'dosen' => $jadwal->dosen ? $jadwal->dosen->name : 'TBA',
                    'ruang' => $jadwal->ruang ? $jadwal->ruang->nama_ruang : 'TBA',
                    'waktu_mulai' => $start->format('H:i'),
                    'waktu_selesai' => $end->format('H:i'),
                    'status' => $status,
                    'metode' => $jadwal->metode_pembelajaran
                ];
            });
    }

    /**
     * Get mahasiswa quick stats
     */
    private function getMahasiswaQuickStats(&$data, $user)
    {
        // Get pending bills
        $pendingBills = TagihanKuliah::where('mahasiswa_id', $user->id)
            ->where('status', 'Pending')
            ->sum('amount');

        // Get attendance percentage (last 30 days)
        $attendanceStats = $this->calculateAttendanceStats($user);

        $data['quick_stats'] = [
            'pending_bills' => $pendingBills,
            'attendance_percentage' => $attendanceStats['percentage'],
            'present_count' => $attendanceStats['present'],
            'total_sessions' => $attendanceStats['total'],
            'unread_announcements' => 3 // Can be calculated from actual data
        ];
    }

    /**
     * Calculate attendance statistics
     */
    private function calculateAttendanceStats($user)
    {
        // This would normally query actual attendance data
        // For now, return sample data
        return [
            'percentage' => 92,
            'present' => 23,
            'total' => 25
        ];
    }

    /**
     * Dosen Portal Dashboard
     */
    public function dosenDashboard()
    {
        $user = Auth::guard('dosen')->user();
        $data['webs'] = WebSetting::first();
        $data['menus'] = "Portal Academic";
        $data['pages'] = "Portal Dosen";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['user'] = $user;

        // Get current academic year
        $currentYear = TahunAkademik::where('is_active', true)->first();
        $data['current_year'] = $currentYear;

        // Get teaching summary
        $this->getDosenTeachingSummary($data, $user, $currentYear);
        
        // Get today's schedule
        $this->getDosenTodaySchedule($data, $user);
        
        // Get pending tasks
        $this->getDosenPendingTasks($data, $user);
        
        // Get class statistics
        $this->getDosenClassStats($data, $user);

        return view('portal.dosen.dashboard', $data);
    }

    /**
     * Get dosen teaching summary
     */
    private function getDosenTeachingSummary(&$data, $user, $currentYear)
    {
        if (!$currentYear) {
            $data['teaching_summary'] = [
                'total_classes' => 0,
                'total_students' => 0,
                'total_subjects' => 0,
                'teaching_load' => 0
            ];
            return;
        }

        $jadwals = JadwalKuliah::where('dosen_id', $user->id)
            ->where('tahun_akademik_id', $currentYear->id)
            ->with(['mataKuliah', 'kelas.mahasiswas'])
            ->get();

        $totalStudents = 0;
        $totalSks = 0;
        
        foreach ($jadwals as $jadwal) {
            $totalStudents += $jadwal->kelas->mahasiswas->count();
            $totalSks += $jadwal->mataKuliah->bsks;
        }

        $data['teaching_summary'] = [
            'total_classes' => $jadwals->count(),
            'total_students' => $totalStudents,
            'total_subjects' => $jadwals->pluck('mata_kuliah_id')->unique()->count(),
            'teaching_load' => $totalSks
        ];
    }

    /**
     * Get dosen today's schedule
     */
    private function getDosenTodaySchedule(&$data, $user)
    {
        $dayMap = [0 => 'Minggu', 1 => 'Senin', 2 => 'Selasa', 3 => 'Rabu', 4 => 'Kamis', 5 => 'Jumat', 6 => 'Sabtu'];
        $today = $dayMap[Carbon::today()->dayOfWeek];

        $data['today_schedule'] = JadwalKuliah::where('dosen_id', $user->id)
            ->where('hari', $today)
            ->with(['mataKuliah', 'kelas', 'ruang', 'waktuKuliah'])
            ->join('waktu_kuliahs', 'jadwal_kuliahs.waktu_kuliah_id', '=', 'waktu_kuliahs.id')
            ->orderBy('waktu_kuliahs.time_start')
            ->select('jadwal_kuliahs.*')
            ->get()
            ->map(function($jadwal) {
                $now = Carbon::now();
                $start = Carbon::parse($jadwal->waktuKuliah->time_start);
                $end = Carbon::parse($jadwal->waktuKuliah->time_ended);
                
                $status = 'upcoming';
                if ($now->between($start, $end)) {
                    $status = 'ongoing';
                } elseif ($now->gt($end)) {
                    $status = 'finished';
                }

                return [
                    'mata_kuliah' => $jadwal->mataKuliah->nama_mk,
                    'kode_mk' => $jadwal->mataKuliah->kode_mk,
                    'kelas' => $jadwal->kelas->nama_kelas,
                    'ruang' => $jadwal->ruang ? $jadwal->ruang->nama_ruang : 'TBA',
                    'waktu_mulai' => $start->format('H:i'),
                    'waktu_selesai' => $end->format('H:i'),
                    'status' => $status,
                    'mahasiswa_count' => $jadwal->kelas->mahasiswas->count()
                ];
            });
    }

    /**
     * Get dosen pending tasks
     */
    private function getDosenPendingTasks(&$data, $user)
    {
        // Get KRS that need approval (if dosen is academic advisor)
        $pendingKRS = KRS::where('dosen_pembimbing_id', $user->id)
            ->where('status', 'Pending')
            ->count();

        // Get grades that need to be input (simplified)
        $pendingGrades = 5; // This would be calculated from actual data

        $data['pending_tasks'] = [
            'krs_approval' => $pendingKRS,
            'grade_input' => $pendingGrades,
            'attendance_input' => 3
        ];
    }

    /**
     * Get dosen class statistics
     */
    private function getDosenClassStats(&$data, $user)
    {
        $currentYear = TahunAkademik::where('is_active', true)->first();
        
        if (!$currentYear) {
            $data['class_stats'] = [];
            return;
        }

        $jadwals = JadwalKuliah::where('dosen_id', $user->id)
            ->where('tahun_akademik_id', $currentYear->id)
            ->with(['mataKuliah', 'kelas.mahasiswas'])
            ->get();

        $data['class_stats'] = $jadwals->map(function($jadwal) {
            return [
                'mata_kuliah' => $jadwal->mataKuliah->nama_mk,
                'kelas' => $jadwal->kelas->nama_kelas,
                'jumlah_mahasiswa' => $jadwal->kelas->mahasiswas->count(),
                'kapasitas' => $jadwal->kapasitas,
                'utilization' => $jadwal->kapasitas > 0 
                    ? round(($jadwal->kelas->mahasiswas->count() / $jadwal->kapasitas) * 100, 1)
                    : 0
            ];
        });
    }

    /**
     * Admin Portal Dashboard
     */
    public function adminDashboard()
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['menus'] = "Portal Academic";
        $data['pages'] = "Portal Admin";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['user'] = $user;

        // Get system overview
        $this->getSystemOverview($data);
        
        // Get pending approvals
        $this->getPendingApprovals($data);
        
        // Get recent activities
        $this->getRecentSystemActivities($data);
        
        // Get alerts and notifications
        $this->getSystemAlerts($data);

        return view('portal.admin.dashboard', $data);
    }

    /**
     * Get system overview for admin
     */
    private function getSystemOverview(&$data)
    {
        $currentYear = TahunAkademik::where('is_active', true)->first();
        
        $data['system_overview'] = [
            'total_mahasiswa' => Mahasiswa::count(),
            'mahasiswa_aktif' => Mahasiswa::where('type', 'Aktif')->count(),
            'total_dosen' => Dosen::count(),
            'dosen_aktif' => Dosen::where('status', 'Aktif')->count(),
            'current_semester' => $currentYear ? $currentYear->nama_tahun_akademik : 'Tidak Ada',
            'krs_registered' => $currentYear ? 
                KRS::where('tahun_akademik_id', $currentYear->id)->count() : 0,
            'pending_payments' => TagihanKuliah::where('status', 'Pending')->sum('amount'),
            'active_classes' => $currentYear ?
                JadwalKuliah::where('tahun_akademik_id', $currentYear->id)->count() : 0
        ];
    }

    /**
     * Get pending approvals for admin
     */
    private function getPendingApprovals(&$data)
    {
        $data['pending_approvals'] = [
            'krs' => KRS::where('status', 'Pending')->count(),
            'payments' => RiwayatPembayaran::where('status_pembayaran', 'Pending')->count(),
            'documents' => 0, // This would come from document request system
            'registrations' => 0 // This would come from new student registrations
        ];
    }

    /**
     * Get recent system activities for admin
     */
    private function getRecentSystemActivities(&$data)
    {
        $activities = \App\Models\LogAktivitas::with('user')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get()
            ->map(function($log) {
                return [
                    'user_name' => $log->user_name ?? 'System',
                    'action' => $log->aksi,
                    'description' => $log->deskripsi ?? ($log->aksi . ' ' . $log->model_type),
                    'time' => $log->created_at,
                    'ip_address' => $log->ip_address
                ];
            });

        $data['recent_activities'] = $activities;
    }

    /**
     * Get system alerts for admin
     */
    private function getSystemAlerts(&$data)
    {
        $data['system_alerts'] = [
            [
                'type' => 'warning',
                'title' => 'Pembayaran Tertunda',
                'message' => 'Terdapat ' . TagihanKuliah::where('status', 'Pending')->count() . ' tagihan yang belum dibayar',
                'action_url' => route('admin.finance.tagihan'),
                'time' => Carbon::now()
            ],
            [
                'type' => 'info',
                'title' => 'KRS Menunggu Persetujuan',
                'message' => 'Terdapat ' . KRS::where('status', 'Pending')->count() . ' KRS yang menunggu persetujuan',
                'action_url' => route('admin.academic.krs'),
                'time' => Carbon::now()
            ]
        ];
    }

    /**
     * Get portal announcements
     */
    private function getPortalAnnouncements(&$data)
    {
        $data['announcements'] = Pengumuman::where('status', 'Publish')
            ->where('created_at', '<=', now())
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get(['name', 'content', 'created_at'])
            ->map(function($announcement) {
                return [
                    'title' => $announcement->name,
                    'content' => strip_tags($announcement->content),
                    'excerpt' => \Str::limit(strip_tags($announcement->content), 150),
                    'time' => $announcement->created_at
                ];
            });
    }

    /**
     * Portal calendar view
     */
    public function calendar()
    {
        $data['webs'] = WebSetting::first();
        $data['menus'] = "Portal Academic";
        $data['pages'] = "Kalender Akademik";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;

        // Get calendar events based on user role
        if (Auth::guard('mahasiswa')->check()) {
            $this->getMahasiswaCalendarEvents($data, Auth::guard('mahasiswa')->user());
        } elseif (Auth::guard('dosen')->check()) {
            $this->getDosenCalendarEvents($data, Auth::guard('dosen')->user());
        } else {
            $this->getAdminCalendarEvents($data);
        }

        return view('portal.calendar', $data);
    }

    /**
     * Get calendar events for mahasiswa
     */
    private function getMahasiswaCalendarEvents(&$data, $user)
    {
        // Get class schedules
        $jadwals = JadwalKuliah::whereHas('kelas.mahasiswas', function($q) use ($user) {
                $q->where('mahasiswa_id', $user->id);
            })
            ->with(['mataKuliah', 'waktuKuliah'])
            ->get();

        $events = [];
        foreach ($jadwals as $jadwal) {
            $events[] = [
                'title' => $jadwal->mataKuliah->nama_mk,
                'day_of_week' => $this->getDayNumber($jadwal->hari),
                'start_time' => $jadwal->waktuKuliah->time_start,
                'end_time' => $jadwal->waktuKuliah->time_ended,
                'type' => 'class',
                'recurring' => true
            ];
        }

        $data['calendar_events'] = $events;
    }

    /**
     * Get calendar events for dosen
     */
    private function getDosenCalendarEvents(&$data, $user)
    {
        // Get teaching schedules
        $jadwals = JadwalKuliah::where('dosen_id', $user->id)
            ->with(['mataKuliah', 'waktuKuliah', 'kelas'])
            ->get();

        $events = [];
        foreach ($jadwals as $jadwal) {
            $events[] = [
                'title' => $jadwal->mataKuliah->nama_mk . ' - ' . $jadwal->kelas->nama_kelas,
                'day_of_week' => $this->getDayNumber($jadwal->hari),
                'start_time' => $jadwal->waktuKuliah->time_start,
                'end_time' => $jadwal->waktuKuliah->time_ended,
                'type' => 'teaching',
                'recurring' => true
            ];
        }

        $data['calendar_events'] = $events;
    }

    /**
     * Get calendar events for admin
     */
    private function getAdminCalendarEvents(&$data)
    {
        // Get all schedules overview
        $currentYear = TahunAkademik::where('is_active', true)->first();
        
        if ($currentYear) {
            $jadwals = JadwalKuliah::where('tahun_akademik_id', $currentYear->id)
                ->with(['mataKuliah', 'waktuKuliah'])
                ->get()
                ->groupBy('hari');

            $events = [];
            foreach ($jadwals as $hari => $daySchedules) {
                $events[] = [
                    'title' => count($daySchedules) . ' kelas pada hari ' . $hari,
                    'day_of_week' => $this->getDayNumber($hari),
                    'type' => 'overview',
                    'count' => count($daySchedules)
                ];
            }

            $data['calendar_events'] = $events;
        } else {
            $data['calendar_events'] = [];
        }
    }

    /**
     * Convert day name to number
     */
    private function getDayNumber($dayName)
    {
        $days = [
            'Minggu' => 0,
            'Senin' => 1,
            'Selasa' => 2,
            'Rabu' => 3,
            'Kamis' => 4,
            'Jumat' => 5,
            'Sabtu' => 6
        ];

        return $days[$dayName] ?? 1;
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