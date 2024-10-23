<?php

namespace JobMetric\Panelio;

use Illuminate\Support\Facades\Blade;
use JobMetric\Category\Events\CategoryTypeEvent;
use JobMetric\PackageCore\Exceptions\AssetFolderNotFoundException;
use JobMetric\PackageCore\Exceptions\RegisterClassTypeNotFoundException;
use JobMetric\PackageCore\PackageCore;
use JobMetric\PackageCore\PackageCoreServiceProvider;
use JobMetric\Panelio\View\Components\TileLink;

class PanelioServiceProvider extends PackageCoreServiceProvider
{
    /**
     * package configuration
     *
     * @param PackageCore $package
     *
     * @return void
     * @throws RegisterClassTypeNotFoundException
     * @throws AssetFolderNotFoundException
     */
    public function configuration(PackageCore $package): void
    {
        $package->name('panelio')
            ->hasConfig()
            ->hasTranslation()
            ->hasRoute()
            ->hasAsset()
            ->hasComponent()
            ->registerClass('Panelio', Panelio::class);
    }

    /**
     * After register package
     *
     * @return void
     */
    public function afterRegisterPackage(): void
    {
        $this->app->singleton('panelio', function () {
            return [];
        });
    }

    /**
     * After Boot Package
     *
     * @return void
     */
    public function afterBootPackage(): void
    {
        // add alias for components
        Blade::component(TileLink::class, 'tile-link');

        addLanguageScript();
    }
}
