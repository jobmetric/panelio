<?php

use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Support\Facades\Route;

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
