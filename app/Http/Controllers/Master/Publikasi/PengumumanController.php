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
use App\Models\Publikasi\Pengumuman;
use App\Models\Publikasi\Kategori;
use App\Models\Pengaturan\WebSetting;
// Use Plugins

class PengumumanController extends Controller
{
    public function renderPengumuman()
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Pengumuman";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['pengumuman'] = Pengumuman::latest()->get();
        $data['kategori'] = Kategori::all();
        
        return view('master.publikasi.pengumuman-index', $data, compact('user'));
    }

    public function viewPengumuman($code)
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Pengumuman";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['pengumuman'] = Pengumuman::where('code', $code)->firstOrFail();
        
        return view('master.publikasi.pengumuman-view', $data, compact('user'));
    }

    public function handlePengumuman(Request $request)
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
            $code = 'PNG-' . strtoupper(Str::random(8));
            
            // Handle photo upload
            $photoName = time() . '-' . $code . '-' . uniqid() .'.' . $request->photo->getClientOriginalExtension();
            $request->photo->storeAs('images/pengumuman', $photoName, 'public');
            
            $pengumuman = Pengumuman::create([
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
            return redirect()->route($spref . 'publikasi.pengumuman-render')->with('success', 'Pengumuman berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function updatePengumuman(Request $request, $code)
    {
        try {
            DB::beginTransaction();
            
            $pengumuman = Pengumuman::where('code', $code)->firstOrFail();
            
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
                if ($pengumuman->photo) {
                    Storage::disk('public')->delete('images/pengumuman/' . $pengumuman->photo);
                }
                
                // Save new photo
                $photoName = time() . '-' . $code . '-' . uniqid() .'.' . $request->photo->getClientOriginalExtension();
                $request->photo->storeAs('images/pengumuman', $photoName, 'public');
                $updateData['photo'] = $photoName;
            }
            
            $pengumuman->update($updateData);

            DB::commit();
            $spref = Auth::user() ? Auth::user()->prefix : '';
            return redirect()->route($spref . 'publikasi.pengumuman-render')->with('success', 'Data pengumuman berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function deletePengumuman($code)
    {
        try {
            DB::beginTransaction();

            $pengumuman = Pengumuman::where('code', $code)->firstOrFail();
            
            // Delete photo
            if ($pengumuman->photo) {
                Storage::disk('public')->delete('images/pengumuman/' . $pengumuman->photo);
            }

            $pengumuman->update([
                'deleted_by' => Auth::id()
            ]);
            $pengumuman->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Pengumuman berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus pengumuman: ' . $e->getMessage());
        }
    }
}
