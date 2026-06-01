<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientRecommendation extends Model
{
    protected $fillable = [
        'client_id',
        'recommendation',
        'sort_order',
    ];
}