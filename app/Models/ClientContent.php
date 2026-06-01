<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientContent extends Model
{
    protected $fillable = [
        'client_id',
        'publish_date',
        'display_date',
        'title',
        'type',
        'reach',
        'likes',
        'comments',
        'sort_order',
    ];

    protected $casts = [
        'publish_date' => 'date',
    ];
}
