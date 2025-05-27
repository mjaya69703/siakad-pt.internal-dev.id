<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class checkUser
{

    public function handle(Request $request, Closure $next, $userType): Response
    {
        // Cek apakah pengguna sudah login sebagai salah satu guard
        if (Auth::check() || Auth::guard('dosen')->check() || Auth::guard('mahasiswa')->check()) {
            $user = Auth::user() ?: Auth::guard('dosen')->user() ?: Auth::guard('mahasiswa')->user();

            // Cek tipe pengguna
            if ($user->type === $userType) {
                return $next($request);
            }

            // Redirect ke halaman error akses
            // return redirect()->route('error.access');
            Alert::error('error', 'kamu tidak diizinkan masuk');
            return back();
        }

        // Jika belum login, arahkan ke rute 'auth-login'
        return redirect()->route('auth.render-signin');
    }
}
