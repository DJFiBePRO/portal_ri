@extends('layouts.admin')

@section('title') Redes @stop

@section('styles')
@parent
<link rel="stylesheet" href="{{ asset ('css/admin.css')}}">
@stop
@section('main')

<section>
	<div class="page__update">
		<form method="POST" action="{{route('updateMagazine')}}" class="action__form" enctype= multipart/form-data>
			<div class="form__title">
				<h1>Modificar Revista</h1>
			</div>

			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<input type="hidden" name="magazineId" value="">

			<div class="form__container">
				<div class="container__label">
					<label for="">Nombre: </label>
				</div>
				<div class="container__item">
					<input type="text" name="magazineName" >
				</div>
			</div>
			<div class="form__container">
				<div class="container__label">
					<label for="">Imagen: </label>
				</div>
				<div class="container__item">
					<input type="file" name="magazineImage">
				</div>
			</div>
			<div class="form__container">
				<div class="container__label">
					<label for="">Archivo PDF: </label>
				</div>
				<div class="container__item">
					<input type="file" name="magazineFile">
				</div>
			</div>
			<div class="form__container">
				<div class="container__label">
					<label for="">Archivo Flash: </label>
				</div>
				<div class="container__item">
					<input type="file" name="magazineFlash">
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

<section>
	<div class="page__delete" >
		<form method="POST" action="{{route('deleteMagazine')}}" class="action__form" enctype= multipart/form-data >
			<div class="form__title">
				<h1>Eliminar Revista</h1>
			</div>
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<input type="hidden" name="magazineId" >

			<div class="form__container">
				<div class="container__label">
					<label for="">Nombre: </label>
				</div>
				<div class="container__item">
					<input type="text" name="magazineName"  disabled>
				</div>
			</div>
			<div class="form__button">
				<div class="button__save">
					<input type="submit" value="Eliminar">
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
		<div class="main__title">
			<h1>Revistas</h1>
		</div>

		<div class="main__insert">
			<div class="main__function">
				<h2>Agregar Revista</h2>
			</div>
			<div class="insert__form">
				<form method="POST" action="{{route('magazine')}}" class="action__form" id="form__insert" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{csrf_token()}}">

					<div class="form__container">
						<div class="container__label">
							<label for="">Nombre: </label>
						</div>
						<div class="container__item">
							<input type="text" name="magazineName" >
						</div>
					</div>

					<div class="form__container">
						<div class="container__label">
							<label for="">Imagen: </label>
						</div>
						<div class="container__item">
							<input type="file" name="magazineImage" >
						</div>
					</div>
					<div class="form__container">
						<div class="container__label">
							<label for="">Archivo PDF: </label>
						</div>
						<div class="container__item">
							<input type="file" name="magazineFile" >
						</div>
					</div>
					<div class="form__container">
						<div class="container__label">
							<label for="">Archivo Flash: </label>
						</div>
						<div class="container__item">
							<input type="file" name="magazineFlash" >
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
			<h2>Revistas Existentes </h2>
			<table  class="content__table" id="magazine">
				<thead class="table__head">
					<tr>
						<th>Nombre</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@forelse($magazines as $magazine)
					<tr class="data__info"
					data-id="{{$magazine->magazine_id}}"
					data-name="{{$magazine->magazine_name}}"
					data-imagen="{{$magazine->magazine_image}}"
					data-file="{{$magazine->magazine_file}}"
					data-flash="{{$magazine->magazine_flash}}">
					<td>{{$magazine->magazine_name}}</td>
					<td>
						<a href="{{ route('magazineData',[$magazine->magazine_id]) }}" title="visualizar" href=""><i class="fa fa-search" aria-hidden="true"></i></a>
						<a class="update" title="modificar"><i class="fa fa-pencil" aria-hidden="true"></i></a>
						@if (Auth::user()->user_type != 1)
						<a class="delete" title="eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						@endif
					</td>
				</tr>
				@empty
				<tr >
					<td ></td>
					<td class="table__msj"> ! No hay redes sociales registradas...</td>
					<td ></td>
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

	$('.delete').on('click', function(event) {
		event.preventDefault();
		var datos = $(this).closest('.data__info').data();
		cargarFormulario(datos);
		$('.page__delete').slideToggle();
	});

	$('.update').on('click', function(event) {
		event.preventDefault();
		var datos = $(this).closest('.data__info').data();
		cargarFormulario(datos);
		$('.page__update').slideToggle();
	});

	function cargarFormulario(datos){
		$('.action__form')[0].reset();
		$(".action__form input[name=magazineId]").val(datos['id']);
		$(".action__form input[name=magazineName]").val(datos['name']);
	}

	$('input.cancel__btn').click(function(event) {
		$(this).closest('.page__delete , .page__update ').slideToggle();
		$('#form__insert')[0].reset();

	});

	$('#mensaje').fadeOut(5000);

	$(document).ready(function() {
		$('#magazine').DataTable({
			"ordering": false,
			"info":     false,
			"paging":   false
		});
	} );

</script>
@stop
