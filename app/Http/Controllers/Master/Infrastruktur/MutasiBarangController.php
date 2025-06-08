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
use App\Models\Infrastruktur\MutasiBarang;
use App\Models\Infrastruktur\Barang;
use App\Models\Infrastruktur\Ruang;
use App\Models\Pengaturan\WebSetting;
// Use Plugins

class MutasiBarangController extends Controller
{
    public function renderMutasiBarang()
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Mutasi Barang";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['mutasiBarangs'] = MutasiBarang::with(['barang', 'lokasiAwal', 'lokasiAkhir'])->latest()->get();
        $data['barangs'] = Barang::all();
        $data['ruangs'] = Ruang::all();
        
        return view('master.infrastruktur.mutasi-barang-index', $data, compact('user'));
    }

    public function handleMutasiBarang(Request $request)
    {
        try {
            DB::beginTransaction();
            
            $request->validate([
                'barang_id' => 'required|integer|exists:barangs,id',
                'lokasi_awal' => 'required|integer|exists:ruangs,id',
                'lokasi_akhir' => 'required|integer|exists:ruangs,id',
                'jumlah' => 'required|integer|min:1',
                'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
                'status' => 'required|in:Aktif,Tidak Aktif,Dihapus',
                'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'desc' => 'nullable|string'
            ]);

            $code = 'MTB-' . Str::random(8);
            
            // Handle photo upload
            $photoName = time() . '-' . $code . '-' . uniqid() .'.' . $request->photo->getClientOriginalExtension();
            $request->photo->storeAs('images/mutasi', $photoName, 'public');
            
            MutasiBarang::create([
                'barang_id' => $request->barang_id,
                'lokasi_awal' => $request->lokasi_awal,
                'lokasi_akhir' => $request->lokasi_akhir,
                'jumlah' => $request->jumlah,
                'code' => $code,
                'photo' => $photoName,
                'kondisi' => $request->kondisi,
                'status' => $request->status,
                'desc' => $request->desc,
                'created_by' => Auth::id()
            ]);

            DB::commit();
            $spref = Auth::user() ? Auth::user()->prefix : '';
            return redirect()->route($spref . 'infrastruktur.mutasi-barang-render')->with('success', 'Mutasi Barang berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function updateMutasiBarang(Request $request, $code)
    {
        try {
            DB::beginTransaction();
            
            $mutasiBarang = MutasiBarang::where('code', $code)->firstOrFail();
            
            $request->validate([
                'barang_id' => 'required|integer|exists:barangs,id',
                'lokasi_awal' => 'required|integer|exists:ruangs,id',
                'lokasi_akhir' => 'required|integer|exists:ruangs,id',
                'jumlah' => 'required|integer|min:1',
                'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
                'status' => 'required|in:Aktif,Tidak Aktif,Dihapus',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'desc' => 'nullable|string'
            ]);
            
            $updateData = [
                'barang_id' => $request->barang_id,
                'lokasi_awal' => $request->lokasi_awal,
                'lokasi_akhir' => $request->lokasi_akhir,
                'jumlah' => $request->jumlah,
                'kondisi' => $request->kondisi,
                'status' => $request->status,
                'desc' => $request->desc,
                'updated_by' => Auth::id()
            ];
            
            // Handle photo upload if new photo is provided
            if ($request->hasFile('photo')) {
                // Delete old photo
                if ($mutasiBarang->photo) {
                    Storage::disk('public')->delete('images/mutasi/' . $mutasiBarang->photo);
                }
                
                // Save new photo
                $photoName = time() . '-' . $code . '-' . uniqid() .'.' . $request->photo->getClientOriginalExtension();
                $request->photo->storeAs('images/mutasi', $photoName, 'public');
                $updateData['photo'] = $photoName;
            }
            
            $mutasiBarang->update($updateData);

            DB::commit();
            $spref = Auth::user() ? Auth::user()->prefix : '';
            return redirect()->route($spref . 'infrastruktur.mutasi-barang-render')->with('success', 'Data mutasi barang berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function deleteMutasiBarang($code)
    {
        try {
            DB::beginTransaction();

            $mutasiBarang = MutasiBarang::where('code', $code)->firstOrFail();
            
            // Delete photo
            if ($mutasiBarang->photo) {
                Storage::disk('public')->delete('images/mutasi/' . $mutasiBarang->photo);
            }

            $mutasiBarang->update([
                'deleted_by' => Auth::id()
            ]);
            $mutasiBarang->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Mutasi Barang berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus mutasi barang: ' . $e->getMessage());
        }
    }
}
