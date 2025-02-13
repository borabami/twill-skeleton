<?php

namespace App\Providers;

use A17\Twill\Facades\TwillAppSettings;
use A17\Twill\Services\Settings\SettingsGroup;
use Illuminate\Support\ServiceProvider;
use A17\Twill\Facades\TwillNavigation;
use A17\Twill\View\Components\Navigation\NavigationLink;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        Schema::defaultStringLength(191);
        TwillNavigation::addLink(
            NavigationLink::make()->forModule('pages')
        );
        TwillNavigation::addLink(
            NavigationLink::make()->forModule('menuLinks')->title('Header menu')
        );
        TwillNavigation::addLink(
            NavigationLink::make()->forModule('footerMenuLinks')->title('Footer menu')
        );
        TwillNavigation::addLink(
            NavigationLink::make()->forModule('contactRequests')->title('Contact requests')
        );

        /**
         * Settings
         */
        TwillAppSettings::registerSettingsGroups(
            SettingsGroup::make()->name('general')->label('General'),
            SettingsGroup::make()->name('homepage')->label('Homepage'),
            SettingsGroup::make()->name('seo')->label(twillTrans('twill-metadata::form.titles.fieldset')),
            SettingsGroup::make()->name('google')->label('Google Analytics'),
            SettingsGroup::make()->name('iubenda')->label('Iubenda'),
            SettingsGroup::make()->name('matomo')->label('Matomo'),
        );
    }
}
