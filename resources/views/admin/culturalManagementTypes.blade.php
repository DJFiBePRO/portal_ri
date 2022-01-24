@extends('layouts.admin')

@section('title') Tipos @stop

@section('styles')
@parent
<link rel="stylesheet" href="{{ asset ('css/admin.css')}}">
@stop
@section('main')

<section>
	<div class="page__update">
		<form method="POST" action="{{route('updateCulturalManagementTypes')}}" class="action__form" enctype= multipart/form-data>
			<div class="form__title">
				<h1>Modificar Tipo</h1>
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
			<div class="form__container">
				<div class="container__label">
					<label for="">Gestion Cultural: </label>
				</div>
				<div class="container__item">
					<select  name="culturalManagementType" id="culturalManagementArea" >
						<option value="" >

						</option>
						@forelse($cultural as $culturalManagement)
						@if($culturalManagement->cultural_management_state == 1)
						<option value="{{$culturalManagement->cultural_management_id}}">
							{{$culturalManagement->cultural_management_name}}
						</option>
						@endif
						@empty
						<option value="">No existen tipos de gestión</option>
						@endforelse
					</select>
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
		<form method="POST" action="{{route('deleteCulturalManagementTypes')}}" class="action__form" enctype= multipart/form-data >	
			<div class="form__title">
				<h1>Eliminar Tipo</h1>
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

<section>
	<div class="page__resource">
		<form method="POST" action="{{route('addResourcesCulturalManagementTypes')}}" id="form__resource" class="action__form" enctype= multipart/form-data>
			<div class="form__title">
				<h1></h1>
			</div>

			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<input type="hidden" name="culturalManagementCulturalId">

			<div class="form__container" id="contenidoRecurso">
				<div class="container__label">
					<label for="">Seleccione el tipo de contenido a agregar:</label>
				</div>
				<div class="container__item">
					<select id="multimediaType" class="item__select" name="multimediaType" >
						<option value="" selected></option>
						@forelse ($multimedia as $multimediaData)
						<option value="{{$multimediaData->multimedia_type_description}}">{{$multimediaData->multimedia_type_description}}</option>
						@empty
						<option value="">No existen tipos de contenido</option>
						@endforelse
					</select>		
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
			<a href="{{route('culturalManagement')}}">Gestiones</a>
			<a href="{{route('culturalManagementTypes')}}">Tipos</a>
		</div>
		<div class="main__title">
			<h1>Tipos Gestión </h1>
		</div>

		<div class="main__insert">
			<div class="main__function">
				<h2>Agregar Gestión</h2>
			</div>			<div class="insert__form">
			<form method="POST" action="{{route('culturalManagementTypes')}}" class="action__form" id="form__insert" enctype="multipart/form-data">
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
						<textarea name="culturalManagementDescription" id="description" rows="5"  ></textarea>
					</div>
				</div>

				<div class="form__container">
					<div class="container__label">
						<label for="">Gestion Cultural: </label>
					</div>
					<div class="container__item">
						<select  name="culturalManagementType" >
							<option value="" >

							</option>
							@forelse($cultural as $culturalManagement)
							@if($culturalManagement->cultural_management_state == 1)
							<option value="{{$culturalManagement->cultural_management_id}}">
								{{$culturalManagement->cultural_management_name}}
							</option>
							@endif
							@empty
							<option  value="" >No existen tipos de gestión</option>
							@endforelse
						</select>
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
		<h2>Tipos Existentes</h2>
		<table  class="content__table" id="culturalManagement">
			<thead class="table__head">
				<tr>
					<th>Nombre</th>
					<th>Descripción</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				@forelse($types as $culturalManagementType )
				<tr class="data__info" 
				data-id="{{$culturalManagementType->cultural_management_types_id}}"
				data-titulo="{{$culturalManagementType->cultural_management_types_name}}"
				data-contenido="{{$culturalManagementType->cultural_management_types_description}}"
				data-tipo="{{$culturalManagementType->cultural_management_types_area}}"
				data-estado="{{$culturalManagementType->cultural_management_types_state}}">
				<td>{{$culturalManagementType->cultural_management_types_name}}</td>
				<td>{!!$culturalManagementType->cultural_management_types_description!!}</td>
				<td>
					<a href="{{ route('culturalManagementTypesData',[$culturalManagementType->cultural_management_types_id]) }}" title="visualizar" href=""><i class="fa fa-search" aria-hidden="true"></i></a>
					<a class="resource" title="tipos"><i class="fa fa-upload" aria-hidden="true"></i></a>

					<a class="update" title="modificar"><i class="fa fa-pencil" aria-hidden="true"></i></a>
					@if (Auth::user()->user_type != 1)
					<a class="delete" title="eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
					@endif

				</td>
			</tr>
			@empty
			<tr >
				<td ></td>
				<td class="table__msj">! No hay tipos agregados...</td>
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

	$('.resource').on('click', function(event) {
		event.preventDefault();
		var datos = $(this).closest('.data__info').data();
		$('.page__resource').slideToggle();
		$('#form__resource h1').append(datos['titulo']);
		$(".action__form input[name=culturalManagementCulturalId]").val(datos['id']);
	});

	function cargarFormulario(datos){
		$('.action__form')[0].reset();
		$(".action__form input[name=culturalManagementId]").val(datos['id']);
		$(".action__form input[name=culturalManagementTitle]").val(datos['titulo']);
		CKEDITOR.instances.culturalManagementDescription.setData(datos['contenido']);
		CKEDITOR.instances.deleteDescription.setData(datos['contenido']);
		$('.action__form #culturalManagementState').val(datos['estado']);
		$('.action__form #culturalManagementArea').val(datos['tipo']);
	}

	$('input.cancel__btn').click(function(event) {
		$(this).closest('.page__delete , .page__update, .page__resource ').slideToggle();
		$('#form__resource h1').empty();
		$('.action__form #archivos').remove();
		$('.action__form #fotografias').remove();
		$('.action__form #enlaces').remove();
		$('#form__insert')[0].reset();
		$('#form__resource')[0].reset();

	});

	$('#multimediaType').on('change',function(elemento){
		switch($(this).find("option:selected").html().toLowerCase()){
			case 'archivo':
			if ( $("#archivos").length == 0 ) {
				$('<div id="archivos" class="form__container">'+
					'<div class="container__label">'+
					'<label for="">Archivos</label>'+
					'</div>'+
					'<div class="container__item">'+
					'<input type="file" name="archivo[]" multiple >'+
					'</div>'+
					'</div').insertAfter('#contenidoRecurso') ;
			}else{
				alert('ya se pueden ingresar archivos');
			}
			break;
			case 'fotografía':
			if ( $("#fotografias").length == 0 ) {
				$('<div id="fotografias" class="form__container">'+
					'<div class="container__label">'+
					'<label for="">Fotografías</label>'+
					'</div>'+
					'<div class="container__item">'+
					'<input type="file" name="foto[]" multiple >'+
					'</div>'+
					'</div').insertAfter('#contenidoRecurso') ;
			}else{
				alert('ya se pueden ingresar fotografías');
			}
			break;
			case 'enlace':
			if ( $("#enlaces").length == 0 ) {
				$('<div id="enlaces" class="form__container">'+
					'<div class="container__label">'+
					'<label for="">Enlaces</label>'+
					'</div>'+
					'<div class="container__item">'+
					'<input type="text" name="enlace[]" >&nbsp;<i id="agregar-enlace" class="fa fa-plus"></i>'+
					'</div>'+
					'</div').insertAfter('#contenidoRecurso') ;
			}else{
				alert('ya se pueden ingresar enlaces');
			}
			break;
		}

	});

	$(document).on('click','#agregar-enlace',function() {
		$(
			'<div id="enlaces" class="form__container enlaces">'+
			'<div class="container__item">'+
			'</div>'+
			'<div class="container__item">'+
			'<input type="text" name="enlace[]">&nbsp;<i class="fa fa-minus eliminar-enlace"></i>'+
			'</div>'+
			'</div'
			).insertAfter('#enlaces') ;
	});

	$(document).on('click','.eliminar-enlace',function() {
		$(this).closest('div.enlaces').remove();
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
@stop