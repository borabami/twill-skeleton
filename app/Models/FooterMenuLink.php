<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasPosition;
use A17\Twill\Models\Behaviors\HasNesting;
use A17\Twill\Models\Behaviors\HasRelated;
use A17\Twill\Models\Behaviors\Sortable;
use A17\Twill\Models\Model;

class FooterMenuLink extends Model implements Sortable
{
    use HasPosition, HasNesting, HasRelated;

    protected $fillable = [
        'published',
        'title',
        'position',
        'type',
        'call_to_action_url',
        'open_in_new_tab',
    ];
    
}
