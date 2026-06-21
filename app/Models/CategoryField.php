<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryField extends Model
{
    protected $fillable = [
        'category_id',
        'label',
        'field_name',
        'field_type',
        'is_required',
        'is_searchable',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'is_required' => 'boolean',
        'is_searchable' => 'boolean',
        'status' => 'boolean',
    ];

    /**
     * Category Relationship
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Dropdown Options
     */
    public function options()
    {
        return $this->hasMany(FieldOption::class);
    }

    /**
     * Provider Values
     */
    public function values()
    {
        return $this->hasMany(ProviderFieldValue::class);
    }
}