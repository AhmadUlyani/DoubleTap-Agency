<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientHashtag extends Model
{
    protected $fillable = ['client_id', 'hashtag', 'sort_order'];
}
