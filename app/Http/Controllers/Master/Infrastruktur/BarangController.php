<?php

namespace App\Http\Controllers\Master\Infrastruktur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Use System
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
// Use Models
use App\Models\Infrastruktur\Barang;
use App\Models\Infrastruktur\KategoriBarang;
use App\Models\Pengaturan\WebSetting;
// Use Plugins

class BarangController extends Controller
{
    public function renderBarang()
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Barang";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['barangs'] = Barang::with('kategori')->latest()->get();
        $data['kategoriBarangs'] = KategoriBarang::all();
        
        return view('master.infrastruktur.barang-index', $data, compact('user'));
    }

    public function handleBarang(Request $request)
    {
        try {
            DB::beginTransaction();
            
            $request->validate([
                'name' => 'required|string|max:255',
                'code' => 'nullable|string|max:10|unique:barangs,code',
                'kategori_id' => 'required|integer|exists:kategori_barangs,id',
                'merk' => 'required|string|max:255',
                'satuan' => 'required|string|max:50',
                'jumlah' => 'required|integer|min:0',
                'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'desc' => 'nullable|string'
            ]);

            // Generate code if not provided
            $code = $request->code ?: 'BRG-' . Str::random(8);
            
            // Handle photo upload
            $photoName = time() . '-' . $code . '-' . uniqid() .'.' . $request->photo->getClientOriginalExtension();
            $request->photo->storeAs('images/barang', $photoName, 'public');
            
            Barang::create([
                'name' => $request->name,
                'code' => $code,
                'kategori_id' => $request->kategori_id,
                'merk' => $request->merk,
                'photo' => $photoName,
                'satuan' => $request->satuan,
                'jumlah' => $request->jumlah,
                'desc' => $request->desc,
                'created_by' => Auth::id()
            ]);

            DB::commit();
            $spref = Auth::user() ? Auth::user()->prefix : '';
            return redirect()->route($spref . 'infrastruktur.barang-render')->with('success', 'Barang berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function updateBarang(Request $request, $code)
    {
        try {
            DB::beginTransaction();
            
            $barang = Barang::where('code', $code)->firstOrFail();
            
            $request->validate([
                'name' => 'required|string|max:255',
                'code' => 'nullable|string|max:10|unique:barangs,code,' . $barang->id,
                'kategori_id' => 'required|integer|exists:kategori_barangs,id',
                'merk' => 'required|string|max:255',
                'satuan' => 'required|string|max:50',
                'jumlah' => 'required|integer|min:0',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'desc' => 'nullable|string'
            ]);
            
            // Use existing code if new code not provided
            $newCode = $request->code ?: $barang->code;
            
            $updateData = [
                'name' => $request->name,
                'code' => $newCode,
                'kategori_id' => $request->kategori_id,
                'merk' => $request->merk,
                'satuan' => $request->satuan,
                'jumlah' => $request->jumlah,
                'desc' => $request->desc,
                'updated_by' => Auth::id()
            ];
            
            // Handle photo upload if new photo is provided
            if ($request->hasFile('photo')) {
                // Delete old photo
                if ($barang->photo) {
                    Storage::disk('public')->delete('images/barang/' . $barang->photo);
                }
                
                // Save new photo
                $photoName = time() . '-' . $newCode . '-' . uniqid() .'.' . $request->photo->getClientOriginalExtension();
                $request->photo->storeAs('images/barang', $photoName, 'public');
                $updateData['photo'] = $photoName;
            }
            
            $barang->update($updateData);

            DB::commit();
            $spref = Auth::user() ? Auth::user()->prefix : '';
            return redirect()->route($spref . 'infrastruktur.barang-render')->with('success', 'Data barang berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function deleteBarang($code)
    {
        try {
            DB::beginTransaction();

            $barang = Barang::where('code', $code)->firstOrFail();

            // Check if Barang has related records before deleting
            if ($barang->pengadaanBarang()->count() > 0 || 
                $barang->mutasiBarang()->count() > 0 || 
                $barang->inventarisBarang()->count() > 0) {
                return redirect()->back()->with('error', 'Tidak dapat menghapus Barang yang masih memiliki Pengadaan, Mutasi, atau Inventaris');
            }
            
            // Delete photo
            if ($barang->photo) {
                Storage::disk('public')->delete('images/barang/' . $barang->photo);
            }

            $barang->update([
                'deleted_by' => Auth::id()
            ]);
            $barang->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Barang berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus barang: ' . $e->getMessage());
        }
    }
}
