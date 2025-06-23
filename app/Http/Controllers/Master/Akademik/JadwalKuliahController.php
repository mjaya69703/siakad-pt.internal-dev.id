<?php

namespace App\Http\Controllers\Master\Akademik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Use System
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
// Use Models
use App\Models\Akademik\JadwalKuliah;
use App\Models\Akademik\MataKuliah;
use App\Models\Akademik\Kelas;
use App\Models\Akademik\JenisKelas;
use App\Models\Akademik\WaktuKuliah;
use App\Models\Dosen;
use App\Models\Infrastruktur\Ruang;
use App\Models\Pengaturan\WebSetting;
// Use Plugins

class JadwalKuliahController extends Controller
{
    public function renderJadwalKuliah()
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Jadwal Kuliah";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        
        // Load all data with relationships
        $data['jadwal_kuliah'] = JadwalKuliah::with(['kelas', 'dosen', 'ruang', 'mataKuliah', 'jenisKelas', 'waktuKuliah'])->get();
        $data['mata_kuliah'] = MataKuliah::all();
        $data['kelas'] = Kelas::all();
        $data['jenis_kelas'] = JenisKelas::all();
        $data['waktu_kuliah'] = WaktuKuliah::all();
        $data['dosen'] = Dosen::all();
        $data['ruang'] = Ruang::all();
        
        return view('master.akademik.jadwal-kuliah-index', $data, compact('user'));
    }
    
    public function handleJadwalKuliah(Request $request)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'dosen_id' => 'required|integer',
                'ruang_id' => 'required|integer',
                'matkul_id' => 'required|integer',
                'jenis_kelas_id' => 'required|integer',
                'waktu_kuliah_id' => 'required|integer',
                'bsks' => 'required|integer|min:1|max:6',
                'pertemuan' => 'required|integer|min:1',
                'hari' => 'required|string',
                'metode' => 'required|string|in:Tatap Muka,Teleconference',
                'tanggal' => 'required|date',
                'link' => 'nullable|url',
                'kelas_ids' => 'required|array',
                'kelas_ids.*' => 'required|integer|exists:kelas,id',
            ]);

            // Validate waktu kuliah belongs to jenis kelas
            $jenisKelas = JenisKelas::with('waktuKuliah')->findOrFail($request->jenis_kelas_id);
            if (!$jenisKelas->waktuKuliah->contains($request->waktu_kuliah_id)) {
                throw new \Exception('Waktu kuliah tidak sesuai dengan jenis kelas yang dipilih');
            }

            // Generate unique code
            $code = 'JDW-' . Str::random(8);
            
            // Create new JadwalKuliah
            $jadwalKuliah = JadwalKuliah::create([
                'code' => $code,
                'dosen_id' => $request->dosen_id,
                'ruang_id' => $request->ruang_id,
                'matkul_id' => $request->matkul_id,
                'jenis_kelas_id' => $request->jenis_kelas_id,
                'waktu_kuliah_id' => $request->waktu_kuliah_id,
                'bsks' => $request->bsks,
                'pertemuan' => $request->pertemuan,
                'hari' => $request->hari,
                'metode' => $request->metode,
                'tanggal' => $request->tanggal,
                'link' => $request->link,
                'created_by' => Auth::id(),
            ]);

            // Attach classes
            $jadwalKuliah->kelas()->attach($request->kelas_ids);

            DB::commit();
            return redirect()->back()->with('success', 'Jadwal Kuliah berhasil ditambahkan');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal menambahkan Jadwal Kuliah: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function updateJadwalKuliah(Request $request, $code)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'dosen_id' => 'required|integer',
                'ruang_id' => 'required|integer',
                'matkul_id' => 'required|integer',
                'jenis_kelas_id' => 'required|integer',
                'waktu_kuliah_id' => 'required|integer',
                'bsks' => 'required|integer|min:1|max:6',
                'pertemuan' => 'required|integer|min:1',
                'hari' => 'required|string',
                'metode' => 'required|string|in:Tatap Muka,Teleconference',
                'tanggal' => 'required|date',
                'link' => 'nullable|url',
                'kelas_ids' => 'required|array',
                'kelas_ids.*' => 'required|integer|exists:kelas,id',
            ]);

            // Validate waktu kuliah belongs to jenis kelas
            $jenisKelas = JenisKelas::with('waktuKuliah')->findOrFail($request->jenis_kelas_id);
            if (!$jenisKelas->waktuKuliah->contains($request->waktu_kuliah_id)) {
                throw new \Exception('Waktu kuliah tidak sesuai dengan jenis kelas yang dipilih');
            }

            $jadwalKuliah = JadwalKuliah::where('code', $code)->firstOrFail();

            $jadwalKuliah->update([
                'dosen_id' => $request->dosen_id,
                'ruang_id' => $request->ruang_id,
                'matkul_id' => $request->matkul_id,
                'jenis_kelas_id' => $request->jenis_kelas_id,
                'waktu_kuliah_id' => $request->waktu_kuliah_id,
                'bsks' => $request->bsks,
                'pertemuan' => $request->pertemuan,
                'hari' => $request->hari,
                'metode' => $request->metode,
                'tanggal' => $request->tanggal,
                'link' => $request->link,
                'updated_by' => Auth::id(),
            ]);

            // Sync classes
            $jadwalKuliah->kelas()->sync($request->kelas_ids);

            DB::commit();
            return redirect()->back()->with('success', 'Jadwal Kuliah berhasil diperbarui');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal memperbarui Jadwal Kuliah: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function deleteJadwalKuliah($code)
    {
        try {
            DB::beginTransaction();

            $jadwalKuliah = JadwalKuliah::where('code', $code)->firstOrFail();

            // Detach classes first
            $jadwalKuliah->kelas()->detach();

            $jadwalKuliah->update([
                'deleted_by' => Auth::id()
            ]);
            $jadwalKuliah->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Jadwal Kuliah berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus Jadwal Kuliah: ' . $e->getMessage());
        }
    }
}
