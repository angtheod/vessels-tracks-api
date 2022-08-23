<?php

namespace App\Http\Middleware;

use App\Models\Api\V1\ApiLogRequest;
use App\Models\Api\V1\ApiLogResponse;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class LogMiddleware
{
    protected static int $LAST_INSERTED_ID;

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
        self::$LAST_INSERTED_ID = ApiLogRequest::query()->create([
            'ip_address' => $request->ip(),
            'method' => $request->getMethod(),
            'uri' => $request->getUri(),
            'params' => json_encode($request->query()),
            'content' => $request->getContent()
        ])->id;

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
        // DB Logging
        ApiLogResponse::query()->create([
            'request_id' => self::$LAST_INSERTED_ID,
            'content' => Str::limit($response->getContent(), 10000),
            'status_code' => $response->status(),
            'status_message' => $response->statusText(),
        ]);

        // Fs logging
        Log::info('Outgoing response:');
        Log::info($response);
    }
}
