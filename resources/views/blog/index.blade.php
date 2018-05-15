@extends('layouts.main')

@section('main')
<div class="row">
    <div class="col-md-9">
        @foreach($articles as $article)
            <div class="mb-5">
                <h5><a href="/blog/{{$article->id}}">{{$article->title}}</a> <span class="badge badge-danger">{{$article->category[0]->category}}</span></h5>
                <p>{{$article->created_at->diffForHumans()}}</p>
                <hr>
            </div>
        @endforeach
    
        {{$articles->appends($_GET)->links()}}
    </div>
    <div class="col-md-3 border-left">
        <h3 class="mb-4">Категории</h3>
        <ul class="category__list list-unstyled">
            <li class="category__item">
                <a class="btn main-link-button" href="/blog">Все</a>
            </li>
            <li class="category__item">
                <a class="btn main-link-button" href="?category=2">PHP</a>
            </li>
            <li class="category__item">
                <a class="btn main-link-button" href="?category=1">Laravel</a>
            </li>
            <li class="category__item">
                <a class="btn main-link-button" href="?category=3">Vue</a>
            </li>
            <li class="category__item">
                <a class="btn main-link-button" href="?category=5">JavaScript</a>
            </li>
            <li class="category__item">
                <a class="btn main-link-button" href="?category=4">HTML</a>
            </li>
            <li class="category__item">
                <a class="btn main-link-button" href="?category=6">CSS</a>
            </li>
        </ul>
    </div>
</div>
@endsection


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
</html>
