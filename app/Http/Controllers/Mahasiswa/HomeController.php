<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// UNTUK PLUGIN TAMBAHAN
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Alert;
use Auth;
use Hash;

class HomeController extends Controller
{
    public function index(){


        return view('mahasiswa.home-index');

    }
    public function profile(){


        return view('mahasiswa.home-profile');

    }

    public function saveImageProfile(Request $request)
    {
        $request->validate([
            'mhs_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8192',
        ]);
    
        $user = Auth::guard('mahasiswa')->user();
    
        if ($request->hasFile('mhs_image')) {
            $image = $request->file('mhs_image');
            $name = 'profile-'. $user->mhs_code.'-' .uniqid().'.'.$image->getClientOriginalExtension();
            $destinationPath = storage_path('app/public/images/profile');
            $destinationPaths = storage_path('app/public/images');
    
            // Compress image
            $manager = new ImageManager(new Driver());
            $image = $manager->read($image->getRealPath());
            // $image->resize(width: 250);
            $image->scaleDown(height: 300);
            $image->toPng()->save($destinationPath.'/'.$name);
    
            if ($user->mhs_image != 'default/default-profile.jpg') {
                File::delete($destinationPaths.'/'.$user->mhs_image); // hapus gambar lama
            }
            $user->mhs_image = "profile/".$name;
            $user->save();
    
            Alert::success('Success', 'Data berhasil diupdate');
            return redirect()->route('mahasiswa.home-profile');
        }
    }
    // public function saveImageProfile(Request $request){
    //     $request->validate([
    //         'mhs_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     ]);

    //     $user = Auth::guard('mahasiswa')->user();

    //     if ($request->hasFile('mhs_image')) {
    //         $image = $request->file('mhs_image');
    //         $name = 'profile-'. $user->mhs_code.'-' .uniqid().'.'.$image->getClientOriginalExtension();
    //         $destinationPath = storage_path('app/public/images/profile');
    //         $destinationPaths = storage_path('app/public/images');
    //         $image->move($destinationPath, $name);
    //         if ($user->mhs_image != 'default/default-profile.jpg') {
    //             File::delete($destinationPaths.'/'.$user->mhs_image); // hapus gambar lama
    //         }
    //         $user->mhs_image = "profile/".$name;
    //         $user->save();

    //         // dd($user->image);

    //         Alert::success('Success', 'Data berhasil diupdate');
    //         return redirect()->route('mahasiswa.home-profile');
    //     }

    // }

    public function saveDataProfile(Request $request){

        $request->validate([
            'mhs_name' => 'required|string|max:255',
            'mhs_nim' => 'required|string|max:255|unique:users,user,' . Auth::guard('mahasiswa')->user()->id,
            'mhs_birthplace' => 'required|string|max:255', // New field
            'mhs_birthdate' => 'required|date', // New field
        ]);
        $user = Auth::guard('mahasiswa')->user();

        $user->mhs_name = $request->mhs_name;
        $user->mhs_nim = $request->mhs_nim;
        $user->mhs_birthplace = $request->mhs_birthplace; // New field
        $user->mhs_birthdate = $request->mhs_birthdate; // New field


        $user->save();

        Alert::success('Success', 'Data berhasil diupdate');
        return back();
    }

    public function saveDataKontak(Request $request){

        $request->validate([
            'mhs_phone' => 'required|numeric|unique:users,phone,' . Auth::guard('mahasiswa')->user()->id,
            'mhs_mail' => 'required|email|max:255|unique:users,email,' . Auth::guard('mahasiswa')->user()->id,
        ]);
        $user = Auth::guard('mahasiswa')->user();

        $user->mhs_phone = $request->mhs_phone;
        $user->mhs_mail = $request->mhs_mail;


        $user->save();

        Alert::success('Success', 'Data berhasil diupdate');
        return back();
    }

    public function saveDataPassword(Request $request)
    {
        // Validate the request...
        $request->validate([
            'old_password' => ['required', 'string'],
            'new_password' => ['required', 'string', 'same:new_password_confirmed'],
        ]);

        $user = Auth::guard('mahasiswa')->user();

        // Check if the old password is correct
        if (!Hash::check($request->old_password, $user->password)) {
            Alert::error('Error', 'Password lama yang diberikan tidak cocok dengan catatan kami.');
            return back();
        }

        // Update the password
        $user->password = Hash::make($request->new_password);
        $user->save();

        Alert::success('Success', 'Password berhasil diubah!');
        return back();
    }
}
