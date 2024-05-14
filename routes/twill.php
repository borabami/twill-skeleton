<?php

use A17\Twill\Facades\TwillRoutes;
use App\Http\Controllers\CustomPageController;
use Illuminate\Support\Facades\Route;

TwillRoutes::module('pages');
TwillRoutes::module('menuLinks');

TwillRoutes::module('footerMenuLinks');

Route::name('contact.requests')->get('contact/requests', [CustomPageController::class, 'showContactRequests']);