<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function renderSignin()
    {
        $data['menus'] = "Login";
        $data['pages'] = "Authentication";
        $data['academy'] = "Siakad PT by Esec Academy";

        return view('central.auth.signin-content', $data);
    }

    public function handleSignin(Request $request)
    {

        $request->validate([
            'login' => 'required',
            'password' =>'required',
        ]);

        $login = $request->login;

        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
        


    }
}
