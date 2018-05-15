<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentEpisode extends Model
{
    protected $fillable = ['comment', 'user_id', 'episode_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
