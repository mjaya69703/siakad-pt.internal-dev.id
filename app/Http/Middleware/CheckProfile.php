<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $profile)
    {
        $user = Auth::user();

        if (!$user || $user->profile !== $profile) {
            abort(403, 'Unauthorized. You need to be a ' . $profile);
        }

        return $next($request);
    }
}
