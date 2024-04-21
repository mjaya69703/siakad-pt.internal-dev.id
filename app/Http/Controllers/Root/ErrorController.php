<?php

namespace App\Http\Controllers\Root;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// EKSTENSION
use Alert;

class ErrorController extends Controller
{
    public function ErrorVerify(){
        $data['title'] = "ESEC - ESchool Ecosystem";
        $data['menu'] = "Error Verify";
        $data['submenu'] = "Please verify your account";
        $data['subdesc'] = "Errors, Please check inbox mail to verify your account";

        return view('base.base-errors-index',$data);
    }

    public function ErrorAccess(){
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
