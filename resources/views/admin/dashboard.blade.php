@extends('layouts.main')

@section('main')
    <div class="row">
        <div class="col-6">
            
            <ul>
                <h3>Касты</h3>
                <li>
                    <a href="/cast/create ">Новый каст</a>
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
    </div>
@endsection
