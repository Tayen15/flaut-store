<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesCatalog extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function items()
    {
        return $this->hasMany(CategoriesItemCatalog::class, 'id');
    }
}
