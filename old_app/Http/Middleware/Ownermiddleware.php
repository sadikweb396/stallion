<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Ownermiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated using the 'owner' guard
        if (!Auth::guard('owner')->check()) {
            // Redirect the user to the owner login page if not authenticated
            return redirect('/owner/login');
        }

        // Allow the request to proceed if authenticated
        return $next($request);
    }
}
