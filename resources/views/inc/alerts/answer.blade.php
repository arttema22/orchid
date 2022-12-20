<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">{{$answer->user->name}} {{$answer->created_at}} ответил(а):</h4>
    <hr>
    <p>{!!$answer->message!!}</p>
</div>
