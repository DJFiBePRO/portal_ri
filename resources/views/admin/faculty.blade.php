@extends('layouts.admin')

@section('title') Facultades @stop

@section('styles')
@parent
<link rel="stylesheet" href="{{ asset ('css/admin.css')}}">
@stop
@section('main')

<section>
	<div class="page__update">
		<form method="POST" action="{{route('updateFaculty')}}" class="action__form" enctype= multipart/form-data>
			<div class="form__title">
				<h1>Modificar Facultades</h1>
			</div>

			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<input type="hidden" name="facultyId" value="">

			<div class="form__container">
				<div class="container__label">
					<label for="">Nombre: </label>
				</div>
				<div class="container__item">
					<input type="text" name="facultyName" >
				</div>
			</div>

			@if (Auth::user()->user_type == 1)
			<div class="form__container">
				<div class="container__label">
					<label for="">Estado:</label>
				</div>
				<div class="container__item">
					<select id="facultyState" name="facultyState" class="item__select" >
						<option value=""></option>
						<option value="0">No Publicada</option>
						<option value="1">Publicada</option>
					</select>
				</div>
			</div>
			@endif
			<div class="form__container">
				<div class="container__label">
					<label for="">Imagen: </label>
				</div>
				<div class="container__item">
					<input type="file" name="facultyImage">
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
		<form method="POST" action="{{route('deleteFaculty')}}" class="action__form" enctype= multipart/form-data >
			<div class="form__title">
				<h1>Eliminar Facultades</h1>
			</div>
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<input type="hidden" name="facultyId" >

			<div class="form__container">
				<div class="container__label">
					<label for="">Nombre: </label>
				</div>
				<div class="container__item">
					<input type="text" name="facultyName"  disabled>
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
		<div class="main__link">
			<a href="{{route('faculty')}}">Facultades</a>
			<a href="{{route('facultyNews')}}">Proyectos</a>
			<a href="{{route('conventions')}}">Convenios</a>
		</div>
		<div class="main__title">
			<h1>Facultades </h1>
		</div>

		<div class="main__insert">
			<div class="main__function">
				<h2>Agregar Facultad</h2>
			</div>
			<div class="insert__form">
				<form method="POST" action="{{route('faculty')}}" class="action__form" id="form__insert" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{csrf_token()}}">

					<div class="form__container">
						<div class="container__label">
							<label for="">Nombre: </label>
						</div>
						<div class="container__item">
							<input type="text" name="facultyName" >
						</div>
					</div>

					<div class="form__container">
						<div class="container__label">
							<label for="">Imagen: </label>
						</div>
						<div class="container__item">
							<input type="file" name="facultyImage">
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
			<h2>Facultades Existentes</h2>
			<table  class="content__table" id="faculty">
				<thead class="table__head">
					<tr>
						<th>Nombre</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@forelse($faculty as $facultyData )
					<tr class="data__info"
					data-id="{{$facultyData->faculty_id}}"
					data-titulo="{{$facultyData->faculty_name}}"
					data-contenido="{{$facultyData->faculty_description}}"
					data-estado="{{$facultyData->faculty_state}}">
					<td>{{$facultyData->faculty_name}}</td>
					<td>
						<a class="update" title="modificar"><i class="fa fa-pencil" aria-hidden="true"></i></a>
						@if (Auth::user()->user_type != 1)
						<a class="delete" title="eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						@endif

					</td>
				</tr>
				@empty
				<tr >
					<td colspan="2" class="table__msj"> ! No hay facultades registradas...</td>
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
		$(".action__form input[name=facultyId]").val(datos['id']);
		$(".action__form input[name=facultyName]").val(datos['titulo']);
		$('.action__form #facultyState').val(datos['estado']);
	}

	$('input.cancel__btn').click(function(event) {
		$(this).closest('.page__delete , .page__update ').slideToggle();
		$('#form__insert')[0].reset();
		$('#action__form')[0].reset();

	});

	$('#mensaje').fadeOut(5000);

	$(document).ready(function() {
		$('#faculty').DataTable({
			"ordering": false,
			"info":     false,
			"paging":   false
		});
	} );

</script>
@stop
