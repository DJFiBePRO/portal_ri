@extends('layouts.admin')

@section('title') Convenios @stop

@section('styles')
@parent
<link rel="stylesheet" href="{{ asset ('css/admin.css')}}">
@stop

@section('main')
<div class="page__main">
    <div class="main__title">
        @if (Auth::user()->user_type == 4)
        <h1>Ofertas laborales {{Auth::user()->user_name." ".Auth::user()->user_last_name}}</h1>
        @else
        <h1>Noticias {{$management->management_area_name}}</h1>
        @endIf
    </div>
</div>
@stop