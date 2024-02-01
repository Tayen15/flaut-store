<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesCatalog extends Model
{
    use HasFactory;

    public function catalog()
    {
        return $this->hasMany(Catalog::class, 'id_category');
    }
}
