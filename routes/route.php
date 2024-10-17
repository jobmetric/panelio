<?php

use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Support\Facades\Route;
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
        SubstituteBindings::class
    ])->group(function () {
        // some panel routes
        RouteRegistry::registerRoutes();
    });
});
