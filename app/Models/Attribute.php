<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'type', 'is_required', 'sort_order'
    ];

    protected $casts = [
        'is_required' => 'boolean',
        'sort_order' => 'integer',
    ];

    // Relationships
    public function values()
    {
        return $this->hasMany(AttributeValue::class);
    }

    public function variants()
    {
        return $this->belongsToMany(
            ProductVariant::class, 
            'product_variant_attributes',
            'attribute_id',
            'variant_id'
        )->withPivot('attribute_value_id');
    }

    // Scopes
    public function scopeOrderBySort($query)
    {
        return $query->orderBy('sort_order');
    }

    public function scopeRequired($query)
    {
        return $query->where('is_required', true);
    }
}
