<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientStat extends Model
{
    protected $fillable = [
        'client_id',
        'icon',
        'label',
        'value',
        'trend',
        'trend_type',
        'sort_order',
    ];
}