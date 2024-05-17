<?php

namespace App\Models;


use A17\Twill\Models\Model;

class ContactRequest extends Model
{
    protected $fillable = ['to', 'subject', 'success_message', 'privacy_disclaimer', 'form_data', 'contact_block_id'];

    protected $casts = [
        'form_data' => 'array',
    ];
}
