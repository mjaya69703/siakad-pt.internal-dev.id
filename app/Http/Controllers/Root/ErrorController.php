<?php

namespace App\Http\Controllers\Root;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// EKSTENSION
use Alert;
use Auth;
// Models
use App\Models\Settings\webSettings;

class ErrorController extends Controller
{
    private function setPrefix()
    {
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

    public function ErrorVerify(){
        $data['web'] = webSettings::where('id', 1)->first();
        $data['prefix'] = $this->setPrefix();
        $data['title'] = "ESEC - ESchool Ecosystem";
        $data['menu'] = "Error Verify";
        $data['submenu'] = "Please verify your account";
        $data['subdesc'] = "Errors, Please check inbox mail to verify your account";

        return view('base.base-errors-index',$data);
    }

    public function ErrorAccess(){
        
        $data['prefix'] = $this->setPrefix();
        $data['web'] = webSettings::where('id', 1)->first();
        $data['title'] = "ESEC - ESchool Ecosystem";
        $data['menu'] = "Error Authorization";
        $data['submenu'] = "You are not authorized to access this page";
        $data['subdesc'] = "Error, you are not allowed to enter this page";

        return view('base.base-errors-index',$data);
    }

    public function ErrorNotFound(){

        Alert::error('Error 404', 'Halaman tidak ditemukan');
        return back();
    }
}
