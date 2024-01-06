<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'publish_date', 'author', 'image'];

    public function getImageUrlAttribute()
    {
        return asset('storage/image/news/' . $this->image);
    }
}
