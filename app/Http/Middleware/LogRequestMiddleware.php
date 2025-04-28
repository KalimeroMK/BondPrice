<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogRequestMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $start = microtime(true);
        $response = $next($request);
        $duration = microtime(true) - $start;
        Log::info('Request', [
            'uri' => $request->getRequestUri(),
            'method' => $request->getMethod(),
            'duration_ms' => $duration * 1000,
            'input' => $request->all(),
        ]);
        return $response;
    }
}
