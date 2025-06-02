<?php

namespace App\Http\Controllers\Master\Akademik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Use System
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
// Use Models
use App\Models\Akademik\ProgramStudi;
use App\Models\Akademik\Fakultas;
use App\Models\Dosen;
use App\Models\Pengaturan\WebSetting;
// Use Plugins

class ProgramStudiController extends Controller
{
    public function renderProdi()
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Program Studi";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['prodi'] = ProgramStudi::with(['fakultas', 'kaprodi'])->get(); // Fetch all Program Studi with relationships
        $data['fakultas'] = Fakultas::where('status', 'Aktif')->get(); // Fetch active Fakultas
        $data['dosens'] = Dosen::where('type', 1)->get(); // Fetch active Dosen for Kaprodi
        
        return view('master.akademik.prodi-index', $data, compact('user'));
    }

    public function handleProdi(Request $request)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'name' => 'required|string|max:255',
                'fakultas_id' => 'required|exists:fakultas,id',
                'kaprodi_id' => 'nullable|exists:dosens,id',
                'level' => 'required|in:Diploma,Sarjana,Magister,Doktoral',
                'title' => 'required|in:D3,S1,S2,S3',
                'title_start' => 'nullable|string|max:50',
                'title_ended' => 'nullable|string|max:50',
                'accreditation' => 'nullable|string|max:10',
                'duration' => 'nullable|integer|min:1',
                'desc' => 'nullable|string',
                'objectives' => 'nullable|string',
                'careers' => 'nullable|string',
            ]);

            // Generate unique code
            $code = 'PS-' . Str::random(8);
            
            // Create new Program Studi
            ProgramStudi::create([
                'name' => $request->name,
                'code' => $code,
                'slug' => Str::slug($request->name),
                'fakultas_id' => $request->fakultas_id,
                'kaprodi_id' => $request->kaprodi_id,
                'level' => $request->level,
                'title' => $request->title,
                'title_start' => $request->title_start,
                'title_ended' => $request->title_ended,
                'accreditation' => $request->accreditation,
                'duration' => $request->duration,
                'desc' => $request->desc,
                'objectives' => $request->objectives,
                'careers' => $request->careers,
                'status' => 'Aktif', // Default status
                'created_by' => Auth::id(),
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Program Studi berhasil ditambahkan');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal menambahkan Program Studi: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function updateProdi(Request $request, $code)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'name' => 'required|string|max:255',
                'fakultas_id' => 'required|exists:fakultas,id',
                'kaprodi_id' => 'nullable|exists:dosens,id',
                'level' => 'required|in:Diploma,Sarjana,Magister,Doktoral',
                'title' => 'required|in:D3,S1,S2,S3',
                'title_start' => 'nullable|string|max:50',
                'title_ended' => 'nullable|string|max:50',
                'accreditation' => 'nullable|string|max:10',
                'duration' => 'nullable|integer|min:1',
                'desc' => 'nullable|string',
                'objectives' => 'nullable|string',
                'careers' => 'nullable|string',
                'status' => 'required|in:Aktif,Tidak Aktif',
            ]);

            $prodi = ProgramStudi::where('code', $code)->firstOrFail();

            $prodi->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'fakultas_id' => $request->fakultas_id,
                'kaprodi_id' => $request->kaprodi_id,
                'level' => $request->level,
                'title' => $request->title,
                'title_start' => $request->title_start,
                'title_ended' => $request->title_ended,
                'accreditation' => $request->accreditation,
                'duration' => $request->duration,
                'desc' => $request->desc,
                'objectives' => $request->objectives,
                'careers' => $request->careers,
                'status' => $request->status,
                'updated_by' => Auth::id(),
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Program Studi berhasil diperbarui');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal memperbarui Program Studi: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function deleteProdi($code)
    {
        try {
            DB::beginTransaction();

            $prodi = ProgramStudi::where('code', $code)->firstOrFail();

            $prodi->update([
                'deleted_by' => Auth::id()
            ]);
            $prodi->delete(); // Soft delete

            DB::commit();
            return redirect()->back()->with('success', 'Program Studi berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus Program Studi: ' . $e->getMessage());
        }
    }
}
