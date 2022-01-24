@extends('layouts.admin')

@section('title') Descargas @stop

@section('styles')
@parent
<link rel="stylesheet" href="{{ asset ('css/admin.css')}}">
@stop
@section('main')

<section>
	<div class="page__update">
		<form method="POST" action="{{route('updateDownload')}}" class="action__form" enctype= multipart/form-data>
			<div class="form__title">
				<h1>Modificar Descargas</h1>
			</div>

			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<input type="hidden" name="downloadId" value="">
			
			<div class="form__container">
				<div class="container__label">
					<label for="">Nombre: </label>
				</div>
				<div class="container__item">
					<input type="text" name="downloadName" >
				</div>					
			</div>

			<div class="form__container">
				<div class="container__label">
					<label for="">Descripción: </label>
				</div>
				<div class="container__item">
					<textarea name="downloadDescription"  rows="5" id="downloadDescription"  ></textarea>
				</div>
			</div>

			@if (Auth::user()->user_type == 1)
			<div class="form__container">
				<div class="container__label">
					<label for="">Estado:</label>
				</div>
				<div class="container__item">
					<select id="downloadState" name="downloadState" class="item__select" >
						<option value=""></option>
						<option value="0">No Publicada</option>
						<option value="1">Publicada</option>
					</select>	
				</div>
			</div>
			@endif
			<div class="form__container">
				<div class="container__label">
					<label for="">Documento: </label>
				</div>
				<div class="container__item">
					<input type="file" name="downloadFile">
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
		<form method="POST" action="{{route('deleteDownload')}}" class="action__form" enctype= multipart/form-data >	
			<div class="form__title">
				<h1>Eliminar Descarga</h1>
			</div>
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<input type="hidden" name="downloadId" >

			<div class="form__container">
				<div class="container__label">
					<label for="">Nombre: </label>
				</div>
				<div class="container__item">
					<input type="text" name="downloadName"  disabled>
				</div>					
			</div>

			<div class="form__container">
				<div class="container__label">
					<label for="">Descripción: </label>
				</div>
				<div class="container__item">
					<textarea name="downloadDescription" id="downloadDescription" rows="5" disabled > </textarea>
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
			<h1>Descargas </h1>
		</div>

		<div class="main__insert">
			<div class="main__function">
				<h2>Agregar Descarga</h2>
			</div>			
			<div class="insert__form">
				<form method="POST" action="{{route('download')}}" class="action__form" id="form__insert" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{csrf_token()}}">

					<div class="form__container">
						<div class="container__label">
							<label for="">Nombre: </label>
						</div>
						<div class="container__item">
							<input type="text" name="downloadName" >
						</div>					
					</div>

					<div class="form__container">
						<div class="container__label">
							<label for="">Descripción: </label>
						</div>
						<div class="container__item">
							<textarea name="downloadDescription"  rows="5"  ></textarea>
						</div>
					</div>

					<div class="form__container">
						<div class="container__label">
							<label for="">Documento: </label>
						</div>
						<div class="container__item">
							<input type="file" name="downloadFile" >
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
			<h2>Descargas Existentes</h2>
			<table  class="content__table" id="download">
				<thead class="table__head">
					<tr>
						<th>Nombre</th>
						<th>Descripción</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@forelse($download as $downloadData )
					<tr class="data__info" 
					data-id="{{$downloadData->download_id}}"
					data-titulo="{{$downloadData->download_name}}"
					data-contenido="{{$downloadData->download_description}}"
					data-documento="{{$downloadData->download_file}}"
					data-estado="{{$downloadData->download_state}}">
					<td>{{$downloadData->download_name}}</td>
					<td>{{$downloadData->download_description}}</td>
					<td>
						<a href="{{ route('downloadData',[$downloadData->download_id]) }}" title="visualizar" href=""><i class="fa fa-search" aria-hidden="true"></i></a>
						<a class="update" title="modificar"><i class="fa fa-pencil" aria-hidden="true"></i></a>
						@if (Auth::user()->user_type != 1)
						<a class="delete" title="eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						@endif

					</td>
				</tr>
				@empty
				<tr >
					<td ></td>
					<td class="table__msj"> ! No hay descargas registradas...</td>
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
		$(".action__form input[name=downloadId]").val(datos['id']);
		$(".action__form input[name=downloadName]").val(datos['titulo']);
		$('.action__form #downloadDescription').val(datos['contenido']);
		$('.action__form input[name=downloadDocs]').val(datos['documento']);
		$('.action__form #downloadState').val(datos['estado']);
	}

	$('input.cancel__btn').click(function(event) {
		$(this).closest('.page__delete , .page__update ').slideToggle();
		$('#form__insert')[0].reset();
		$('#action__form')[0].reset();
		
	});

	$('#mensaje').fadeOut(5000);

	$(document).ready(function() {
		$('#download').DataTable({
			"ordering": false,
			"info":     false,
			"paging":   false
		});
	} );

</script>
@stop