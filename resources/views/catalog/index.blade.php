@extends('layouts.main')

@section('main')
<div class="row">
    <div class="col-2 border-right">
        <h3 class="mb-4">Категории</h3>
        <ul class="category__list list-unstyled">
            <li class="category__item">
                <a class="btn main-link-button" href="?category_casts=2">PHP</a>
            </li>
            <li class="category__item">
                <a class="btn main-link-button" href="?category_casts=1">Laravel</a>
            </li>
            <li class="category__item">
                <a class="btn main-link-button" href="?category_casts=3">Vue</a>
            </li>
            <li class="category__item">
                <a class="btn main-link-button" href="?category_casts=5">JavaScript</a>
            </li>
            <li class="category__item">
                <a class="btn main-link-button" href="?category_casts=4">HTML</a>
            </li>
            <li class="category__item">
                <a class="btn main-link-button" href="?category_casts=6">CSS</a>
            </li>
        </ul>
    </div>
    <div class="col-10">
        @if (isset($data))
            @foreach($data as $item)
                <div class="mb-5">
                    <a href="/cast/{{$item->id}}"><h4>{{$item->title}}</h4></a>
                    <p>{{$item->previewText}}</p>
                    <hr>
                </div>
            @endforeach
            {{$data->appends($_GET)->links()}}
        @endif
    </div>
</div>
@endsection
