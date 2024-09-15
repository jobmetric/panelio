<?php

namespace JobMetric\Panelio\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void sample()
 *
 * @see \JobMetric\Panelio\Panelio
 */
class Panelio extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return \JobMetric\Panelio\Panelio::class;
    }
}
