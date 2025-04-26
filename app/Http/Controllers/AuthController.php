<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * Show the login form
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Handle the login request
     */
    public function login(Request $request)
    {
        $key = 'login.' . Str::slug($request->email);
        $maxAttempts = config('admin.max_login_attempts', 3);
        $lockoutTime = config('admin.lockout_time', 300); // 5 minutes

        if (RateLimiter::tooManyAttempts($key, $maxAttempts)) {
            $seconds = RateLimiter::availableIn($key);
            return back()->withErrors([
                'email' => "Too many login attempts. Please try again in {$seconds} seconds.",
            ]);
        }

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            RateLimiter::clear($key);
            
            $request->session()->regenerate();
            
            // Redirect to intended URL or admin dashboard
            $intended = session()->pull('url.intended', route('admin.index'));
            // If intended URL contains old admin path, redirect to new secure path
            $intended = str_replace('/admin', '/dashboard-' . config('admin.url_key'), $intended);
            
            return redirect()->to($intended);
        }

        RateLimiter::hit($key, $lockoutTime);

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Handle the logout request
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
