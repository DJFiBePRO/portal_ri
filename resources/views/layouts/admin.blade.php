<!DOCTYPE html>
<html lang="es">
<head>
	<title>@yield('title') - RI</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<link rel="icon" href="{{ asset('img/iconos/drni.jpeg') }}">
	@section('styles')
	<link rel="stylesheet" href="{{ asset ('css/font-awesome.css')}}">
	<link rel="stylesheet" href="{{ asset ('css/jquery-ui.min.css')}}">
	<link rel="stylesheet" href="{{ asset ('css/admin.css')}}">
	<link rel="stylesheet" href="{{ asset ('DataTables-1.10.13/media/css/jquery.dataTables.min.css')}}">
	<script src="{{asset('ckeditor/ckeditor.js')}}"></script>

	@show
</head>
@section('body')
<body class="inicio" id="noticias">
	@section('header')
	<header>
		<div class="page__header">
			<div class="header__title"><span class="header__span"> {{$management->management_area_name}}</span>
				<a class="header__act"> <i class="fa fa-bars fa-2x"></i> </a>
			</div>
			
			<div class="header__out">
				<a class="header__a" href="{{ route('logout') }}">Cerrar Sesión</a>
			</div>
		</div>
	</header>
	@show

	@section('menu')
	<nav>
		<div class="page__nav ">
			<div class="nav__logo">
				<a href="{{url('/acceso')}}">
					<img src="{{asset('img/logos/'.$management->management_area_logo)}}" alt="">
				</a>
				<span>
					Bienvenido
				</span>
			</div>
			<div class="nav__menu">
				<ul>
					@if (Auth::user()->user_type == 1)
					<li><a href="{{route('inicio')}}"><i class="fa fa-plus"></i> Relaciones Internacionales</a></li>
					<li><a href="{{route('authority')}}"><i class="fa fa-plus"></i> Directivos</a></li>
					<li><a href="{{route('user')}}"><i class="fa fa-plus"></i> Usuarios</a></li>
					<!--<li><a href="{{route('faculty')}}"><i class="fa fa-plus"></i> Ejes Principales</a></li>-->
					<!--<li><a href="{{route('culturalManagement')}}"><i class="fa fa-plus"></i> Gestión Cultural</a></li>-->
					<li><a href="{{route('news')}}"><i class="fa fa-plus"></i> Noticias</a></li>
					<!--<li><a href="{{route('gallery')}}"><i class="fa fa-plus"></i> Galerías</a></li>-->
					<!--<li><a href="{{route('category')}}"><i class="fa fa-plus"></i> Categorías</a></li>-->
					<!--<li><a href="{{route('link')}}"><i class="fa fa-plus"></i> Enlaces</a></li>-->
					<li><a href="{{route('download')}}"><i class="fa fa-plus"></i> Descargas</a></li>
					<!--<li><a href="{{route('magazines')}}"><i class="fa fa-plus"></i> Revistas</a></li>-->
					<li><a href="{{route('socialNetwork'	)}}"><i class="fa fa-plus"></i> Redes Sociales</a></li>
					<li><a href="{{route('parameterization')}}"><i class="fa fa-plus"></i> Parametrización</a></li>
					<li><a href="{{route('covenant.index')}}"><i class="fa fa-plus"></i> Convenios</a></li>
					@elseif (Auth::user()->user_type == 2)
					<li><a href="{{route('mission')}}"><i class="fa fa-plus"></i> Relaciones Internacionales</a></li>
					<li><a href="{{route('authority')}}"><i class="fa fa-plus"></i> Directivos</a></li>
					<!--<li><a href="{{route('faculty')}}"><i class="fa fa-plus"></i> Ejes Principales</a></li>-->
					<!--<li><a href="{{route('culturalManagement')}}"><i class="fa fa-plus"></i> Gestión Cultural</a></li>-->
					<li><a href="{{route('news')}}"><i class="fa fa-plus"></i> Noticias</a></li>
					<!--<li><a href="{{route('gallery')}}"><i class="fa fa-plus"></i> Galerías</a></li>-->
					<!--<li><a href="{{route('category')}}"><i class="fa fa-plus"></i> Categorías</a></li>-->
					<!--<li><a href="{{route('link')}}"><i class="fa fa-plus"></i> Enlaces</a></li>-->
					<li><a href="{{route('download')}}"><i class="fa fa-plus"></i> Descargas</a></li>
					<!--<li><a href="{{route('magazines')}}"><i class="fa fa-plus"></i> Revistas</a></li>-->
					<li><a href="{{route('socialNetwork')}}"><i class="fa fa-plus"></i> Redes Sociales</a></li>
					<li><a href="{{route('user')}}"><i class="fa fa-plus"></i> Usuario</a></li>
					@elseif(Auth::user()->user_type == 4)
					<!--<li><a href="{{route('news')}}"><i class="fa fa-plus"></i> Oferta Laboral</a></li>-->
					@else
					<li><a href="{{route('news')}}"><i class="fa fa-plus"></i> Noticias</a></li>
					<!--<li><a href="{{route('gallery')}}"><i class="fa fa-plus"></i> Galerías</a></li>-->
					<li><a href="{{route('user')}}"><i class="fa fa-plus"></i> Usuario</a></li>
					@endif
					
				</ul>
			</div>
		</div>
	</nav>
	@show

	@section('main')
	@show

	@section('scripts')
	<script type="text/javascript" src="{{ asset ('js/jquery.js')}}"></script>
	<script type="text/javascript" src="{{ asset ('js/jquery-ui.min.js')}}"></script>
	<script src="{{ asset ('DataTables-1.10.13/media/js/jquery.dataTables.min.js')}}"></script>

	<script type="text/javascript">
		$('.header__act').on('click', function() {
			$('nav').toggleClass('mostrar');
		});

	</script>

	@show
</body>
@show
</html>
