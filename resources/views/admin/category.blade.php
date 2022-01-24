@extends('layouts.admin')

@section('title') Categorías @stop

@section('styles')
@parent
<link rel="stylesheet" href="{{ asset ('css/admin.css')}}">
@stop
@section('main')

<section>
	<div class="page__update">
		<form method="POST" action="{{route('updateCategory')}}" class="action__form" enctype= multipart/form-data>
			<div class="form__title">
				<h1>Modificar Categorías</h1>
			</div>

			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<input type="hidden" name="categoryId" value="">
			
			<div class="form__container">
				<div class="container__label">
					<label for="">Descripción: </label>
				</div>
				<div class="container__item">
					<input type="text" name="categoryDescription" >
				</div>					
			</div>

			<div class="form__container">
				<div class="container__label">
					<label for="">Padre:</label>
				</div>
				<div class="container__item">
					<select  name="categoryParent" id="categoryParent" >
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
					<select id="categoryState" name="categoryState"  >
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
			<h1>Categorías de Menú</h1>
		</div>

		<div class="main__insert">
			<div class="main__function">
				<h2>Agregar Categoría</h2>
			</div>
			<div class="insert__form">
				<form method="POST" action="{{route('category')}}" class="action__form" id="form__insert">
					<input type="hidden" name="_token" value="{{csrf_token()}}">

					<div class="form__container">
						<div class="container__label">
							<label for="">Descripción: </label>
						</div>
						<div class="container__item">
							<input type="text" name="categoryDescription" >
						</div>					
					</div>

					<div class="form__container">
						<div class="container__label">
							<label for="">Padre:</label>
						</div>
						<div class="container__item">
							<select  name="categoryParent" >
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
			<h2>Categorías Existentes</h2>
			<table  class="content__table" id="category">
				<thead class="table__head">
					<tr>
						<th>Descripción</th>
						<th>Padre</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@forelse($category as $categoryData )
					<tr class="data__info" 
					data-id="{{$categoryData->category_id}}"
					data-descripcion="{{$categoryData->category_description}}"
					data-padre="{{$categoryData->category_parent}}"
					data-estado="{{$categoryData->category_state}}">
						<td>{{$categoryData->category_description}}</td>
						<td>
						@foreach($category as $parentName)
						@if($parentName->category_id == $categoryData->category_parent)
						{{$parentName->category_description}}
						@else
						@endif
						@endforeach
						</td>
						<td>
							<a class="update" title="modificar"><i class="fa fa-pencil" aria-hidden="true"></i></a>
							@if (Auth::user()->user_type != 1)
							<a class="delete" title="eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
							@endif

						</td>
					</tr>
					@empty
					<tr >
					<td ></td>
					<td class="table__msj"> ! No hay categorías registradas...</td>
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

	$('.update').on('click', function(event) {
		event.preventDefault();
		var datos = $(this).closest('.data__info').data();
		cargarFormulario(datos);
		$('.page__update').slideToggle();
	});

	function cargarFormulario(datos){
		$('.action__form')[0].reset();
		$(".action__form input[name=categoryId]").val(datos['id']);
		$(".action__form input[name=categoryDescription]").val(datos['descripcion']);
		$('.action__form #categoryParent').val(datos['padre']);
		$('.action__form #categoryState').val(datos['estado']);
	}

	$('input.cancel__btn').click(function(event) {
		$(this).closest('.page__delete , .page__update , .page__resource').slideToggle();
		$('#form__insert')[0].reset();
		$('#action__form')[0].reset();
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