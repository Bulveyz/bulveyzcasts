<?php

namespace App\Http\Controllers;

use App\CommentEpisode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CommentEpisodeController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required|min:2|max:400',
            'episode_id' => 'required|numeric|exists:episodes,id'
        ]);

        CommentEpisode::create($request->except('_token') + ['user_id' => Auth::user()->id]);

        return back()->with('success', 'Комментарий добавлен!');
    }

    public function destroy($id)
    {
        $comment = CommentEpisode::find($id)->load('user');
        if (Auth::user()->id == $comment->user->id) {
            $comment->delete();
            return back()->with('success', 'Коментарий удален');
        } else {
            return Redirect::back()->withErrors('Пошел нахуй');
        }
    }
}
