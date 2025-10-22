<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Show the login form
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
     * Handle login request
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validate the input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ], [
            'username.required' => 'กรุณากรอกชื่อผู้ใช้',
            'password.required' => 'กรุณากรอกรหัสผ่าน',
        ]);

        // Rate limiting: 5 attempts per IP address for 15 minutes
        $this->ensureIsNotRateLimited();

        // Try to authenticate with email first
        $credentials = [
            'email' => $request->username,
            'password' => $request->password,
        ];

        // Attempt to log the user in with email
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            // Regenerate session to prevent session fixation
            $request->session()->regenerate();
            
            // Clear the rate limiter for this user
            $this->clearLoginAttempts($request);
            
            // Redirect to intended page or admin dashboard
            return redirect()->intended(route('admin.dashboard'));
        }

        // Authentication failed - increment the rate limiter
        $this->incrementLoginAttempts($request);

        // Authentication failed
        return back()->withErrors([
            'username' => 'อีเมลหรือรหัสผ่านไม่ถูกต้อง',
        ])->withInput($request->only('username'));
    }

    /**
     * Ensure the user is not rate limited
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function ensureIsNotRateLimited()
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        $seconds = RateLimiter::availableIn($this->throttleKey());

        // Convert seconds to minutes for error message
        $minutes = ceil($seconds / 60);

        abort(429, __('Too many login attempts. Please try again in :minutes minutes.', ['minutes' => $minutes]));
    }

    /**
     * Increment the login attempts for the user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function incrementLoginAttempts($request)
    {
        RateLimiter::hit($this->throttleKey());
    }

    /**
     * Clear the login attempts for the user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function clearLoginAttempts($request)
    {
        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Get the rate limiting throttle key for the request
     *
     * @return string
     */
    protected function throttleKey()
    {
        return Str::transliterate(Str::lower(request('username')).'|'.request()->ip());
    }

    /**
     * Log the user out of the application
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();
        
        // Invalidate the session
        $request->session()->invalidate();
        
        // Regenerate CSRF token
        $request->session()->regenerateToken();
        
        // Redirect to index page after admin logout
        return redirect()->route('index');
    }
}