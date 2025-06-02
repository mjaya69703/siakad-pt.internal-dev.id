<?php

namespace App\Http\Controllers\Master\Akademik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Use System
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
// Use Models
use App\Models\Akademik\Fakultas;
use App\Models\Dosen;
use App\Models\Pengaturan\WebSetting;
// Use Plugins

class FakultasController extends Controller
{
    public function renderFakultas()
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Fakultas";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['fakultas'] = Fakultas::all(); 
        $data['dosens'] = Dosen::all(); 
        
        return view('master.akademik.fakultas-index', $data, compact('user'));
    }

    public function handleFakultas(Request $request)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'name' => 'required|string|max:255',
                'desc' => 'nullable|string',
                'dekan_id' => 'nullable|integer',
            ]);

            // Generate unique code
            $code = 'FAK-' . Str::random(8); 
            
            // Create new Fakultas
            Fakultas::create([
                'name' => $request->name,
                'code' => $code,
                'slug' => Str::slug($request->name),
                'desc' => $request->desc,
                'dekan_id' => $request->dekan_id, 
                'status' => 'Aktif', 
                'created_by' => Auth::id(),
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Fakultas berhasil ditambahkan');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal menambahkan Fakultas: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function updateFakultas(Request $request, $code)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'name' => 'required|string|max:255',
                'desc' => 'nullable|string',
                'dekan_id' => 'nullable|integer', 
                'status' => 'required|in:Aktif,Tidak Aktif',
            ]);

            $fakultas = Fakultas::where('code', $code)->firstOrFail();

            $fakultas->update([
                'name' => $request->name,
                'desc' => $request->desc,
                'slug' => Str::slug($request->name),
                'dekan_id' => $request->dekan_id,
                'status' => $request->status,
                'updated_by' => Auth::id(),
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Fakultas berhasil diperbarui');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal memperbarui Fakultas: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function deleteFakultas($code)
    {
        try {
            DB::beginTransaction();

            $fakultas = Fakultas::where('code', $code)->firstOrFail();

            // Optional: Add check if Fakultas has related Program Studi before deleting
            if ($fakultas->programStudi()->count() > 0) {
                return redirect()->back()->with('error', 'Tidak dapat menghapus Fakultas yang masih memiliki Program Studi');
            }

            $fakultas->update([
                'deleted_by' => Auth::id()
            ]);
            $fakultas->delete(); 

            DB::commit();
            return redirect()->back()->with('success', 'Fakultas berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus Fakultas: ' . $e->getMessage());
        }
    }
}
