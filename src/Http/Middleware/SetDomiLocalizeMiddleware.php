<?php

namespace JobMetric\Panelio\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetDomiLocalizeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        DomiLocalize('language', [
            'package_core' => trans('package-core::base'),
            'panelio' => [
                'button' => trans('panelio::base.button'),
            ],
        ]);

        return $next($request);
    }
}
