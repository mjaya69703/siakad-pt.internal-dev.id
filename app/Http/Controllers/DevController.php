<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Models
use App\Models\User;
use App\Models\Dosen;
use App\Models\Mahasiswa;
// Auth
use Illuminate\Support\Facades\Auth;
// Plugins
use RealRashid\SweetAlert\Facades\Alert;

class DevController extends Controller
{
    public function index()
    {
        $user = Auth::user() ?: Auth::guard('dosen')->user() ?: Auth::guard('mahasiswa')->user();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Index";
        $data['pages'] = "Tahun Akademik";
        $data['academy'] = "Siakad PT by Esec Academy";

        // return view('core-themes.core-backpage', $data, compact('user'));
        return view('central.back-content', $data, compact('user'));
    }

}
