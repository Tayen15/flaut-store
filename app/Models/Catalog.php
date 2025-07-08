<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Catalog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'brand_id', 'name', 'slug', 'sku', 'description', 'short_description',
        'base_price', 'selling_price', 'cost_price', 'weight', 'dimensions',
        'material', 'care_instructions', 'gender', 'age_group', 'season',
        'status', 'is_featured', 'meta_title', 'meta_description', 'meta_keywords'
    ];

    protected $casts = [
        'dimensions' => 'array',
        'is_featured' => 'boolean',
        'base_price' => 'decimal:2',
        'selling_price' => 'decimal:2',
        'cost_price' => 'decimal:2',
        'weight' => 'decimal:2',
    ];

    // Relationships
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function categories()
    {
        return $this->belongsToMany(CategoriesCatalog::class, 'product_categories', 'catalog_id', 'category_id');
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class, 'catalog_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'catalog_id');
    }

    public function primaryImage()
    {
        return $this->hasOne(ProductImage::class, 'catalog_id')->where('is_primary', true);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByGender($query, $gender)
    {
        return $query->where('gender', $gender);
    }

    // Accessors
    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->selling_price, 0, ',', '.');
    }

    public function getDiscountPercentageAttribute()
    {
        if ($this->base_price > $this->selling_price) {
            return round((($this->base_price - $this->selling_price) / $this->base_price) * 100);
        }
        return 0;
    }
}
