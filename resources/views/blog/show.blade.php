@extends('layouts.main')

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
        <h1>{{$article->title}}</h1>
        <span>{{$article->created_at->formatLocalized('%d %B %Y')}}</span>
    </div>
    <div>
        {!! $article->content !!}
    </div>
    <hr>
    <div class="row">
        <div class="col-md-9">
            <section>
                <h2>Комментарии</h2>
                <form action="/blog/comment" method="post">
                    @csrf
                    <div class="input-group mb-4">
                        <textarea class="form-control" name="comment" required autocomplete="off">{{old('comment')}}</textarea>
                    </div>
                    <input type="hidden" name="article_id" value="{{$article->id}}">
                    <div class="input-group mb-4">
                        <button class="btn main-link-button" type="submit">Отпарвить</button>
                    </div>
                </form>
            </section>
            @include('blog.comments')
        </div>
        
        <div class="col-md-3 border-left">
        <h5 class="mt-3">Популярные</h5>
        </div>
    </div>
@endsection
