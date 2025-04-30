<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        Log::info('AdminMiddleware: Checking authentication', [
            'is_authenticated' => Auth::check(),
            'user_id' => Auth::id(),
            'user_roles' => Auth::check() ? Auth::user()->getRoleNames()->toArray() : [],
            'request_path' => $request->path()
        ]);

        if (!Auth::check()) {
            Log::warning('AdminMiddleware: User not authenticated');
            return redirect()->route('login')->with('error', 'Please login to access this page.');
        }

        if (!Auth::user()->hasRole('admin')) {
            Log::warning('AdminMiddleware: User does not have admin role', [
                'user_id' => Auth::id(),
                'roles' => Auth::user()->getRoleNames()->toArray()
            ]);
            abort(403, 'Unauthorized access');
        }

        return $next($request);
    }
}
