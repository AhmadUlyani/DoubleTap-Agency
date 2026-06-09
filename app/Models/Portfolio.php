<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'icon',
        'image',
        'theme',
        'type',
        'title',
        'description',
        'likes',
        'reach',
        'tags',
        'sort_order',
    ];

    protected $casts = [
        'tags' => 'array',
    ];
}