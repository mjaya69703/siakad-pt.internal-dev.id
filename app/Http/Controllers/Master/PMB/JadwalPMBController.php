<?php

namespace App\Http\Controllers\Master\PMB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Use System
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
// Use Models
use App\Models\PMB\JadwalPMB;
use App\Models\PMB\GelombangPendaftaran;
use App\Models\Pengaturan\WebSetting;
// Use Plugins

class JadwalPMBController extends Controller
{
    public function renderJadwal()
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Jadwal PMB";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['jadwals'] = JadwalPMB::with('gelombang')->get();
        $data['gelombangs'] = GelombangPendaftaran::all();
        
        return view('master.pmb.jadwal-index', $data, compact('user'));
    }

    public function handleJadwal(Request $request)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'name' => 'required|string|max:255',
                'type' => 'required|in:Pendaftaran,Tes,Wawancara,Pengumuman,Daftar Ulang',
                'gelombang_id' => 'required|exists:gelombang_pendaftarans,id',
                'start_date' => 'required|date',
                'ended_date' => 'required|date|after:start_date',
                'desc' => 'nullable|string',
            ]);

            // Generate unique code
            $code = 'JAD-' . Str::random(8);
            
            // Create new JadwalPMB
            JadwalPMB::create([
                'name' => $request->name,
                'code' => $code,
                'type' => $request->type,
                'gelombang_id' => $request->gelombang_id,
                'start_date' => $request->start_date,
                'ended_date' => $request->ended_date,
                'desc' => $request->desc,
                'created_by' => Auth::id(),
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Jadwal PMB berhasil ditambahkan');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal menambahkan Jadwal PMB: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function updateJadwal(Request $request, $code)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'name' => 'required|string|max:255',
                'type' => 'required|in:Pendaftaran,Tes,Wawancara,Pengumuman,Daftar Ulang',
                'gelombang_id' => 'required|exists:gelombang_pendaftarans,id',
                'start_date' => 'required|date',
                'ended_date' => 'required|date|after:start_date',
                'desc' => 'nullable|string',
            ]);

            $jadwal = JadwalPMB::where('code', $code)->firstOrFail();

            $jadwal->update([
                'name' => $request->name,
                'type' => $request->type,
                'gelombang_id' => $request->gelombang_id,
                'start_date' => $request->start_date,
                'ended_date' => $request->ended_date,
                'desc' => $request->desc,
                'updated_by' => Auth::id(),
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Jadwal PMB berhasil diperbarui');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal memperbarui Jadwal PMB: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function deleteJadwal($code)
    {
        try {
            DB::beginTransaction();

            $jadwal = JadwalPMB::where('code', $code)->firstOrFail();

            $jadwal->update([
                'deleted_by' => Auth::id()
            ]);
            $jadwal->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Jadwal PMB berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus Jadwal PMB: ' . $e->getMessage());
        }
    }
}
