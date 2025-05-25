<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DevController extends Controller
{
    public function index()
    {
        $data['menus'] = null;
        $data['pages'] = "HomePage";
        $data['academy'] = "Siakad PT by Esec Academy";

        return view('central.main-content', $data);
    }
}
