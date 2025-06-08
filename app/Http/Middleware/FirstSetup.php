<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Pengaturan\WebSetting;
use Symfony\Component\HttpFoundation\Response;

class FirstSetup
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if WebSetting exists
        $webSetting = WebSetting::first();
        
        // If no WebSetting exists, redirect to welcome page
        if (!$webSetting) {
            return redirect()->route('root.welcome');
        }

        return $next($request);
    }
} 