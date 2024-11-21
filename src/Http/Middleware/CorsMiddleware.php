<?php

namespace JobMetric\Panelio\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Check if the response is an instance of Response
        if ($response instanceof \Illuminate\Http\Response || $response instanceof \Illuminate\Http\JsonResponse) {
            $response->headers->set("Access-Control-Allow-Origin", "*");
            $response->headers->set("Access-Control-Allow-Methods", "GET, POST, PUT, PATCH, DELETE, OPTIONS");
            $response->headers->set("Access-Control-Allow-Headers", "Content-Type, X-Auth-Token, Origin, Authorization");
        }

        return $response;
    }
}
