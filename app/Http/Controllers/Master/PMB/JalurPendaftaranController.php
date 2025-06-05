<?php

namespace App\Http\Controllers\Master\PMB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Use System
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
// Use Models
use App\Models\PMB\JalurPendaftaran;
use App\Models\PMB\PeriodePendaftaran;
use App\Models\Pengaturan\WebSetting;
// Use Plugins

class JalurPendaftaranController extends Controller
{
    public function renderJalur()
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Jalur Pendaftaran";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['jalurs'] = JalurPendaftaran::with('periode')->get();
        $data['periodes'] = PeriodePendaftaran::all();
        
        return view('master.pmb.jalur-index', $data, compact('user'));
    }

    public function handleJalur(Request $request)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'name' => 'required|string|max:255',
                'periode_id' => 'required|integer|exists:periode_pendaftarans,id',
                'desc' => 'nullable|string',
            ]);

            // Generate unique code
            $code = 'JAL-' . Str::random(8); 
            
            // Create new JalurPendaftaran
            JalurPendaftaran::create([
                'name' => $request->name,
                'code' => $code,
                'periode_id' => $request->periode_id,
                'desc' => $request->desc,
                'created_by' => Auth::id(),
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Jalur Pendaftaran berhasil ditambahkan');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal menambahkan Jalur Pendaftaran: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function updateJalur(Request $request, $code)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'name' => 'required|string|max:255',
                'periode_id' => 'required|integer|exists:periode_pendaftarans,id',
                'desc' => 'nullable|string',
            ]);

            $jalur = JalurPendaftaran::where('code', $code)->firstOrFail();

            $jalur->update([
                'name' => $request->name,
                'periode_id' => $request->periode_id,
                'desc' => $request->desc,
                'updated_by' => Auth::id(),
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Jalur Pendaftaran berhasil diperbarui');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal memperbarui Jalur Pendaftaran: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function deleteJalur($code)
    {
        try {
            DB::beginTransaction();

            $jalur = JalurPendaftaran::where('code', $code)->firstOrFail();

            // Optional: Add check if Jalur has related data before deleting
            if ($jalur->pendaftar()->count() > 0) {
                return redirect()->back()->with('error', 'Tidak dapat menghapus Jalur Pendaftaran yang masih memiliki data pendaftar');
            }

            $jalur->update([
                'deleted_by' => Auth::id()
            ]);
            $jalur->delete(); 

            DB::commit();
            return redirect()->back()->with('success', 'Jalur Pendaftaran berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus Jalur Pendaftaran: ' . $e->getMessage());
        }
    }
}
