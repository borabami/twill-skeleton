<?php

namespace App\View\Components;

use App\Models\FooterMenuLink;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use A17\Twill\Facades\TwillAppSettings;
class Footer extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        /**
         *  @var FooterMenuLink[] $links 
         * 
         * */
        $links = FooterMenuLink::published()->get()->toTree();

        $settings = TwillAppSettings::getGroupDataForSectionAndName('logo', 'logo');
        $image = $settings->image('logo', 'default');
        $hasImage = $settings->hasImage('logo');
        return view('components.footer', ['links' => $links, 'image' => $image, 'hasImage' => $hasImage]);
    }
}
