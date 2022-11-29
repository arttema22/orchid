<div class="bg-white rounded shadow-sm p-4 py-4 mb-3 d-flex flex-column">
    <div class="d-block m-0">
        <div class="card border-primary rounded w-75 mb-2">
            <div class="card-body">
                <h5 class="card-title">{{$ticket->title}}</h5>
                <p class="card-text">{{$ticket->message}}</p>
            </div>
            <div class="card-footer text-muted">Создано {{$ticket->created_at}}</div>
        </div>
        @foreach ($ticket->answer->where('status', 1) as $answer)
        <div class="card border-success rounded w-75 mb-2 float-end">
            <div class="card-body">
                <h5 class="card-title">{{$answer->user->name}} ответил(а):</h5>
                <p class="card-text">{{$answer->message}}</p>
            </div>
            <div class="card-footer text-muted">Ответ дан {{$answer->created_at}}</div>
        </div>
        @endforeach
    </div>
</div>
