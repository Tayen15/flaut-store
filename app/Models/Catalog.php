<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'image', 'category', 'author'];
    
    public static $categories = ['t-shirt', 'shirt', 'pants', 'accessories'];

    public function getImageUrlAttribute()
    {
        return asset('storage/image/catalog/' . $this->image);
    }

    public function getCategoryOptionsAttribute()
    {
        return $this->categories;
    }
}
