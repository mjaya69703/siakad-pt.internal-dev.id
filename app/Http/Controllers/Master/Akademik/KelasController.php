<?php

namespace App\Http\Controllers\Master\Akademik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Use System
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
// Use Models
use App\Models\Akademik\Kelas;
use App\Models\Akademik\TahunAkademik;
use App\Models\Akademik\ProgramStudi;
use App\Models\Akademik\JenisKelas;
use App\Models\Mahasiswa;
use App\Models\Pengaturan\WebSetting;

class KelasController extends Controller
{
    public function renderKelas()
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Kelas";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['kelas'] = Kelas::with(['tahunAkademik', 'programStudi', 'jenisKelas', 'ketua'])->get();
        $data['tahun_akademik'] = TahunAkademik::where('status', 'Aktif')->get();
        $data['program_studi'] = ProgramStudi::where('status', 'Aktif')->get();
        $data['jenis_kelas'] = JenisKelas::where('status', 'Aktif')->get();
        $data['mahasiswa'] = Mahasiswa::all();
        
        return view('master.akademik.kelas-index', $data, compact('user'));
    }

    public function handleKelas(Request $request)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'name' => 'required|string|max:255',
                'taka_id' => 'required|integer',
                'prodi_id' => 'required|integer',
                'jenis_kelas_id' => 'required|integer',
                'ketua_id' => 'nullable|integer',
                'capacity' => 'required|integer|min:1',
            ]);

            // Generate unique code
            $code = 'KLS-' . Str::random(8);
            
            // Create new Kelas
            Kelas::create([
                'name' => $request->name,
                'code' => $code,
                'taka_id' => $request->taka_id,
                'prodi_id' => $request->prodi_id,
                'jenis_kelas_id' => $request->jenis_kelas_id,
                'ketua_id' => $request->ketua_id,
                'capacity' => $request->capacity,
                'created_by' => Auth::id(),
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Kelas berhasil ditambahkan');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal menambahkan Kelas: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function updateKelas(Request $request, $code)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'name' => 'required|string|max:255',
                'taka_id' => 'required|integer',
                'prodi_id' => 'required|integer',
                'jenis_kelas_id' => 'required|integer',
                'ketua_id' => 'nullable|integer',
                'capacity' => 'required|integer|min:1',
            ]);

            $kelas = Kelas::where('code', $code)->firstOrFail();

            $kelas->update([
                'name' => $request->name,
                'taka_id' => $request->taka_id,
                'prodi_id' => $request->prodi_id,
                'jenis_kelas_id' => $request->jenis_kelas_id,
                'ketua_id' => $request->ketua_id,
                'capacity' => $request->capacity,
                'updated_by' => Auth::id(),
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Kelas berhasil diperbarui');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal memperbarui Kelas: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function deleteKelas($code)
    {
        try {
            DB::beginTransaction();

            $kelas = Kelas::where('code', $code)->firstOrFail();

            // Optional: Add check if Kelas has related JadwalKuliah before deleting
            if ($kelas->jadwalKuliah()->count() > 0) {
                return redirect()->back()->with('error', 'Tidak dapat menghapus Kelas yang masih memiliki Jadwal Kuliah');
            }

            $kelas->update([
                'deleted_by' => Auth::id()
            ]);
            $kelas->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Kelas berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus Kelas: ' . $e->getMessage());
        }
    }
}
