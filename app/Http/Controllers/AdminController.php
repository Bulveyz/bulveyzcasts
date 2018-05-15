<?php

namespace App\Http\Controllers;

use App\Article;
use App\Cast;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function dashboard()
    {
        $casts = Cast::all();
        $articles = Article::all()->count();
        return view('admin.dashboard', compact('casts'));
    }
}
