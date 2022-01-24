@extends('layouts.admin')
@section('title') Galería @stop
@section('styles')
@parent
<link rel="stylesheet" href="{{asset('/css/admin.css')}}">
@stop
@section('main')
<main>
	<div class="page__data">

		<div class="data__title">
			<h1>{{$gallery->gallery_name}} </h1>
		</div>
		<div class="data__name">
			<p class="name__content">DESCRIPCIÓN</p>
		</div>
		<div class="data__content">
		@if($gallery->gallery_description != null)
			<p class="content__descrip">{{$gallery->gallery_description}}</p>
			@else
			<p class="content__descrip">Sin descripción</p>
			@endif
		</div>
		<div class="data__date">
			<label class="date__label">Fecha de Publicación:</label> 
			<p class="date__info">{{$gallery->gallery_create->format('Y-M-d')}} </p>
			<label class="date__label">Fecha de Modificación:</label>
			<p class="date__info">{{$gallery->gallery_update->format('Y-M-d')}}</p>
		</div>
		<div class="data__multi">
			<p class="name__content">MULTIMEDIA</p>
		</div>		
		<div class="data__multimedia">
			@forelse($multimedia as $multi)
			@if($multi->multimedia_type == 1)
			<div class="multimedia__img">
				<div class="img__imagen">
					<img src="{{asset('img/galerias/'.$multi->multimedia_name)}}" alt="">
				</div>
				<div class="img__form">
					<form method="POST" action="{{route('deleteResourcesGallery')}}"  enctype= multipart/form-data>
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<input type="hidden" name="multimediaId" value="{{$multi->multimedia_id}}">
						<input type="submit" value="Eliminar">
					</form>
				</div>
			</div>
			@elseIf($multi->multimedia_type == 2)
			<div class="multimedia__docs">
				<div class="docs__name">
					<label class="multi__label">Archivo:</label> {{$multi->multimedia_name}}
				</div>
				<div class="docs__form">
					<form method="POST" action="{{route('deleteResourcesGallery')}}"  enctype= multipart/form-data>
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<input type="hidden" name="multimediaId" value="{{$multi->multimedia_id}}">
						<input type="submit" value="Eliminar">
					</form>
				</div>
			</div>
			@else
			<div class="multimedia__link">
				<div class="link__a">
					<label class="multi__label">Enlace:</label> {{$multi->multimedia_url}}
				</div>
				<div class="link__form">
					<form method="POST" action="{{route('deleteResourcesGallery')}}"  enctype= multipart/form-data>
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<input type="hidden" name="multimediaId" value="{{$multi->multimedia_id}}">
						<input type="submit" value="Eliminar">
					</form>
				</div>
			</div>
			@endif
			@empty
			<div class="multimedia__mjs">
				<p> ! No hay contenido multimedia... </p>
			</div>
		</div>
		@endforelse
		<div class="data__name">
			<div class="name__link">
				<a class="fa fa-chevron-circle-left" href="{{route('gallery')}}"> Atras</a>
			</div>
		</div>
	</div>
</main>
@stop