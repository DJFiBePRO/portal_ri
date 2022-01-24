@extends('layouts.admin')

@section('title') Categorías @stop

@section('styles')
@parent
<link rel="stylesheet" href="{{ asset ('css/admin.css')}}">
@stop
@section('main')

<section>
	<div class="page__update">
		<form method="POST" action="{{route('updateUserType')}}" class="action__form" enctype= multipart/form-data>
			<div class="form__title">
				<h1>Modificar Tipo</h1>
			</div>

			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<input type="hidden" name="categoryId" value="">
			
			<div class="form__container">
				<div class="container__label">
					<label for="">Descripción: </label>
				</div>
				<div class="container__item">
					<input type="text" name="userDescription" >
				</div>					
			</div>
			
			<div class="form__button">
				<div class="button__save">						
					<input type="submit" value="Guardar">
				</div>
				<div class="button__cancel">
					<input type="button" class="cancel__btn" value="Cancelar">
				</div>
			</div>

		</form>
	</div>
</section>

<main>
	<div class="page__main">

		<div class="main__link">
			<a href="{{route('userType')}}">Usuarios</a>
			<a href="{{route('authorityType')}}">Autoridades</a>
			<a href="{{route('multimediaType')}}">Multimedia</a>
			<a href="{{route('newsType')}}">Noticias</a>
		</div>

		<div class="main__title">
			<h1>Tipos de Usuario</h1>
		</div>

		<div class="main__insert">
			<div class="main__function">
				<h2>Agregar</h2>
			</div>
			<div class="insert__form">
				<form method="POST" action="{{route('userType')}}" class="action__form" id="form__insert" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{csrf_token()}}">

					
					<div class="form__container">
						<div class="container__label">
							<label for="">Descripción: </label>
						</div>
						<div class="container__item">
							<input type="text" name="userDescription" >
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
							<input type="submit" value="Agregar">
						</div>
						<div class="button__cancel">
							<input type="button" class="cancel__btn" id="cancel__btn" value="Cancelar">
						</div>
					</div>
				</form>
			</div>
		</div>

		<div class="main__content">
			<h2>Tipos de usuarios Existentes </h2>
			<table  class="content__table" id="user">
				<thead class="table__head">
					<tr>
						<th>Descripción</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@forelse($category as $categoryData )
					<tr class="data__info" 
					data-id="{{$categoryData->user_type_id}}"
					data-descripcion="{{$categoryData->user_type_description}}">
					<td>{{$categoryData->user_type_description}}</td>
					<td>
						<a class="update" title="modificar"><i class="fa fa-pencil" aria-hidden="true"></i></a>


					</td>
				</tr>
				@empty
				<tr >
					<td colspan="2" class="table__msj">! No hay tipos de usuarios registrados...</td>
				</tr>
				@endforelse

			</tbody>
		</table>
	</div>
</div>
</main>
@stop


@section('scripts')
@parent
<script type="text/javascript">

	$('.update').on('click', function(event) {
		event.preventDefault();
		var datos = $(this).closest('.data__info').data();
		cargarFormulario(datos);
		$('.page__update').slideToggle();
	});

	function cargarFormulario(datos){
		$('.action__form')[0].reset();
		$(".action__form input[name=categoryId]").val(datos['id']);
		$(".action__form input[name=userDescription]").val(datos['descripcion']);
	}
	$('input.cancel__btn').click(function(event) {
		$(this).closest('.page__delete , .page__update , .page__resource').slideToggle();
		$('#form__insert')[0].reset();
		$('#action__form')[0].reset();
	});
	$('#mensaje').fadeOut(5000);

	$(document).ready(function() {
		$('#user').DataTable({
			"ordering": false,
			"info":     false,
			"paging":   false
		});
	} );


</script>

@stop

