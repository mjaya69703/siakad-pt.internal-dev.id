<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RootController extends Controller
{
    public function renderHomePage()
    {
        $user = Auth::user() ?: Auth::guard('dosen')->user() ?: Auth::guard('mahasiswa')->user();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = null;
        $data['pages'] = "HomePage";
        $data['academy'] = "Siakad PT by Esec Academy";

        return view('central.main-content', $data, compact('user'));
    }
}
