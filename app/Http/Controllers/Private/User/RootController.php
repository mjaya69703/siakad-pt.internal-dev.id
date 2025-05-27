<?php

namespace App\Http\Controllers\Private\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class RootController extends Controller
{
    public function renderDashboard()
    {
        $user = Auth::user();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Detail";
        $data['pages'] = "Profile";
        $data['academy'] = "Siakad PT by Esec Academy";
        
        return view('central.back-content', $data, compact('user'));
    }

    public function renderProfile()
    {
        $user = Auth::user();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Detail";
        $data['pages'] = "Profile";
        $data['academy'] = "Siakad PT by Esec Academy";
        
        return view('central.backpage.profile-index', $data, compact('user'));
    }

    public function handleProfile(Request $request)
    {
        try {
            // Validate the request
            $validator = Validator::make($request->all(), [
                // Personal Information
                'name' => 'required|string|max:255',
                'title_front' => 'nullable|string|max:50',
                'title_behind' => 'nullable|string|max:50',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'bio_placebirth' => 'nullable|string|max:100',
                'bio_datebirth' => 'nullable|date',
                'bio_gender' => 'nullable|in:Laki-laki,Perempuan',
                'bio_religion' => 'nullable|string|max:50',
                'bio_nationality' => 'nullable|string|max:50',
                'bio_blood' => 'nullable|string|max:5',
                'bio_height' => 'nullable|numeric',
                'bio_weight' => 'nullable|numeric',

                // Contact Information
                'email' => 'required|email|unique:users,email,' . Auth::id(),
                'phone' => 'required|string|unique:users,phone,' . Auth::id(),
                'link_ig' => 'nullable|url',
                'link_fb' => 'nullable|url',
                'link_in' => 'nullable|url',

                // Address Information
                'ktp_addres' => 'nullable|string',
                'ktp_rt' => 'nullable|string|max:10',
                'ktp_rw' => 'nullable|string|max:10',
                'ktp_village' => 'nullable|string|max:100',
                'ktp_subdistrict' => 'nullable|string|max:100',
                'ktp_city' => 'nullable|string|max:100',
                'ktp_province' => 'nullable|string|max:100',
                'ktp_poscode' => 'nullable|string|max:10',
                'domicile_same' => 'required|in:Yes,No',
                'domicile_addres' => 'nullable|required_if:domicile_same,No|string',
                'domicile_rt' => 'nullable|required_if:domicile_same,No|string|max:10',
                'domicile_rw' => 'nullable|required_if:domicile_same,No|string|max:10',
                'domicile_village' => 'nullable|required_if:domicile_same,No|string|max:100',
                'domicile_subdistrict' => 'nullable|required_if:domicile_same,No|string|max:100',
                'domicile_city' => 'nullable|required_if:domicile_same,No|string|max:100',
                'domicile_province' => 'nullable|required_if:domicile_same,No|string|max:100',
                'domicile_poscode' => 'nullable|required_if:domicile_same,No|string|max:10',

                // Education Information
                'edu1_type' => 'required|in:SMA/SMK,Diploma,Sarjana,Magister,Doktor',
                'edu1_place' => 'required|string|max:255',
                'edu1_major' => 'required|string|max:255',
                'edu1_average_score' => 'required|string|max:10',
                'edu1_graduate_year' => 'required|string|max:4',
                'edu2_type' => 'nullable|in:SMA/SMK,Diploma,Sarjana,Magister,Doktor',
                'edu2_place' => 'nullable|string|max:255',
                'edu2_major' => 'nullable|string|max:255',
                'edu2_average_score' => 'nullable|string|max:10',
                'edu2_graduate_year' => 'nullable|string|max:4',
                'edu3_type' => 'nullable|in:SMA/SMK,Diploma,Sarjana,Magister,Doktor',
                'edu3_place' => 'nullable|string|max:255',
                'edu3_major' => 'nullable|string|max:255',
                'edu3_average_score' => 'nullable|string|max:10',
                'edu3_graduate_year' => 'nullable|string|max:4',

                // Identity Information
                'numb_kk' => 'nullable|string|max:20',
                'numb_ktp' => 'nullable|string|max:20',
                'numb_npsn' => 'nullable|string|max:20',
                'numb_nitk' => 'nullable|string|max:20',
                'numb_staff' => 'nullable|string|max:20',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $user = Auth::user();
            $data = $validator->validated();

            // Handle photo upload
            if ($request->hasFile('photo')) {
                // Hapus foto lama
                if ($user->photo && $user->photo !== 'default.jpg') {
                    Storage::disk('public')->delete('images/profile/' . $user->photo);
                }
            
                // Simpan foto baru
                $photoName = time() . '-' . $user->code . '-' . uniqid() .'.' . $request->photo->getClientOriginalExtension();
                $request->photo->storeAs('images/profile', $photoName, 'public');
                $data['photo'] = $photoName;
            }

            $user->update($data);

            Alert::success('Success', 'Profile updated successfully');
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to update profile: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
