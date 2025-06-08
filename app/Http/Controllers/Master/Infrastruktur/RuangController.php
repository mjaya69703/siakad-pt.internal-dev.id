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
use App\Models\Infrastruktur\Ruang;
use App\Models\Infrastruktur\Gedung;
use App\Models\Pengaturan\WebSetting;
// Use Plugins

class RuangController extends Controller
{
    public function renderRuang()
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Ruang";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['ruangs'] = Ruang::with('gedung')->latest()->get();
        $data['gedungs'] = Gedung::all();
        
        return view('master.infrastruktur.ruang-index', $data, compact('user'));
    }

    public function handleRuang(Request $request)
    {
        try {
            DB::beginTransaction();
            
            $request->validate([
                'name' => 'required|string|max:255',
                'gedung_id' => 'required|integer|exists:gedungs,id',
                'floor' => 'required|integer',
                'capacity' => 'required|integer',
                'type' => 'required|in:Ruang Publik,Ruang Kelas,Ruang Pelayanan,Ruang Khusus,Gudang',
                'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'desc' => 'nullable|string'
            ]);

            // Generate unique code
            $code = 'RNG-' . Str::random(8);
            
            // Handle photo upload
            $photoName = time() . '-' . $code . '-' . uniqid() .'.' . $request->photo->getClientOriginalExtension();
            $request->photo->storeAs('images/ruang', $photoName, 'public');
            
            Ruang::create([
                'name' => $request->name,
                'code' => $code,
                'gedung_id' => $request->gedung_id,
                'floor' => $request->floor,
                'capacity' => $request->capacity,
                'type' => $request->type,
                'photo' => $photoName,
                'desc' => $request->desc,
                'created_by' => Auth::id()
            ]);

            DB::commit();
            $spref = Auth::user() ? Auth::user()->prefix : '';
            return redirect()->route($spref . 'infrastruktur.ruang-render')->with('success', 'Ruang berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function updateRuang(Request $request, $code)
    {
        try {
            DB::beginTransaction();
            
            $ruang = Ruang::where('code', $code)->firstOrFail();
            
            $request->validate([
                'name' => 'required|string|max:255',
                'gedung_id' => 'required|integer|exists:gedungs,id',
                'floor' => 'required|integer',
                'capacity' => 'required|integer',
                'type' => 'required|in:Ruang Publik,Ruang Kelas,Ruang Pelayanan,Ruang Khusus,Gudang',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'desc' => 'nullable|string'
            ]);
            
            $updateData = [
                'name' => $request->name,
                'gedung_id' => $request->gedung_id,
                'floor' => $request->floor,
                'capacity' => $request->capacity,
                'type' => $request->type,
                'desc' => $request->desc,
                'updated_by' => Auth::id()
            ];
            
            // Handle photo upload if new photo is provided
            if ($request->hasFile('photo')) {
                // Delete old photo
                if ($ruang->photo) {
                    Storage::disk('public')->delete('images/ruang/' . $ruang->photo);
                }
                
                // Save new photo
                $photoName = time() . '-' . $code . '-' . uniqid() .'.' . $request->photo->getClientOriginalExtension();
                $request->photo->storeAs('images/ruang', $photoName, 'public');
                $updateData['photo'] = $photoName;
            }
            
            $ruang->update($updateData);

            DB::commit();
            $spref = Auth::user() ? Auth::user()->prefix : '';
            return redirect()->route($spref . 'infrastruktur.ruang-render')->with('success', 'Data ruang berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function deleteRuang($code)
    {
        try {
            DB::beginTransaction();

            $ruang = Ruang::where('code', $code)->firstOrFail();

            // Check if Ruang has related InventarisBarang or MutasiBarang before deleting
            if ($ruang->inventarisBarang()->count() > 0 || 
                $ruang->mutasiBarangAwal()->count() > 0 || 
                $ruang->mutasiBarangAkhir()->count() > 0) {
                return redirect()->back()->with('error', 'Tidak dapat menghapus Ruang yang masih memiliki Inventaris atau Mutasi Barang');
            }
            
            // Delete photo
            if ($ruang->photo) {
                Storage::disk('public')->delete('images/ruang/' . $ruang->photo);
            }

            $ruang->update([
                'deleted_by' => Auth::id()
            ]);
            $ruang->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Ruang berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus ruang: ' . $e->getMessage());
        }
    }
}
