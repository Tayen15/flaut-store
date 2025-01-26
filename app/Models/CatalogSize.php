<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatalogSize extends Model
{
    protected $guarded = ['id'];

    public function catalog()
    {
        return $this->belongsTo(Catalog::class);
    }
}
