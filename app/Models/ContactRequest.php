<?php

namespace App\Models;

use A17\Twill\Models\Block;
use A17\Twill\Models\Model;

class ContactRequest extends Model
{
    protected $fillable = [
        'to',
        'subject',
        'success_message',
        'privacy_disclaimer',
        'form_data',
        'contact_block_id'
    ];

    protected $casts = [
        'form_data' => 'array',
    ];

    /**
     * 
     */
    public function contact_block()
    {
        return $this->belongsTo(Block::class, 'contact_block_id');
    }

    /**
     * 
     */
    public function blockable()
    {
        return $this->contact_block->blockable();
    }
}
