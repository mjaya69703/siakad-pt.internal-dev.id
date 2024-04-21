<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DsnAcces
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $DosenDsnStat): Response
    {
        // Cek apakah pengguna sudah login
        if (auth()->guard('dosen')->check()) {
            // Jika sudah login, cek tipe pengguna
            if(auth()->guard('dosen')->user()->dsn_stat == $DosenDsnStat){
                return $next($request);
            }

            return redirect()->route('error.access');
        }

        // Jika belum login, arahkan ke rute 'auth-login'
        return redirect()->route('dosen.auth-signin-page');
    }
}
