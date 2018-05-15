@extends('layouts.main')

@section('main')
    <div class="row">
        <div class="col-6">
            <ul>
                <h3>Касты</h3>
                <li>
                    <a href="/cast/create ">Новый каст <i class="fa fa-plus"></i></a>
                </li>
                @foreach($casts as $cast)
                    <li>
                        <b>
                            <a href="/cast/{{$cast->id}}">{{$cast->title}}</a> |
                            <a href="/cast/{{$cast->id}}/edit">Редактровать</a> |
                            <a href="/cast/{{$cast->id}}/delete">Удалить</a>
                        </b>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-6">
            <h3>Посты</h3>
            
            <a href="/article/create">Новый пост <i class="fa fa-plus"></i></a>
            @foreach($articles as $article)
                <li class="card p-3">
                        <h5><a href="/blog/{{$article->id}}">{{$article->title}}</a></h5>
                        <div class="d-flex justify-content-end">
                            <a class="btn" href="/article/{{$article->id}}/edit">Редактироавть</a>
                            <form action="/article/{{$article->id}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn" type="submit">Удалить</button>
                            </form>
                        </div>
                </li>
            @endforeach
        </div>
    </div>
@endsection
