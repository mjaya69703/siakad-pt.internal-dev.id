<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if ($request->expectsJson()) {
            return null;
        }

        // Check which guard is being used and redirect accordingly
        if ($request->is('pendaftar/*')) {
            return route('pendaftar.login');
        }

        // For other routes, redirect to signin
        return route('auth.render-signin');
    }
}
