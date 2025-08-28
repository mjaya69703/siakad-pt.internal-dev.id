<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
use App\Models\Pengaturan\WebSetting;

// Services
use App\Services\EnhancedBillingService;
use App\Services\DashboardService;

class DashboardController extends Controller
{
    protected $billingService;
    protected $dashboardService;

    public function __construct(EnhancedBillingService $billingService, DashboardService $dashboardService)
    {
        $this->billingService = $billingService;
        $this->dashboardService = $dashboardService;
    }

    /**
     * Main Dashboard - Leadership Dashboard
     */
    public function index(Request $request)
    {
        $user = Auth::user() ?: Auth::guard('dosen')->user() ?: Auth::guard('mahasiswa')->user();
        
        // Get active academic year or current year
        $activeTahunAkademik = TahunAkademik::where('is_active', true)->first();
        $selectedTahunAkademik = $request->get('tahun_akademik_id', $activeTahunAkademik->id ?? null);
        
        if ($selectedTahunAkademik) {
            $currentTahunAkademik = TahunAkademik::find($selectedTahunAkademik);
        } else {
            $currentTahunAkademik = $activeTahunAkademik ?? TahunAkademik::latest()->first();
        }

        $data = [
            'spref' => $user ? $user->prefix : '',
            'menus' => "Dashboard",
            'pages' => "Dashboard Pimpinan",
            'webs' => WebSetting::first(),
            'tahunAkademiks' => TahunAkademik::orderBy('tahun', 'desc')->get(),
            'currentTahunAkademik' => $currentTahunAkademik,
        ];

        if ($data['webs']) {
            $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        } else {
            $data['academy'] = "SIAKAD PT by Neco Academy";
        }

        // Get dashboard metrics
        $dashboardData = $this->getDashboardMetrics($currentTahunAkademik);

        return view('dashboard.leadership-dashboard', array_merge($data, $dashboardData), compact('user'));
    }

    /**
     * Get comprehensive dashboard metrics
     */
    private function getDashboardMetrics($tahunAkademik)
    {
        $tahunAkademikId = $tahunAkademik->id ?? null;
        
        // Use cached dashboard service for better performance
        $dashboardData = $this->dashboardService->getCachedDashboardData($tahunAkademikId);
        
        // Add general statistics
        $dashboardData['generalStats'] = $this->getGeneralStatistics();
        
        return $dashboardData;
    }

    /**
     * API endpoint for refreshing dashboard data
     */
    public function refreshData(Request $request)
    {
        $tahunAkademikId = $request->get('tahun_akademik_id');
        
        // Clear cache for fresh data
        $this->dashboardService->clearDashboardCache($tahunAkademikId);
        
        $currentTahunAkademik = TahunAkademik::find($tahunAkademikId);
        $dashboardData = $this->dashboardService->getCachedDashboardData($tahunAkademikId);
        
        return response()->json([
            'success' => true,
            'data' => $dashboardData,
            'lastUpdated' => Carbon::now()->format('d F Y, H:i:s'),
        ]);
    }

    /**
     * Get general statistics
     */
    private function getGeneralStatistics()
    {
        return [
            'lastUpdated' => Carbon::now()->format('d F Y, H:i:s'),
            'systemStatus' => 'active',
        ];
    }
}