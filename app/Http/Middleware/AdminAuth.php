<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('admin.login');
        }
        
        // Check if the authenticated user is an admin
        if (!Auth::user()->is_admin) {
            // If not an admin, redirect to the main login page or home page
            Auth::logout();
            return redirect()->route('login')->withErrors(['error' => 'คุณไม่มีสิทธิ์เข้าถึงหน้านี้']);
        }
        
        return $next($request);
    }
}