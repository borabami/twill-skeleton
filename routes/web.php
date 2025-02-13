<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(config('skeleton.enabled_caches'))->group(function () {
    /**
     * 
     */
    Route::get('/', [\App\Http\Controllers\PageDisplayController::class, 'home'])->name('frontend.home');
    Route::get('{slug}', [\App\Http\Controllers\PageDisplayController::class, 'show'])->name('frontend.page');

    Route::post('/contact', [ContactController::class, 'submitContactForm'])->name('form.contact');
});
