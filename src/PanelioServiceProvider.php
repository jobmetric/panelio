<?php

namespace JobMetric\Panelio;

use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use JobMetric\Language\Http\Middleware\SetLanguageMiddleware;
use JobMetric\PackageCore\Enums\RegisterClassTypeEnum;
use JobMetric\PackageCore\Exceptions\AssetFolderNotFoundException;
use JobMetric\PackageCore\Exceptions\RegisterClassTypeNotFoundException;
use JobMetric\PackageCore\PackageCore;
use JobMetric\PackageCore\PackageCoreServiceProvider;
use JobMetric\Panelio\Facades\Middleware;
use JobMetric\Panelio\Http\Middleware\AuthMiddleware;
use JobMetric\Panelio\Services\Button;
use JobMetric\Panelio\View\Components\ListView;
use JobMetric\Panelio\View\Components\TileLink;
use JobMetric\Panelio\View\Components\TileStatistics;

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
            ->registerClass('Panelio', Panelio::class)
            ->registerClass('Button', Button::class, RegisterClassTypeEnum::SINGLETON());
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

        $this->app->singleton('panelio_middleware', function () {
            return [];
        });

        // add middleware
        Middleware::addMiddleware(AddQueuedCookiesToResponse::class);
        Middleware::addMiddleware(StartSession::class, 10);
        Middleware::addMiddleware(ShareErrorsFromSession::class, 20);
        Middleware::addMiddleware(SubstituteBindings::class, 30);
        Middleware::addMiddleware(SetLanguageMiddleware::class, 40);
        Middleware::addMiddleware(AuthMiddleware::class, 50);
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
        Blade::component(TileStatistics::class, 'tile-statistics');
        Blade::component(ListView::class, 'list-view');

        addLanguageScript();
    }
}
