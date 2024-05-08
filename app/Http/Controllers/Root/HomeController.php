<?php

namespace App\Http\Controllers\Root;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// SECTION ADDONS SYSTEM
use Illuminate\Support\Facades\File;
use Auth;
use Hash;
use Str;
// SECTION ADDONS EXTERNAL
use Alert;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
// SECTION MODELS
use App\Models\Fakultas;

class HomeController extends Controller
{

    public function index()
    {
        $data['fakultas'] = Fakultas::all();
        return view('base.base-root-index', $data);
    }
}
