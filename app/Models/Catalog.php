<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Catalog extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    const IMAGE_PATH = 'storage/image/catalog/';

    public function category()
    {
        return $this->belongsTo(CategoriesItemCatalog::class, 'category_id');
    }

    public function size()
    {
        return $this->belongsTo(CatalogSize::class, 'id');
    }

    public function image()
    {
        Storage::url($this->image);
    }
}
