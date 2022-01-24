@extends('layouts.admin')

@section('title') Noticias @stop

@section('styles')
@parent
<link rel="stylesheet" href="{{ asset ('css/admin.css')}}">
@stop
@section('main')

<section>
	<div class="page__update">
		<form method="POST" action="{{route('updateFacultyNews')}}" class="action__form" enctype= multipart/form-data>
			<div class="form__title">
				<h1>Modificar Proyecto</h1>
			</div>

			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<input type="hidden" name="facultyNewsId" value="">

			<div class="form__container">
				<div class="container__label">
					<label for="">Nombre: </label>
				</div>
				<div class="container__item">
					<input type="text" name="facultyNewsName" >
				</div>
			</div>

			<div class="form__container">
				<div class="container__label">
					<label for="">Descripción: </label>
				</div>
				<div class="container__item">
					<textarea name="facultyNewsDescription" id="newsDescription"></textarea>
				</div>
			</div>

			@if (Auth::user()->user_type == 1)
			<div class="form__container">
				<div class="container__label">
					<label for="">Estado:</label>
				</div>
				<div class="container__item">
					<select id="facultyNewsState" name="facultyNewsState" class="item__select" >
						<option value=""></option>
						<option value="0">No Publicada</option>
						<option value="1">Publicada</option>
					</select>
				</div>
			</div>
			@endif
			<div class="form__container">
				<div class="container__label">
					<label for="">Facultad:</label>
				</div>
				<div class="container__item">
					<select  name="facultyNewsFaculty" id="facultyNewsFaculty" >
						<option value="" >

						</option>
						@forelse($types as $facultyData)
						@if($facultyData->faculty_state == 1)
						<option value="{{$facultyData->faculty_id}}">
							{{$facultyData->faculty_name}}
						</option>
						@endif
						@empty
						<option value="">No existen facultades</option>
						@endforelse
					</select>
				</div>
			</div>
			<div class="form__container">
				<div class="container__label">
					<label for="">Imagen: </label>
				</div>
				<div class="container__item">
					<input type="file" name="facultyNewsImage">
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
		<form method="POST" action="{{route('deleteFacultyNews')}}" class="action__form" enctype= multipart/form-data >
			<div class="form__title">
				<h1>Eliminar Proyecto</h1>
			</div>
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<input type="hidden" name="facultyNewsId" >

			<div class="form__container">
				<div class="container__label">
					<label for="">Nombre: </label>
				</div>
				<div class="container__item">
					<input type="text" name="facultyNewsName"  disabled>
				</div>
			</div>

			<div class="form__container">
				<div class="container__label">
					<label for="">Descripción: </label>
				</div>
				<div class="container__item">
					<textarea name="facultyNewsDescription" id="description"></textarea>
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
			<h1>Proyectos de Facultades </h1>
		</div>

		<div class="main__insert">
			<div class="main__function">
				<h2>Agregar Proyecto</h2>
			</div>
			<div class="insert__form">
				<form method="POST" action="{{route('facultyNews')}}" class="action__form" id="form__insert" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{csrf_token()}}">

					<div class="form__container">
						<div class="container__label">
							<label for="">Nombre: </label>
						</div>
						<div class="container__item">
							<input type="text" name="facultyNewsName" >
						</div>
					</div>

					<div class="form__container">
						<div class="container__label">
							<label for="">Descripción: </label>
						</div>
						<div class="container__item">
							<textarea name="facultyNewsDescription" id="facultyNewsDescription"></textarea>
						</div>
					</div>
					<div class="form__container">
						<div class="container__label">
							<label for="">Facultad:</label>
						</div>
						<div class="container__item">
							<select  name="facultyNewsFaculty" >
								<option value="" >

								</option>
								@forelse($types as $facultyData)
								@if($facultyData->faculty_state == 1)
								<option value="{{$facultyData->faculty_id}}">
									{{$facultyData->faculty_name}}
								</option>
								@endif
								@empty
								<option value="">No existen facultades</option>
								@endforelse
							</select>
						</div>
					</div>
					<div class="form__container">
						<div class="container__label">
							<label for="">Imagen: </label>
						</div>
						<div class="container__item">
							<input type="file" name="facultyNewsImage">
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
			<h2>Proyectos Existentes</h2>
			<table  class="content__table" id="facultyNews">
				<thead class="table__head">
					<tr>
						<th>Nombre</th>
						<th>Facultad</th>
						<th>Descripción</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@forelse($news as $facultyNewsData )
					<tr class="data__info"
					data-id="{{$facultyNewsData->faculty_news_id}}"
					data-titulo="{{$facultyNewsData->faculty_news_name}}"
					data-contenido="{{$facultyNewsData->faculty_news_description}}"
					data-estado="{{$facultyNewsData->faculty_news_state}}"
					data-facultad="{{$facultyNewsData->faculty_news_faculty}}">
					<td>{{$facultyNewsData->faculty_news_name}}</td>
					<td>
						@foreach($types as $facultyName)
						@if($facultyName->faculty_id == $facultyNewsData->faculty_news_faculty)
						{{$facultyName->faculty_name}}
						@endif
						@endforeach
					</td>
					<td>{!!$facultyNewsData->faculty_news_description!!}</td>
					<td>
						<a href="{{ route('facultyData',[$facultyNewsData->faculty_news_id]) }}" title="visualizar" href=""><i class="fa fa-search" aria-hidden="true"></i></a>

						<a class="update" title="modificar"><i class="fa fa-pencil" aria-hidden="true"></i></a>
						@if (Auth::user()->user_type != 1)
						<a class="delete" title="eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						@endif

					</td>
				</tr>
				@empty
				<tr >
					<td colspan="4" class="table__msj"> ! No hay noticas de facultades registradas...</td>
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
		$(".action__form input[name=facultyNewsId]").val(datos['id']);
		$(".action__form input[name=facultyNewsName]").val(datos['titulo']);
		CKEDITOR.instances.newsDescription.setData(datos['contenido']);
		CKEDITOR.instances.description.setData(datos['contenido']);
		$('.action__form #facultyNewsState').val(datos['estado']);
		$('.action__form #facultyNewsFaculty').val(datos['facultad']);
	}

	$('input.cancel__btn').click(function(event) {
		$(this).closest('.page__delete , .page__update ').slideToggle();
		$('.action__form')[0].reset();

	});

	$('#cancel__btn').click(function(event){
		location.reload();
	});


	CKEDITOR.replace( 'facultyNewsDescription' );
	CKEDITOR.replace( 'newsDescription' );
	CKEDITOR.replace( 'description' );
	CKEDITOR.config.forcePasteAsPlainText = true;

	$('#mensaje').fadeOut(5000);

	$(document).ready(function() {
		$('#facultyNews').DataTable({
			"ordering": false,
			"info":     false,
			"paging":   false
		});
	} );

</script>
@stop
