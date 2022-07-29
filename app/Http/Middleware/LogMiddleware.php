<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
        $request::create();
        Log::info('Incoming request:');
        Log::info($request);
        return $next($request);
    }
    public function terminate(Request $request, Response $response)
    {
        Log::info('Outgoing response:');
        Log::info($response);
    }
}