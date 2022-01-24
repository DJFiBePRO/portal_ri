@extends('layouts.admin')

@section('title') Contactos @stop

@section('styles')
@parent
<link rel="stylesheet" href="{{ asset ('css/admin.css')}}">
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
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
				<h1>Contactos {{$management->management_area_name}} </h1>
			</div>
			<div class="insert__form">
				<form method="POST" action="{{route('direction')}}" class="action__form" id="form__insert" enctype= multipart/form-data>
					<input type="hidden" name="_token" value="{{csrf_token()}}">

					<div class="form__container">
						<div class="container__label">
							<label for="">Dirección: </label>
						</div>
						<div class="container__item">
							<input type="text" name="managementAreaDirection" value="{{$management->management_area_direction}}">
						</div>					
					</div>

					<div class="form__container">
						<div class="container__label">
							<label for="">Correo: </label>
						</div>
						<div class="container__item">
							<input type="email" name="managementAreaMail" value="{{$management->management_area_mail}}">
						</div>					
					</div>

					<div class="form__container">
						<div class="container__label">
							<label for="">Teléfono: </label>
						</div>
						<div class="container__item">
							<input type="text" name="managementAreaPhone" value="{{$management->management_area_phone}}">
						</div>					
					</div>

					<div class="form__container">
						<div class="container__label">
							<label for="">Google Maps: </label>
						</div>
						<div class="container__item">
							<input type="text" name="managementAreaMap" value="{{$management->management_area_map}}">
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
	//$('input.fecha').datepicker({ dateFormat: 'yy-mm-dd' });

	$('.cancel__btn').click(function(event) {
		location.reload();
	});
	$('#mensaje').fadeOut(5000);


</script>

@stop