<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriesCatalog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'parent_id', 'name', 'slug', 'description', 'image', 'icon', 
        'sort_order', 'is_active', 'meta_title', 'meta_description'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    // Relationships
    public function parent()
    {
        return $this->belongsTo(CategoriesCatalog::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(CategoriesCatalog::class, 'parent_id');
    }

    public function products()
    {
        return $this->belongsToMany(Catalog::class, 'product_categories', 'category_id', 'catalog_id');
    }

    // Legacy relationship for backward compatibility
    public function items()
    {
        return $this->hasMany(CategoriesItemCatalog::class, 'id');
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeRoot($query)
    {
        return $query->whereNull('parent_id');
    }

    public function scopeOrderBySort($query)
    {
        return $query->orderBy('sort_order');
    }

    // Helper methods
    public function getFullNameAttribute()
    {
        $names = collect([$this->name]);
        $parent = $this->parent;
        
        while ($parent) {
            $names->prepend($parent->name);
            $parent = $parent->parent;
        }
        
        return $names->implode(' > ');
    }
}
