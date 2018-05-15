<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticleComments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
        $this->middleware('admin')->except('index', 'show');
    }

    public function index(Request $request)
    {
        if (isset($request->category))
        {
            $articles = Article::with('category')->where('category_id', $request->category)->paginate(15);
        } else {
            $articles = Article::with('category')->paginate(15);
        }
        return view('blog.index', compact('articles'));
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        if (Gate::allows('admin',  Auth::user())) {
            $this->validate($request, [
               'title' => 'required|string|min:3|max:100',
               'content' => 'required',
               'published' => 'required|numeric|max:1'
            ]);

            $article = Article::create($request->except('_token'));

            if ($article->published == 1) {
                return redirect('/blog/'.$article->id);
            } else {
                return back()->with('success', 'Запись опубликована, но скрыта');
            }
        }
    }

    public function show(Article $article)
    {
        $article = $article->loadMissing('comments.user');
        return view('blog.show', compact('article'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function commentStore(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required|min:2|max:400',
            'article_id' => 'required|numeric|exists:articles,id'
        ]);

        ArticleComments::create($request->except('_token') + ['user_id' => $request->user()->id]);

        return back()->with('success', 'Комментарий добавлен!');
    }
}
