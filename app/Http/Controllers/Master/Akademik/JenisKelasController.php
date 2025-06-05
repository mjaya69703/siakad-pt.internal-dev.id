<?php

namespace App\Http\Controllers\Master\Akademik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Use System
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
// Use Models
use App\Models\Akademik\JenisKelas;
use App\Models\Pengaturan\WebSetting;

class JenisKelasController extends Controller
{
    public function renderJenisKelas()
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Jenis Kelas";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['jenis_kelas'] = JenisKelas::all();
        
        return view('master.akademik.jenis-kelas-index', $data, compact('user'));
    }

    public function handleJenisKelas(Request $request)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'name' => 'required|string|max:255',
                'desc' => 'nullable|string',
            ]);

            // Generate unique code
            $code = 'JK-' . Str::random(8);
            
            // Create new JenisKelas
            JenisKelas::create([
                'name' => $request->name,
                'code' => $code,
                'desc' => $request->desc,
                'status' => 'Aktif',
                'created_by' => Auth::id(),
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Jenis Kelas berhasil ditambahkan');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal menambahkan Jenis Kelas: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function updateJenisKelas(Request $request, $code)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'name' => 'required|string|max:255',
                'desc' => 'nullable|string',
                'status' => 'required|in:Aktif,Tidak Aktif',
            ]);

            $jenisKelas = JenisKelas::where('code', $code)->firstOrFail();

            $jenisKelas->update([
                'name' => $request->name,
                'desc' => $request->desc,
                'status' => $request->status,
                'updated_by' => Auth::id(),
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Jenis Kelas berhasil diperbarui');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal memperbarui Jenis Kelas: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function deleteJenisKelas($code)
    {
        try {
            DB::beginTransaction();

            $jenisKelas = JenisKelas::where('code', $code)->firstOrFail();

            // Optional: Add check if JenisKelas has related Kelas before deleting
            if ($jenisKelas->kelas()->count() > 0) {
                return redirect()->back()->with('error', 'Tidak dapat menghapus Jenis Kelas yang masih memiliki Kelas');
            }

            $jenisKelas->update([
                'deleted_by' => Auth::id()
            ]);
            $jenisKelas->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Jenis Kelas berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus Jenis Kelas: ' . $e->getMessage());
        }
    }
}
