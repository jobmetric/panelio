<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cache Time
    |--------------------------------------------------------------------------
    |
    | Cache time for panelio
    |
    | - set zero for remove cache
    | - set null for forever
    |
    | - unit: minutes
    */

    "cache_time" => env("PANELIO_CACHE_TIME", 0),

    /*
    |--------------------------------------------------------------------------
    | Page Limit
    |--------------------------------------------------------------------------
    |
    | Page Limit for panelio
    */

    "page_limit" => env("PANELIO_PAGE_LIMIT", 20),

];
