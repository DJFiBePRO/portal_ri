@extends('layouts.admin')

@section('title') Funciones @stop

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
				<h1>Funciones {{$management->management_area_name}}</h1>
			</div>
			<div class="insert__form">
				<form method="POST" action="{{route('functions')}}" class="action__form" id="form__insert" enctype= multipart/form-data>
					<input type="hidden" name="_token" value="{{csrf_token()}}">

					<div class="form__container">
						<div class="container__label">
							<label for="">Funciones: </label>
						</div>
						<div class="container__item">
							<textarea name="managementAreaFunctions" id="managementAreaFunctions" >{{$management->management_area_functions}}</textarea>
						</div>					
					</div>

					<div class="form__container">
						<div class="container__label">
							<label for="">Quienes Somos: </label>
						</div>
						<div class="container__item">
							<textarea name="managementAreaDescription" id="managementAreaDescription" >{{$management->management_area_description}}</textarea>
						</div>					
					</div>
					@if(Session::has('mensaje'))
					<div class="form__container">
						<div id="mensaje">
							{{Session::get('mensaje')}}
						</div>
					</div>
					@endIf
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

	CKEDITOR.replace( 'managementAreaFunctions' );
	CKEDITOR.replace( 'managementAreaDescription' );
	$('#mensaje').fadeOut(5000);


</script>

@stop