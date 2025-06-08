<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Use System
use Illuminate\Support\Facades\Auth;
// Use Models
use App\Models\Pengaturan\WebSetting;
// Use Plugins

class RootController extends Controller
{

    public function renderWelcome()
    {
        $webs = WebSetting::first();

        return view('welcome');

        // JIKA INGIN DISABLE /WELCOME APABILA SUDAH DIKONFIGURASI
        // if($webs == null){
            
        //     return view('welcome');
        // } else {

        //     return redirect()->route('root.home-index');
        // }
    }

    public function renderHomePage()
    {
        $user = Auth::user() ?: Auth::guard('dosen')->user() ?: Auth::guard('mahasiswa')->user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = null;
        $data['pages'] = "HomePage";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;

        return view('central.main-content', $data, compact('user'));
    }
}
