<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
    ];

    public function getImageUrlAttribute()
    {
        return asset('storage/image/carousel/' . $this->image);
    }
}
