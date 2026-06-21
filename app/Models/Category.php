<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'icon',
        'image',
        'description',
        'sort_order',
        'status',
    ];

    public function fields()
    {
        return $this->hasMany(CategoryField::class);
    }

    public function providers()
{
    return $this->hasMany(ProviderCategory::class);
}
}