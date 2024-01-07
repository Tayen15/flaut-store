<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'alt_text',
    ];

    public function getImageUrlAttribute()
    {
        return asset('storage/image/carousel/' . $this->image);
    }
}
