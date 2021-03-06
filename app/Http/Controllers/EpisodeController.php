<?php

namespace App\Http\Controllers;

use App\CommentEpisode;
use App\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Yandex\Disk\DiskClient;

class EpisodeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only('store');
        $this->middleware('admin')->only('store');
    }

    public function show(Episode $episode)
    {
        // Подгружаем каст эпизодов и комментарии эпизода
        $episode = $episode->loadMissing('cast', 'comments.user'); //orderBy('published_date', 'asc')

        // Загружаем все серии которые относятся к касту
        $parts = Episode::where('cast_id', $episode->cast_id)->get(['id', 'title']);

        // Если это не последний эпизод
        if ($parts->count() != $episode->part) {
            // Добавляем ссылку на следующий эпизод
            $next = $parts->where('id', '>' ,$episode->id)->first()->only('id', 'title');
        }

        return view('episodes.show', compact(['episode', 'parts', 'next']));
    }

    public function store(Request $request)
    {
        if (Gate::allows('admin',  Auth::user())) {
            $this->validate($request, [
               'title' => 'required'
            ]);

            $disc = new DiskClient();
            $disc->setAccessToken('AQAAAAAnL6kSAAUMmc74dwfUEUcJq5UYD6lH-YM');

            $videoName = rand(20, 100);

            $upload = $disc->uploadFile('/', array(
               'path' => $request->file('video'),
               'size' => filesize($request->file('video')),
               'name' => $videoName
            ));


            if ($upload->getStatusCode() == 201) {
                $videoPath = 'https://getfile.dokpub.com/yandex/get/' . $disc->startPublishing('/'. $videoName);
            }

            // Сохраняем видео
//            $path = $request->file('video')->store('public/episodes');

            // Добавляем серию
            $part = Episode::where('cast_id', $request->cast_id)->count() + 1;

            // Добавляем путь до видео в запрос
            // $request->merge(['videoPath' => $path]);

            $episode = Episode::create($request->except('_token') + ['part' => $part, 'videoPath' => $videoPath]);

            return redirect('episode/'.$episode->id);
        } else {
            exit('Error Access');
        }
    }

    public function destroy($id)
    {
        if (Gate::allows('admin',  Auth::user())) {
            $episode = Episode::find($id)->firstOrFail();

            $media = $episode->videoPath;

            if ($episode->delete()) {
                Storage::delete($media);
            }

            return back();
        }
    }
}
