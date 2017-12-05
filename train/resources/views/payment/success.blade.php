
@extends('layouts.app')

@section('content')
    @include('partials.top')
    @include('partials.header')
    @include('partials.head')
    <link rel="stylesheet" href="{{asset('/css/mycss/home.css')}}">
    <div class="container">
        <div class="row">
            <h1>支付成功，等待出票</h1>
        </div>
    </div>
@endsection