@extends('layouts.template')

@section('title') Relaciones Internacionales @stop

@section('estilos')
	@parent
	<link rel="stylesheet" href="css/app.css">
@stop

@section('body')
	<body class="page">
		@parent
		@section('menu')
			@parent
		@stop
		@section('main')
			<main>
				<article class="ed-container full" id="funciones">
					<div class="banner">
						<img src="{{ asset('/img/banner/responsabilidades.png') }}" alt="">
					</div>
					<div class="ed-item cross-center web-100">
						{!!$management->management_area_functions!!}
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


				// $('body').on({
				// 	'mousewheel': function(e) {
				// 		if (e.target.id == 'el') return;
				// 			e.preventDefault();
				// 			e.stopPropagation();
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
