<?php

namespace JobMetric\Panelio\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array get(string $button)
 * @method static void save(string $title = null, string $form = null)
 * @method static void saveClose(string $title = null, string $form = null)
 * @method static void saveNew(string $title = null, string $form = null)
 * @method static void cancel(string $url = null, string $title = null)
 * @method static void add(string $url = null, string $title = null)
 * @method static void addModal(string $title = null, array $modal_config = [])
 * @method static void delete(string $title = null)
 * @method static void status(string $title_enable = null, string $title_disable = null)
 * @method static void block(string $title_block = null, string $title_unblock = null)
 * @method static void import(array $types = [], string $title = null)
 * @method static void export(array $types = [], string $title = null)
 * @method static void bulk(string $title = null, array $modal_config = [])
 * @method static void setting(string $title = null, array $modal_config = [])
 * @method static void link(string $title, string $url)
 * @method static void help(string $title = null, array $modal_config = [])
 *
 * @see \JobMetric\Panelio\Services\Button
 */
class Button extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return \JobMetric\Panelio\Services\Button::class;
    }
}
