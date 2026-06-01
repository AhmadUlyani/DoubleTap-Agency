<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientInsight extends Model
{
    protected $fillable = [
        'client_id',
        'icon',
        'title',
        'description',
        'sort_order',
    ];
}