<?php

namespace JobMetric\Panelio;

use Illuminate\Support\Facades\Blade;
use JobMetric\PackageCore\Exceptions\RegisterClassTypeNotFoundException;
use JobMetric\PackageCore\PackageCore;
use JobMetric\PackageCore\PackageCoreServiceProvider;

class PanelioServiceProvider extends PackageCoreServiceProvider
{
    /**
     * package configuration
     *
     * @param PackageCore $package
     *
     * @return void
     * @throws RegisterClassTypeNotFoundException
     */
    public function configuration(PackageCore $package): void
    {
        $package->name('panelio')
            ->hasConfig()
            ->hasTranslation()
            ->hasRoute()
            ->hasComponent()
            ->registerClass('Panelio', Panelio::class);
    }

    /**
     * After Boot Package
     *
     * @return void
     */
    public function afterBootPackage(): void
    {
        // add alias for components
        Blade::component('panelio::components.button', 'button');
    }
}
