<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Middleware page cache
    |--------------------------------------------------------------------------
    |
    | This option controls the middleware to use for caching frontend pages.
    |
    */

    'enabled_caches' => (env('ENABLED_CACHE', '') === "") ? [] : explode(',', env('ENABLED_CACHE', '')),

];
