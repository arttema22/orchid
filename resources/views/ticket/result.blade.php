@extends('layouts.app')

@section('title')"{{$Ticket->title}}"@endsection

@section('description')
Создано {{$Ticket->created_at}} Статус {{$Ticket->status->name}}
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        {{$Ticket->message}}
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                Автор
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$Ticket->FullName}}</h5>
                <p class="card-text">
                <dl>
                    <dt>Телефон</dt>
                    <dd>{{$Ticket->phone}}</dd>
                    <dt>Почта</dt>
                    <dd>{{$Ticket->email}}</dd>
                    <dt>Адрес</dt>
                    <dd>{{$Ticket->address}}</dd>
                    <dt>Л/С</dt>
                    <dd>{{$Ticket->ls}}</dd>
                    <dt>Организация</dt>
                    <dd>{{$Ticket->organisation}}</dd>
                </dl>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
