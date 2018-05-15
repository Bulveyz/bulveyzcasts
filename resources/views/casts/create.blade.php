@extends('layouts.main')

@section('main')
    <h1 class="mb-5">Новый Каст</h1>
    
    <section>
        
        @if($errors != '[]')
            <div class="alert alert-danger">{{$errors->first()}}</div>
        @endif
        
        <form action="{{route('cast.store')}}" method="post">
            @csrf
            <label>Заголовк</label>
            <div class="input-group mb-4">
                <input class="form-control" type="text" name="title" value="{{old('title')}}" required autofocus autocomplete="off">
            </div>
            <label>Описание</label>
            <div class="input-group mb-4">
                <textarea class="form-control" name="previewText" required>{{old('previewText')}}</textarea>
            </div>
            <div class="input-group mb-4">
                <select name="category" class="custom-select" required>
                    <option selected>Категория</option>
                    <option value="1">Laravel</option>
                    <option value="2">PHP</option>
                    <option value="3">Vue</option>
                    <option value="4">HTML</option>
                    <option value="5">JavaScript</option>
                    <option value="6">CSS</option>
                </select>
            </div>
            <div class="input-group">
                <button type="submit" class="btn main-link-button">Создать</button>
            </div>
        </form>
    </section>
@endsection
