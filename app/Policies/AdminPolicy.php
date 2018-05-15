<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function admin(User $user)
    {
        if (!empty($user->role()->first())) {
            if ($user->role()->first()->type == 'Admin') {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
