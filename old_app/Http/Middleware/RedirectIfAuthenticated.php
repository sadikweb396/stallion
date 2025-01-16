<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $guards = null)
    {
        // Ensure guards is treated as a string or array properly
        $guards = $guards ?? 'web';  // Default to 'web' guard if no guard is provided
        switch ($guards) {
            case 'admin':
                if (Auth::guard($guards)->check()) {
                    return redirect()->route('profile');
                }
                break;
    
            case 'owner':
                if (Auth::guard($guards)->check()) {
                    return redirect()->route('profile');
                }
                break;
    
            default:
                if (Auth::guard($guards)->check()) {
                    return redirect()->route('profile');
                }
                break;
        }
    
        return $next($request);
    }
    
}
