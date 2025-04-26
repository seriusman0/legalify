<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class RequestLogger
{
    public function handle(Request $request, Closure $next): Response
    {
        // Start timing
        $startTime = microtime(true);

        // Process request
        $response = $next($request);

        // Calculate execution time
        $executionTime = microtime(true) - $startTime;

        // Log request details
        Log::info('Request Log', [
            'method' => $request->method(),
            'url' => $request->fullUrl(),
            'ip' => $request->ip(),
            'user_id' => auth()->id(),
            'execution_time' => round($executionTime * 1000, 2) . 'ms', // Convert to milliseconds
            'status' => $response->status(),
            'user_agent' => $request->userAgent(),
        ]);

        // Add performance metrics to response headers
        $response->headers->set('X-Execution-Time', round($executionTime * 1000, 2) . 'ms');

        return $response;
    }
}
