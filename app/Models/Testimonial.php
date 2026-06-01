<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name',
        'business',
        'message',
        'package_name',
        'sort_order',
    ];
}