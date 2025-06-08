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
use App\Models\Infrastruktur\Gedung;
use App\Models\Pengaturan\WebSetting;
// Use Plugins

class GedungController extends Controller
{
    public function renderGedung()
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Gedung";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['gedungs'] = Gedung::latest()->get();
        
        return view('master.infrastruktur.gedung-index', $data, compact('user'));
    }

    public function handleGedung(Request $request)
    {
        try {
            DB::beginTransaction();
            
            $request->validate([
                'name' => 'required|string|max:255',
                'code' => 'required|string|max:10|unique:gedungs,code',
                'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'desc' => 'nullable|string'
            ]);

            $code = $request->code;
            
            // Handle photo upload
            $photoName = time() . '-' . $code . '-' . uniqid() .'.' . $request->photo->getClientOriginalExtension();
            $request->photo->storeAs('images/gedung', $photoName, 'public');
            
            Gedung::create([
                'name' => $request->name,
                'code' => $code,
                'photo' => $photoName,
                'desc' => $request->desc,
                'created_by' => Auth::id()
            ]);

            DB::commit();
            $spref = Auth::user() ? Auth::user()->prefix : '';
            return redirect()->route($spref . 'infrastruktur.gedung-render')->with('success', 'Gedung berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function updateGedung(Request $request, $code)
    {
        try {
            DB::beginTransaction();
            
            $gedung = Gedung::where('code', $code)->firstOrFail();
            
            $request->validate([
                'name' => 'required|string|max:255',
                'code' => 'required|string|max:10|unique:gedungs,code,' . $gedung->id,
                'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'desc' => 'nullable|string'
            ]);
            
            $updateData = [
                'name' => $request->name,
                'code' => $request->code,
                'desc' => $request->desc,
                'updated_by' => Auth::id()
            ];
            
            // Handle photo upload if new photo is provided
            if ($request->hasFile('photo')) {
                // Delete old photo
                if ($gedung->photo) {
                    Storage::disk('public')->delete('images/gedung/' . $gedung->photo);
                }
                
                // Save new photo
                $photoName = time() . '-' . $request->code . '-' . uniqid() .'.' . $request->photo->getClientOriginalExtension();
                $request->photo->storeAs('images/gedung', $photoName, 'public');
                $updateData['photo'] = $photoName;
            }
            
            $gedung->update($updateData);

            DB::commit();
            $spref = Auth::user() ? Auth::user()->prefix : '';
            return redirect()->route($spref . 'infrastruktur.gedung-render')->with('success', 'Data gedung berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function deleteGedung($code)
    {
        try {
            DB::beginTransaction();

            $gedung = Gedung::where('code', $code)->firstOrFail();
            
            // Check if Gedung has related Ruang before deleting
            if ($gedung->ruangs()->count() > 0) {
                return redirect()->back()->with('error', 'Tidak dapat menghapus Gedung yang masih memiliki Ruang');
            }
            
            // Delete photo
            if ($gedung->photo) {
                Storage::disk('public')->delete('images/gedung/' . $gedung->photo);
            }

            $gedung->update([
                'deleted_by' => Auth::id()
            ]);
            $gedung->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Gedung berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus gedung: ' . $e->getMessage());
        }
    }
}
