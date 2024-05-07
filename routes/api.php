<?php

use App\Http\Controllers\GeneralSettingsController;
use App\Http\Controllers\Twill\PageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('pages/{id}/clear-cache', [PageController::class, 'clearPageCache'])->name('page.clear.cache');
Route::get('clear-cache', [GeneralSettingsController::class, 'clearSiteCache'])->name('site.clear.cache');

