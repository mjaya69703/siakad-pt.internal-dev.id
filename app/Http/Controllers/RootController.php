<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Use System
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
// Use Models
use App\Models\Pengaturan\WebSetting;
// Use Plugins

class RootController extends Controller
{

    public function renderWelcome()
    {
        return view('welcome');
    }

    public function renderHomePage()
    {
        if (!Schema::hasTable('web_settings')) {
            return $this->renderWelcome();
        }
        $user = Auth::user() ?: Auth::guard('dosen')->user() ?: Auth::guard('mahasiswa')->user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = null;
        $data['pages'] = "HomePage";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;

        return view('central.main-content', $data, compact('user'));
    }
}
