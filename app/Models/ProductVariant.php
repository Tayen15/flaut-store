<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariant extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'catalog_id', 'name', 'sku', 'price', 'compare_at_price', 'stock_quantity', 'weight', 'track_quantity', 'is_active', 'is_default'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'compare_at_price' => 'decimal:2',
        'weight' => 'decimal:2',
        'stock_quantity' => 'integer',
        'track_quantity' => 'boolean',
        'is_active' => 'boolean',
        'is_default' => 'boolean',
    ];

    // Relationships
    public function catalog()
    {
        return $this->belongsTo(Catalog::class, 'catalog_id');
    }

    public function attributes()
    {
        return $this->belongsToMany(
            Attribute::class,
            'product_variant_attributes',
            'variant_id',
            'attribute_id'
        )->withPivot('attribute_value_id');
    }

    public function attributeValues()
    {
        return $this->belongsToMany(
            AttributeValue::class,
            'product_variant_attributes',
            'variant_id',
            'attribute_value_id'
        );
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'variant_id');
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class, 'variant_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'variant_id');
    }

    // Scopes
    public function scopeInStock($query)
    {
        return $query->where('stock_quantity', '>', 0);
    }

    public function scopeDefault($query)
    {
        return $query->where('is_default', true);
    }

    // Accessors
    public function getFinalPriceAttribute()
    {
        return $this->price ?? $this->product->selling_price;
    }

    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->final_price, 0, ',', '.');
    }

    // Helper methods
    public function getAttributeText()
    {
        return $this->attributeValues->map(function ($value) {
            return $value->attribute->name . ': ' . $value->value;
        })->implode(', ');
    }

    public function isInStock()
    {
        return $this->stock_quantity > 0;
    }
}
