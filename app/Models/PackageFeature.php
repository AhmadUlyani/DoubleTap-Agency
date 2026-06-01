<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageFeature extends Model
{
    protected $fillable = [
        'service_package_id',
        'feature',
        'is_included',
        'sort_order',
    ];
}