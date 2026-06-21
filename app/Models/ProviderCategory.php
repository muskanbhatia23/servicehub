<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProviderCategory extends Model
{
    protected $fillable = [
        'provider_profile_id',
        'category_id',
    ];

    public function providerProfile()
    {
        return $this->belongsTo(ProviderProfile::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}