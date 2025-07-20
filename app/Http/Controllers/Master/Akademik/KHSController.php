<?php

namespace App\Http\Controllers\Master\Akademik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Use System
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
// Use Models
use App\Models\Akademik\KHS;
use App\Models\Akademik\Nilai;
use App\Models\Akademik\TahunAkademik;
use App\Models\Akademik\ProgramStudi;
use App\Models\Mahasiswa;
use App\Models\Pengaturan\WebSetting;
// Use Plugins
use Alert;
use PDF;

class KHSController extends Controller
{
    public function renderKHS()
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "KHS (Kartu Hasil Studi)";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;

        $data['khs_list'] = KHS::with(['mahasiswa', 'tahunAkademik'])
            ->latest()
            ->paginate(20);
        $data['tahun_akademik'] = TahunAkademik::all();
        $data['mahasiswa'] = Mahasiswa::where('type', 1)->get();
        $data['krs_list'] = \App\Models\Akademik\KRS::with(['mahasiswa', 'tahunAkademik'])->get();
        $data['program_studi'] = \App\Models\Akademik\ProgramStudi::all();

        return view('master.akademik.khs-index', $data, compact('user'));
    }

    public function viewKHS($code)
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Detail KHS";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;

        $data['khs'] = KHS::with(['mahasiswa', 'tahunAkademik', 'nilaiSemester.mataKuliah'])
            ->where('code', $code)
            ->firstOrFail();

        return view('master.akademik.khs-view', $data, compact('user'));
    }

    public function handleKHS(Request $request)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'mahasiswa_id' => 'required|exists:mahasiswas,id',
                'tahun_akademik_id' => 'required|exists:tahun_akademiks,id',
                'semester' => 'required|integer|min:1|max:14',
            ]);

            // Cek apakah KHS untuk kombinasi ini sudah ada
            $existingKHS = KHS::where('mahasiswa_id', $request->mahasiswa_id)
                ->where('taka_id', $request->tahun_akademik_id)
                ->where('semester', $request->semester)
                ->first();

            if ($existingKHS) {
                Alert::error('Error', 'KHS untuk mahasiswa, tahun akademik, dan semester ini sudah ada');
                return redirect()->back()->withInput();
            }

            // Cek apakah ada nilai yang sudah dipublish untuk semester ini
            $nilaiCount = Nilai::where('mahasiswa_id', $request->mahasiswa_id)
                ->where('taka_id', $request->tahun_akademik_id)
                ->where('semester', $request->semester)
                ->where('status', 'Published')
                ->count();

            if ($nilaiCount == 0) {
                Alert::error('Error', 'Tidak ada nilai yang sudah dipublish untuk semester ini');
                return redirect()->back()->withInput();
            }

            $mahasiswa = Mahasiswa::find($request->mahasiswa_id);

            $khs = KHS::create([
                'code' => 'KHS-' . date('Ymd') . '-' . $mahasiswa->code . '-S' . $request->semester,
                'mahasiswa_id' => $request->mahasiswa_id,
                'taka_id' => $request->tahun_akademik_id,
                'semester' => $request->semester,
                'created_by' => Auth::id(),
            ]);

            // Generate KHS
            $khs->generateKHS();

            DB::commit();
            Alert::success('Success', 'KHS berhasil dibuat dan digenerate');
            return redirect()->route(Auth::user()->prefix . 'akademik.khs-view', $khs->code);

        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Error', 'Gagal membuat KHS: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function generateKHS(Request $request)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'mahasiswa_id' => 'required|exists:mahasiswas,id',
                'tahun_akademik_id' => 'required|exists:tahun_akademiks,id',
                'semester' => 'required|integer|min:1|max:14',
            ]);

            // Panggil handleKHS untuk generate KHS
            return $this->handleKHS($request);

        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Error', 'Gagal generate KHS: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function regenerateKHS($code)
    {
        try {
            DB::beginTransaction();

            $khs = KHS::where('code', $code)->firstOrFail();

            if ($khs->is_locked) {
                Alert::error('Error', 'KHS sudah dikunci dan tidak dapat digenerate ulang');
                return redirect()->back();
            }

            $khs->generateKHS();

            DB::commit();
            Alert::success('Success', 'KHS berhasil digenerate ulang');
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Error', 'Gagal generate ulang KHS: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function updateKHS(Request $request, $code)
    {
        try {
            DB::beginTransaction();

            $khs = KHS::where('code', $code)->firstOrFail();

            if (!$khs->is_editable) {
                Alert::error('Error', 'KHS tidak dapat diedit');
                return redirect()->back();
            }

            $request->validate([
                'prestasi' => 'nullable|string',
                'catatan_akademik' => 'nullable|string',
                'rekomendasi' => 'nullable|string',
            ]);

            $khs->update([
                'prestasi' => $request->prestasi,
                'catatan_akademik' => $request->catatan_akademik,
                'rekomendasi' => $request->rekomendasi,
                'updated_by' => Auth::id(),
            ]);

            DB::commit();
            Alert::success('Success', 'KHS berhasil diperbarui');
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Error', 'Gagal memperbarui KHS: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function finalizeKHS($code)
    {
        try {
            DB::beginTransaction();

            $khs = KHS::where('code', $code)->firstOrFail();

            if ($khs->status_generate !== 'Draft') {
                Alert::error('Error', 'KHS sudah difinalisasi');
                return redirect()->back();
            }

            $khs->finalize();

            DB::commit();
            Alert::success('Success', 'KHS berhasil difinalisasi');
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Error', 'Gagal finalisasi KHS: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function publishKHS($code)
    {
        try {
            DB::beginTransaction();

            $khs = KHS::where('code', $code)->firstOrFail();

            if ($khs->status_generate !== 'Final') {
                Alert::error('Error', 'KHS harus difinalisasi terlebih dahulu');
                return redirect()->back();
            }

            $khs->publish();

            DB::commit();
            Alert::success('Success', 'KHS berhasil dipublish');
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Error', 'Gagal publish KHS: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function lockKHS($code)
    {
        try {
            DB::beginTransaction();

            $khs = KHS::where('code', $code)->firstOrFail();

            if (!$khs->is_published) {
                Alert::error('Error', 'KHS harus dipublish terlebih dahulu');
                return redirect()->back();
            }

            $khs->lock();

            DB::commit();
            Alert::success('Success', 'KHS berhasil dikunci');
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Error', 'Gagal mengunci KHS: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function unlockKHS($code)
    {
        try {
            DB::beginTransaction();

            $khs = KHS::where('code', $code)->firstOrFail();

            if (!$khs->is_locked) {
                Alert::error('Error', 'KHS tidak dalam status terkunci');
                return redirect()->back();
            }

            $khs->unlock();

            DB::commit();
            Alert::success('Success', 'KHS berhasil dibuka kunci');
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Error', 'Gagal membuka kunci KHS: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function deleteKHS($code)
    {
        try {
            DB::beginTransaction();

            $khs = KHS::where('code', $code)->firstOrFail();

            if ($khs->status_generate !== 'Draft') {
                Alert::error('Error', 'Hanya KHS dengan status Draft yang dapat dihapus');
                return redirect()->back();
            }

            $khs->delete();

            DB::commit();
            Alert::success('Success', 'KHS berhasil dihapus');
            return redirect()->route(Auth::user()->prefix . 'akademik.khs-render');

        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Error', 'Gagal menghapus KHS: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function printKHS($code)
    {
        try {
            $khs = KHS::with(['mahasiswa', 'tahunAkademik', 'nilaiSemester.mataKuliah'])
                ->where('code', $code)
                ->firstOrFail();

            if (!$khs->is_published) {
                Alert::error('Error', 'KHS harus dipublish terlebih dahulu sebelum dapat dicetak');
                return redirect()->back();
            }

            $data['khs'] = $khs;
            $data['webs'] = WebSetting::first();

            $pdf = PDF::loadView('master.akademik.khs-pdf', $data)
                ->setPaper('a4', 'portrait');

            return $pdf->download('KHS-' . $khs->mahasiswa->name . '-Semester-' . $khs->semester . '.pdf');

        } catch (\Exception $e) {
            Alert::error('Error', 'Gagal mencetak KHS: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    // BULK OPERATIONS
    public function bulkGenerateKHS(Request $request)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'taka_id' => 'required|exists:tahun_akademiks,id',
                'semester' => 'required|integer|min:1|max:14',
                'mahasiswa_ids' => 'nullable|array',
                'mahasiswa_ids.*' => 'exists:mahasiswas,id',
            ]);

            if ($request->mahasiswa_ids) {
                // Generate untuk mahasiswa terpilih
                $mahasiswaList = Mahasiswa::whereIn('id', $request->mahasiswa_ids)->get();
            } else {
                // Generate untuk semua mahasiswa aktif
                $mahasiswaList = Mahasiswa::where('type', 1)
                    ->where('semester', '>=', $request->semester)
                    ->get();
            }

            $generated = 0;
            foreach ($mahasiswaList as $mahasiswa) {
                // Cek apakah sudah ada KHS
                $existingKHS = KHS::where('mahasiswa_id', $mahasiswa->id)
                    ->where('taka_id', $request->taka_id)
                    ->where('semester', $request->semester)
                    ->first();

                if (!$existingKHS) {
                    // Cek apakah ada nilai untuk semester ini
                    $nilaiCount = Nilai::where('mahasiswa_id', $mahasiswa->id)
                        ->where('taka_id', $request->taka_id)
                        ->where('semester', $request->semester)
                        ->where('status', 'Published')
                        ->count();

                    if ($nilaiCount > 0) {
                        $khs = KHS::create([
                            'code' => 'KHS-' . date('Ymd') . '-' . $mahasiswa->code . '-S' . $request->semester,
                            'mahasiswa_id' => $mahasiswa->id,
                            'taka_id' => $request->taka_id,
                            'semester' => $request->semester,
                            'created_by' => Auth::id(),
                        ]);

                        $khs->generateKHS();
                        $generated++;
                    }
                }
            }

            DB::commit();
            Alert::success('Success', "Berhasil generate {$generated} KHS");
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Error', 'Gagal bulk generate KHS: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function transkrip($mahasiswaId)
    {
        try {
            $mahasiswa = Mahasiswa::with(['prodi', 'kelas'])->findOrFail($mahasiswaId);

            $khsList = KHS::with(['tahunAkademik', 'nilaiSemester.mataKuliah'])
                ->where('mahasiswa_id', $mahasiswaId)
                ->where('status_generate', 'Published')
                ->orderBy('semester')
                ->get();

            if ($khsList->isEmpty()) {
                Alert::error('Error', 'Tidak ada KHS yang sudah dipublish untuk mahasiswa ini');
                return redirect()->back();
            }

            $data['mahasiswa'] = $mahasiswa;
            $data['khs_list'] = $khsList;
            $data['webs'] = WebSetting::first();

            // Hitung statistik keseluruhan
            $totalSksLulus = $khsList->sum('total_sks_lulus');
            $totalMutuKumulatif = $khsList->last()->total_mutu_kumulatif;
            $ipkAkhir = $khsList->last()->ipk;

            $data['total_sks_lulus'] = $totalSksLulus;
            $data['ipk_akhir'] = $ipkAkhir;

            $pdf = PDF::loadView('master.akademik.transkrip-pdf', $data)
                ->setPaper('a4', 'portrait');

            return $pdf->download('Transkrip-' . $mahasiswa->name . '.pdf');

        } catch (\Exception $e) {
            Alert::error('Error', 'Gagal generate transkrip: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
