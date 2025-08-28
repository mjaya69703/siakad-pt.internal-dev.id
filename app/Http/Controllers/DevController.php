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
        // Redirect to the new leadership dashboard
        return redirect()->route('dashboard.leadership');
    }

}
