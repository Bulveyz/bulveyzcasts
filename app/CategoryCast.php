<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryCast extends Model
{
    protected $table = 'category_casts';

    public function casts()
    {
        return $this->belongsToMany(Cast::class, 'category_cast_bundle', 'category_id', 'cast_id');
    }
}
