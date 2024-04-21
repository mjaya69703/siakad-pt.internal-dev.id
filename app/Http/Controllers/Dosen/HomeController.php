<?php

namespace App\Http\Controllers\Dosen;

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


        return view('dosen.home-index');

    }
    public function profile(){


        return view('dosen.home-profile');

    }

    public function saveImageProfile(Request $request)
    {
        $request->validate([
            'dsn_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8192',
        ]);
    
        $user = Auth::guard('dosen')->user();
    
        if ($request->hasFile('dsn_image')) {
            $image = $request->file('dsn_image');
            $name = 'profile-'. $user->dsn_code.'-' .uniqid().'.'.$image->getClientOriginalExtension();
            $destinationPath = storage_path('app/public/images/profile/dosen');
            $destinationPaths = storage_path('app/public/images');
    
            // Compress image
            $manager = new ImageManager(new Driver());
            $image = $manager->read($image->getRealPath());
            // $image->resize(width: 250);
            $image->scaleDown(height: 300);
            $image->toPng()->save($destinationPath.'/'.$name);
    
            if ($user->dsn_image != 'default/default-profile.jpg') {
                File::delete($destinationPaths.'/'.$user->dsn_image); // hapus gambar lama
            }
            $user->dsn_image = "profile/dosen/".$name;
            $user->save();
    
            Alert::success('Success', 'Data berhasil diupdate');
            return redirect()->route('dosen.home-profile');
        }
    }

    public function saveDataProfile(Request $request){

        $request->validate([
            'dsn_name' => 'required|string|max:255',
            'dsn_nidn' => 'required|string|max:255|unique:users,user,' . Auth::guard('dosen')->user()->id,
            'dsn_birthplace' => 'required|string|max:255', // New field
            'dsn_birthdate' => 'required|date', // New field
            'dsn_gend' => 'required|string|max:1', // New field
        ]);
        $user = Auth::guard('dosen')->user();

        $user->dsn_name = $request->dsn_name;
        $user->dsn_nidn = $request->dsn_nidn;
        $user->dsn_birthplace = $request->dsn_birthplace; // New field
        $user->dsn_birthdate = $request->dsn_birthdate; // New field
        $user->dsn_gend = $request->dsn_gend; // New field


        $user->save();

        Alert::success('Success', 'Data berhasil diupdate');
        return back();
    }

    public function saveDataKontak(Request $request){

        $request->validate([
            'dsn_phone' => 'required|numeric|unique:users,phone,' . Auth::guard('dosen')->user()->id,
            'dsn_mail' => 'required|email|max:255|unique:users,email,' . Auth::guard('dosen')->user()->id,
        ]);
        $user = Auth::guard('dosen')->user();

        $user->dsn_phone = $request->dsn_phone;
        $user->dsn_mail = $request->dsn_mail;


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

        $user = Auth::guard('dosen')->user();

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
