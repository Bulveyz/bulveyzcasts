@extends('layouts.main')

@section('main')
    @if($errors != '[]')
        <div class="alert alert-danger">{{$errors->first()}}</div>
    @endif
    <form action="{{route('article.update', $article->id)}}" method="post">
        @csrf
        @method('put')
        <div class="input-group mb-4">
            <input class="form-control" name="title" type="text" placeholder="Заголовок" value="{{$article->title}}" required autofocus autocomplete="off">
            
            <select name="category_id" class="custom-select">
                <option selected value="{{$article->category_id}}">{{$article->category[0]->category}}</option>
                <option value="1">Laravel</option>
                <option value="2">PHP</option>
                <option value="3">Vue</option>
                <option value="4">HTML</option>
                <option value="5">JavaScript</option>
                <option value="6">CSS</option>
            </select>
            
            <select name="published" class="custom-select">
                <option selected value="1">Опубликовать сразу</option>
                <option value="1">Да</option>
                <option value="0">Нет</option>
            </select>
            
            <button class="btn main-link-button radius-0" type="submit">Опубликовать</button>
        </div>
        <textarea name="content" id="content">{!! $article->content !!}</textarea>
    </form>
@endsection

@section('js')
    <script src="{{asset('tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('js/articleEditor.js')}}"></script>
@endsection
