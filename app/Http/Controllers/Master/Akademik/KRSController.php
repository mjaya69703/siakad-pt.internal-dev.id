<?php

namespace App\Http\Controllers\Master\Akademik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Use System
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
// Use Models
use App\Models\Akademik\KRS;
use App\Models\Akademik\KrsDetail;
use App\Models\Akademik\MataKuliah;
use App\Models\Akademik\Kelas;
use App\Models\Akademik\TahunAkademik;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Pengaturan\WebSetting;
// Use Plugins
use Alert;

class KRSController extends Controller
{
    public function renderKRS()
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "KRS (Kartu Rencana Studi)";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;

        $data['krs_list'] = KRS::with(['mahasiswa', 'tahunAkademik', 'dosenPA'])
            ->latest()
            ->paginate(20);
        $data['tahun_akademik'] = TahunAkademik::all();
        $data['mahasiswa'] = Mahasiswa::where('type', 1)->get(); // Mahasiswa Aktif
        $data['dosens'] = Dosen::where('type', 1)->get(); // Dosen Aktif

        return view('master.akademik.krs-index', $data, compact('user'));
    }

    public function viewKRS($code)
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Detail KRS";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;

        $data['krs'] = KRS::with(['mahasiswa', 'tahunAkademik', 'dosenPA', 'details.mataKuliah', 'details.kelas', 'details.dosen'])
            ->where('code', $code)
            ->firstOrFail();

        $data['available_matakuliah'] = MataKuliah::where('prodi_id', $data['krs']->mahasiswa->prodi_id)->get();
        $data['kelas'] = Kelas::all();
        $data['dosens'] = Dosen::where('type', 1)->get();

        return view('master.akademik.krs-detail', $data, compact('user'));
    }

    public function handleKRS(Request $request)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'mahasiswa_id' => 'required|exists:mahasiswas,id',
                'tahun_akademik_id' => 'required|exists:tahun_akademiks,id',
                'semester' => 'required|integer|min:1|max:14',
                'dosen_pa_id' => 'nullable|exists:dosens,id',
                'periode_mulai' => 'nullable|date',
                'periode_selesai' => 'nullable|date|after:periode_mulai',
                'notes' => 'nullable|string',
            ]);

            // Cek apakah KRS untuk mahasiswa, tahun akademik, dan semester ini sudah ada
            $existingKRS = KRS::where('mahasiswa_id', $request->mahasiswa_id)
                ->where('taka_id', $request->tahun_akademik_id)
                ->where('semester', $request->semester)
                ->first();

            if ($existingKRS) {
                Alert::error('Error', 'KRS untuk mahasiswa, tahun akademik, dan semester ini sudah ada');
                return redirect()->back()->withInput();
            }

            // Ambil IPK semester sebelumnya
            $mahasiswa = Mahasiswa::find($request->mahasiswa_id);
            $ipkSebelumnya = $this->getIPKSebelumnya($mahasiswa->id, $request->semester);

            $krs = KRS::create([
                'code' => 'KRS-' . date('Ymd') . '-' . $mahasiswa->code . '-S' . $request->semester,
                'mahasiswa_id' => $request->mahasiswa_id,
                'taka_id' => $request->tahun_akademik_id,
                'semester' => $request->semester,
                'dosen_pa_id' => $request->dosen_pa_id,
                'periode_mulai' => $request->periode_mulai,
                'periode_selesai' => $request->periode_selesai,
                'notes' => $request->notes,
                'ipk_sebelumnya' => $ipkSebelumnya,
                'max_sks' => $this->hitungBatasSKS($ipkSebelumnya),
                'created_by' => Auth::id(),
            ]);

            DB::commit();
            Alert::success('Success', 'KRS berhasil dibuat');
            return redirect()->route(Auth::user()->prefix . 'akademik.krs-view', $krs->code);

        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Error', 'Gagal membuat KRS: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function updateKRS(Request $request, $code)
    {
        try {
            DB::beginTransaction();

            $krs = KRS::where('code', $code)->firstOrFail();

            // Cek apakah KRS masih bisa diedit
            if (!$krs->is_editable) {
                Alert::error('Error', 'KRS tidak dapat diedit karena sudah disetujui atau dikunci');
                return redirect()->back();
            }

            $request->validate([
                'dosen_pa_id' => 'nullable|exists:dosens,id',
                'periode_mulai' => 'nullable|date',
                'periode_selesai' => 'nullable|date|after:periode_mulai',
                'notes' => 'nullable|string',
                'status' => 'nullable|in:Draft,Diajukan,Disetujui,Ditolak',
            ]);

            $krs->update([
                'dosen_pa_id' => $request->dosen_pa_id,
                'periode_mulai' => $request->periode_mulai,
                'periode_selesai' => $request->periode_selesai,
                'notes' => $request->notes,
                'status' => $request->status ?? $krs->status,
                'updated_by' => Auth::id(),
            ]);

            DB::commit();
            Alert::success('Success', 'KRS berhasil diperbarui');
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Error', 'Gagal memperbarui KRS: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function addMatakuliah(Request $request, $code)
    {
        try {
            DB::beginTransaction();

            $krs = KRS::where('code', $code)->firstOrFail();

            // Cek apakah KRS masih bisa diedit
            if (!$krs->is_editable) {
                Alert::error('Error', 'KRS tidak dapat diedit');
                return redirect()->back();
            }

            $request->validate([
                'mata_kuliah_id' => 'required|exists:mata_kuliahs,id',
                'kelas_id' => 'nullable|exists:kelas,id',
                'dosen_id' => 'nullable|exists:dosens,id',
                'notes' => 'nullable|string',
            ]);

            // Cek apakah mata kuliah sudah diambil
            $existingDetail = KrsDetail::where('krs_id', $krs->id)
                ->where('matkul_id', $request->mata_kuliah_id)
                ->where('status', 'Aktif')
                ->first();

            if ($existingDetail) {
                Alert::error('Error', 'Mata kuliah sudah diambil dalam KRS ini');
                return redirect()->back();
            }

            $mataKuliah = MataKuliah::find($request->mata_kuliah_id);

            // Cek batas SKS
            if (!$krs->canAddMatakuliah($mataKuliah->sks)) {
                Alert::error('Error', 'Menambah mata kuliah ini akan melebihi batas SKS yang diizinkan (' . $krs->batas_sks . ' SKS)');
                return redirect()->back();
            }

            // Cek prasyarat (implementasi sederhana)
            // TODO: Implementasi logic prasyarat yang lebih kompleks

            KrsDetail::create([
                'code' => 'KRSD-' . date('Ymd') . '-' . Str::random(6),
                'krs_id' => $krs->id,
                'matkul_id' => $request->mata_kuliah_id,
                'kelas_id' => $request->kelas_id,
                'dosen_id' => $request->dosen_id,
                'sks' => $mataKuliah->sks,
                'notes' => $request->notes,
                'prasyarat_terpenuhi' => true, // TODO: Implementasi cek prasyarat
                'created_by' => Auth::id(),
            ]);

            DB::commit();
            Alert::success('Success', 'Mata kuliah berhasil ditambahkan ke KRS');
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Error', 'Gagal menambahkan mata kuliah: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function removeMatakuliah($code, $detailId)
    {
        try {
            DB::beginTransaction();

            $krs = KRS::where('code', $code)->firstOrFail();
            $krsDetail = KrsDetail::where('id', $detailId)
                ->where('krs_id', $krs->id)
                ->firstOrFail();

            // Cek apakah KRS masih bisa diedit
            if (!$krs->is_editable) {
                Alert::error('Error', 'KRS tidak dapat diedit');
                return redirect()->back();
            }

            $krsDetail->delete();

            DB::commit();
            Alert::success('Success', 'Mata kuliah berhasil dihapus dari KRS');
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Error', 'Gagal menghapus mata kuliah: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function approveKRS(Request $request, $code)
    {
        try {
            DB::beginTransaction();

            $krs = KRS::where('code', $code)->firstOrFail();

            if (!$krs->is_approvable) {
                Alert::error('Error', 'KRS tidak dapat disetujui');
                return redirect()->back();
            }

            $request->validate([
                'notes' => 'nullable|string',
                'dosen_pa_id' => 'nullable|exists:dosens,id',
            ]);

            $krs->approve($request->dosen_pa_id, $request->notes);

            DB::commit();
            Alert::success('Success', 'KRS berhasil disetujui');
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Error', 'Gagal menyetujui KRS: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function rejectKRS(Request $request, $code)
    {
        try {
            DB::beginTransaction();

            $krs = KRS::where('code', $code)->firstOrFail();

            if (!$krs->is_approvable) {
                Alert::error('Error', 'KRS tidak dapat ditolak');
                return redirect()->back();
            }

            $request->validate([
                'notes' => 'required|string',
            ]);

            $krs->reject($request->notes);

            DB::commit();
            Alert::success('Success', 'KRS berhasil ditolak');
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Error', 'Gagal menolak KRS: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function deleteKRS($code)
    {
        try {
            DB::beginTransaction();

            $krs = KRS::where('code', $code)->firstOrFail();

            // Hanya bisa hapus jika status Draft
            if ($krs->status !== 'Draft') {
                Alert::error('Error', 'Hanya KRS dengan status Draft yang dapat dihapus');
                return redirect()->back();
            }

            $krs->delete();

            DB::commit();
            Alert::success('Success', 'KRS berhasil dihapus');
            return redirect()->route(Auth::user()->prefix . 'akademik.krs-render');

        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Error', 'Gagal menghapus KRS: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function detailKRS($code)
    {
        // Redirect to viewKRS since they serve the same purpose
        return $this->viewKRS($code);
    }

    // HELPER METHODS
    private function getIPKSebelumnya($mahasiswaId, $semester)
    {
        if ($semester <= 1) {
            return 0.00;
        }

        // Ambil KHS semester sebelumnya
        $khsSebelumnya = \App\Models\Akademik\KHS::byMahasiswa($mahasiswaId)
            ->where('semester', $semester - 1)
            ->orderBy('semester', 'desc')
            ->first();

        return $khsSebelumnya ? $khsSebelumnya->ipk : 0.00;
    }

    private function hitungBatasSKS($ipk)
    {
        if ($ipk >= 3.50) {
            return 24;
        } elseif ($ipk >= 3.00) {
            return 22;
        } elseif ($ipk >= 2.50) {
            return 20;
        } elseif ($ipk >= 2.00) {
            return 18;
        } else {
            return 15;
        }
    }
}
