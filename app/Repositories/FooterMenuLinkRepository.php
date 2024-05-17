<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleNesting;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\FooterMenuLink;

class FooterMenuLinkRepository extends ModuleRepository
{
    use HandleNesting;

    protected $relatedBrowsers = ['page'];

    public function __construct(FooterMenuLink $model)
    {
        $this->model = $model;
    }
}
