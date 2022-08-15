<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        Log::info('Incoming request:');
        Log::info($request->getMethod() . ' ' . $request->getUri());
        return $next($request);
    }

    /**
     * @param Request  $request
     * @param $response
     *
     * @return void
     */
    public function terminate(Request $request, $response): void
    {
        Log::info('Outgoing response:');
        Log::info($response);
    }
}
