<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'category', 'content', 'author', 'image'];

    public static $categories = ['fashion trends', 'fashion events', 'celebrity fashion', 'beauty and style tips'];

    public function getImageUrlAttribute()
    {
        return asset('storage/image/news/' . $this->image);
    }
}
