<?php

namespace JobMetric\Panelio;

use Illuminate\Support\Facades\Route;
use JobMetric\PackageCore\PackageCore;

class RouteRegistry
{
    protected static array $routes = [];

    /**
     * Add Panel route.
     *
     * @param PackageCore $package
     *
     * @return void
     */
    public static function addPanel(PackageCore $package): void
    {
        self::$routes[] = function () use ($package) {
            Route::prefix($package->name)->group(realpath($package->option['basePath'] . '/../routes/panel.php'));
        };
    }

    /**
     * Register all routes in the registry.
     *
     * @return void
     */
    public static function registerRoutes(): void
    {
        foreach (self::$routes as $route) {
            $route();
        }
    }
}
