@extends('layouts.template')

@section('title') Vinculación @stop

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
	<main >
		<article class="ed-container full" id="noticia">

			<div class="ed-item main-center cross-center">
				<h1>{{$name->cultural_management_name}}</h1>
			</div>

			<div class="ed-item">

				@forelse($cultural as $culturalData)
				<div class="ed-container noticia">
					<div class="ed-item cross-center web-25">
						<img src="{{asset('img/culturalManagementTypes/'.$culturalData->multimedia_name)}}">
					</div>
					<div class="ed-item cross-center web-75 contenido">
						<h2>{{$culturalData->cultural_management_types_name}}</h2>
						{!! $culturalData->cultural_management_types_description!!}
					</div>


				</div>
				@empty
				No existe información
				@endforelse

			</div>
			<div class="ed-item main-center" id="paginacion">
				{{$cultural->links()}}

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
