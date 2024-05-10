<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MhsAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $MahasiswaMhsStat): Response
    {
        // Cek apakah pengguna sudah login
        if (auth()->guard('mahasiswa')->check()) {
            // Jika sudah login, cek tipe pengguna
            if(auth()->guard('mahasiswa')->user()->mhs_stat == $MahasiswaMhsStat){
                return $next($request);
            }

            // return redirect()->route('error.access');
        }

        // Jika belum login, arahkan ke rute 'auth-login'
        return redirect()->route('mahasiswa.auth-signin-page');
    }
}
