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
use App\Models\Publikasi\Berita;
use App\Models\Publikasi\Kategori;
use App\Models\Pengaturan\WebSetting;
// Use Plugins

class BeritaController extends Controller
{
    public function renderBerita()
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Berita";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['berita'] = Berita::latest()->get();
        $data['kategori'] = Kategori::all();
        
        return view('master.publikasi.berita-index', $data, compact('user'));
    }

    public function viewBerita($code)
    {
        $user = Auth::user();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Berita";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['berita'] = Berita::where('code', $code)->firstOrFail();
        
        return view('master.publikasi.berita-view', $data, compact('user'));
    }

    public function handleBerita(Request $request)
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
            $code = 'BRT-' . strtoupper(Str::random(8));
            
            // Handle photo upload
            $photoName = time() . '-' . $code . '-' . uniqid() .'.' . $request->photo->getClientOriginalExtension();
            $request->photo->storeAs('images/berita', $photoName, 'public');
            
            $berita = Berita::create([
                'code' => $code,
                'kategori_id' => $request->kategori_id,
                'name' => $request->name,
                'slug' => $slug,
                'content' => $request->content,
                'photo' => $photoName,
                'status' => $request->status,
                'created_by' => Auth::id()
            ]);

            DB::commit();
            $spref = Auth::user() ? Auth::user()->prefix : '';
            return redirect()->route($spref . 'publikasi.berita-render')->with('success', 'Berita berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function updateBerita(Request $request, $code)
    {
        try {
            DB::beginTransaction();
            
            $berita = Berita::where('code', $code)->firstOrFail();
            
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
                if ($berita->photo) {
                    Storage::disk('public')->delete('images/berita/' . $berita->photo);
                }
                
                // Save new photo
                $photoName = time() . '-' . $code . '-' . uniqid() .'.' . $request->photo->getClientOriginalExtension();
                $request->photo->storeAs('images/berita', $photoName, 'public');
                $updateData['photo'] = $photoName;
            }
            
            $berita->update($updateData);

            DB::commit();
            $spref = Auth::user() ? Auth::user()->prefix : '';
            return redirect()->route($spref . 'publikasi.berita-render')->with('success', 'Data berita berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function deleteBerita($code)
    {
        try {
            DB::beginTransaction();

            $berita = Berita::where('code', $code)->firstOrFail();
            
            // Delete photo
            if ($berita->photo) {
                Storage::disk('public')->delete('images/berita/' . $berita->photo);
            }

            $berita->update([
                'deleted_by' => Auth::id()
            ]);
            $berita->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Berita berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus berita: ' . $e->getMessage());
        }
    }
}
