<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
        'city_id',
        'name',
        'slug',
        'status',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function providerServiceAreas()
    {
        return $this->hasMany(ProviderServiceArea::class);
    }
}