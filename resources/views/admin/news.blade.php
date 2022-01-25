@extends('layouts.admin')

@section('title') Noticias @stop

@section('styles')
@parent
<link rel="stylesheet" href="{{ asset ('css/admin.css')}}">


@stop
@section('main')

<section>
	<div class="page__update">
		<form method="POST" action="{{route('updateNews')}}" class="action__form" id="form__update"
			enctype=multipart/form-data>
			<div class="form__title">
				@if (Auth::user()->user_type == 4)
				<h1>Modificar Oferta Laboral</h1>
				@else
				<h1>{{ trans('administration.content.news-edit') }}</h1>
				@endif
			</div>

			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<input type="hidden" name="newsId" value="">
			@if (Auth::user()->user_type == 1 || Auth::user()->user_type == 2 || Auth::user()->user_type == 3)

			<div class="form__container">
				<div class="container__label">
					<label for="">{{trans('administration.forms.state')}}:</label>
				</div>
				<div class="container__item">
					<select id="newsState" name="newsState" class="item__select">
						<option value=""></option>
						<option value="0">{{trans('administration.forms.state-1')}}</option>
						<option value="1">{{trans('administration.forms.state-2')}}</option>
					</select>
				</div>
			</div>
			<div class="form__container">
				<div class="container__label">
					<label for="">{{trans('administration.forms.event-date')}}: </label>
				</div>
				<div class="container__item">
					<input type="text" name="newsDate" class="fecha">
				</div>
			</div>
			@endif
			<div class="form__container">
				<div class="container__label">
					<label for="">{{trans('administration.forms.title')}}: </label>
				</div>
				<div class="container__item">
					<input type="text" name="newsTitle">
				</div>
			</div>

			<div class="form__container">
				<div class="container__label">
					<label for="">{{trans('administration.forms.alias')}}: </label>
				</div>
				<div class="container__item">
					<input type="text" name="newsAlias">
				</div>
			</div>

			<div class="form__container">
				<div class="container__label">
					<label for="">{{trans('administration.forms.description')}}: </label>
				</div>
				<div class="container__item">
					<textarea name="newsDescription" id="newsDescription"></textarea>
				</div>
			</div>


			<div class="form__button">
				<div class="button__save">
					<input type="submit" value="{{trans('administration.forms.save')}}">
				</div>
				<div class="button__cancel">
					<input type="button" class="cancel__btn" value="{{trans('administration.forms.cancel')}}">
				</div>
			</div>

		</form>
	</div>
</section>

<section>
	<div class="page__delete">
		<form method="POST" action="{{route('deleteNews')}}" class="action__form" enctype=multipart/form-data>
			<div class="form__title">
				<h1>{{ trans('administration.content.new-delete') }}</h1>
			</div>
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<input type="hidden" name="newsId">

			<div class="form__container">
				<div class="container__label">
					<label for="">{{trans('administration.forms.title')}}: </label>
				</div>
				<div class="container__item">
					<input type="text" name="newsTitle" disabled>
				</div>
			</div>

			<div class="form__container">
				<div class="container__label">
					<label for="">{{trans('administration.forms.alias')}}: </label>
				</div>
				<div class="container__item">
					<input type="text" name="newsAlias" disabled>
				</div>
			</div>

			<div class="form__button">
				<div class="button__save">
					<input type="submit" value="{{trans('administration.forms.delete')}}">
				</div>
				<div class="button__cancel">
					<input type="button" class="cancel__btn" value="{{trans('administration.forms.cancel')}}">
				</div>
			</div>
		</form>
	</div>
</section>

<section>
	<div class="page__resource">
		<form method="POST" action="{{route('addResourcesNews')}}" id="form__resource" class="action__form"
			enctype=multipart/form-data>
			<div class="form__title">
				<h1></h1>
			</div>

			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<input type="hidden" name="newsId">

			<div class="form__container" id="contenidoRecurso">
				<div class="container__label">
					<label for="">{{ trans('administration.content.select') }}:</label>
				</div>
				<div class="container__item">
					<select id="multimediaType" class="item__select" name="multimediaType">
						<option value="" selected></option>
						@forelse ($multimedia as $multimedias)
						<option value="{{$multimedias->multimedia_type_description}}">
							{{$multimedias->multimedia_type_description}}</option>
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
		<div class="main__title">
			@if (Auth::user()->user_type == 4)
			<h1>Ofertas laborales {{Auth::user()->user_name." ".Auth::user()->user_last_name}}</h1>
			@else
			<h1>{{ trans('administration.titles.news') }} {{ trans('administration.page-titles.vice') }}</h1>
			@endIf
		</div>

		<div class="main__insert">
			<div class="main__function">
				@if (Auth::user()->user_type == 4)
				<h2>Agregar Oferta Laboral</h2>
				@else
				<h2>{{trans('administration.titles.add-news')}}: </h2>
				@endIf
			</div>
			<div class="insert__form">
				<form method="POST" action="{{route('news')}}" class="action__form" id="form__insert">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div class="form__container">
						<div class="container__label">
							<label for="">{{trans('administration.forms.type')}}:</label>
						</div>
						<div class="container__item">
							<select name="newsType">
								<option value="" disabled>
									Seleccione una opción
								</option>
								@forelse($types as $newsType)
								<option value="{{$newsType->news_type_id}}">
									{{$newsType->news_type_description}}
								</option>
								@empty
								<option value="">{{trans('administration.messages.info')}}:</option>
								@endforelse
							</select>
						</div>
					</div>
					@foreach (config('laravellocalization.supportedLocales') as $locale => $value)

					<h1>{{$value['native']}}</h1>
					<div class="form__container">
						<div class="container__label">
							<label for="">{{trans('administration.forms.title')}}:</label>
						</div>
						<div class="container__item ">
							<input type="text" name="{{$locale}}[newsTitle]"
								placeholder="{{trans('administration.forms.input')}}">
						</div>
					</div>

					<div class="form__container">
						<div class="container__label">
							<label for="">{{trans('administration.forms.alias')}}: </label>
						</div>
						<div class="container__item">
							<input type="text" name="{{$locale}}[newsAlias]"
								placeholder="{{trans('administration.forms.input-2')}}">
						</div>
					</div>

					<div class="form__container">
						<div class="container__label">
							<label for="">{{trans('administration.forms.description')}}: </label>
						</div>
						<div class="container__item">
							<textarea name="{{$locale}}[newsDescription]" id="description-" class="editor"></textarea>
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

					@endforeach
					<div class="form__button">
						<div class="button__save">
							<input type="submit" value="{{trans('administration.forms.save')}}" id="a">
						</div>
						<div class="button__cancel">
							<input type="button" class="cancel__btn" id="cancel__btn"
								value="{{trans('administration.forms.cancel')}}" href="{{route('news')}}">
						</div>
					</div>
				</form>
			</div>
		</div>
		{{-- <div class="main__content">
			@if (Auth::user()->user_type == 4)
			<h2>Ofertas Laborales Existentes</h2>
			@else
			<h2>{{trans('administration.titles.existing-news')}}</h2>
			@endIf
			<table class="content__table" id="news">
				<thead class="table__head">
					<tr>
						<th>{{trans('administration.headers.title')}}</th>
						<th>{{trans('administration.headers.description')}}</th>
						<th>{{trans('administration.headers.actions')}}</th>
					</tr>
				</thead>
				<tbody>
					@forelse($news as $newsData )
					<tr class="data__info" data-id="{{$newsData->news_id}}"
						data-titulo="{{!!$newsData->news_translation_title!!}}"
						data-alias="{{$newsData->news_translation_alias}}"
						data-contenido="{!!$newsData->news_translation_content!!}"
						data-estado="{{$newsData->news_status_id }}">
						<td>{!! $newsData->news_translation_title !!}</td>
						<td>{!! $newsData->news_translation_content !!}</td>
						<td>
							<a href="{{ route('newsData',[$newsData->news_id]) }}" title="visualizar" href=""><i
									class="fa fa-search" aria-hidden="true"></i></a>
							<a class="resource" title="contenido"><i class="fa fa-upload" aria-hidden="true"></i></a>
							<a class="update" title="modificar"><i class="fa fa-pencil" aria-hidden="true"></i></a>
							@if (Auth::user()->user_type != 1)
							<a class="delete" title="eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
							@endif

						</td>
					</tr>
					@empty
					<tr>
						<td></td>
						<td class="table__msj">! No hay noticas agregadas...</td>
						<td></td>
					</tr>
					@endforelse

				</tbody>
			</table>
		</div> --}}
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
		$('#form__resource h1').append(datos['alias']);
		$(".action__form input[name=newsId]").val(datos['id']);
	});


	function cargarFormulario(datos){
		$('.action__form')[0].reset();
		$(".action__form input[name=newsId]").val(datos['id']);
		$(".action__form input[name=newsTitle]").val(datos['titulo']);
		$(".action__form input[name=newsAlias]").val(datos['alias']);
		$(".action__form input[name=newsDate]").val(datos['fecha']);
		CKEDITOR.instances.newsDescription.setData(datos['contenido']);
		$('.action__form #newsState').val(datos['estado']);
	}

	// $('input.cancel__btn').click(function(event) {
	// 	$(this).closest('.page__delete , .page__update , .page__resource').slideToggle();
	// 	$('#form__resource h1').empty();
	// 	$('.action__form #archivos').remove();
	// 	$('.action__form #fotografias').remove();
	// 	$('.action__form #enlaces').remove();
	// 	$('#form__insert')[0].reset();
	// 	$('#form__resource')[0].reset();
	// });

	$('input.cancel__btn').click(function(event) {
		location.href="news";
	});

	// $('#cancel__btn').click(function(event){
	// 	location.reload();
	// });

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
					'<input type="file" name="foto[]" multiple>'+
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
	$('#mensaje').fadeOut(5000);

	$('input.fecha').datepicker({ dateFormat: 'yy-mm-dd' });

	
		// CKEDITOR.replace( 'description-');
		// CKEDITOR.replace( 'newsDescription' );
		


	$(document).ready(function() {
		$('#news').DataTable({
			"ordering": false,
			"info":     false,
			"paging":   false
		});

		// $('#description-').each(function () {
        // 	CKEDITOR.replace('description-');
		// 	CKEDITOR.add
    	// });
	});
	var allEditors = document.querySelectorAll('.editor');
        for (var i = 0; i < allEditors.length; ++i) {
          CKEDITOR.replace(allEditors[i]);
		  CKEDITOR.config.forcePasteAsPlainText = true;
        }
	

</script>

@stop