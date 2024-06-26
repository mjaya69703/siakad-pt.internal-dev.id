<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// SECTION ADDONS SYSTEM
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Auth;
use Str;
// SECTION ADDONS EXTERNAL
use Alert;
use App\Helper\roleTrait;
// SECTION AUTH
use App\Models\Settings\webSettings;

class WebSettingController extends Controller
{
    use roleTrait;

    public function index()
    {
        $data['prefix'] = $this->setPrefix();
        $data['web'] = webSettings::where('id', 1)->first();

        return view('user.admin.system.settings-index', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'school_apps' => 'required|string',
            'school_name' => 'required|string',
            'school_head' => 'required|string',
            'school_link' => 'required|url',
            'school_desc' => 'required',
            'school_email' => 'required',
            'school_phone' => 'required|string',
            // 'social_ig' => 'required',
            // 'social_fb' => 'required',
            // 'social_tw' => 'required',
            // 'social_in' => 'required',
        ]);
        $web = webSettings::where('id', 1)->first();

        if ($request->hasFile('school_logo')) {
            $image = $request->file('school_logo');
            $name = 'logo-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = storage_path('app/public/images/website');

            // Membuat direktori jika belum ada
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true, true);
            }

            // Mengompres gambar dan menyimpannya
            $manager = new ImageManager(new Driver());
            $image = $manager->read($image->getRealPath());

            $image->save($destinationPath . '/' . $name);

            // Menyimpan nama file gambar ke database
            $web->school_logo = "website/" . $name;
        }


        $web->school_apps = $request->school_apps;
        $web->school_name = $request->school_name;
        $web->school_head = $request->school_head;
        $web->school_link = $request->school_link;
        $web->school_desc = $request->school_desc;
        $web->school_email = $request->school_email;
        $web->school_phone = $request->school_phone;
        // $web->social_ig = $request->social_ig;
        // $web->social_tw = $request->social_tw;
        // $web->social_in = $request->social_in;
        // $web->social_fb = $request->social_fb;
        $web->save();
        
        Alert::success('Success', 'Data berhasil diupdate.');
        return back();
    }
}
