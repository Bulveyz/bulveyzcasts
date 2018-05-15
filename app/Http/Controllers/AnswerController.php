<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Discussion;
use App\Notification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AnswerController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
           'answer' => 'required|min:2',
           'discussion' => 'required|numeric|exists:discussions,id'
        ]);

        $userId = Auth::user()->id;

        $answer = Answer::create([
           'user_id' => $userId,
           'answer' => $request->answer,
           'discussion_id' => $request->discussion
        ]);

        if ($answer) {

            $discussion = Discussion::find($request->discussion);
            $notification = Notification::create([
                'user_id' => $discussion->user_id,
                'user_id_from' => $request->user()->id,
                'message' => "Пользователь " . '<b>' . $request->user()->login . '</b> ответил на ваш вопрос <b><a href="/discussion/'.$discussion->id.'"> "' . $discussion->title . '"</b>'
            ]);
            if ($notification) {
                return back()->with('success', 'Благодарим за ответ!');
            } else {
                return back()->withErrors('Ошибка');
            }
        } else {
            return back()->withErrors('Ошибка');
        }

    }

    public function show()
    {

    }

    public function edit(Answer $answer)
    {
        //
    }

    public function update(Request $request, Answer $answer)
    {
        //
    }

    public function destroy(Answer $answer)
    {
        if ($answer->user->login == Auth::user()->login)
        {
            $answer->delete();

            return back()->with('success', 'Ответ удален');
        }
    }
}
