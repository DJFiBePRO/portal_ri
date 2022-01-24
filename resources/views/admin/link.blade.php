@extends('layouts.admin')

@section('title') Enlaces @stop

@section('styles')
@parent
<link rel="stylesheet" href="{{ asset ('css/admin.css')}}">
@stop
@section('main')

<section>
	<div class="page__update">
		<form method="POST" action="{{route('updateLink')}}" class="action__form" enctype= multipart/form-data>
			<div class="form__title">
				<h1>Modificar Enlace</h1>
			</div>

			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<input type="hidden" name="linkId" value="">
			<div class="form__container">
				<div class="container__label">
					<label for="">Nombre: </label>
				</div>
				<div class="container__item">
					<input type="text" name="linkName"  >
				</div>					
			</div>
			<div class="form__container">
				<div class="container__label">
					<label for="">Descripción: </label>
				</div>
				<div class="container__item">
					<input type="text" name="linkDescription" >
				</div>					
			</div>
			<div class="form__container">
				<div class="container__label">
					<label for="">Url: </label>
				</div>
				<div class="container__item">
					<input type="text" name="linkUrl" >
				</div>					
			</div>

			<div class="form__container">
				<div class="container__label">
					<label for="">Categoría:</label>
				</div>
				<div class="container__item">
					<select  name="linkCategory" id="linkCategory" >
						<option value="" >

						</option>
						@forelse($category as $parent)
						<option value="{{$parent->category_id}}">
							{{$parent->category_description}}
						</option>
						@empty
						<option value="">No existen padres de categorias</option>
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
					<select id="linkState" name="linkState" >
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

<main>
	<div class="page__main">
		<div class="main__title">
			<h1>Enlaces de Menú</h1>
		</div>

		<div class="main__insert">
			<div class="main__function">
				<h2>Agregar Enlace</h2>
			</div>
			<div class="insert__form">
				<form method="POST" action="{{route('link')}}" class="action__form" id="form__insert">
					<input type="hidden" name="_token" value="{{csrf_token()}}">

					<div class="form__container">
						<div class="container__label">
							<label for="">Nombre: </label>
						</div>
						<div class="container__item">
							<input type="text" name="linkName" >
						</div>					
					</div>
					<div class="form__container">
						<div class="container__label">
							<label for="">Descripción: </label>
						</div>
						<div class="container__item">
							<input type="text" name="linkDescription" >
						</div>					
					</div>
					<div class="form__container">
						<div class="container__label">
							<label for="">Url: </label>
						</div>
						<div class="container__item">
							<input type="text" name="linkUrl" >
						</div>					
					</div>

					<div class="form__container">
						<div class="container__label">
							<label for="">Categoría:</label>
						</div>
						<div class="container__item">
							<select  name="linkCategory"  >
								<option value="" >

								</option>
								@forelse($category as $parent)
								<option value="{{$parent->category_id}}">
									{{$parent->category_description}}
								</option>
								@empty
								<option value="">No existen padres de categorias</option>
								@endforelse
							</select>
						</div>
					</div>
					@if(Session::has('mensaje'))
					<div class="form__container">
						<div id="mensaje" >
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
			<h2>Enlaces Existentes</h2>
			<table  class="content__table" id="category">
				<thead class="table__head">
					<tr>
						<th>Nombre</th>
						<th>Url</th>
						<th>Categoría</th>
						<th>Descripción</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@forelse($link as $linkData )
					<tr class="data__info" 
					data-id="{{$linkData->link_id}}"
					data-nombre="{{$linkData->link_name}}"
					data-descripcion="{{$linkData->link_description}}"
					data-url="{{$linkData->link_url}}"
					data-categoria="{{$linkData->link_category}}"
					data-estado="{{$linkData->link_state}}">
					<td>{{$linkData->link_name}}</td>
					<td>{{$linkData->link_url}}</td>
					<td>
						@foreach($category as $parentName)
							@if($parentName->category_id == $linkData->link_category)
								{{$parentName->category_description}}
							@endif
						@endforeach
					</td>
					<td>{{$linkData->link_description}}</td>
					<td>
						<a class="update" title="modificar"><i class="fa fa-pencil" aria-hidden="true"></i></a>
						@if (Auth::user()->user_type != 1)
						<a class="delete" title="eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						@endif

					</td>
				</tr>
				@empty
				<tr >
					<td  colspan="5" class="table__msj"> ! No hay categorías registradas...</td>
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
		$(".action__form input[name=linkId]").val(datos['id']);
		$(".action__form input[name=linkName]").val(datos['nombre']);
		$(".action__form input[name=linkDescription]").val(datos['descripcion']);
		$(".action__form input[name=linkUrl]").val(datos['url']);
		$('.action__form #linkCategory').val(datos['categoria']);
		$('.action__form #linkState').val(datos['estado']);
	}

	$('input.cancel__btn').click(function(event) {
		$(this).closest('.page__delete , .page__update , .page__resource').slideToggle();
		$('#form__insert')[0].reset();
	});

	$('#mensaje').fadeOut(5000);

	$(document).ready(function() {
		$('#category').DataTable({
			"ordering": false,
			"info":     false,
			"paging":   false
		});
	} );
	
</script>
@stop