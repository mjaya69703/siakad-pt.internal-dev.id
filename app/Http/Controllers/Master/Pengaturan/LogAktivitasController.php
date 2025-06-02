<?php

namespace App\Http\Controllers\Master\Pengaturan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Use System
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// Use Models
use App\Models\Pengaturan\LogAktivitas;
use App\Models\Pengaturan\WebSetting;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Dosen;
// Use Plugins

class LogAktivitasController extends Controller
{
    public function renderLogAktivitas()
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Log Aktivitas";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;

        // Get all logs with relationships
        $data['logs'] = LogAktivitas::with('user')
            ->latest()
            ->get();
        
        // Get stats
        $data['totalLogs'] = $data['logs']->count();
        $data['userLogs'] = $data['logs']->where('user_type', 'user')->count();
        $data['mahasiswaLogs'] = $data['logs']->where('user_type', 'mahasiswa')->count();
        $data['dosenLogs'] = $data['logs']->where('user_type', 'dosen')->count();
        
        return view('master.pengaturan.log-aktivitas-index', $data, compact('user'));
    }

    public function viewLogAktivitas($id)
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Detail Log Aktivitas";
        $data['academy'] = "Siakad PT by Esec Academy";
        
        $data['log'] = LogAktivitas::with('user')
            ->findOrFail($id);
            
        // Get related logs for the same model
        $data['relatedLogs'] = LogAktivitas::with('user')
            ->where('model_type', $data['log']->model_type)
            ->where('model_id', $data['log']->model_id)
            ->where('id', '!=', $id)
            ->latest()
            ->take(5)
            ->get();
        
        return view('master.pengaturan.log-aktivitas-view', $data, compact('user'));
    }

    public function filterLogAktivitas(Request $request)
    {
        try {
            $user = Auth::user();
            $data['webs'] = WebSetting::first();
            $data['spref'] = $user ? $user->prefix : '';
            $data['menus'] = "Master";
            $data['pages'] = "Log Aktivitas";
            $data['academy'] = "Siakad PT by Esec Academy";

            $query = LogAktivitas::with('user');

            // Filter by user type
            if ($request->filled('user_type')) {
                $query->where('user_type', $request->user_type);
            }

            // Filter by action
            if ($request->filled('action')) {
                $query->where('action', $request->action);
            }

            // Filter by date range
            if ($request->filled('start_date') && $request->filled('end_date')) {
                $query->whereBetween('created_at', [
                    $request->start_date . ' 00:00:00',
                    $request->end_date . ' 23:59:59'
                ]);
            }

            // Filter by model type
            if ($request->filled('model_type')) {
                $query->where('model_type', $request->model_type);
            }

            $data['logs'] = $query->latest()->get();
            
            // Get stats
            $data['totalLogs'] = $data['logs']->count();
            $data['userLogs'] = $data['logs']->where('user_type', 'user')->count();
            $data['mahasiswaLogs'] = $data['logs']->where('user_type', 'mahasiswa')->count();
            $data['dosenLogs'] = $data['logs']->where('user_type', 'dosen')->count();

            return view('master.pengaturan.log-aktivitas-index', $data, compact('user'));

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal memfilter log: ' . $e->getMessage());
        }
    }

    public function deleteLogAktivitas($id)
    {
        try {
            DB::beginTransaction();

            $log = LogAktivitas::findOrFail($id);
            
            // Only allow deletion of logs older than 30 days
            if (now()->diffInDays($log->created_at) < 30) {
                return redirect()->back()->with('error', 'Log aktivitas hanya dapat dihapus setelah 30 hari');
            }

            $log->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Log aktivitas berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus log: ' . $e->getMessage());
        }
    }
}
