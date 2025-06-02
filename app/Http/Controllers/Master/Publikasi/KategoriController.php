<?php

namespace App\Http\Controllers\Master\Publikasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Use System
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
// Use Models
use App\Models\Publikasi\Kategori;
use App\Models\Pengaturan\WebSetting;
// Use Plugins

class KategoriController extends Controller
{
    public function renderKategori()
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Kategori";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['kategori'] = Kategori::latest()->get();
        
        return view('master.publikasi.kategori-index', $data, compact('user'));
    }

    public function handleKategori(Request $request)
    {
        try {
            DB::beginTransaction();
            
            $request->validate([
                'name' => 'required|string|max:255',
                'desc' => 'nullable|string'
            ]);

            $code = 'KTG-' . strtoupper(Str::random(8));
            $slug = Str::slug($request->name);
            
            $kategori = Kategori::create([
                'name' => $request->name,
                'code' => $code,
                'slug' => $slug,
                'desc' => $request->desc,
                'created_by' => Auth::id()
            ]);

            DB::commit();
            $spref = Auth::user() ? Auth::user()->prefix : '';
            return redirect()->route($spref . 'publikasi.kategori-render')->with('success', 'Kategori berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function updateKategori(Request $request, $code)
    {
        try {
            DB::beginTransaction();
            
            $kategori = Kategori::where('code', $code)->firstOrFail();
            
            $request->validate([
                'name' => 'required|string|max:255',
                'desc' => 'nullable|string'
            ]);

            $slug = Str::slug($request->name);
            
            $updateData = [
                'name' => $request->name,
                'slug' => $slug,
                'desc' => $request->desc,
                'updated_by' => Auth::id()
            ];
            
            $kategori->update($updateData);

            DB::commit();
            $spref = Auth::user() ? Auth::user()->prefix : '';
            return redirect()->route($spref . 'publikasi.kategori-render')->with('success', 'Data kategori berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function deleteKategori($code)
    {
        try {
            DB::beginTransaction();

            $kategori = Kategori::where('code', $code)->firstOrFail();
            
            // Check if kategori is being used
            if ($kategori->beritas()->exists() || $kategori->pengumumans()->exists() || $kategori->galeris()->exists()) {
                return redirect()->back()->with('error', 'Kategori tidak dapat dihapus karena masih digunakan');
            }

            $kategori->update([
                'deleted_by' => Auth::id()
            ]);
            $kategori->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Kategori berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus kategori: ' . $e->getMessage());
        }
    }
}
