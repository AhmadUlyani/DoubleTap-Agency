<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientReachTrend extends Model
{
    protected $fillable = ['client_id', 'month', 'value', 'sort_order'];
}
