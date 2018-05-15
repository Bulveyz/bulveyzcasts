<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'login', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsToMany(Role::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function discussions()
    {
        return $this->hasMany(Discussion::class);
    }
}
