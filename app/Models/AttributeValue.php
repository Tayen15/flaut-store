<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'attribute_id', 'value', 'color_code', 'sort_order'
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];

    // Relationships
    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    public function variants()
    {
        return $this->belongsToMany(
            ProductVariant::class,
            'product_variant_attributes',
            'attribute_value_id',
            'variant_id'
        );
    }

    // Scopes
    public function scopeOrderBySort($query)
    {
        return $query->orderBy('sort_order');
    }
}
