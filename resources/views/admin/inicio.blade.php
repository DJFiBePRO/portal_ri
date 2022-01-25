@extends('layouts.admin')

@section('title') Inicio @stop

@section('styles')
@parent
<link rel="stylesheet" href="{{ asset ('css/admin.css')}}">
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
				<h1>{{trans('administration.forms.vice')}}</h1>
			</div>
			<div class="insert__form">
				<form method="POST" action="{{route('inicio')}}" class="action__form" id="form__insert" enctype= multipart/form-data>
					<input type="hidden" name="_token" value="{{csrf_token()}}">

					<div class="form__container">
						<div class="container__label">
							<label for="">{{trans('administration.forms.name')}}: </label>
						</div>
						<div class="container__item">
							<input type="text" name="managementAreaName" value="{{$management->management_area_name}}" >
						</div>					
					</div>

					<div class="form__container">
						<div class="container__label">
							<label for="">{{trans('administration.forms.logo')}}: </label>
						</div>
						<div class="container__item">
							<img src="{{asset('img/logos/'.$management->management_area_logo)}}" alt="">
							<input type="file" name="managementAreaLogo" >
						</div>					
					</div>

					<div class="form__container">
						<div class="container__label">
							<label for="">{{trans('administration.headers.image')}}: </label>
						</div>
						<div class="container__item">
							<img src="{{asset('img/vinculacion/'.$management->management_area_image)}}" alt="">
							<input type="file" name="managementAreaImage">
						</div>
					</div>

					<div class="form__container">
						<div class="container__label">
							<label for="">{{trans('administration.forms.creation-date')}}:</label>
						</div>
						<div class="container__item">
							<input type="text" name="managementAreaCreate" class="fecha" value="{{$management->management_area_create->format('Y-m-d')}}" >
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
							<input type="submit" value="{{trans('administration.forms.save')}}">
						</div>
						<div class="button__cancel">
							<input type="button" class="cancel__btn" id="cancel__btn" value="{{trans('administration.forms.cancel')}}">
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

	$('.cancel__btn').click(function(event) {
		$('#form__insert')[0].reset();
	});

	$('input.fecha').datepicker({ dateFormat: 'yy-mm-dd' });
	$('#mensaje').fadeOut(5000);

</script>


@stop