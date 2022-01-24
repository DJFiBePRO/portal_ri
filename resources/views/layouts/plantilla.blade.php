<!DOCTYPE html>
<html lang="es">
<head>
	<title>@yield('title') - RI</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="icon" href="{{ asset('img/iconos/drni.jpeg')}}">
	@section('estilos')
	<link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
	<link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
	@show
</head>
@section('body')
<!-- **************************************************** -->
@section('menu')
<nav class="ed-container full">
	<div class="ed-item base-1-3 hasta-web main-center cross-center">
		<a class="menu-act">
			<i class="fa fa-bars fa-2x"></i>
		</a>
	</div>
	<div class="ed-item main-center cross-center base-1-3 web-10">
		<a href="{{ url('/') }}">
			<img id="fsp-blanco" src="{{ asset('img/logos/'.$management->management_area_logo)}} " alt="">
		</a>
	</div>
	<div class="ed-item main-center cross-center base-75 tablet-1-3 web-80">
		<ul class="ed-menu web-horizontal default">
			<li class="hasta-web">
				<a href="{{ url('/') }}" class="menu-act">
					Inicio <i class="fa fa-home" aria-hidden="true"></i>
				</a>
			</li>
			
			<li>
				<a>Relaciones Internacionales</a>
				<ul>
					<li>
						<a href="{{ url('/quienes-somos') }}">Quiénes Somos?</a>
					</li>
					<li>
						<a href="{{ url('/mision') }}">Misión - Visión</a>
					</li>
					<li>
						<a href="{{ url('/objetivos') }}">Objetivos</a>
					</li>
					<li>
						<a href="{{ url('/funciones') }}">Responsabilidades</a>
					</li>
				</ul>
			</li>
			{{--<!--<li>
				<a style="line-height:1em" >Ejes Principales</a>
				<ul>
					<li>
						<a href="">Servicio a la Comunidad</a>
						<ul>
							<li><a href="{{ url('/facultad') }}">Proyectos</a></li>
							<li><a>Convenios</a>
								<ul>
									<li><a href="{{url('/informes/anuales')}}">Informes Anuales</a></li>
									<li><a href="{{url('/informes/convenios')}}">Listado de Convenios</a></li>
									--><!-- <li><a href="{{url('/reglamentos-formatos')}}">Reglamento y Formatos</a></li> -->
								<!--</ul>
							</li>-->
							<!-- <li><a href="http://cimogsys.espoch.edu.ec/DV_Proyectos_Convenios/public" target="_blank">Ingreso al Sistema</a></li> -->
						<!--</ul>
					</li>-->
					<!-- <li>
						<a href="">Seguimiento de Graduados</a>
						<ul>
							@foreach($category as $link)
							@if($link->category_parent == 1 )
							<li><a href="{{ $link->link_url }}" target="_blank">{{$link->link_name}}</a></li>
							@endif
							@endforeach
						</ul>
					</li> -->
					<!--<li>
						<a href="{{ url('/formacion-grupos') }}">Formación y Gestión Intercultural</a>
					</li>
					<li>
						<a target="_blank" href="https://goo.gl/jcLWCo">Encuesta</a>
					</li>
				</ul>
			</li>-->

			<!--<li>
				<a href="{{ url('/formacion-grupos') }}">Gestión Cultural </a>
			</li>--> --}}

			<li>
				<a href="{{url('/noticias')}}">Noticias</a>
			</li>
			<li>
				<a href="{{url('/convenio')}}">Convenios</a>
			</li>
			<li>
				<a>Eventos</a>
				<ul>
					<li>
						<a href="{{ url('/proyectos') }}">Evento Académico</a>
					</li>
					<li>
						<a href="{{ url('/proyectos') }}">Evento Cultural</a>
					</li>
					<li>
						<a href="{{ url('/proyectos') }}">Webinarios</a>
					</li>
				</ul>
			</li>
			

			<li>
				<a href="{{ url('/descargas') }}">Descargas</a>
			</li>

			<li>
				<a href="{{ url('/contactos') }}">Contactos</a>
			</li>
		</ul>
	</div>
	<div class="ed-item main-center cross-center base-1-3 web-10">
		<a id="acreditacion" href="#" title="Sistema de Gestión de Acreditación">
			<img src="{{ asset('img/logos/LOGO-GESTION.png') }}" alt="">
		</a>
	</div>
</nav>
<!-- **************************************************** -->
@show
@section('header')

@show
@section('main')

@show
@section('footer')
<footer>
	<div class="ed-container full" id="footer">
		<div class="ed-item main-center cross-center desde-web web-25">

		</div>
		<div class="ed-item main-center cross-center web-50">
			<p> {{$management->management_area_name}} - ESPOCH </p>
			<p> <a href="">Términos de Uso</a> | <a href="">Políticas de Privacidad</a> | <a href="">Acerca de</a> | <a href="{{asset('docs/creditos.pdf')}}" target="_blank">Créditos</a>| <a href="{{route('login')}}">Login</a> </p>
		</div>
		<div class="ed-item main-center cross-center no-padding web-25">
			<div class="ed-container full">
				<div class="ed-item main-center cross-center no-padding base-20 ">
					<a href="http://cimogsys.com" target="_blank"><img class="social-net" src="{{ asset('img/logos/cimogsys-verde1.svg') }}" alt=""> </a>
				</div>
				@forelse($social as $socialData)
				<div class="ed-item main-center cross-center no-padding base-20">
					<a href="{{$socialData->social_network_url}}" target="_blank"><img class="social-net" src="{{ asset('socialNetwork/'.$socialData->social_network_image)}}" alt=""> </a>
				</div>
				@empty
				@endforelse

				<!-- *************************** -->

				<!-- *************************** -->

			</div>
		</div>

	</div>
</footer>
@show
@section('scripts')
<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
<script type="text/javascript">
	$('.menu-act').on('click', function() {
	            //$('.ed-menu').closest('.ed-item').slideToggle();
	            //$('#element').animate({width: 'toggle'});

	            $('.ed-menu').closest('.ed-item').animate({width: 'toggle'});
	        });
	$('ul.ed-menu li').on('click', function() {
		event.stopPropagation();
		$(this).children('ul').slideToggle();
	});
</script>
<script>
		  /*(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-77474853-5', 'auto');
		  ga('send', 'pageview');*/
		</script>
		@show
		@show
		</html>
