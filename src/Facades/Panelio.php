<?php

namespace JobMetric\Panelio\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array get()
 * @method static void addPanel(string $slug, array $params = [])
 * @method static array getPanels()
 * @method static array getPanel(string $slug)
 * @method static void addSection(string $panelSlug, string $sectionSlug, array $params = [])
 * @method static array getSections(string $panelSlug)
 * @method static array getSection(string $panelSlug, string $slug)
 * @method static void addMenu(string $panelSlug, string $sectionSlug, array $params = [])
 * @method static array getMenus(string $panelSlug, string $sectionSlug)
 * @method static void addSubmenu(string $panelSlug, string $sectionSlug, string $menuName, array $params = [])
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
