<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesCatalog extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id'];

    public function items()
    {
        return $this->hasMany(CategoryItem::class);
    }

    public function category()
    {
        return $this->belongsTo(CategoriesCatalog::class);
    }
}
