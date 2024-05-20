<?php

namespace App\View\Components;

use A17\Twill\Facades\TwillAppSettings;
use App\Models\MenuLink;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Menu extends Component
{
    public function render(): View
    {
        /** @var MenuLink[] $links */
        $links = MenuLink::published()->get()->toTree();
        
        //Logo
        $settings = TwillAppSettings::getGroupDataForSectionAndName('general', 'general');
        $image = $settings->image('logo', 'default');
        $hasImage = $settings->hasImage('logo');
        return view('components.menu', ['links' => $links, 'image' => $image, 'hasImage' => $hasImage]);
    }
}
