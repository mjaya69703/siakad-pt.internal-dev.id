<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Pengaturan\WebSetting;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\QueryException;
use Exception;

class FirstSetup
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            // Check if WebSetting exists
            $webSetting = WebSetting::first();
            
            // If no WebSetting exists, redirect to welcome page
            if (!$webSetting) {
                return redirect()->route('root.welcome');
            }
        } catch (QueryException $e) {
            // Handle database connection errors (e.g., wrong database name, connection issues)
            return redirect()->route('root.welcome')->with('error', 'Database connection error. Please check your database configuration.');
        } catch (Exception $e) {
            // Handle any other exceptions
            return redirect()->route('root.welcome')->with('error', 'An error occurred while checking system setup.');
        }

        return $next($request);
    }
}