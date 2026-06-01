<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServicePackage extends Model
{
    protected $fillable = [
        'icon',
        'name',
        'price',
        'period',
        'description',
        'is_highlight',
        'sort_order',
    ];

    public function features(): HasMany
    {
        return $this->hasMany(PackageFeature::class);
    }
}