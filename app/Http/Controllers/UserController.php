<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        return view('user.profile', [
            'user' => \request()->user(),
            'answers' => \request()->user()->answers()->with('discussion:id,title')->select(['discussion_id', 'answer'])->get(),
            'discussions' => \request()->user()->discussions()->get()
        ]);
    }

    public function notification()
    {
        $notifications = \request()->user()->notifications()->get();


        if ($notifications)
        {
            \request()->user()->notifications()->delete();
        }

        return view('user.notification', compact('notifications'));
    }
}
