@extends('layouts.admin')

@section('title') Funciones @stop

@section('styles')
@parent
<link rel="stylesheet" href="{{ asset ('css/admin.css')}}">
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
@stop
@section('main')
<main>
	<div class="page__main">
		<div class="main__link">
			<a href="{{route('mission')}}">{{trans('administration.forms.mision-vision') }}</a>
			<a href="{{route('objective')}}">{{trans('administration.forms.objectives') }}</a>
			<a href="{{route('functions')}}">{{trans('administration.forms.functions') }}</a>
			<a href="{{route('direction')}}">{{trans('administration.page-titles.contacts') }}</a>
		</div>

		<div class="main__insert">
			<div class="main__title">
				<h1>{{ trans('administration.headers.functions') }} {{ trans('administration.page-titles.vice') }}</h1>
			</div>
			<div class="insert__form">
				<form method="POST" action="{{route('functions')}}" class="action__form" id="form__insert"
					enctype=multipart/form-data>
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					@foreach (config('laravellocalization.supportedLocales') as $locale => $value)

					<h1>{{$value['native']}}</h1>
					<div class="form__container">
						<div class="container__label">
							<label for="">{{ trans('administration.headers.functions') }}: </label>
						</div>
						<div class="container__item">
							<textarea name="{{$locale}}[managementAreaFunctions]" class="editor"
								id="managementAreaFunctions">{{$management->management_area_functions}}</textarea>
						</div>
					</div>

					<div class="form__container">
						<div class="container__label">
							<label for="">{{trans('administration.forms.about') }}: </label>
						</div>
						<div class="container__item">
							<textarea name="{{$locale}}[managementAreaDescription]" class="editor"
								id="managementAreaDescription">{{$management->management_area_description}}</textarea>
						</div>
					</div>
					@if(Session::has('mensaje'))
					<div class="form__container">
						<div id="mensaje">
							{{Session::get('mensaje')}}
						</div>
					</div>
					@endIf
					@endforeach
					<div class="form__button">
						<div class="button__save">
							<input type="submit" value="{{trans('administration.forms.save') }}">
						</div>
						<div class="button__cancel">
							<input type="button" class="cancel__btn" id="cancel__btn"
								value="{{trans('administration.forms.cancel') }}">
						</div>
					</div>
				</form>
			</div>
		</div>

	</div>
	</div>
</main>
@stop

@section('scripts')
@parent

<script type="text/javascript">
	//$('input.fecha').datepicker({ dateFormat: 'yy-mm-dd' });

	$('.cancel__btn').click(function(event) {
		location.reload();
	});

	var allEditors = document.querySelectorAll('.editor');
        for (var i = 0; i < allEditors.length; ++i) {
          CKEDITOR.replace(allEditors[i]);
		  CKEDITOR.config.forcePasteAsPlainText = true;
        }
	$('#mensaje').fadeOut(5000);


</script>

@stop