<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'category_id', 'content', 'author', 'image'];


    public function getImageUrlAttribute()
    {
        return asset('storage/image/news/' . $this->image);
    }

    public function category()
    {
        return $this->belongsTo(CategoriesNews::class, 'id');
    }
}
