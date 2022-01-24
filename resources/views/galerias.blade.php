@extends('layouts.template')

@section('title') Galerías @stop

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
		<article class="ed-container full" id="galeria">
			<div class="ed-item main-center">
				<h3>Galería</h3>
			</div>
			<div class="ed-item">
				<div class="ed-container">
					@forelse($gallery as $galleryData)
					<div class="ed-item web-50 imagen">
						<div class="ed-container">
							<a href="{{ url('/galeria/'.$galleryData->gallery_id) }}"><i class="fa fa-plus fa-2x"></i></a>
							<div class="ed-item main-center cross-center">
								<span>{{$galleryData->gallery_name}}</span>
								<img src="{{ asset('img/galerias/'.$galleryData->multimedia_name) }}" alt="">
							</div>
						</div>
					</div>
					@empty
					No existen galerías
					@endforelse
				</div>

			</div>
			<div class="ed-item main-center" id="paginacion">
				{{$gallery->links()}}

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
