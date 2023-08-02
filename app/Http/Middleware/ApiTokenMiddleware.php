<?php

namespace App\Http\Middleware;

use Closure;

class ApiTokenMiddleware
{
    public function handle($request, Closure $next)
    {
        $apiToken = session('api_token');

        if ($apiToken) {
            $request->headers->set('Authorization', 'Bearer ' . $apiToken);
        }

        return $next($request);
    }
}
