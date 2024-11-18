<?php

namespace JobMetric\Panelio\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array get()
 * @method static void add(string $title, string|null $link = null)
 *
 * @see \JobMetric\Panelio\Services\Breadcrumb
 */
class Breadcrumb extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return \JobMetric\Panelio\Services\Breadcrumb::class;
    }
}
