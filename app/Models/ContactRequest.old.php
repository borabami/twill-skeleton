<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactRequest extends Model
{
    use HasFactory;

    protected $fillable = ['to', 'subject', 'success_message', 'privacy_disclaimer', 'form_data', 'contact_block_id'];

    protected $casts = [
        'form_data' => 'array',
    ];
}
