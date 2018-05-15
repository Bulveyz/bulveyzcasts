@extends('layouts.main')

@section('main')
    <section>
        <h1>{{$cast->title}}</h1>
    </section>
    
    <div class="row">
        @foreach($cast->episodes as $episode)
            <div class="col-4 col-md-1 p-0">
                <div class="episode__part bg-main d-flex align-items-center justify-content-center">{{$count++}}</div>
            </div>
            <div class="col-6 col-md-11 p-0 d-flex align-items-center"><h3 class="episode__part-title"><a class="" href="/episode/{{$episode->id}}">{{$episode->title}}</a></h3></div>
            <div class="col-12">
                <div class="v-line"></div>
            </div>
        @endforeach
            @if($cast->episodes != '[]')
                <div class="col-12 p-0">
                    <div class="episode__part bg-main d-flex align-items-center justify-content-center">
                        <i class="fa fa-check"></i>
                    </div>
                </div>
            @endif
    </div>
    
    <section>
    
    </section>
@endsection
