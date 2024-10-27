<?php

namespace JobMetric\Panelio\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Illuminate\Http\JsonResponse of(object $object, array $extra = [], int $count = null)
 * @method static string getSort(string $default = '')
 * @method static string getOrder(string $default = '')
 *
 * @see \JobMetric\Panelio\Services\Datatable
 */
class Datatable extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return \JobMetric\Panelio\Services\Datatable::class;
    }
}
