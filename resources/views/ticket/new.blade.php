@extends('layouts.app')

@section('title')Отправить обращение@endsection

@section('description')Здесь можно оформить обращение в компанию РКС-энерго.@endsection

@section('content')
<form method="post" action="">
    @csrf
    <div class="row">
        <div class="col-md-4">
            @include('inc.fields.lastName')
        </div>
        <div class="col-md-4">
            @include('inc.fields.firstName')
        </div>
        <div class="col-md-4">
            @include('inc.fields.patronymic')
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            @include('inc.fields.ls')
        </div>
        <div class="col-md-8">
            @include('inc.fields.address')
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            @include('inc.fields.phone')
        </div>
        <div class="col-md-6">
            @include('inc.fields.email')
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('inc.fields.title')
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('inc.fields.message')
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('inc.fields.personaldata')
            @include('inc.fields.agreerules')
        </div>
    </div>
    @include('inc.fields.btn-submit')
</form>
@endsection
