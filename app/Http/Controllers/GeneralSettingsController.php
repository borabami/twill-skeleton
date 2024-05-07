<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class GeneralSettingsController extends Controller
{
    /**
     * 
     */
    public function clearSiteCache()
    {

        Artisan::call('page-cache:clear');
        Artisan::call('responsecache:clear');

        return  response()->json([
            'message' => 'Site cache cleared successfully!',
            'variant' => 'success',
        ]);
    }
}
