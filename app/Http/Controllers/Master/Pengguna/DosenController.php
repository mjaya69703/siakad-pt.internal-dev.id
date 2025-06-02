<?php

namespace App\Http\Controllers\Master\Pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Use System
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
// Use Models
use App\Models\Dosen;
use App\Models\Pengaturan\WebSetting;
// Use Plugins

class DosenController extends Controller
{
    public function renderDosen()
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Dosen";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['dosen'] = Dosen::latest()->get();
        
        return view('master.pengguna.dosen-index', $data, compact('user'));
    }

    public function viewDosen($code)
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Dosen";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['dosen'] = Dosen::where('code', $code)->first();
        
        return view('master.pengguna.dosen-views', $data, compact('user'));
    }

    public function handleProfile(Request $request, $code)
    {
        try {
            DB::beginTransaction();
            
            $dosen = Dosen::where('code', $code)->firstOrFail();
            
            // Base validation rules
            $rules = [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:dosens,email,' . $dosen->id,
                'phone' => 'required|string|unique:dosens,phone,' . $dosen->id,
                'title_front' => 'nullable|string|max:50',
                'title_behind' => 'nullable|string|max:50',
                'bio_blood' => 'nullable|string|max:5',
                'bio_height' => 'nullable|string',
                'bio_weight' => 'nullable|string',
                'bio_gender' => 'nullable|string|in:Laki-laki,Perempuan',
                'bio_religion' => 'nullable|string|max:50',
                'bio_placebirth' => 'nullable|string|max:100',
                'bio_nationality' => 'nullable|string|max:50',
                'bio_datebirth' => 'nullable|date',
                'link_ig' => 'nullable|string',
                'link_fb' => 'nullable|string',
                'link_in' => 'nullable|string',
                'ktp_addres' => 'nullable|string',
                'ktp_rt' => 'nullable|string',
                'ktp_rw' => 'nullable|string',
                'ktp_village' => 'nullable|string',
                'ktp_subdistrict' => 'nullable|string',
                'ktp_city' => 'nullable|string',
                'ktp_province' => 'nullable|string',
                'ktp_poscode' => 'nullable|string',
                'domicile_same' => 'required|in:Yes,No',
                'domicile_addres' => 'nullable|string',
                'domicile_rt' => 'nullable|string',
                'domicile_rw' => 'nullable|string',
                'domicile_village' => 'nullable|string',
                'domicile_subdistrict' => 'nullable|string',
                'domicile_city' => 'nullable|string',
                'domicile_province' => 'nullable|string',
                'domicile_poscode' => 'nullable|string',
                'numb_kk' => 'nullable|string|max:20',
                'numb_ktp' => 'nullable|string|max:20',
                'numb_npsn' => 'nullable|string|max:20',
                'numb_nidn' => 'nullable|string|max:20',
                'numb_nitk' => 'nullable|string|max:20',
                'numb_staff' => 'nullable|string|max:20',
                'edu1_type' => 'nullable|string|in:SMA/SMK,Diploma,Sarjana,Magister,Doktor',
                'edu1_place' => 'nullable|string|max:255',
                'edu1_major' => 'nullable|string|max:255',
                'edu1_average_score' => 'nullable|string',
                'edu1_graduate_year' => 'nullable|string',
                'edu2_type' => 'nullable|string|in:SMA/SMK,Diploma,Sarjana,Magister,Doktor',
                'edu2_place' => 'nullable|string|max:255',
                'edu2_major' => 'nullable|string|max:255',
                'edu2_average_score' => 'nullable|string',
                'edu2_graduate_year' => 'nullable|string',
                'edu3_type' => 'nullable|string|in:SMA/SMK,Diploma,Sarjana,Magister,Doktor',
                'edu3_place' => 'nullable|string|max:255',
                'edu3_major' => 'nullable|string|max:255',
                'edu3_average_score' => 'nullable|string',
                'edu3_graduate_year' => 'nullable|string',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
            ];

            // Add conditional validation for domicile address
            if ($request->domicile_same === 'No') {
                $rules['domicile_addres'] = 'required|string';
                $rules['domicile_rt'] = 'required|string';
                $rules['domicile_rw'] = 'required|string';
                $rules['domicile_village'] = 'required|string';
                $rules['domicile_subdistrict'] = 'required|string';
                $rules['domicile_city'] = 'required|string';
                $rules['domicile_province'] = 'required|string';
                $rules['domicile_poscode'] = 'required|string';
            }

            $request->validate($rules);

            $updateData = $request->except(['_token', '_method', 'photo']);
            
            // Handle photo upload
            if ($request->hasFile('photo')) {
                // Hapus foto lama
                if ($dosen->photo && $dosen->photo !== 'default.jpg') {
                    Storage::disk('public')->delete('images/profile/' . $dosen->photo);
                }
            
                // Simpan foto baru
                $photoName = time() . '-' . $dosen->code . '-' . uniqid() .'.' . $request->photo->getClientOriginalExtension();
                $request->photo->storeAs('images/profile', $photoName, 'public');
                $updateData['photo'] = $photoName;
            }

            // Handle domicile address
            if ($request->domicile_same === 'Yes') {
                $updateData['domicile_addres'] = $request->ktp_addres;
                $updateData['domicile_rt'] = $request->ktp_rt;
                $updateData['domicile_rw'] = $request->ktp_rw;
                $updateData['domicile_village'] = $request->ktp_village;
                $updateData['domicile_subdistrict'] = $request->ktp_subdistrict;
                $updateData['domicile_city'] = $request->ktp_city;
                $updateData['domicile_province'] = $request->ktp_province;
                $updateData['domicile_poscode'] = $request->ktp_poscode;
            }

            $updateData['updated_by'] = Auth::id();
            $dosen->update($updateData);

            DB::commit();
            $spref = Auth::user() ? Auth::user()->prefix : '';
            return redirect()->route($spref . 'pengguna.dosen-views', $code)->with('success', 'Profile berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function handleDosen(Request $request)
    {
        try {
            DB::beginTransaction();
            
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:dosens,email',
                'phone' => 'required|string|unique:dosens,phone',
                'password' => 'required|string|min:6',
                'type' => 'required|integer|between:0,7'
            ]);

            $code = 'DSN-' . strtoupper(Str::random(8));
            
            $dosen = Dosen::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'code' => $code,
                'type' => $request->type,
                'created_by' => Auth::id()
            ]);

            DB::commit();
            $spref = Auth::user() ? Auth::user()->prefix : '';
            return redirect()->route($spref . 'pengguna.dosen-render')->with('success', 'Dosen berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function updateDosen(Request $request, $code)
    {
        try {
            DB::beginTransaction();
            
            $dosen = Dosen::where('code', $code)->firstOrFail();
            
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:dosens,email,' . $dosen->id,
                'phone' => 'required|string|unique:dosens,phone,' . $dosen->id,
                'password' => 'nullable|string|min:6',
                'type' => 'required|integer|between:0,7'
            ]);

            $updateData = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'type' => $request->type,
                'updated_by' => Auth::id()
            ];
            
            if ($request->filled('password')) {
                $updateData['password'] = Hash::make($request->password);
            }
            
            $dosen->update($updateData);

            DB::commit();
            $spref = Auth::user() ? Auth::user()->prefix : '';
            return redirect()->route($spref . 'pengguna.dosen-render')->with('success', 'Data dosen berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function deleteDosen($code)
    {
        try {
            DB::beginTransaction();

            $dosen = Dosen::where('code', $code)->firstOrFail();
            
            // Prevent self-deletion
            if ($dosen->id === Auth::id()) {
                return redirect()->back()->with('error', 'Tidak dapat menghapus akun sendiri');
            }

            $dosen->update([
                'deleted_by' => Auth::id()
            ]);
            $dosen->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Dosen berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus Dosen: ' . $e->getMessage());
        }
    }
}
