@extends('layouts.admin')

@section('title') Usuarios @stop

@section('styles')
@parent
<link rel="stylesheet" href="{{ asset ('css/admin.css')}}">
@stop
@section('main')

<section >
	<div class="page__update">
		<form method="POST" action="{{route('updatePassword')}}" class="action__form" enctype= multipart/form-data id="formUpdate">
			<div class="form__title">
				<h1>Cambiar Contraseña</h1>
			</div>

			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<input type="hidden" name="userId" value="{{Auth::user()->user_id}}">
			
			<div class="form__container">
				<div class="container__label">
					<label for="">Contraseña actual: </label>
				</div>
				<div class="container__item">
					<input type="password" name="userPassword" required>
				</div>					
			</div>

			<div class="form__container">
				<div class="container__label">
					<label for="">Nueva Contraseña: </label>
				</div>
				<div class="container__item">
					<input type="password" name="userNewPassword" required>
				</div>					
			</div>

			<div class="form__button">
				<div class="button__save">						
					<input type="submit" value="Guardar">
				</div>
				<div class="button__cancel">
					<input type="button"  id="updateBtn" value="Cancelar">
				</div>
			</div>

		</form>
	</div>
</section>

<main>
	<div class="page__main">		
		<div class="main__insert">
			<div class="main__title">
				<h1>Usuarios {{$management->management_area_name}} </h1>
			</div>
			<div class="main__boton">
				@if (Auth::user()->user_type == 1)
				<a href="{{route('newUser')}}"><i class="fa fa-plus"></i>Nuevo</a>
				@endif
			</div>
		</div>
		@if (count($errors) > 0 )
		<div class="main__msj">
			<ul id="mensaje">
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		@if(Session::has('mensaje'))
		<div class="main__msj">
			<ul id="mensaje">
				{{Session::get('mensaje')}}
			</ul>
		</div>
		@endIf

		<div class="main__data">
			@forelse($user as $userData)
			<form method="POST" action="{{route('updateUser')}}" enctype= multipart/form-data>
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<input type="hidden" name="userId" value="{{$userData->user_id}}">
				<div class="data__container">
					<div class="data__img">
						<div class="img__image">
							@if($userData->user_photo !=null)
							<img src="{{asset('img/user/'.$userData->user_photo)}}">
							@else
							<img src="{{asset('img/user/IMAGEN-AUTORIDADES.png')}}">
							@endIf
						</div>
						<div class="img__item">
							<input type="file" name="userPhoto">
						</div>

					</div>
					<div class="data__name">
						<div class="data__item">
							<label>Nombres:</label>
							<input type="text" name="userName"  value="{{$userData->user_name}}" >
						</div>

						<div class="data__item">
							<label>Apellidos:</label>
							<input type="text" name="userLastName" value="{{$userData->user_last_name}}" >
						</div>
						<div class="data__item">
							<label>Nueva Contraseña:</label>
							@if (Auth::user()->user_id == $userData->user_id)
							<input type="button" name="userPassword" class="update" value="Cambiar Contraseña" >
							@else
							<input type="password" name="userNewPassword" >

							@endif
						</div>
					</div>
					<div class="data__name">
						@if (Auth::user()->user_type == 1)
						<div class="data__item">
							<label>Tipo:</label>
							<select name="userType" required >
								@forelse($types as $userType)
								@if($userData->user_type != $userType->user_type_id)
								<option  value="{{$userType->user_type_id}}">{{$userType->user_type_description}}</option>
								@else
								<option  selected value="{{$userType->user_type_id}}">{{$userType->user_type_description}}</option>
								@endIf

								@empty
								<option>No existen tipos </option>
								@endforelse
							</select>
						</div>
						@else
						<input type="hidden" name="userType" value="{{Auth::user()->user_type}}">
						@endif
						<div class="data__item">
							<label>Correo:</label>
							<input type="text" name="userMail" value="{{$userData->user_mail}}" >
						</div>
						<div class="data__item">
							<label>Teléfono:</label>
							<input type="text" name="userPhone" value="{{$userData->user_phone}}">
						</div>


					</div>

					<div class="data__button">
						<div>
							<input type="submit" name="btnGuardar" value="Modificar">
						</div>
						<div>
							<input type="button"  name="btnCancelar" class="cancel__btn" value="Cancelar">
						</div>
					</div>
				</div>
			</form>
			@empty
			<div class="data__msj">! No hay usuarios registrados... </div>
			@endforelse
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

	$('#updateBtn').click(function(event) {
		$(this).closest('.page__update').slideToggle();
		$('#formUpdate')[0].reset();
	});

	$('.update').on('click', function(event) {
		event.preventDefault();
		var datos = $(this).closest('.data__info').data();
		$('.page__update').slideToggle();
	});
	$('#mensaje').fadeOut(5000);


</script>

@stop