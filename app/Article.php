<?php

namespace App;

use App\Http\Controllers\BlogController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'articles';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(ArticleComments::class);
    }

    public function category()
    {
        return $this->hasMany(CategoryCast::class, 'id', 'category_id');
    }
}
