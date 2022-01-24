@extends('layouts.template')

@section('title') Ofertas Laborales @stop

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
		<article class="ed-container full" id="ofertas">
			<div class="ed-item main-end cross-center">
				<h3>Ofertas laborales</h3>
			</div>
			<div class="ed-item ed-container proyecto">
				@forelse($projects as $projectsData)
					<div class="ed-item ed-container cross-center contenido">
						<div class="ed-item(100,100,50) contenido_imagen">
							<img class="img_oferta" src="{{ asset('img/noticias/'.$projectsData->multimedia_name) }}" alt="imagen {{$projectsData->multimedia_name}}">
						</div>
						<div class="ed-item(100,100,50) contenido_informacion">
							<h2> {{$projectsData->news_title}} </h2>
							<a href="{{ url('/noticia/'.$projectsData->news_id) }}"><p>{!! str_limit($projectsData->news_content, $limit = 100, $end = ' ...') !!}</p>
								... Leer más</a>
						</div>
					</div>
				@empty
				No hay ofertas laborales
				@endforelse
			</div>
			<div id="paginacion" class="ed-item pagination">
				{{$projects->links()}}
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
