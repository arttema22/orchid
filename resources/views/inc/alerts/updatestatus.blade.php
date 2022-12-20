@if ($Ticket->status_id == 2)
<div class="alert alert-light" role="alert">
    <h4 class="alert-heading">Статус обращения изменен на <b
            class="badge bg-warning col-auto ms-auto">{{$Ticket->status->name}}</b></h4>
    <p><small>{{$Ticket->created_at}}</small></p>
</div>
@endif
