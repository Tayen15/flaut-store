<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'view_count'];

    protected $casts = [
        'tags' => 'array',
    ];

    const IMAGE_PATH = 'storage/image/news/';

    public function category()
    {
        return $this->belongsTo(CategoriesNews::class, 'id');
    }

    public function status()
    {
        return $this->belongsTo(NewsStatus::class, 'id');
    }

    public function image()
    {
        Storage::url($this->image);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
    
}
