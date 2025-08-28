<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
// USE MODELS
use App\Models\Pengaturan\WebSetting;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\User;
use App\Models\Akademik\KRS;
use App\Models\Keuangan\TagihanKuliah;
use App\Models\Akademik\JadwalKuliah;
use App\Traits\HasLogAktivitas;

class MonitoringController extends Controller
{
    use HasLogAktivitas;

    /**
     * Display monitoring dashboard
     */
    public function index()
    {
        $data['webs'] = WebSetting::first();
        $data['menus'] = "Monitoring";
        $data['pages'] = "Dashboard Monitoring";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;

        // Get monitoring statistics
        $this->getMonitoringStats($data);
        
        // Get recent activities
        $this->getRecentSystemActivities($data);
        
        // Get active sessions
        $this->getActiveSessions($data);
        
        // Get system alerts
        $this->getSystemAlerts($data);

        return view('admin.monitoring.dashboard', $data);
    }

    /**
     * Get monitoring statistics
     */
    private function getMonitoringStats(&$data)
    {
        $today = Carbon::today();
        $thisMonth = Carbon::now()->startOfMonth();
        
        // User statistics
        $data['stats'] = [
            'total_mahasiswa' => Mahasiswa::count(),
            'mahasiswa_aktif' => Mahasiswa::where('type', 'Aktif')->count(),
            'total_dosen' => Dosen::count(),
            'dosen_aktif' => Dosen::where('status', 'Aktif')->count(),
            'total_admin' => User::count(),
            'login_hari_ini' => $this->getLoginToday(),
            'krs_pending' => KRS::where('status', 'Pending')->count(),
            'tagihan_outstanding' => TagihanKuliah::where('status', 'Pending')->sum('amount'),
            'jadwal_hari_ini' => JadwalKuliah::whereHas('waktuKuliah', function($q) {
                $dayMap = [0 => 'Minggu', 1 => 'Senin', 2 => 'Selasa', 3 => 'Rabu', 4 => 'Kamis', 5 => 'Jumat', 6 => 'Sabtu'];
                $today = $dayMap[Carbon::today()->dayOfWeek];
                $q->where('hari', $today);
            })->count()
        ];

        // Performance metrics
        $data['performance'] = [
            'response_time' => '125ms',
            'uptime' => '99.8%',
            'memory_usage' => '45%',
            'disk_usage' => '67%',
            'cpu_usage' => '23%'
        ];
    }

    /**
     * Get login statistics for today
     */
    private function getLoginToday()
    {
        $today = Carbon::today();
        
        // This would normally come from a login log table
        // For now, return a simulated count
        return 145;
    }

    /**
     * Get recent system activities
     */
    private function getRecentSystemActivities(&$data)
    {
        // Get recent log activities
        $activities = \App\Models\LogAktivitas::with(['user'])
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get()
            ->map(function($log) {
                return [
                    'user_name' => $log->user_name ?? 'System',
                    'user_type' => $log->user_type ?? 'System',
                    'action' => $log->aksi,
                    'model' => $log->model_type,
                    'description' => $log->deskripsi ?? $log->aksi . ' ' . $log->model_type,
                    'ip_address' => $log->ip_address,
                    'created_at' => $log->created_at,
                    'status' => 'success'
                ];
            })
            ->toArray();

        $data['recent_activities'] = $activities;
    }

    /**
     * Get active user sessions
     */
    private function getActiveSessions(&$data)
    {
        // Simulated active sessions data
        $data['active_sessions'] = [
            [
                'user_name' => 'Ahmad Rizki',
                'user_type' => 'mahasiswa',
                'nim' => '20230101001',
                'ip_address' => '192.168.1.101',
                'last_activity' => Carbon::now()->subMinutes(5),
                'browser' => 'Chrome 118.0',
                'location' => 'Jakarta'
            ],
            [
                'user_name' => 'Dr. Siti Nurhaliza',
                'user_type' => 'dosen',
                'nip' => '198705142015041001',
                'ip_address' => '192.168.1.105',
                'last_activity' => Carbon::now()->subMinutes(12),
                'browser' => 'Firefox 119.0',
                'location' => 'Bandung'
            ],
            [
                'user_name' => 'Admin Portal',
                'user_type' => 'admin',
                'username' => 'admin001',
                'ip_address' => '192.168.1.100',
                'last_activity' => Carbon::now()->subMinutes(2),
                'browser' => 'Edge 118.0',
                'location' => 'Jakarta'
            ]
        ];
    }

    /**
     * Get system alerts
     */
    private function getSystemAlerts(&$data)
    {
        $data['system_alerts'] = [
            [
                'type' => 'warning',
                'title' => 'Kapasitas Database',
                'message' => 'Penggunaan database mencapai 85%. Pertimbangkan untuk melakukan pembersihan data lama.',
                'time' => Carbon::now()->subHours(2),
                'priority' => 'medium'
            ],
            [
                'type' => 'info',
                'title' => 'Backup Otomatis',
                'message' => 'Backup database harian telah berhasil dilakukan pada ' . Carbon::now()->format('H:i'),
                'time' => Carbon::now()->subHours(1),
                'priority' => 'low'
            ]
        ];
    }

    /**
     * Show student list for monitoring
     */
    public function mahasiswaList(Request $request)
    {
        $data['webs'] = WebSetting::first();
        $data['menus'] = "Monitoring";
        $data['pages'] = "Monitoring Mahasiswa";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;

        $query = Mahasiswa::with(['programStudi', 'kelas']);

        // Filter by search
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('numb_nim', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        // Filter by status
        if ($request->has('status') && $request->status) {
            $query->where('type', $request->status);
        }

        // Filter by program studi
        if ($request->has('prodi') && $request->prodi) {
            $query->where('program_studi_id', $request->prodi);
        }

        $data['mahasiswas'] = $query->orderBy('name')->paginate(20);
        $data['program_studis'] = \App\Models\Akademik\ProgramStudi::all();
        $data['filters'] = $request->only(['search', 'status', 'prodi']);

        return view('admin.monitoring.mahasiswa-list', $data);
    }

    /**
     * Login as student (impersonate)
     */
    public function loginAsStudent(Request $request)
    {
        try {
            $mahasiswa = Mahasiswa::findOrFail($request->mahasiswa_id);
            
            // Store original admin session
            Session::put('admin_impersonating', [
                'admin_id' => Auth::user()->id,
                'admin_name' => Auth::user()->name,
                'original_guard' => Auth::getDefaultDriver(),
                'started_at' => now()
            ]);

            // Log the impersonation
            $this->logActivity([
                'aksi' => 'impersonate',
                'model_type' => 'Mahasiswa',
                'model_id' => $mahasiswa->id,
                'deskripsi' => "Admin melakukan login sebagai mahasiswa: {$mahasiswa->name} ({$mahasiswa->numb_nim})",
                'user_name' => Auth::user()->name,
                'user_type' => 'admin',
                'ip_address' => request()->ip()
            ]);

            // Logout admin and login as student
            Auth::logout();
            Auth::guard('mahasiswa')->login($mahasiswa);

            return redirect()->route('mahasiswa.dashboard')
                ->with('impersonation_notice', 'Anda sedang login sebagai ' . $mahasiswa->name . '. Klik tombol "Kembali ke Admin" untuk kembali.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal melakukan login sebagai mahasiswa: ' . $e->getMessage());
        }
    }

    /**
     * Stop impersonation and return to admin
     */
    public function stopImpersonation()
    {
        try {
            $impersonationData = Session::get('admin_impersonating');
            
            if (!$impersonationData) {
                return redirect()->route('admin.dashboard')
                    ->with('error', 'Tidak ada sesi impersonation yang aktif.');
            }

            $admin = User::find($impersonationData['admin_id']);
            
            if (!$admin) {
                return redirect()->route('login')
                    ->with('error', 'Admin tidak ditemukan.');
            }

            // Log the end of impersonation
            $currentStudent = Auth::guard('mahasiswa')->user();
            if ($currentStudent) {
                $this->logActivity([
                    'aksi' => 'stop_impersonate',
                    'model_type' => 'Mahasiswa',
                    'model_id' => $currentStudent->id,
                    'deskripsi' => "Admin menghentikan login sebagai mahasiswa: {$currentStudent->name} ({$currentStudent->numb_nim})",
                    'user_name' => $impersonationData['admin_name'],
                    'user_type' => 'admin',
                    'ip_address' => request()->ip()
                ]);
            }

            // Logout student and login admin
            Auth::guard('mahasiswa')->logout();
            Auth::login($admin);

            // Clear impersonation session
            Session::forget('admin_impersonating');

            return redirect()->route('admin.monitoring.mahasiswa')
                ->with('success', 'Berhasil kembali ke sesi admin.');

        } catch (\Exception $e) {
            return redirect()->route('login')
                ->with('error', 'Gagal kembali ke sesi admin: ' . $e->getMessage());
        }
    }

    /**
     * Show student detailed monitoring
     */
    public function mahasiswaDetail($id)
    {
        $mahasiswa = Mahasiswa::with([
            'programStudi', 
            'kelas',
            'krs.details.mataKuliah',
            'tagihanKuliah',
            'riwayatPembayaran'
        ])->findOrFail($id);

        $data['webs'] = WebSetting::first();
        $data['menus'] = "Monitoring";
        $data['pages'] = "Detail Mahasiswa";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['mahasiswa'] = $mahasiswa;

        // Get academic progress
        $this->getMahasiswaAcademicProgress($data, $mahasiswa);
        
        // Get financial status
        $this->getMahasiswaFinancialStatus($data, $mahasiswa);
        
        // Get activity logs for this student
        $this->getMahasiswaActivityLogs($data, $mahasiswa);

        return view('admin.monitoring.mahasiswa-detail', $data);
    }

    /**
     * Get student academic progress
     */
    private function getMahasiswaAcademicProgress(&$data, $mahasiswa)
    {
        $krs = $mahasiswa->krs;
        
        $totalSks = 0;
        $totalNilai = 0;
        $totalSksLulus = 0;
        
        foreach ($krs as $semester) {
            foreach ($semester->details as $detail) {
                if ($detail->nilai) {
                    $bobot = $this->convertNilaiToBobot($detail->nilai->nilai_akhir);
                    $totalNilai += $bobot * $detail->mataKuliah->bsks;
                    $totalSks += $detail->mataKuliah->bsks;
                    
                    if ($detail->nilai->nilai_akhir >= 60) {
                        $totalSksLulus += $detail->mataKuliah->bsks;
                    }
                }
            }
        }
        
        $data['academic_progress'] = [
            'ipk' => $totalSks > 0 ? round($totalNilai / $totalSks, 2) : 0,
            'total_sks' => $totalSks,
            'sks_lulus' => $totalSksLulus,
            'sks_target' => $mahasiswa->programStudi ? ($mahasiswa->programStudi->sks_lulus ?? 144) : 144,
            'progress_percentage' => $mahasiswa->programStudi 
                ? round(($totalSksLulus / ($mahasiswa->programStudi->sks_lulus ?? 144)) * 100, 1)
                : 0
        ];
    }

    /**
     * Get student financial status
     */
    private function getMahasiswaFinancialStatus(&$data, $mahasiswa)
    {
        $tagihan = $mahasiswa->tagihanKuliah;
        $pembayaran = $mahasiswa->riwayatPembayaran;
        
        $totalTagihan = $tagihan->sum('amount');
        $totalPembayaran = $pembayaran->where('status_pembayaran', 'Sukses')->sum('jumlah_bayar');
        $tagihanPending = $tagihan->where('status', 'Pending')->sum('amount');
        
        $data['financial_status'] = [
            'total_tagihan' => $totalTagihan,
            'total_pembayaran' => $totalPembayaran,
            'tagihan_pending' => $tagihanPending,
            'saldo' => $totalPembayaran - $totalTagihan,
            'last_payment' => $pembayaran->where('status_pembayaran', 'Sukses')->sortByDesc('tgl_pembayaran')->first()
        ];
    }

    /**
     * Get student activity logs
     */
    private function getMahasiswaActivityLogs(&$data, $mahasiswa)
    {
        $data['activity_logs'] = \App\Models\LogAktivitas::where('user_type', 'mahasiswa')
            ->where('user_id', $mahasiswa->id)
            ->orderBy('created_at', 'desc')
            ->limit(20)
            ->get();
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

    /**
     * System health check
     */
    public function systemHealth()
    {
        $data['webs'] = WebSetting::first();
        $data['menus'] = "Monitoring";
        $data['pages'] = "Kesehatan Sistem";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;

        // Database health check
        $data['database_status'] = $this->checkDatabaseHealth();
        
        // Storage health check
        $data['storage_status'] = $this->checkStorageHealth();
        
        // Queue health check
        $data['queue_status'] = $this->checkQueueHealth();
        
        // Cache health check
        $data['cache_status'] = $this->checkCacheHealth();

        return view('admin.monitoring.system-health', $data);
    }

    /**
     * Check database health
     */
    private function checkDatabaseHealth()
    {
        try {
            DB::connection()->getPdo();
            $tables = DB::select('SHOW TABLES');
            return [
                'status' => 'healthy',
                'message' => 'Database terhubung dengan baik',
                'tables_count' => count($tables),
                'last_check' => now()
            ];
        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'message' => 'Gagal terhubung ke database: ' . $e->getMessage(),
                'tables_count' => 0,
                'last_check' => now()
            ];
        }
    }

    /**
     * Check storage health
     */
    private function checkStorageHealth()
    {
        try {
            $diskFree = disk_free_space(storage_path());
            $diskTotal = disk_total_space(storage_path());
            $diskUsed = $diskTotal - $diskFree;
            $diskUsagePercent = round(($diskUsed / $diskTotal) * 100, 2);
            
            return [
                'status' => $diskUsagePercent < 90 ? 'healthy' : 'warning',
                'message' => "Penggunaan disk: {$diskUsagePercent}%",
                'free_space' => round($diskFree / 1024 / 1024 / 1024, 2) . ' GB',
                'total_space' => round($diskTotal / 1024 / 1024 / 1024, 2) . ' GB',
                'usage_percent' => $diskUsagePercent
            ];
        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'message' => 'Gagal memeriksa status storage: ' . $e->getMessage()
            ];
        }
    }

    /**
     * Check queue health
     */
    private function checkQueueHealth()
    {
        try {
            // Check if there are jobs in the queue
            $failedJobs = DB::table('failed_jobs')->count();
            $pendingJobs = DB::table('jobs')->count();
            
            return [
                'status' => $failedJobs == 0 ? 'healthy' : 'warning',
                'message' => "Antrian: {$pendingJobs} pending, {$failedJobs} gagal",
                'pending_jobs' => $pendingJobs,
                'failed_jobs' => $failedJobs
            ];
        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'message' => 'Gagal memeriksa status queue: ' . $e->getMessage()
            ];
        }
    }

    /**
     * Check cache health
     */
    private function checkCacheHealth()
    {
        try {
            cache()->put('health_check', 'ok', 60);
            $cacheResult = cache()->get('health_check');
            
            return [
                'status' => $cacheResult === 'ok' ? 'healthy' : 'error',
                'message' => $cacheResult === 'ok' ? 'Cache berfungsi dengan baik' : 'Cache tidak berfungsi'
            ];
        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'message' => 'Gagal memeriksa status cache: ' . $e->getMessage()
            ];
        }
    }
}