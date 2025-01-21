<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryItem extends Model
{
    use HasFactory;

    public function catalog()
    {
        return $this->hasMany(Catalog::class, 'category_id');
    }
}
