<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    protected $fillable = [
        'business_name',
        'username',
        'password',
        'business_type',
        'service_package_id',
    ];

    public function package(): BelongsTo
    {
        return $this->belongsTo(ServicePackage::class, 'service_package_id');
    }

    public function stats(): HasMany
    {
        return $this->hasMany(ClientStat::class);
    }

    public function contents(): HasMany
    {
        return $this->hasMany(ClientContent::class);
    }

    public function insights(): HasMany
    {
        return $this->hasMany(ClientInsight::class);
    }

    public function recommendations(): HasMany
    {
        return $this->hasMany(ClientRecommendation::class);
    }
}