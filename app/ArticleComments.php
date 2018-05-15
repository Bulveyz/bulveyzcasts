<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleComments extends Model
{
    protected $guarded = [];

    protected $table = 'article_comments';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
