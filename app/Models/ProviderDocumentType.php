<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProviderDocumentType extends Model
{
    protected $fillable = [
        'name',
        'is_required',
        'is_active',
    ];

    public function providerDocuments()
    {
        return $this->hasMany(ProviderDocument::class);
    }
}