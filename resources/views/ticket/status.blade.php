@extends('layouts.app')

@section('title')Обращение@endsection

@section('description')
Введите пожалуйста Ваш секретный код и номер телефона
@endsection

@section('content')
<form method="post" action="">
    @csrf
    <div class="row">
        <div class="col-md-12">
            @include('inc.fields.code')
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('inc.fields.phone')
        </div>
    </div>
    @include('inc.fields.btn-submit')
</form>
@endsection
