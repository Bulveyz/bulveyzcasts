<?php

namespace App\Http\Controllers;

use App\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscussionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index()
    {
        $discussions = Discussion::with('user', 'category')->paginate(20);

        return view('discussion.index', compact('discussions'));
    }

    public function create()
    {
        return view('discussion.create');
    }

    public function store(Request $request)
    {
        if (Auth::check())
        {
            $this->validate($request, [
               'title' => 'required|min:3|max:200',
               'content' => 'required|min:3' ,
               'category_id' => 'required|exists:category_casts,id|numeric'
            ]);

            $discussion = Discussion::create($request->except('_token') + ['user_id' => Auth::user()->id]);

            return redirect('/discussion/'.$discussion->id);
        }
    }

    public function show(Discussion $discussion)
    {
        $discussion->load('answers.user');
        return view('discussion.show', compact('discussion'));
    }

    public function edit(Discussion $discussion)
    {
        //
    }

    public function update(Request $request, Discussion $discussion)
    {
        //
    }

    public function destroy(Discussion $discussion)
    {
        //
    }
}
