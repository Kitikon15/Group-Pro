<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminEditMode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is admin and edit mode is enabled
        if (Auth::check() && Auth::user()->is_admin && $request->query('edit_mode') === 'true') {
            // Set global variable for edit mode
            $GLOBALS['editMode'] = true;
            // Share edit mode status with views
            view()->share('editMode', true);
        } else {
            $GLOBALS['editMode'] = false;
            view()->share('editMode', false);
        }

        return $next($request);
    }
}