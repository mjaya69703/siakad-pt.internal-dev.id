<?php

namespace App\Http\Controllers\Master\Keuangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Use System
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
// Use Models
use App\Models\Keuangan\TagihanKuliahGroup;
use App\Models\Keuangan\TagihanKuliah;
use App\Models\Akademik\ProgramStudi;
use App\Models\Akademik\Kelas;
use App\Models\PMB\GelombangPendaftaran;
use App\Models\PMB\JalurPendaftaran;
use App\Models\Akademik\TahunAkademik;
use App\Models\Mahasiswa;
use App\Models\Pengaturan\WebSetting;
// Use Plugins

class TagihanKuliahGroupController extends Controller
{
    public function renderTagihanKuliahGroup()
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Tagihan Kuliah Group";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['tahunAkademiks'] = TahunAkademik::all();
        $data['gelombangs'] = GelombangPendaftaran::all();
        $data['jalurs'] = JalurPendaftaran::all();
        $data['prodis'] = ProgramStudi::all();
        $data['kelas'] = Kelas::all();
        $data['groups'] = TagihanKuliahGroup::with(['prodi', 'kelas', 'gelombang', 'jalur', 'tahunAkademik'])
            ->latest()
            ->get();
        
        return view('master.keuangan.tagihan-kuliah-group-index', $data, compact('user'));
    }

    public function handleTagihanKuliahGroup(Request $request)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'name' => 'required|string|max:255',
                'taka_id' => 'required|exists:tahun_akademiks,id',
                'amount' => 'required|numeric|min:0',
                'due_date' => 'required|date',
                'desc' => 'nullable|string',
                'prodi_id' => 'nullable|exists:program_studis,id',
                'kelas_id' => 'nullable|exists:kelas,id',
                'gelombang_id' => 'nullable|exists:gelombang_pendaftarans,id',
                'jalur_id' => 'nullable|exists:jalur_pendaftarans,id',
                'semester' => 'nullable|integer|min:1|max:14',
            ]);

            // Generate unique code
            $code = 'TKG-' . Str::random(8);

            // Create new TagihanKuliahGroup
            $group = TagihanKuliahGroup::create([
                'name' => $request->name,
                'code' => $code,
                'slug' => Str::slug($request->name),
                'taka_id' => $request->taka_id,
                'amount' => $request->amount,
                'due_date' => $request->due_date,
                'desc' => $request->desc,
                'prodi_id' => $request->prodi_id,
                'kelas_id' => $request->kelas_id,
                'gelombang_id' => $request->gelombang_id,
                'jalur_id' => $request->jalur_id,
                'semester' => $request->semester,
                'status' => 'Draft',
                'created_by' => Auth::id(),
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Group tagihan berhasil ditambahkan');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal menambahkan Group tagihan: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function updateTagihanKuliahGroup(Request $request, $code)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'name' => 'required|string|max:255',
                'taka_id' => 'required|exists:tahun_akademiks,id',
                'amount' => 'required|numeric|min:0',
                'due_date' => 'required|date',
                'desc' => 'nullable|string',
                'prodi_id' => 'nullable|exists:program_studis,id',
                'kelas_id' => 'nullable|exists:kelas,id',
                'gelombang_id' => 'nullable|exists:gelombang_pendaftarans,id',
                'jalur_id' => 'nullable|exists:jalur_pendaftarans,id',
                'semester' => 'nullable|integer|min:1|max:14',
                'status' => 'required|in:Draft,Published,Archived',
            ]);

            $group = TagihanKuliahGroup::where('code', $code)->firstOrFail();

            $group->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'taka_id' => $request->taka_id,
                'amount' => $request->amount,
                'due_date' => $request->due_date,
                'desc' => $request->desc,
                'prodi_id' => $request->prodi_id,
                'kelas_id' => $request->kelas_id,
                'gelombang_id' => $request->gelombang_id,
                'jalur_id' => $request->jalur_id,
                'semester' => $request->semester,
                'status' => $request->status,
                'updated_by' => Auth::id(),
            ]);

            // Jika status diubah ke Published, buat tagihan untuk setiap mahasiswa yang memenuhi kriteria
            if ($request->status === 'Published' && $group->tagihanKuliahs()->count() === 0) {
                $this->createTagihanForGroup($group);
            }

            DB::commit();
            return redirect()->back()->with('success', 'Group tagihan berhasil diperbarui');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal memperbarui Group tagihan: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function deleteTagihanKuliahGroup($code)
    {
        try {
            DB::beginTransaction();

            $group = TagihanKuliahGroup::where('code', $code)->firstOrFail();

            // Hapus semua tagihan yang terkait dengan group ini
            TagihanKuliah::where('group_id', $group->id)->delete();
            
            $group->update([
                'deleted_by' => Auth::id()
            ]);
            $group->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Group tagihan berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus Group tagihan: ' . $e->getMessage());
        }
    }

    public function publishTagihanKuliahGroup($code)
    {
        try {
            DB::beginTransaction();

            $group = TagihanKuliahGroup::where('code', $code)->firstOrFail();

            // Update status group menjadi Published
            $group->update([
                'status' => 'Published',
                'updated_by' => Auth::id(),
            ]);

            // Buat tagihan untuk setiap mahasiswa yang memenuhi kriteria
            $this->createTagihanForGroup($group);

            DB::commit();
            return redirect()->back()->with('success', 'Group tagihan berhasil dipublish');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal mempublish Group tagihan: ' . $e->getMessage());
        }
    }

    public function archiveTagihanKuliahGroup($code)
    {
        try {
            $group = TagihanKuliahGroup::where('code', $code)->firstOrFail();

            $group->update([
                'status' => 'Archived',
                'updated_by' => Auth::id(),
            ]);

            return redirect()->back()->with('success', 'Group tagihan berhasil diarsipkan');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengarsipkan Group tagihan: ' . $e->getMessage());
        }
    }

    public function viewTagihanDetail($code)
    {
        try {
            $user = Auth::user();
            $data['webs'] = WebSetting::first();
            $data['spref'] = $user ? $user->prefix : '';
            $data['menus'] = "Master";
            $data['pages'] = "Detail Tagihan Kuliah Group";
            $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;

            $group = TagihanKuliahGroup::with(['prodi', 'kelas', 'gelombang', 'jalur', 'tahunAkademik'])
                ->where('code', $code)
                ->firstOrFail();

            $data['group'] = $group;
            $data['tagihans'] = TagihanKuliah::with(['mahasiswa'])
                ->where('group_id', $group->id)
                ->latest()
                ->get();

            return view('master.keuangan.tagihan-kuliah-group-detail', $data, compact('user'));

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memuat detail tagihan: ' . $e->getMessage());
        }
    }

    /**
     * Helper method untuk membuat tagihan berdasarkan kriteria group
     */
    private function createTagihanForGroup(TagihanKuliahGroup $group)
    {
        // Query untuk mencari mahasiswa yang memenuhi kriteria
        $query = Mahasiswa::query();

        if ($group->prodi_id) {
            $query->where('prodi_id', $group->prodi_id);
        }

        if ($group->kelas_id) {
            $query->where('kelas_id', $group->kelas_id);
        }

        if ($group->semester) {
            $query->where('semester', $group->semester);
        }

        // Handle gelombang_id and jalur_id through Pendaftar model
        if ($group->gelombang_id || $group->jalur_id) {
            $pendaftarQuery = \App\Models\Pendaftaran\Pendaftar::query();
            
            if ($group->gelombang_id) {
                $pendaftarQuery->where('gelombang_id', $group->gelombang_id);
            }
            
            if ($group->jalur_id) {
                $pendaftarQuery->where('jalur_id', $group->jalur_id);
            }
            
            // Get mahasiswa IDs from pendaftar
            $mahasiswaIds = $pendaftarQuery->pluck('mahasiswa_id')->toArray();
            
            // Add to main query
            $query->whereIn('id', $mahasiswaIds);
        }

        // Ambil semua mahasiswa yang memenuhi kriteria
        $mahasiswas = $query->get();

        // Buat tagihan untuk setiap mahasiswa
        foreach ($mahasiswas as $mahasiswa) {
            TagihanKuliah::create([
                'taka_id' => $group->taka_id,
                'mahasiswa_id' => $mahasiswa->id,
                'group_id' => $group->id,
                'amount' => $group->amount,
                'due_date' => $group->due_date,
                'status' => 'Pending',
                'code' => $group->code,
                'desc' => $group->desc,
                'created_by' => Auth::id(),
            ]);
        }
    }
}