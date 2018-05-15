@extends('layouts.main')

@section('main')
    <form action="{{route('blog.store')}}" method="post">
        @csrf
        <div class="input-group mb-4">
            <input class="form-control" name="title" type="text" placeholder="Заголовок" value="{{old('title')}}" required autofocus autocomplete="off">
            
            <select name="category_id" class="custom-select">
                <option selected>Категория</option>
                <option value="1">Laravel</option>
                <option value="2">PHP</option>
                <option value="3">Vue</option>
                <option value="4">HTML</option>
                <option value="5">JavaScript</option>
                <option value="6">CSS</option>
            </select>
    
            <select name="published" class="custom-select">
                <option selected>Опубликовать сразу</option>
                <option value="1">Да</option>
                <option value="0">Нет</option>
            </select>
            
            <button class="btn main-link-button radius-0" type="submit">Опубликовать</button>
        </div>
        <textarea name="content" id="content">{{old('content')}}</textarea>
    </form>
@endsection

@section('js')
    <script src="{{asset('tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('js/articleEditor.js')}}"></script>
@endsection
