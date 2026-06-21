<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'mobile',
        'email',
        'password',
        'language',
        'status',
        'is_verified',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function providerProfile()
    {
        return $this->hasOne(ProviderProfile::class);
    }

    public function activeSession()
{
    return $this->hasOne(ActiveSession::class);
}
}