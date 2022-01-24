@extends('layouts.admin')

@section('title') Directivos @stop

@section('styles')
@parent
<link rel="stylesheet" href="{{ asset ('css/admin.css')}}">
@stop
@section('main')

<main>
	<div class="page__main">
		<div class="main__title">
			<h1>Directivos {{$management->management_area_name}}</h1>
		</div>

		<div class="main__insert">
			<div class="main__function">
				<h2>Agregar Directivo</h2>
			</div>
			<div class="insert__form">
				<form method="POST" action="{{route('insertAuthority')}}" class="action__form" id="form__insert">
					<input type="hidden" name="_token" value="{{csrf_token()}}">

					<div class="form__container">
						<div class="container__label">
							<label for="">Nombres: </label>
						</div>
						<div class="container__item">
							<input type="text" name="authorityName" >
						</div>					
					</div>

					<div class="form__container">
						<div class="container__label">
							<label for="">Apellidos: </label>
						</div>
						<div class="container__item">
							<input type="text" name="authorityLastName" >
						</div>					
					</div>

					<div class="form__container">
						<div class="container__label">
							<label for="">Cargo:</label>
						</div>
						<div class="container__item">
							<select  name="authorityType" >
								<option value="" >

								</option>
								@forelse($types as $authorityType)
								<option value="{{$authorityType->authority_type_id}}">
									{{$authorityType->authority_type_description}}
								</option>
								@empty
								<option value="">No existen cargos</option>
								@endforelse
							</select>
						</div>
					</div>
					<div class="form__container">
						<div class="container__label">
							<label for="">Departamento:</label>
						</div>
						<div class="container__item">
							<select  name="authorityArea" disabled>
								<option value="{{$management->management_area_name	}}" >
								{{$management->management_area_name	}}
								</option>
							</select>
						</div>
					</div>
				
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

	</div>
</main>
@stop

@section('scripts')
@parent

<script type="text/javascript">

	$('input.cancel__btn').click(function(event) {
		location.href="authority";
	});

	$('#mensaje').fadeOut(5000);


</script>
@stop