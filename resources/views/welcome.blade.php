@extends('layouts.app')

@section('title')Электронная приемная@endsection

@section('description')
Сервис предоставляет возможность отправить обращение в форме электронного документа и получить информацию о статусе и
ответе.
@endsection

@section('content')
<div class="row align-items-md-stretch">
    <div class="col-md-6 mb-5">
        <div class="h-100 p-5 text-white bg-primary rounded-3">
            <h2>Обращения</h2>
            <p>Прием обращений по всем вопросам</p>
            <a href="{{ route('reception.ticket') }}" class="btn btn-outline-light">Написать обращение</a>
        </div>
    </div>
    <div class="col-md-6 mb-5">
        <div class="h-100 p-5 bg-light border rounded-3">
            <h2>Услуги</h2>
            <p>Оформление запроса на оказание услуг</p>
            <a href="{{ route('service.ticket') }}" class="btn btn-outline-secondary">Запрос на услугу</a>
        </div>
    </div>
    <div class="col-md-12 mb-5">
        <div class="h-100 p-5 bg-light border rounded-3">
            <h2>Статус обращения</h2>
            <p>Контроль за ходом рассмотрения обращения</p>
            <a href="{{ route('reception.status') }}" class="btn btn-outline-secondary">Перейти</a>
        </div>
    </div>
    @include('inc.banners.electronicreceipt')
</div>
@endsection
