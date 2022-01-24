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
	<main class="page-main">

		<div class="banner">
			<img src="{{ asset('/img/banner/mision.png') }}" alt="">
		</div>

		<article id="" class="mision">
			<div class="article-content">
				<div class="title">
					<div> {{trans('administration.forms.mission')}} </div>
				</div>
				<div class="article-content-description">
					<p>{!!$management->management_area_mission !!} </p>
				</div>
				<div class="title">
					<div> {{trans('administration.forms.vision')}} </div>
				</div>
				<div class="article-content-description">
					<p>{!!$management->management_area_vision !!} </p>
				</div>
			</div>
			<div class="article-img">
				<img src="{{ asset('/img/iso.png') }}" alt="va">
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