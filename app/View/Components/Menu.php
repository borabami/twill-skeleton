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
        $image = TwillAppSettings::getGroupDataForSectionAndName('logo', 'logo')->image('logo', 'default');

        return view('components.menu', ['links' => $links, 'image' => $image]);
    }
}
