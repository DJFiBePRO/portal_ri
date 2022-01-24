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
			<h1>Usuarios {{$management->management_area_name}}</h1>
		</div>

		<div class="main__insert">
			<div class="main__function">
				<h2>Agregar Usuario</h2>
			</div>
			<div class="insert__form">
				<form method="POST" action="{{route('insertUser')}}" class="action__form" id="form__insert">
					<input type="hidden" name="_token" value="{{csrf_token()}}">

					<div class="form__container">
						<div class="container__label">
							<label for="">Nombres: </label>
						</div>
						<div class="container__item">
							<input type="text" name="userName" >
						</div>					
					</div>

					<div class="form__container">
						<div class="container__label">
							<label for="">Apellidos: </label>
						</div>
						<div class="container__item">
							<input type="text" name="userLastName" >
						</div>					
					</div>
					
					<div class="form__container">
						<div class="container__label">
							<label for="">Teléfono: </label>
						</div>
						<div class="container__item">
							<input type="text" name="userPhone" >
						</div>					
					</div>
					<div class="form__container">
						<div class="container__label">
							<label for="">Correo: </label>
						</div>
						<div class="container__item">
							<input type="email" name="userMail" >
						</div>					
					</div>
					<div class="form__container">
						<div class="container__label">
							<label for="">Contraseña: </label>
						</div>
						<div class="container__item">
							<input type="password" name="userPassword" >
						</div>					
					</div>

					<div class="form__container">
						<div class="container__label">
							<label for="">Tipo:</label>
						</div>
						<div class="container__item">
							<select  name="userType" >
								<option value="" >

								</option>
								@forelse($types as $userType)
								<option value="{{$userType->user_type_id}}">
									{{$userType->user_type_description}}
								</option>
								@empty
								<option value="">No existen cargos</option>
								@endforelse
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
		location.href="user";
	});

	$('#mensaje').fadeOut(5000);


</script>
@stop