<?php

namespace App\Http\Controllers\Master\Akademik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Use System
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
// Use Models
use App\Models\Akademik\WaktuKuliah;
use App\Models\Akademik\JenisKelas;
use App\Models\Pengaturan\WebSetting;

class WaktuKuliahController extends Controller
{
    public function renderWaktuKuliah()
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Waktu Kuliah";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['waktu_kuliah'] = WaktuKuliah::with('jenisKelas')->get();
        $data['jenis_kelas'] = JenisKelas::where('status', 'Aktif')->get();
        
        return view('master.akademik.waktu-kuliah-index', $data, compact('user'));
    }

    public function handleWaktuKuliah(Request $request)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'name' => 'required|string|max:255',
                'jenis_kelas_id' => 'required|integer',
                'time_start' => 'required|date_format:H:i',
                'time_ended' => 'required|date_format:H:i|after:time_start',
            ]);

            // Generate unique code
            $code = 'JK-' . Str::random(8);
            
            // Create new WaktuKuliah
            WaktuKuliah::create([
                'name' => $request->name,
                'code' => $code,
                'jenis_kelas_id' => $request->jenis_kelas_id,
                'time_start' => $request->time_start,
                'time_ended' => $request->time_ended,
                'created_by' => Auth::id(),
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Waktu Kuliah berhasil ditambahkan');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal menambahkan Waktu Kuliah: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function updateWaktuKuliah(Request $request, $code)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'name' => 'required|string|max:255',
                'jenis_kelas_id' => 'required|integer',
                'time_start' => 'required|date_format:H:i',
                'time_ended' => 'required|date_format:H:i|after:time_start',
            ]);

            $waktuKuliah = WaktuKuliah::where('code', $code)->firstOrFail();

            $waktuKuliah->update([
                'name' => $request->name,
                'jenis_kelas_id' => $request->jenis_kelas_id,
                'time_start' => $request->time_start,
                'time_ended' => $request->time_ended,
                'updated_by' => Auth::id(),
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Waktu Kuliah berhasil diperbarui');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal memperbarui Waktu Kuliah: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function deleteWaktuKuliah($code)
    {
        try {
            DB::beginTransaction();

            $waktuKuliah = WaktuKuliah::where('code', $code)->firstOrFail();

            // Optional: Add check if WaktuKuliah has related JadwalKuliah before deleting
            if ($waktuKuliah->jadwalKuliah()->count() > 0) {
                return redirect()->back()->with('error', 'Tidak dapat menghapus Waktu Kuliah yang masih memiliki Jadwal Kuliah');
            }

            $waktuKuliah->update([
                'deleted_by' => Auth::id()
            ]);
            $waktuKuliah->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Waktu Kuliah berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus Waktu Kuliah: ' . $e->getMessage());
        }
    }
}
