@extends('layouts.main')
@section('css')
    <link href="{{asset('libs/video.css')}}" rel="stylesheet">
@endsection

@section('main')
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    @if($errors != '[]')
        <div class="alert alert-danger">{{$errors->first()}}</div>
    @endif
    
    <div class="row">
        <div class="col-12">
            <section>
                {{--<video class="embed-responsive embed-responsive-16by9 mb-5" controls>--}}
                    {{--<source src="https://getfile.dokpub.com/yandex/get/https://yadi.sk/i/DBPxbiyp3XRJ4U" type="video/mp4">--}}
                    {{--<source src="https://getfile.dokpub.com/yandex/get/https://yadi.sk/i/DBPxbiyp3XRJ4U.mov" type="video/ogg">--}}
                    {{--Your browser does not support the video tag.--}}
                {{--</video>--}}
    
                <video class="embed-responsive embed-responsive-16by9 mb-5 video-js" id="my-video" controls preload="auto"  data-setup='{ "aspectRatio":"640:267", "playbackRates": [1, 1.5, 2] }'>
                       poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
                    <source src="{{$episode->videoPath}}" type='video/mp4'>
                    <source src="{{$episode->videoPath}}" type='video/webm'>
                </video>
    
    
    
                <h1 class="mb-5">{{$episode->part}}. {{$episode->title}}</h1>
                @if(isset($next))
                    <div class="text-right">
                        <a class="btn main-link-button" href="/episode/{{$next['id']}}" >{{$next['title']}} <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                @endif
            </section>
        </div>
        <div class="col-9">
            <section>
                <h2>Комментарии</h2>
                <form action="/episodes/newcomment" method="post">
                    @csrf
                    <div class="input-group mb-4">
                        <textarea class="form-control" name="comment" required autocomplete="off">{{old('comment')}}</textarea>
                    </div>
                    <input type="hidden" name="episode_id" value="{{$episode->id}}">
                    <div class="input-group mb-4">
                        <button class="btn main-link-button" type="submit">Отпарвить</button>
                    </div>
                </form>
            </section>
    
            @include('episodes.comments')
        </div>
        <div class="col-3">
            <ul class="pt-2">
                <h4>{{$episode->cast->title}}</h4>
                @foreach($parts as $part)
                    @if($part->id == $episode->id)
                        <li><b>{{$episode->title}}</b></li>
                    @else
                        <li><a href="/episode/{{$part->id}}">{{$part->title}}</a></li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
@endsection

@section('js') <script src="{{asset('libs/video.js')}}"></script> @endsection
