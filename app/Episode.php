<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $fillable = ['videoPath', 'title', 'cast_id', 'part'];

    public function cast()
    {
        return $this->belongsTo(Cast::class);
    }
    public function comments()
    {
        return $this->hasMany(CommentEpisode::class);
    }
}
