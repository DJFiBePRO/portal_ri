@extends('layouts.admin')

@section('title') Convenios @stop

@section('styles')
@parent
<link rel="stylesheet" href="{{ asset ('css/admin.css')}}">
@stop
@section('main')

<section>
	<div class="page__update">
		<form method="POST" action="{{route('updateConventions')}}" class="action__form" enctype= multipart/form-data>
			<div class="form__title">
				<h1>Modificar Convenios</h1>
			</div>

			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<input type="hidden" name="conventionsId" value="">

			<div class="form__container">
				<div class="container__label">
					<label for="">Nombre: </label>
				</div>
				<div class="container__item">
					<input type="text" name="conventionsName" >
				</div>
			</div>
			<div class="form__container">
				<div class="container__label">
					<label for="">Tipo: </label>
				</div>
				<div class="container__item">
				<select name="conventionsType" id="conventionsType">
						<option value=""></option>
						<option value="Informe Anual">Informe Anual</option>
						<option value="Convenio">Convenio</option>
						<option value="Reglamento y Formato">Reglamento y Formato</option>
					</select>
				</div>
			</div>
			@if (Auth::user()->user_type == 1)
			<div class="form__container">
				<div class="container__label">
					<label for="">Estado:</label>
				</div>
				<div class="container__item">
					<select id="conventionsState" name="conventionsState" class="item__select" >
						<option value=""></option>
						<option value="0">No Publicada</option>
						<option value="1">Publicada</option>
					</select>
				</div>
			</div>
			@endif
			<div class="form__container">
				<div class="container__label">
					<label for="">Archivo: </label>
				</div>
				<div class="container__item">
					<input type="file" name="conventionsFile">
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
		<form method="POST" action="{{route('deleteConventions')}}" class="action__form" enctype= multipart/form-data >
			<div class="form__title">
				<h1>Eliminar Convenios</h1>
			</div>
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<input type="hidden" name="conventionsId" >

			<div class="form__container">
				<div class="container__label">
					<label for="">Nombre: </label>
				</div>
				<div class="container__item">
					<input type="text" name="conventionsName"  disabled>
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
			<h1>Convenios </h1>
		</div>

		<div class="main__insert">
			<div class="main__function">
				<h2>Agregar Convenio</h2>
			</div>
			<div class="insert__form">
				<form method="POST" action="{{route('conventions')}}" class="action__form" id="form__insert" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{csrf_token()}}">

					<div class="form__container">
						<div class="container__label">
							<label for="">Nombre: </label>
						</div>
						<div class="container__item">
							<input type="text" name="conventionsName" >
						</div>
					</div>

					<div class="form__container">
						<div class="container__label">
							<label for="">Tipo: </label>
						</div>
						<div class="container__item">
							<select name="conventionsType">
								<option value="Informe Anual">Informe Anual</option>
								<option selected value="Convenio">Convenio</option>
								<option value="Reglamento y Formato">Reglamento y Formato</option>
							</select>
						</div>
					</div>

					<div class="form__container">
						<div class="container__label">
							<label for="">Archivo: </label>
						</div>
						<div class="container__item">
							<input type="file" name="conventionsFile">
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
			<h2>Convenios Existentes</h2>
			<table  class="content__table" id="conventions">
				<thead class="table__head">
					<tr>
						<th>Nombre</th>
						<th>Tipo</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@forelse($conventions as $conventionsData )
					<tr class="data__info"
					data-id="{{$conventionsData->conventions_id}}"
					data-titulo="{{$conventionsData->conventions_name}}"
					data-contenido="{{$conventionsData->conventions_type}}"
					data-estado="{{$conventionsData->conventions_state}}">
					<td>{{$conventionsData->conventions_name}}</td>
					<td>{{$conventionsData->conventions_type}}</td>
					<td>
						<a class="update" title="modificar"><i class="fa fa-pencil" aria-hidden="true"></i></a>
						@if (Auth::user()->user_type != 1)
						<a class="delete" title="eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						@endif

					</td>
				</tr>
				@empty
				<tr >
					<td colspan="3" class="table__msj"> ! No hay convenios registrados...</td>
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
		$(".action__form input[name=conventionsId]").val(datos['id']);
		$(".action__form input[name=conventionsName]").val(datos['titulo']);
		$('.action__form #conventionsState').val(datos['estado']);
		$('.action__form #conventionsType').val(datos['contenido']);
	}

	$('input.cancel__btn').click(function(event) {
		$(this).closest('.page__delete , .page__update ').slideToggle();
		$('#form__insert')[0].reset();
		$('#action__form')[0].reset();

	});

	$('#mensaje').fadeOut(5000);

	$(document).ready(function() {
		$('#conventions').DataTable({
			"ordering": false,
			"info":     false,
			"paging":   false
		});
	} );

</script>
@stop
