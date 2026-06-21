<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'booking_number',
        'customer_id',
        'provider_profile_id',
        'category_id',
        'state_id',
        'city_id',
        'area_id',
        'service_date',
        'service_time',
        'customer_note',
        'status',
        'accepted_at',
        'completed_at',
    ];

    protected $casts = [
        'service_date' => 'date',
        'accepted_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function provider()
    {
        return $this->belongsTo(ProviderProfile::class, 'provider_profile_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}