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
use App\Models\Mahasiswa;
use App\Models\Akademik\ProgramStudi;
use App\Models\Pengaturan\WebSetting;
// Use Plugins

class MahasiswaController extends Controller
{
    public function renderMahasiswa()
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Mahasiswa";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['mahasiswa'] = Mahasiswa::all();
        $data['prodi'] = ProgramStudi::all();
        
        return view('master.pengguna.mahasiswa-index', $data, compact('user'));
    }

    public function viewMahasiswa($code)
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Mahasiswa";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['mahasiswa'] = Mahasiswa::where('code', $code)->first();
        
        return view('master.pengguna.mahasiswa-views', $data, compact('user'));
    }

    public function handleProfile(Request $request, $code)
    {
        try {
            DB::beginTransaction();
            
            $mahasiswa = Mahasiswa::where('code', $code)->firstOrFail();
            
            // Base validation rules
            $rules = [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:mahasiswas,email,' . $mahasiswa->id,
                'phone' => 'required|string|unique:mahasiswas,phone,' . $mahasiswa->id,
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
                'numb_nim' => 'nullable|string|max:20',
                'numb_reg' => 'nullable|string|max:20',
                'numb_nisn' => 'nullable|string|max:20',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                // Father validation rules
                'father_name' => 'nullable|string|max:255',
                'father_datebirth' => 'nullable|date',
                'father_lifestat' => 'nullable|in:Hidup,Meninggal',
                'father_education' => 'nullable|string|max:100',
                'father_occupation' => 'nullable|string|max:100',
                'father_income' => 'nullable|string|max:50',
                'father_phone' => 'nullable|string|max:20',
                'father_address' => 'nullable|string',
                // Mother validation rules
                'mother_name' => 'nullable|string|max:255',
                'mother_datebirth' => 'nullable|date',
                'mother_lifestat' => 'nullable|in:Hidup,Meninggal',
                'mother_education' => 'nullable|string|max:100',
                'mother_occupation' => 'nullable|string|max:100',
                'mother_income' => 'nullable|string|max:50',
                'mother_phone' => 'nullable|string|max:20',
                'mother_address' => 'nullable|string',
                // Guardian validation rules
                'guard_name' => 'nullable|string|max:255',
                'guard_nik' => 'nullable|string|max:20',
                'guard_datebirth' => 'nullable|date',
                'guard_relation' => 'nullable|string|max:100',
                'guard_phone' => 'nullable|string|max:20',
                'guard_address' => 'nullable|string',
                // Education validation rules
                'edu1_type' => 'nullable|in:SMA/SMK,Diploma,Sarjana,Magister,Doktor',
                'edu1_place' => 'nullable|string|max:255',
                'edu1_major' => 'nullable|string|max:255',
                'edu1_average_score' => 'nullable|string|max:10',
                'edu1_graduate_year' => 'nullable|string|max:4',
                'edu2_type' => 'nullable|in:SMA/SMK,Diploma,Sarjana,Magister,Doktor',
                'edu2_place' => 'nullable|string|max:255',
                'edu2_major' => 'nullable|string|max:255',
                'edu2_average_score' => 'nullable|string|max:10',
                'edu2_graduate_year' => 'nullable|string|max:4',
                'edu3_type' => 'nullable|in:SMA/SMK,Diploma,Sarjana,Magister,Doktor',
                'edu3_place' => 'nullable|string|max:255',
                'edu3_major' => 'nullable|string|max:255',
                'edu3_average_score' => 'nullable|string|max:10',
                'edu3_graduate_year' => 'nullable|string|max:4'
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
                // Delete old photo
                if ($mahasiswa->photo && $mahasiswa->photo !== 'default.jpg') {
                    Storage::disk('public')->delete('images/profile/' . $mahasiswa->photo);
                }
            
                // Save new photo
                $photoName = time() . '-' . $mahasiswa->code . '-' . uniqid() .'.' . $request->photo->getClientOriginalExtension();
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
            $mahasiswa->update($updateData);

            DB::commit();
            $spref = Auth::user() ? Auth::user()->prefix : '';
            return redirect()->route($spref . 'pengguna.mahasiswa-views', $code)->with('success', 'Profile berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function handleMahasiswa(Request $request)
    {
        try {
            DB::beginTransaction();
            
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:mahasiswas,email',
                'phone' => 'required|string|unique:mahasiswas,phone',
                'password' => 'required|string|min:6',
                'numb_nim' => 'required|string|unique:mahasiswas,numb_nim',
                'prodi_id' => 'required|exists:program_studis,id',
                'type' => 'required|integer|in:0,1,2,3',
                'semester' => 'required|integer|min:0|max:14'
            ]);

            $code = 'MHS-' . strtoupper(Str::random(8));
            
            $mahasiswa = Mahasiswa::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'code' => $code,
                'numb_nim' => $request->numb_nim,
                'prodi_id' => $request->prodi_id,
                'type' => $request->type,
                'semester' => $request->semester,
                'created_by' => Auth::id()
            ]);

            DB::commit();
            $spref = Auth::user() ? Auth::user()->prefix : '';
            return redirect()->route($spref . 'pengguna.mahasiswa-render')->with('success', 'Mahasiswa berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function updateMahasiswa(Request $request, $code)
    {
        try {
            DB::beginTransaction();
            
            $mahasiswa = Mahasiswa::where('code', $code)->firstOrFail();
            
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:mahasiswas,email,' . $mahasiswa->id,
                'phone' => 'required|string|unique:mahasiswas,phone,' . $mahasiswa->id,
                'password' => 'nullable|string|min:6',
                'numb_nim' => 'required|string|unique:mahasiswas,numb_nim,' . $mahasiswa->id,
                'prodi_id' => 'required|exists:program_studis,id',
                'type' => 'required|integer|in:0,1,2,3',
                'semester' => 'required|integer|min:0|max:14'
            ]);

            $updateData = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'numb_nim' => $request->numb_nim,
                'prodi_id' => $request->prodi_id,
                'type' => $request->type,
                'semester' => $request->semester,
                'updated_by' => Auth::id()
            ];
            
            if ($request->filled('password')) {
                $updateData['password'] = Hash::make($request->password);
            }
            
            $mahasiswa->update($updateData);

            DB::commit();
            $spref = Auth::user() ? Auth::user()->prefix : '';
            return redirect()->route($spref . 'pengguna.mahasiswa-render')->with('success', 'Data mahasiswa berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function deleteMahasiswa($code)
    {
        try {
            DB::beginTransaction();

            $mahasiswa = Mahasiswa::where('code', $code)->firstOrFail();
            
            // Prevent self-deletion
            if ($mahasiswa->id === Auth::id()) {
                return redirect()->back()->with('error', 'Tidak dapat menghapus akun sendiri');
            }

            $mahasiswa->update([
                'deleted_by' => Auth::id()
            ]);
            $mahasiswa->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Mahasiswa berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus Mahasiswa: ' . $e->getMessage());
        }
    }
}
