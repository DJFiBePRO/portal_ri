@extends('layouts.template')

@section('title') Relaciones Internacionales @stop

@section('estilos')
@parent
<link rel="stylesheet" href="css/app.css">
@stop

@section('body')

<body class="">
	@parent
	@section('menu')
	@parent
	@stop
	@section('main')
	<main>
		<article class="ed-container full" id="0">
			<div class="banner">
				<img src="{{ asset('/img/banner/responsabilidades.png') }}" alt="" width="100%">
			</div>
			<div class="ed-item main-center cross-center">
				<h1>{{trans('administration.forms.about') }} </h1>
			</div>
			<div class="ed-item main-end">
				<p>Fecha de Creación de la dependencia: 30 de enero del 2001</p>
			</div>
			<div class="ed-item cross-start web-50">
				<img src="{{ asset('img/vinculacion/IMAGEN-INFORMACION.png') }}" alt="" width="40%">
				<p>{!!$management->management_area_description!!}</p>
			</div>
			<div class="ed-item cross-start web-50">
				<p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </p>
			</div>
		</article>
	</main>
	@stop
	@section('footer')
	@parent
	@stop
	@section('scripts')
	@parent
	<script type="text/javascript">
		$('nav').addClass('sticky');

				$('a[href^="#"]').on('click', function(event) {
				    var target = $(this.getAttribute('href'));
				    if( target.length ) {
				        event.preventDefault();
				        $('html, body').stop().animate({
				            scrollTop: target.offset().top
				        }, 1000);
				    }
				});

	</script>
	@stop
</body>
@stop