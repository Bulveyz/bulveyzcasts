@extends('layouts.main')
@section('css')
    <link rel="stylesheet" href="{{asset('libs/darcula.css')}}">
@endsection
@section('main')
    <section>
        <h1>{{$user->login}}</h1>
        <p>В проекте {{$user->created_at->diffForHumans(null, true)}}</p>
        @if (!empty($user->role()->first()))
            @if ($user->role()->first()->type == 'Admin')
            <a class="gray-color" href="/admin/dashboard">Админ панель</a>
            @endif
        @endif
    </section>
    
    <section>
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn main-link-button" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Мои вопросы
                        </button>
                    </h5>
                </div>
            
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        @foreach($discussions as $discussion)
                            <h4>{{$discussion->title}}</h4>
                            <a href="/discussion/{{$discussion->id}}">Перейти</a>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn main-link-button collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Мои Ответы
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        @foreach($answers as $answer)
                            <div>
                                {!! $answer->answer !!}
                            </div>
                            <a href="/discussion/{{$answer->discussion->id}}">К записи: {{$answer->discussion->title}}</a>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="{{asset('libs/highlight.pack.js')}}"></script>
    <script>hljs.initHighlightingOnLoad();</script>
@endsection
