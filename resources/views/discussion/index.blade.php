@extends('layouts.main')

@section('main')
@if(Auth::check())
    <div class="text-right">
        <a class="btn main-link-button" href="/discussion/create">Задать вопрос <i class="fa fa-plus"></i></a>
    </div>
@endif

@foreach($discussions->sortByDesc('id') as $discussion)
    <div class="mb-5">
        <h5><a href="/discussion/{{$discussion->id}}">{{$discussion->title}}</a> <span class="badge badge-danger">{{$discussion->category['category']}}</span></h5>
        <p>{{$discussion->user->login}} | {{$discussion->created_at->diffForHumans()}}</p>
        <hr>
    </div>
@endforeach
    
    {{$discussions->links()}}
@endsection
