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
      <h1>{{ trans('administration.headers.agreement') }} {{$cid}}</h1>
    </div>
    <div class="main__insert">
      <div class="main__boton">

        <a href="{{route('covenant.index')}}"><i class="fa fa-chevron-circle-left"></i>{{ trans('administration.content.return') }}</a>

      </div>
    </div>
    <div class="main__data">
      <div class="data__container">
        <div class="data__name">
          <div class="data__item">
            <label>{{ trans('administration.page-titles.caracter') }}:</label>
            <input disabled type="text" name="userName" value="{{$caracter}}">
          </div>
          <div class="data__item">
            <label>{{ trans('administration.page-titles.university') }}:</label>
            <input disabled type="text" name="userName" value="{{$university}}">
          </div>
          <div class="data__item">
            <label>{{ trans('administration.page-titles.continent') }}:</label>
            <input disabled type="text" name="userName" value="{{$continent}}">
          </div>
          <div class="data__item">
            <label>{{ trans('administration.page-titles.country') }}:</label>
            <input disabled type="text" name="userName" value="{{$country}}">
          </div>
        </div>
        <div class="data__name">
          <div class="data__item">
            <label>{{ trans('administration.page-titles.resolution') }}:</label>
            <input disabled type="text" name="userName" value="{{$resolution}}">
          </div>
          <div class="data__item">
            <label>{{ trans('administration.page-titles.validity') }}:</label>
            <input disabled type="text" name="userName" value="{{$is_validity}}">
          </div>
          <div class="data__item">
            <label>{{ trans('administration.forms.creation-date') }}:</label>
            <input disabled type="text" name="userName" value="{{$created_at}}">
          </div>
          <div class="data__item">
            <label>{{ trans('administration.forms.update-date') }}:</label>
            <input disabled type="text" name="userName" value="{{$updated_at}}">
          </div>
        </div>
      </div>
    </div>

  </div>
</main>
@stop