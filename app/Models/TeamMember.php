<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = [
        'icon',
        'role',
        'focus',
        'description',
        'skills',
        'sort_order',
    ];

    protected $casts = [
        'skills' => 'array',
    ];
}