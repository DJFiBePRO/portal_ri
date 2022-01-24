<!DOCTYPE html>
<html lang="es">
<head>
	<title>@yield('title') - DV</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="icon" href="{{ asset('img/iconos/drni.jpeg') }}">
	@section('styles')
	<link rel="stylesheet" href="{{ asset ('css/login.css')}}">
	@show
</head>
@section('body')
<body>
	@section('header')
	<header>
		<div class="page__header"></div>
	</header>
	@show

	@section('main')	
	@show

	@section('footer')	
	<footer>
		<div class="page__footer">
			<div class="footer__title">{{$management->management_area_name}} - Espoch</div>
			<div class="footer__info" >
				<a href=""> Términos de Uso </a> |
				<a href=""> Políticas de Privacidad </a> |
				<a href=""> Acerca de </a> |
				<a href=""> Créditos </a>
			</div>
		</div>
	</footer>
	@show
	
</body>
@show
</html>