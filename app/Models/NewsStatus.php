<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsStatus extends Model
{
    protected $guarded = ['id'];

    public function news()
    {
        return $this->hasMany(News::class, 'status_id');
    }
}
