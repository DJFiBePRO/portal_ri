@extends('layouts.admin')

@section('title') Inicio @stop

@section('styles')
@parent
<link rel="stylesheet" href="{{ asset ('css/admin.css')}}">
@stop

@section('main')

<main>
	<div class="page__main">
		<div class="main__link">
			<a href="{{route('mission')}}">Misión - Visión</a>
			<a href="{{route('objective')}}">Objetivos</a>
			<a href="{{route('functions')}}">Funciones</a>
			<a href="{{route('direction')}}">Contáctanos</a>
		</div>

		<div class="main__insert">
			<div class="main__title">
				<h1>Datos Generales {{$management->management_area_name}}</h1>
			</div>
			<div class="insert__form">
				<form method="POST" action="{{route('inicio')}}" class="action__form" id="form__insert" enctype= multipart/form-data>
					<input type="hidden" name="_token" value="{{csrf_token()}}">

					<div class="form__container">
						<div class="container__label">
							<label for="">Nombre: </label>
						</div>
						<div class="container__item">
							<input type="text" name="managementAreaName" value="{{$management->management_area_name}}" >
						</div>					
					</div>

					<div class="form__container">
						<div class="container__label">
							<label for="">Logotipo: </label>
						</div>
						<div class="container__item">
							<img src="{{asset('img/logos/'.$management->management_area_logo)}}" alt="">
							<input type="file" name="managementAreaLogo" >
						</div>					
					</div>

					<div class="form__container">
						<div class="container__label">
							<label for="">Imagen: </label>
						</div>
						<div class="container__item">
							<img src="{{asset('img/vinculacion/'.$management->management_area_image)}}" alt="">
							<input type="file" name="managementAreaImage">
						</div>
					</div>

					<div class="form__container">
						<div class="container__label">
							<label for="">Fecha de creación:</label>
						</div>
						<div class="container__item">
							<input type="text" name="managementAreaCreate" class="fecha" value="{{$management->management_area_create->format('Y-m-d')}}" >
						</div>
					</div>
					@if(Session::has('mensaje'))
					<div class="form__container">
						<div id="mensaje">
							{{Session::get('mensaje')}}
						</div>
					</div>
					@endIf
					@if (count($errors) > 0)
					<div class="form__container">
						<ul id="mensaje">
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif
					<div class="form__button">
						<div class="button__save">						
							<input type="submit" value="Guardar">
						</div>
						<div class="button__cancel">
							<input type="button" class="cancel__btn" id="cancel__btn" value="Cancelar">
						</div>
					</div>
				</form>
			</div>
		</div>

	</div>
</div>
</main>
@stop

@section('scripts')
@parent

<script type="text/javascript">

	$('.cancel__btn').click(function(event) {
		$('#form__insert')[0].reset();
	});

	$('input.fecha').datepicker({ dateFormat: 'yy-mm-dd' });
	$('#mensaje').fadeOut(5000);

</script>


@stop