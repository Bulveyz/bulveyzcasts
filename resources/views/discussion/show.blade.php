@extends('layouts.main')

@section('css')
    <link rel="stylesheet" href="{{asset('libs/darcula.css')}}">
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
    
    <div class="mb-5">
        <h1>{{$discussion->title}}</h1>
        <i class="gray-black-color">{{$discussion->user->login}} | {{$discussion->created_at->formatLocalized('%d %B %Y')}}</i>
    </div>
    
    <section>
        {!! $discussion->content !!}
    </section>

    <hr>

    <div class="row">
        <div class="col-9">
            <h3 class="mb-5">Ответы</h3>
            <form class="mb-5" action="/answer" method="post">
                @csrf
                <input type="hidden" value="{{$discussion->id}}" name="discussion" required>
                <textarea id="answer" name="answer"></textarea>
                <div class="text-right">
                    <button type="submit" class="w-100 btn main-link-button radius-0">Ответить</button>
                </div>
            </form>
            @include('discussion.answers')
        </div>
        <div class="border-left col-3">
            <h5>Похожие вопросы</h5>
        </div>
    </div>
@endsection


@section('js')
    <script src="{{asset('libs/highlight.pack.js')}}"></script>
    <script src="{{asset('tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('js/answerEditor.js')}}"></script>
    <script>hljs.initHighlightingOnLoad();</script>
@endsection
