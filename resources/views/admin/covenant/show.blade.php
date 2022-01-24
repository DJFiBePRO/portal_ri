@extends('layouts.admin')

@section('title') Convenios @stop

@section('styles')
@parent
<link rel="stylesheet" href="{{ asset ('css/admin.css')}}">
@stop

@section('main')

<main>
  <div class="page__main">

    <div class="main__title">
      <h1>Convenio {{$cid}}</h1>
    </div>
    <div class="main__insert">
      <div class="main__boton">

        <a href="{{route('covenant.index')}}"><i class="fa fa-chevron-circle-left"></i>Regresar</a>

      </div>
    </div>
    <div class="main__data">
      <div class="data__container">
        <div class="data__name">
          <div class="data__item">
            <label>Caracter:</label>
            <input disabled type="text" name="userName" value="{{$caracter}}">
          </div>
          <div class="data__item">
            <label>Universidad:</label>
            <input disabled type="text" name="userName" value="{{$university}}">
          </div>
          <div class="data__item">
            <label>Continente:</label>
            <input disabled type="text" name="userName" value="{{$continent}}">
          </div>
          <div class="data__item">
            <label>País:</label>
            <input disabled type="text" name="userName" value="{{$country}}">
          </div>
        </div>
        <div class="data__name">
          <div class="data__item">
            <label>Resolución:</label>
            <input disabled type="text" name="userName" value="{{$resolution}}">
          </div>
          <div class="data__item">
            <label>Validez:</label>
            <input disabled type="text" name="userName" value="{{$is_validity}}">
          </div>
          <div class="data__item">
            <label>Fecha de creación:</label>
            <input disabled type="text" name="userName" value="{{$created_at}}">
          </div>
          <div class="data__item">
            <label>Última Modificación:</label>
            <input disabled type="text" name="userName" value="{{$updated_at}}">
          </div>
        </div>
      </div>
    </div>

  </div>
</main>
@stop