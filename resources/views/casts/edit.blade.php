@extends('layouts.main')

@section('main')
    <h1 class="mb-5">Редактировать Каст</h1>
    
    <section>
        
        @if($errors != '[]')
            <div class="alert alert-danger">{{$errors->first()}}</div>
        @endif
        
        <div class="row">
            <div class="col-4">
                <h3>Каст</h3>
                <form action="{{route('cast.store')}}" method="post">
                    @csrf
                    <label>Заголовк</label>
                    <div class="input-group mb-4">
                        <input class="form-control" type="text" name="title" value="{{$cast->title}}" required autofocus autocomplete="off">
                    </div>
                    <label>Описание</label>
                    <div class="input-group mb-4">
                        <textarea class="form-control" name="previewText" required>{{$cast->previewText}}</textarea>
                    </div>
                    <div class="input-group mb-4">
                        <select name="category" class="custom-select" required>
                            <option selected value="{{$cast->category[0]}}">{{$cast->category[0]->category}}</option>
                            <option value="1">Laravel</option>
                            <option value="2">PHP</option>
                            <option value="3">Vue</option>
                            <option value="4">HTML</option>
                            <option value="5">JavaScript</option>
                            <option value="6">CSS</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <button type="submit" class="btn main-link-button">Обновить</button>
                    </div>
                </form>
            </div>
            <div class="col-8">
                <h3>Новый Эпизод</h3>
                <form action="/episode/store" method="post" enctype="multipart/form-data">
                    @csrf
    
                    <label>Заголовк</label>
                    <div class="input-group mb-4">
                        <input class="form-control" type="text" name="title" value="{{old('title')}}" required autofocus autocomplete="off">
                    </div>
    
                    <label>Видео</label>
                    <div class="input-group mb-4">
                        <input class="form-control" type="file" name="video" value="" required autofocus autocomplete="off">
                    </div>
    
                    <input class="mb-4" type="hidden" value="{{$cast->id}}" name="cast_id">
    
                    <div class="input-group">
                        <button type="submit" class="btn main-link-button">Сохранить</button>
                    </div>
                </form>
            </div>
            <div class="col-4">
                <h3>Эпизоды</h3>
                <ul>
                    @foreach($cast->episodes as $episode)
                        <li><a href="/episode/{{$episode->id}}">{{$episode->title}}</a> | <a href="/episode/{{$episode->id}}/delete">Удалить</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
@endsection
