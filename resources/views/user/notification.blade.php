@extends('layouts.main')

@section('main')
    <h4 class="mb-4">Уведомления</h4>
    @if($notifications == '[]')
        Нет новых событий
    @else
        @foreach($notifications as $notification)
            <h6 class="alert alert-main">{!! $notification->message !!} | {{$notification->created_at->diffForHumans()}}</h6>
            <hr>
        @endforeach
    @endif
@endsection
