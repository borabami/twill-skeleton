<?php

namespace App\Repositories;


use A17\Twill\Repositories\ModuleRepository;
use App\Models\ContactRequest;

class ContactRequestRepository extends ModuleRepository
{
    

    public function __construct(ContactRequest $model)
    {
        $this->model = $model;
    }
}
