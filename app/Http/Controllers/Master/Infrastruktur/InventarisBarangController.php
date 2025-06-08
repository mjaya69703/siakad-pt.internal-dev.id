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
use App\Models\Infrastruktur\InventarisBarang;
use App\Models\Infrastruktur\Barang;
use App\Models\Infrastruktur\Ruang;
use App\Models\Pengaturan\WebSetting;
// Use Plugins

class InventarisBarangController extends Controller
{
    public function renderInventarisBarang()
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Inventaris Barang";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['inventarisBarangs'] = InventarisBarang::with(['barang', 'lokasi'])->latest()->get();
        $data['barangs'] = Barang::all();
        $data['ruangs'] = Ruang::all();
        
        return view('master.infrastruktur.inventaris-barang-index', $data, compact('user'));
    }

    public function handleInventarisBarang(Request $request)
    {
        try {
            DB::beginTransaction();
            
            $request->validate([
                'barang_id' => 'required|integer|exists:barangs,id',
                'lokasi_id' => 'required|integer|exists:ruangs,id',
                'jumlah' => 'required|integer|min:1',
                'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
                'status' => 'required|in:Aktif,Tidak Aktif,Dihapus',
                'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'desc' => 'nullable|string'
            ]);

            $code = $request->code ?? 'INV-' . Str::random(8);
            
            // Handle photo upload
            $photoName = time() . '-' . $code . '-' . uniqid() .'.' . $request->photo->getClientOriginalExtension();
            $request->photo->storeAs('images/inventaris', $photoName, 'public');
            
            InventarisBarang::create([
                'barang_id' => $request->barang_id,
                'lokasi_id' => $request->lokasi_id,
                'jumlah' => $request->jumlah,
                'photo' => $photoName,
                'kondisi' => $request->kondisi,
                'status' => $request->status,
                'code' => $code,
                'desc' => $request->desc,
                'created_by' => Auth::id()
            ]);

            DB::commit();
            $spref = Auth::user() ? Auth::user()->prefix : '';
            return redirect()->route($spref . 'infrastruktur.inventaris-barang-render')->with('success', 'Inventaris Barang berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function updateInventarisBarang(Request $request, $code)
    {
        try {
            DB::beginTransaction();
            
            $inventarisBarang = InventarisBarang::where('code', $code)->firstOrFail();
            
            $request->validate([
                'barang_id' => 'required|integer|exists:barangs,id',
                'lokasi_id' => 'required|integer|exists:ruangs,id',
                'jumlah' => 'required|integer|min:1',
                'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
                'status' => 'required|in:Aktif,Tidak Aktif,Dihapus',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'desc' => 'nullable|string'
            ]);
            
            $updateData = [
                'barang_id' => $request->barang_id,
                'lokasi_id' => $request->lokasi_id,
                'jumlah' => $request->jumlah,
                'kondisi' => $request->kondisi,
                'status' => $request->status,
                'desc' => $request->desc,
                'updated_by' => Auth::id()
            ];
            
            // Handle photo upload if new photo is provided
            if ($request->hasFile('photo')) {
                // Delete old photo
                if ($inventarisBarang->photo) {
                    Storage::disk('public')->delete('images/inventaris/' . $inventarisBarang->photo);
                }
                
                // Save new photo
                $photoName = time() . '-' . $code . '-' . uniqid() .'.' . $request->photo->getClientOriginalExtension();
                $request->photo->storeAs('images/inventaris', $photoName, 'public');
                $updateData['photo'] = $photoName;
            }
            
            $inventarisBarang->update($updateData);

            DB::commit();
            $spref = Auth::user() ? Auth::user()->prefix : '';
            return redirect()->route($spref . 'infrastruktur.inventaris-barang-render')->with('success', 'Data inventaris barang berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function deleteInventarisBarang($code)
    {
        try {
            DB::beginTransaction();

            $inventarisBarang = InventarisBarang::where('code', $code)->firstOrFail();
            
            // Delete photo
            if ($inventarisBarang->photo) {
                Storage::disk('public')->delete('images/inventaris/' . $inventarisBarang->photo);
            }

            $inventarisBarang->update([
                'deleted_by' => Auth::id()
            ]);
            $inventarisBarang->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Inventaris Barang berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus inventaris barang: ' . $e->getMessage());
        }
    }
}
