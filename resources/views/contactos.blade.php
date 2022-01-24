@extends('layouts.template')

@section('title') Contactos @stop

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

		<section class="ed-container full" id="contactos">
			<div class="banner">
				<img src="{{ asset('/img/banner/1.jpg') }}" alt="">
			</div>
			<div class="ed-item main-center">
				<h3>Contactos</h3>
			</div>
			<div class="ed-item cross-center web-60">
				<!-- <img src="{{$management->management_area_map}}"> -->
				<iframe
					src="https

			://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.148063993969!2d-78.67853098524562!3d-1.6579360987910208!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d307c252930ed9%3A0x6ad1a526f47e5b0c!2sEscuela+Superior+Polit%C3%A9cnica+de+Chimborazo!5e0!3m2!1ses!2sec!4v1527190814282"
					width="500" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
			<div class="article-content">
				<p><span class="fa fa-envelope fa-3x"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </p>
				<p><span class="fa fa-phone-square fa-3x"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </p>
				<p><span class="fa fa-map-marker fa-3x"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Panamericana Sur Km 1 1/2
				</p>

			</div>
		</section>
	</main>
	@stop
	@section('footer')
	@parent
	@stop
	@section('scripts')
	@parent
	<script type="text/javascript">
		$('nav').addClass('sticky');


		// $('body').on({
		// 	'mousewheel': function(e) {
		// 		if (e.target.id == 'el') return;
		// 		e.preventDefault();
		// 		e.stopPropagation();
		// 	}
		// })

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