<?php

namespace JobMetric\Panelio\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array get()
 * @method static void addMiddleware(string $class, int $position = 0)
 * @method static array getMiddlewares()
 *
 * @see \JobMetric\Panelio\Middleware
 */
class Middleware extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return \JobMetric\Panelio\Middleware::class;
    }
}
