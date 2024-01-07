<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarouselImage extends Model
{
    use HasFactory;
    protected $fillable = ['url', 'alt_text'];

    public function getImageUrlAttribute()
    {
        return asset('storage/image/carousel/' . $this->image);
    }
}
