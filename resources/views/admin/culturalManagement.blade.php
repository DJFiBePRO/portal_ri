@extends('layouts.admin')

@section('title') Gestión @stop

@section('styles')
@parent
<link rel="stylesheet" href="{{ asset ('css/admin.css')}}">
@stop
@section('main')

<section>
	<div class="page__update">
		<form method="POST" action="{{route('updateCulturalManagement')}}" class="action__form" enctype= multipart/form-data>
			<div class="form__title">
				<h1>Modificar Gestión</h1>
			</div>

			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<input type="hidden" name="culturalManagementId" value="">
			
			<div class="form__container">
				<div class="container__label">
					<label for="">Nombre: </label>
				</div>
				<div class="container__item">
					<input type="text" name="culturalManagementTitle" >
				</div>					
			</div>

			<div class="form__container">
				<div class="container__label">
					<label for="">Descripción: </label>
				</div>
				<div class="container__item">
					<textarea name="culturalManagementDescription"  rows="5" id="culturalManagementDescription"  ></textarea>
				</div>
			</div>

			@if (Auth::user()->user_type == 1)
			<div class="form__container">
				<div class="container__label">
					<label for="">Estado:</label>
				</div>
				<div class="container__item">
					<select id="culturalManagementState" name="culturalManagementState" class="item__select" >
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
					<input type="file" name="culturalManagementImage">
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
		<form method="POST" action="{{route('deleteCulturalManagement')}}" class="action__form" enctype= multipart/form-data >	
			<div class="form__title">
				<h1>Eliminar Gestión</h1>
			</div>
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<input type="hidden" name="culturalManagementId" >

			<div class="form__container">
				<div class="container__label">
					<label for="">Nombre: </label>
				</div>
				<div class="container__item">
					<input type="text" name="culturalManagementTitle"  disabled>
				</div>					
			</div>

			<div class="form__container">
				<div class="container__label">
					<label for="">Descripción: </label>
				</div>
				<div class="container__item">
					<textarea name="culturalManagementDescription"  rows="5" id="deleteDescription" disabled ></textarea>
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
			<a href="{{route('culturalManagement')}}">Gestiones</a>
			<a href="{{route('culturalManagementTypes')}}">Tipos</a>
		</div>
		<div class="main__title">
			<h1>Gestión Cultural </h1>
		</div>

		<div class="main__insert">
			<div class="main__function">
				<h2>Agregar Gestión</h2>
			</div>
			<div class="insert__form">
				<form method="POST" action="{{route('culturalManagement')}}" class="action__form" id="form__insert" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{csrf_token()}}">

					<div class="form__container">
						<div class="container__label">
							<label for="">Nombre: </label>
						</div>
						<div class="container__item">
							<input type="text" name="culturalManagementName" >
						</div>					
					</div>

					<div class="form__container">
						<div class="container__label">
							<label for="">Descripción: </label>
						</div>
						<div class="container__item">
							<textarea name="culturalManagementDescription" id="description"  rows="5"  ></textarea>
						</div>
					</div>

					<div class="form__container">
						<div class="container__label">
							<label for="">Imagen: </label>
						</div>
						<div class="container__item">
							<input type="file" name="culturalManagementImage" >
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
			<h2>Gestiones Existentes</h2>
			<table  class="content__table" id="culturalManagement">
				<thead class="table__head">
					<tr>
						<th>Nombre</th>
						<th>Descripción</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@forelse($cultural as $culturalData )
					<tr class="data__info" data-id="{{$culturalData->cultural_management_id}}"
						data-titulo="{{$culturalData->cultural_management_name}}"
						data-contenido="{!!$culturalData->cultural_management_description!!}"
						data-estado="{{$culturalData->cultural_management_state}}">
						<td>{{$culturalData->cultural_management_name}}</td>
						<td>{!!$culturalData->cultural_management_description!!}</td>
						<td>
							<a href="{{ route('culturalManagementData',[$culturalData->cultural_management_id]) }}" title="visualizar" href=""><i class="fa fa-search" aria-hidden="true"></i></a>
							<a class="update" title="modificar"><i class="fa fa-pencil" aria-hidden="true"></i></a>
							@if (Auth::user()->user_type != 1)
							<a class="delete" title="eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
							@endif

						</td>
					</tr>
					@empty
					<tr >
						<td ></td>
						<td class="table__msj">! No hay gestiones agregadas...</td>
						<td ></td>
					</tr>
					@endforelse

				</tbody>
			</table>
		</div>	
	</div>

</div>
</main>
@stop

@section('scripts')
@parent

<script type="text/javascript">

	$('.action__form')[0].reset();

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
		$(".action__form input[name=culturalManagementId]").val(datos['id']);
		$(".action__form input[name=culturalManagementTitle]").val(datos['titulo']);
		CKEDITOR.instances.culturalManagementDescription.setData(datos['contenido']);
		CKEDITOR.instances.deleteDescription.setData(datos['contenido']);
		$('.action__form #culturalManagementState').val(datos['estado']);
	}

	$('input.cancel__btn').click(function(event) {
		$(this).closest('.page__delete , .page__update ').slideToggle();

	});

	$('#cancel__btn').click(function(event){
		location.reload();
	});

	$('#mensaje').fadeOut(5000);

	CKEDITOR.replace( 'description' );	
	CKEDITOR.replace( 'deleteDescription' );	
	CKEDITOR.replace( 'culturalManagementDescription' );
	CKEDITOR.config.forcePasteAsPlainText = true;

	$(document).ready(function() {
		$('#culturalManagement').DataTable({
			"ordering": false,
			"info":     false,
			"paging":   false
		});
	} );


</script>
<script src="{{ asset ('DataTables-1.10.13/media/js/jquery.dataTables.min.js')}}"></script>

@stop