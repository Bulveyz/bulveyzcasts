<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    protected $fillable = ['title', 'previewText'];

    public function category()
    {
        return $this->belongsToMany(CategoryCast::class, 'category_cast_bundle', 'cast_id', 'category_id');
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }
}
