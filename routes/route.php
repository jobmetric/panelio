<?php

use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use JobMetric\Language\Http\Middleware\SetLanguageMiddleware;
use JobMetric\Panelio\Http\Controllers\PanelioController;
use JobMetric\Panelio\Http\Middleware\AuthMiddleware;
use JobMetric\Panelio\RouteRegistry;

/*
|--------------------------------------------------------------------------
| Laravel Panelio Routes
|--------------------------------------------------------------------------
|
| All Route in Laravel Panelio package
|
*/

// panelio
Route::prefix('panelio')->name('panelio.')->namespace('JobMetric\Panelio\Http\Controllers')->group(function () {
    Route::middleware([
        SubstituteBindings::class
    ])->group(function () {
        // panelio routes
    });
});

// panel
Route::prefix('p')->name('panel.')->group(function () {
    Route::middleware([
        AddQueuedCookiesToResponse::class,
        StartSession::class,
        ShareErrorsFromSession::class,
        SubstituteBindings::class,
        SetLanguageMiddleware::class,
        AuthMiddleware::class
    ])->group(function () {
        Route::get('/', [PanelioController::class, 'index'])->name('index');

        // some panel routes
        RouteRegistry::registerRoutes();
    });
});
