<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProviderProfile extends Model
{
    protected $fillable = [
        'user_id',
        'state_id',
        'profile_image',
        'about',
        'gender',
        'average_rating',
        'total_reviews',
        'trial_start_date',
        'trial_end_date',
        'subscription_status',
        'profile_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function documents()
    {
        return $this->hasMany(ProviderDocument::class);
    }

    public function fieldValues()
    {
        return $this->hasMany(ProviderFieldValue::class);
    }

    public function serviceAreas()
    {
        return $this->hasMany(ProviderServiceArea::class);
    }

    public function categories()
    {
        return $this->hasMany(ProviderCategory::class);
    }
    
}