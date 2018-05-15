@foreach($discussion->answers->sortByDesc('id') as $answers)
    <div class="media mb-5">
        <div class="d-flex comment__avatar justify-content-center align-items-center align-self-center mr-3">
            {{strtoupper(substr($answers->user->login, 0, 1))}}
        </div>
        <div class="media-body">
            <h5 class="mt-0">{{$answers->user->login}}</h5>
            <p>{!! $answers->answer !!}</p>
                <form class="text-right" action="/answer/{{$answers->id}}" method="post">
                    @csrf
                    <button class="btn">Удалить</button>
                    <input type="hidden" name="_method" value="delete" />
                </form>
        </div>
    </div>
@endforeach
