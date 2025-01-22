<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'category_id', 'price', 'image', 'category', 'author'];
    

    public function getImageUrlAttribute()
    {
        return asset('storage/image/catalog/' . $this->image);
    }

    public function category()
    {
        return $this->belongsTo(CategoriesItemCatalog::class, 'category_id');
    }
}
