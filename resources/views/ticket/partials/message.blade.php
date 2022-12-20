<div class="bg-white rounded shadow-sm p-4 py-4 mb-3 d-flex flex-column">
    <div class="d-block m-0">
        @include('inc.alerts.message')

        @include('inc.alerts.updatestatus')

        @foreach ($Ticket->answer->where('status', 1) as $answer)
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">{{$answer->user->name}} {{$answer->created_at}} ответил(а):</h4>
            <hr>
            <p>{!!$answer->message!!}</p>
        </div>
        @endforeach
    </div>
</div>
