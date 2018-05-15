<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(CategoryCast::class);
    }

    public function answers() {
        return $this->hasMany(Answer::class);
    }
}
