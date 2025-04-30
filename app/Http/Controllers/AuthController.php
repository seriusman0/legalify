<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Log;
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

        Log::info('Login attempt', [
            'email' => $request->email,
            'remember' => $request->boolean('remember')
        ]);

        if (RateLimiter::tooManyAttempts($key, $maxAttempts)) {
            $seconds = RateLimiter::availableIn($key);
            Log::warning('Too many login attempts', [
                'email' => $request->email,
                'lockout_seconds' => $seconds
            ]);
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
            
            Log::info('Login successful', [
                'user_id' => Auth::id(),
                'email' => $request->email,
                'roles' => Auth::user()->getRoleNames()->toArray()
            ]);
            
            // Redirect to intended URL or admin dashboard
            $intended = session()->pull('url.intended', route('admin.index'));
            // If intended URL contains old admin path, redirect to new secure path
            $intended = str_replace('/admin', '/dashboard-' . config('admin.url_key'), $intended);
            
            return redirect()->to($intended);
        }

        RateLimiter::hit($key, $lockoutTime);

        Log::warning('Login failed', [
            'email' => $request->email
        ]);

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Handle the logout request
     */
    public function logout(Request $request)
    {
        Log::info('User logged out', [
            'user_id' => Auth::id()
        ]);

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
