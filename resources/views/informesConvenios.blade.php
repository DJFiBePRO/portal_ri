@extends('layouts.template')

@section('title') Inicio @stop

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
		<article class="ed-container full" id="informes">
			<div class="ed-item main-start cross-center">
				<h1>Listado de Convenios</h1>
			</div>
			<div class="ed-item ed-container full main-center">
			@forelse($conventios as $conventionsData)
				<div class="ed-item web-20 informe main-center ed-container">
						<div class="ed-item cross-center main-center no-padding">
							<h4><a href="{{asset('docs/conventions/'.$conventionsData->conventions_file)}}" target="blank"><i class="fa fa-download" aria-hidden="true"></i>{{$conventionsData->conventions_name}}</a></h4>
						</div>
						<!-- <div class="ed-item cross-center main-end">
							{{$conventionsData->conventions_create->format('Y-m-d')}}
						</div> -->
						<!-- <div class="ed-item cross-center main-start">
							<i class="fa fa-download" aria-hidden="true"></i>
							<a href="{{asset('docs/conventions/'.$conventionsData->conventions_file)}}" target="blank">{{$conventionsData->conventions_name}}</a>
						</div> -->
				</div>
			@empty
			<div class="ed-item web-20 informe">
				<p>No hay Convenios...</p>
			</div>
			@endforelse
		</div>

			<div class="ed-item main-center" id="paginacion">
				{{$conventios->links()}}

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
