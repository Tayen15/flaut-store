<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesItemCatalog extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'name'];

    public function categoriescatalog()
    {
        return $this->belongsTo(CategoriesCatalog::class, 'category_id');
    }

    public function catalog()
    {
        return $this->hasMany(Catalog::class, 'id');
    }
}
