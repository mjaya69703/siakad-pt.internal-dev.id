<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah pengguna sudah login
        if (auth()->check()) {
            // Jika sudah login, cek tipe pengguna
            if(auth()->user()->status == 1){
                return $next($request);
            }

            return redirect()->route('error.access');
        }

        // Jika belum login, arahkan ke rute 'auth-login'
        return redirect()->route('admin.auth-signin-page');
    }
}
