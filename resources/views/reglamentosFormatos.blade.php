@extends('layouts.template')

@section('title') Inicio @stop

@section('estilos')
@parent
<link rel="stylesheet" href="../css/inicio.css">
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
				<h1>Reglamentos y Formatos</h1>
			</div>
			@forelse($conventios as $conventionsData)
			<div class="ed-item web-25 informe">
				<div class="ed-container">
					<div class="ed-item cross-center main-center no-padding">
						<h4>{{$conventionsData->conventions_name}}</h4>
					</div>
					<div class="ed-item cross-center main-end">
						{{$conventionsData->conventions_create->format('Y-m-d')}}
					</div>
					<div class="ed-item cross-center main-start">
						<i class="fa fa-download" aria-hidden="true"></i>
						<a href="{{asset('docs/conventions/'.$conventionsData->conventions_file)}}" target="blank">{{$conventionsData->conventions_name}}</a>
					</div>
				</div>
			</div>
			@empty
			<div class="ed-item web-25 informe">
				<p>No hay Reglamentos y Formatos...</p>
			</div>
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
