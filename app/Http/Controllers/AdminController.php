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
        $disk = new DiskClient();
        $disk->setAccessToken('AQAAAAAnL6kSAAUMmc74dwfUEUcJq5UYD6lH-YM');

        dump(response());
//        if ($disk->downloadFile($path, $destination, $name)) {
//            echo 'Файл "' . $path . '" скачен в ' . $destination . $name;
//        }

        $casts = Cast::all();
        $articles = Article::all();
        return view('admin.dashboard', compact(['casts', 'articles']));
    }
}
