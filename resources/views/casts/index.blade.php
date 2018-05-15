@extends('layouts.main')

@section('main')
    <div class="container">
    <section>
        <div class="row">
            @foreach($casts as $cast)
                <div class="col-md-4 mb-4">
                    <a href="/cast/{{$cast->id}}" class="w-100">
                        <div class="cast d-flex justify-content-center align-items-center">
                            <span class="cast__date">{{$cast->created_at->formatLocalized('%d %B %Y')}}</span>
                            {{$cast->title}}
                            <div class="cast__preview">
                                {{$cast->previewText}}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
    </div>
@endsection
