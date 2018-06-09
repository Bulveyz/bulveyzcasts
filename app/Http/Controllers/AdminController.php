<?php

namespace App\Http\Controllers;

use App\Article;
use App\Cast;
use Illuminate\Http\Request;
use Yandex\Disk\DiskClient;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function dashboard()
    {
        $casts = Cast::all();
        $articles = Article::all();
        return view('admin.dashboard', compact(['casts', 'articles']));
    }
}
