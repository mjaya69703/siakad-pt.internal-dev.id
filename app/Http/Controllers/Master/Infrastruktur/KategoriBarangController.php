<?php

namespace App\Http\Controllers\Master\Infrastruktur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Use System
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
// Use Models
use App\Models\Infrastruktur\KategoriBarang;
use App\Models\Pengaturan\WebSetting;
// Use Plugins

class KategoriBarangController extends Controller
{
    public function renderKategoriBarang()
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Kategori Barang";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['kategoriBarangs'] = KategoriBarang::latest()->get();
        
        return view('master.infrastruktur.kategori-barang-index', $data, compact('user'));
    }

    public function handleKategoriBarang(Request $request)
    {
        try {
            DB::beginTransaction();
            
            $request->validate([
                'name' => 'required|string|max:255',
                'code' => 'required|string|max:10|unique:kategori_barangs,code',
                'desc' => 'nullable|string'
            ]);

            $code = $request->code ?? 'KB-'. uniqid();
            
            KategoriBarang::create([
                'name' => $request->name,
                'code' => $code,
                'slug' => Str::slug($request->name),
                'desc' => $request->desc,
                'created_by' => Auth::id()
            ]);

            DB::commit();
            $spref = Auth::user() ? Auth::user()->prefix : '';
            return redirect()->route($spref . 'infrastruktur.kategori-barang-render')->with('success', 'Kategori Barang berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function updateKategoriBarang(Request $request, $code)
    {
        try {
            DB::beginTransaction();
            
            $kategoriBarang = KategoriBarang::where('code', $code)->firstOrFail();
            
            $request->validate([
                'name' => 'required|string|max:255',
                'code' => 'required|string|max:10|unique:kategori_barangs,code,' . $kategoriBarang->id,
                'desc' => 'nullable|string'
            ]);
            
            $updateData = [
                'name' => $request->name,
                'code' => $request->code,
                'slug' => Str::slug($request->name),
                'desc' => $request->desc,
                'updated_by' => Auth::id()
            ];
            
            $kategoriBarang->update($updateData);

            DB::commit();
            $spref = Auth::user() ? Auth::user()->prefix : '';
            return redirect()->route($spref . 'infrastruktur.kategori-barang-render')->with('success', 'Data kategori barang berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function deleteKategoriBarang($code)
    {
        try {
            DB::beginTransaction();

            $kategoriBarang = KategoriBarang::where('code', $code)->firstOrFail();

            // Check if KategoriBarang has related Barang before deleting
            if ($kategoriBarang->barang()->count() > 0) {
                return redirect()->back()->with('error', 'Tidak dapat menghapus Kategori Barang yang masih memiliki Barang');
            }

            $kategoriBarang->update([
                'deleted_by' => Auth::id()
            ]);
            $kategoriBarang->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Kategori Barang berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus kategori barang: ' . $e->getMessage());
        }
    }
}
