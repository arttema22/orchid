@extends('layouts.app')

@section('title')Обращение "{{$Ticket->title}}"@endsection

@section('description')
Создано {{$Ticket->created_at}} Статус <b class="badge bg-warning col-auto ms-auto">{{$Ticket->status->name}}</b>
@endsection

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="row">
    <div class="col-md-8">
        @include('inc.alerts.message')
        @include('inc.alerts.updatestatus')
        @foreach ($Ticket->answer->where('status', 1) as $answer)
        @include('inc.alerts.answer')
        @endforeach
    </div>
    <div class="col-md-4">
        @if ($Ticket->answer->where('status', 1) == null & $Ticket->rating == null)
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">{{$Ticket->first_name}} {{$Ticket->patronymic}}, нам очень важно знать Ваше
                    мнение о
                    нашей работе.</h5>
                <p class="card-text"> Оцените нашу работу с обращением</p>
                <form method="post" action="{{ route('reception.rating', $Ticket->id) }}">
                    @csrf
                    <div class="form-floating mb-3">
                        <div class="star-rating__wrap mb-3">
                            <input class="star-rating__input" id="star-5" type="radio" name="rating" value="5">
                            <label class="star-rating__ico fa fa-star-o fa-lg" for="star-5" title="Отлично"></label>
                            <input class="star-rating__input" id="star-4" type="radio" name="rating" value="4">
                            <label class="star-rating__ico fa fa-star-o fa-lg" for="star-4" title="Хорошо"></label>
                            <input class="star-rating__input" id="star-3" type="radio" name="rating" value="3">
                            <label class="star-rating__ico fa fa-star-o fa-lg" for="star-3"
                                title="Удовлетворительно"></label>
                            <input class="star-rating__input" id="star-2" type="radio" name="rating" value="2">
                            <label class="star-rating__ico fa fa-star-o fa-lg" for="star-2" title="Плохо"></label>
                            <input class="star-rating__input" id="star-1" type="radio" name="rating" value="1">
                            <label class="star-rating__ico fa fa-star-o fa-lg" for="star-1" title="Ужасно"></label>
                            <input class="star-rating__input" id="star-0" type="radio" name="rating" value="0" checked>
                            @if ($errors->get('rating'))
                            @foreach ($errors->get('rating') as $message)
                            <div class="invalid-feedback">{{$message}}</div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    @include('inc.fields.btn-submit')
                </form>
            </div>
        </div>
        <script>
            $(function() {
                $(".btn").attr('disabled', true);
                $('.star-rating__input').on('change', function(){
                    $(".btn").html('Отправить ' + $(this).val());
                    $(".btn").attr('disabled', false);
                });
                });
        </script>
        <style>
            .star-rating__wrap {
                display: inline-block;
                font-size: 3rem;
            }

            .star-rating__wrap:after {
                content: "";
                display: table;
                clear: both;
            }

            .star-rating__ico {
                float: right;
                padding-left: 2px;
                cursor: pointer;
                color: #9FC110;
            }

            .star-rating__ico:last-child {
                padding-left: 0;
            }

            .star-rating__input {
                display: none;
            }

            .star-rating__ico:hover:before,
            .star-rating__ico:hover~.star-rating__ico:before,
            .star-rating__input:checked~.star-rating__ico:before {
                content: "\f005";
            }
        </style>
        @endif
    </div>
</div>
@endsection
