@foreach($episode->comments->sortByDesc('id') as $comment)
    <div class="media mb-5">
        <div class="d-flex comment__avatar justify-content-center align-items-center align-self-center mr-3">
            {{strtoupper(substr($comment->user->login, 0, 1))}}
        </div>
        <div class="media-body">
            <h5 class="mt-0">{{$comment->user->login}} | {{$comment->created_at->diffForHumans()}}
                @if(Auth::check())
                    @if($comment->user->id == request()->user()->id)
                        <a class="gray-color" href="/episode/comment/{{$comment->id}}/delete">Удалить</a>
                    @endif</h5>
                @endif
            <p>{{$comment->comment}}</p>
        </div>
    </div>
@endforeach
