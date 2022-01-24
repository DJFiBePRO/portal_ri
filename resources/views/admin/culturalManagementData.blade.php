@extends('layouts.admin')
@section('title') Gestión @stop
@section('styles')
@parent
<link rel="stylesheet" href="{{asset('/css/admin.css')}}">
@stop
@section('main')
<main>
	<div class="page__data">

		<div class="data__title">
			<h1>{{$cultural->cultural_management_name}} </h1>
		</div>
		<div class="data__name">
			<p class="name__content">DESCRIPCIÓN</p>
		</div>
		<div class="data__content">
			@if($cultural->cultural_management_description != null)
			<p class="content__descrip">{!!$cultural->cultural_management_description!!}</p>
			@else
			<p class="content__descrip">Sin descripción</p>
			@endif
		</div>
		<div class="data__date">
			<label class="date__label">Fecha de Publicación:</label> 
			<p class="date__info">{{$cultural->cultural_management_create->format('Y-M-d')}} </p>
			<label class="date__label">Fecha de Modificación:</label>
			<p class="date__info">{{$cultural->cultural_management_update->format('Y-M-d')}}</p>
		</div>
		<div class="data__multi">
			<p class="name__content">IMAGEN</p>
		</div>	
		<div class="data__multimedia">
			<div class="multimedia__img">
				<div class="img__imagen">
					<img src="{{asset('img/culturalManagements/'.$cultural->cultural_management_image)}}" alt="">
				</div>
			</div>
		</div>
		<div class="data__name">
			<div class="name__link">
				<a class="fa fa-chevron-circle-left" href="{{route('culturalManagement')}}"> Atras</a>
			</div>
		</div>
	</div>

</main>
@stop