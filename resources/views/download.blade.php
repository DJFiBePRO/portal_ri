@extends('layouts.template')

@section('title') Descargas @stop

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
		<article class="ed-container full" id="descargas">
			<div class="banner">
				<img src="{{ asset('/img/banner/descargas.png') }}" alt="">
			</div>
			@forelse($downloads as $downloadData)
			<div class="ed-item web-50 descarga">
				<div class="ed-container">
					<div class="ed-item cross-center main-center no-padding">
						<h4> &nbsp;</h4>
					</div>
					<div class="ed-item cross-center main-end">
						{{$downloadData->download_create->format('Y-m-d')}}
					</div>
					<div class="ed-item cross-center main-start">
						<i class="fa fa-download fa-2x" aria-hidden="true"></i>
						<a style="text-transform: uppercase;" href="{{asset('download/'.$downloadData->download_file)}}"
							target="blank">{{$downloadData->download_name}}</a>

					</div>
				</div>
			</div>
			@empty
			No existen descargas a visualizar
			
			@endforelse
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


		/*$('body').on({
			'mousewheel': function(e) {
				if (e.target.id == 'el') return;
				e.preventDefault();
				e.stopPropagation();
			}
		})
		*/

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