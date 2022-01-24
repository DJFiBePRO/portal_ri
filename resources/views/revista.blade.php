@extends('layouts.template')

@section('title') Revista @stop

@section('estilos')
@parent
<link rel="stylesheet" href="css/inicio.css">
@stop
@section('body')
<body class="">
	@parent
	@section('menu')
	@parent
	@stop
	@section('main')
	<main>
		<article class="ed-container main-center full" id="revistas">
			<div class="ed-item main-center" style="margin-top:2em;">
				<h3>Revista Integra: {{$magazine->magazine_name}}</h3>
			</div>
			<div class="ed-item web-100 ed-container main-center">
				<div class="ed-item movil-100 main-center" id="">
					<object width="1200" height="807" data="{{asset('magazines/flash/'.$magazine->magazine_flash)}}"></object>
				</div>
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
