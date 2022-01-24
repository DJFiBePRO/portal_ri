@extends('layouts.admin')
@section('title') Descargas @stop
@section('styles')
@parent
<link rel="stylesheet" href="{{asset('/css/admin.css')}}">
@stop
@section('main')
<main>
	<div class="page__data">

		<div class="data__title">
			<h1>{{$download->download_name}} </h1>
		</div>
		<div class="data__name">
			<p class="name__content">DESCRIPCIÓN
		</div>
		<div class="data__content">
			<p class="content__descrip">{{$download->download_description}}</p>
		</div>
		<div class="data__date">
			<label class="date__label">Fecha de Publicación:</label> 
			<p class="date__info">{{$download->download_create->format('Y-M-d')}} </p>
			<label class="date__label">Fecha de Modificación:</label>
			<p class="date__info">{{$download->download_update->format('Y-M-d')}}</p>
		</div>
		<div class="data__multi">
			<p class="name__content">CONTENIDO</p>
		</div>	
		<div class="data__multimedia">
			
			<div class="multimedia__docs">
				<div class="docs__name">
					<label class="multi__label">Archivo:</label> {{$download->download_file}}
				</div>

			</div>
			
		</div>
		<div class="data__name">
			<div class="name__link">
				<a class="fa fa-chevron-circle-left" href="{{route('download')}}"> Atras</a>
			</div>
		</div>
	</div>
</main>
@stop