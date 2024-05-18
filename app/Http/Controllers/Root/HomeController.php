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
    private function setPrefix()
    {
        if(Auth::user()){

            $rawType = Auth::user()->raw_type;
            switch ($rawType) {
                case 1:
                    return 'finance.';
                case 2:
                    return 'officer.';
                case 3:
                    return 'academic.';
                case 4:
                    return 'admin.';
                case 5:
                    return 'support.';
                default:
                    return 'web-admin.';
            }
        }
    }


    public function index()
    {
        $data['fakultas'] = Fakultas::all();
        $data['prefix'] = $this->setPrefix();
        return view('base.base-root-index', $data);
    }
}
