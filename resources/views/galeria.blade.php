@extends('layouts.template')

@section('title') Galería @stop

@section('estilos')
@parent
<link rel="stylesheet" href="css/app.css">
<link href="{{asset('css/lightslider.css') }}" rel="stylesheet" />

@stop

@section('body')
<body class="">
	@parent
	@section('menu')
	@parent
	@stop
	@section('main')
	<main>
		<article class="ed-container full" id="noticias-facultad" >
			<div class="ed-item main-center">
				<div class="demo">
						<div class="clearfix" style="max-width:800px;">
							<ul id="image-gallery" class="gallery list-unstyled cS-hidden">
								@foreach($multimedia as $multimediaData)
								<li data-thumb= "{{asset('img/galerias/'.$multimediaData->multimedia_name)}}" ><center><img width="80%" src="{{asset('img/galerias/'.$multimediaData->multimedia_name)}}" alt=""></center></li>
								@endforeach
							</ul>
					</div>
				</div>
			</div>
		</article>
		<div>
			<br>
			<br>
			<br>

		</div>

	</main>


	@stop
	@section('footer')
	@parent
	@stop
	@section('scripts')
	@parent
	<!-- jQuery library (served from Google) -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<!-- bxSlider Javascript file -->
	<script src="{{ asset('js/lightslider.js') }}"></script>

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
		$("#content-slider").lightSlider({
			loop:true,
			keyPress:true
		});
		$('#image-gallery').lightSlider({
			gallery:true,
			item:1,
			thumbItem:9,
			slideMargin: 0,
			speed:500,
			auto:true,
			loop:true,
			onSliderLoad: function() {
				$('#image-gallery').removeClass('cS-hidden');
			}
		});

	</script>
	@stop
</body>
@stop
