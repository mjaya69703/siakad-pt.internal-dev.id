<?php

namespace App\Http\Controllers\Master\Publikasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Use System
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
// Use Models
use App\Models\Publikasi\Galeri;
use App\Models\Publikasi\GaleriFoto;
use App\Models\Publikasi\Kategori;
use App\Models\Pengaturan\WebSetting;
// Use Plugins

class GaleriController extends Controller
{
    public function renderGaleri()
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Galeri";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['galeri'] = Galeri::latest()->get();
        $data['kategori'] = Kategori::all();
        
        return view('master.publikasi.galeri-index', $data, compact('user'));
    }

    public function viewGaleri($code)
    {
        $user = Auth::user();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Galeri";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['galeri'] = Galeri::where('code', $code)->firstOrFail();
        
        return view('master.publikasi.galeri-view', $data, compact('user'));
    }

    public function handleGaleri(Request $request)
    {
        try {
            DB::beginTransaction();
            
            $request->validate([
                'kategori_id' => 'required|exists:kategoris,id',
                'name' => 'required|string|max:255',
                'content' => 'required|string',
                'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'status' => 'required|in:Draft,Publish,Archive'
            ]);

            $slug = Str::slug($request->name);
            $code = 'GLR-' . strtoupper(Str::random(8));
            
            // Handle photo upload
            $photoName = time() . '-' . $code . '-' . uniqid() .'.' . $request->photo->getClientOriginalExtension();
            $request->photo->storeAs('images/galeri', $photoName, 'public');
            
            $galeri = Galeri::create([
                'code' => $code,
                'kategori_id' => $request->kategori_id,
                'name' => $request->name,
                'slug' => $slug,
                'code' => $code,
                'content' => $request->content,
                'photo' => $photoName,
                'status' => $request->status,
                'created_by' => Auth::id()
            ]);

            DB::commit();
            $spref = Auth::user() ? Auth::user()->prefix : '';
            return redirect()->route($spref . 'publikasi.galeri-render')->with('success', 'Galeri berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function updateGaleri(Request $request, $code)
    {
        try {
            DB::beginTransaction();
            
            $galeri = Galeri::where('code', $code)->firstOrFail();
            
            $request->validate([
                'kategori_id' => 'required|exists:kategoris,id',
                'name' => 'required|string|max:255',
                'content' => 'required|string',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'status' => 'required|in:Draft,Publish,Archive'
            ]);

            $slug = Str::slug($request->name);
            
            
            $updateData = [
                'kategori_id' => $request->kategori_id,
                'name' => $request->name,
                'slug' => $slug,
                'content' => $request->content,
                'status' => $request->status,
                'updated_by' => Auth::id()
            ];
            
            // Handle photo upload if new photo is provided
            if ($request->hasFile('photo')) {
                // Delete old photo
                if ($galeri->photo) {
                    Storage::disk('public')->delete('images/galeri/' . $galeri->photo);
                }
                
                // Save new photo
                $photoName = time() . '-' . $code . '-' . uniqid() .'.' . $request->photo->getClientOriginalExtension();
                $request->photo->storeAs('images/galeri', $photoName, 'public');
                $updateData['photo'] = $photoName;
            }
            
            $galeri->update($updateData);

            DB::commit();
            $spref = Auth::user() ? Auth::user()->prefix : '';
            return redirect()->route($spref . 'publikasi.galeri-render')->with('success', 'Data galeri berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function deleteGaleri($code)
    {
        try {
            DB::beginTransaction();

            $galeri = Galeri::where('code', $code)->firstOrFail();
            
            // Delete cover photo
            if ($galeri->photo) {
                Storage::disk('public')->delete('images/galeri/' . $galeri->photo);
            }

            // Delete all photos in the gallery
            foreach ($galeri->fotos as $foto) {
                Storage::disk('public')->delete('images/galeri/foto/' . $foto->photo);
                $foto->delete();
            }

            $galeri->update([
                'deleted_by' => Auth::id()
            ]);
            $galeri->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Galeri berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus galeri: ' . $e->getMessage());
        }
    }

    public function handleFoto(Request $request, $code)
    {
        try {
            DB::beginTransaction();
            
            $galeri = Galeri::where('code', $code)->firstOrFail();
            
            $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'desc' => 'nullable|string'
            ]);

            $fotoCode = 'FTO-' . strtoupper(Str::random(8));
            
            // Handle photo upload
            $photoName = time() . '-' . $fotoCode . '-' . uniqid() .'.' . $request->photo->getClientOriginalExtension();
            $request->photo->storeAs('images/galeri/foto', $photoName, 'public');
            
            $foto = GaleriFoto::create([
                'code' => $fotoCode,
                'galeri_id' => $galeri->id,
                'photo' => $photoName,
                'desc' => $request->desc,
                'created_by' => Auth::id()
            ]);

            DB::commit();
            $spref = Auth::user() ? Auth::user()->prefix : '';
            return redirect()->route($spref . 'publikasi.galeri-view', $code)->with('success', 'Foto berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function deleteFoto($code)
    {
        try {
            DB::beginTransaction();

            $foto = GaleriFoto::where('code', $code)->firstOrFail();
            
            // Delete photo
            if ($foto->photo) {
                Storage::disk('public')->delete('images/galeri/foto/' . $foto->photo);
            }

            $foto->update([
                'deleted_by' => Auth::id()
            ]);
            $foto->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Foto berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus foto: ' . $e->getMessage());
        }
    }
}
