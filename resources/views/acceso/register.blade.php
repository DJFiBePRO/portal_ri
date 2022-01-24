<!DOCTYPE html>
<html lang="es">
<head>
	<title>Registro	 - CV</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="icon" href="{{ asset('img/iconos/logo-espoch.ico') }}">
	@section('styles')
	<link rel="stylesheet" href="{{ asset ('css/login.css')}}">
	@show
</head>
@section('body')
<body>
	@section('header')
	<header>
		<div class="page__header">
			<div class="header__img">
			<img src="{{asset('img/logos/LOGO-CIMOGSYS.png')}}" />			
				<img src="{{asset('img/logos/LOGO-GESTION.png')}}" />
			</div>
			
		</div>
	</header>
	@show

	@section('main')
	<main>
		<div class="page__register">
			<div class="register__title">
				<h2>Registro Portal Dependencia Vinculación</h2>
			</div>
			<form role="form" action="{{route('register')}}" method="POST" id="form--insert" class="register__form">
				{{ csrf_field() }}
				<div class="form__container">
					<div class="container__item">
						<div class="container__item">
							<label> Nombres:</label>
							<input type="text" name="userName" required>
							<label> Apellidos:</label>
							<input type="text" name="userLastName" required>
							<label> Correo:</label>
							<input type="email" name="userMail" required>
							<label> Contraseña:</label>
							<input type="password" name="userPassword" required>
						</div>	
					</div>
					<div class="form__button">
						<input type="submit" value="Guardar">
						<input type="button" name="" value="Cancelar" class="cancel--btn">
					</div>
				</div>
			</form>
		</div>

	</main>	
	@show	

	@section('scripts')
	<script type="text/javascript" src="{{ asset ('js/jquery.js')}}"></script>
	<script type="text/javascript" src="{{ asset ('js/jquery-ui.min.js')}}"></script>

	<script type="text/javascript">
		$('.header--act').on('click', function() {
			$('nav').toggleClass('mostrar');
		});
		$('input.cancel--btn').click(function(event) {
			$('#form--insert')[0].reset();
		});

	</script>

	@show

</body>
@show
</html>