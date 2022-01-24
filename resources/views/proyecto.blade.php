@extends('layouts.template')

@section('title') Eventos @stop

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
			<div class="banner">
				<img src="{{ asset('/img/banner/eventos.png') }}" alt="">
		  </div>
			@forelse($projects as $projectsData)
			<div class="ed-item cross-center web-50">
				<img src="{{ asset('img/noticias/'.$projectsData->multimedia_name) }}" alt="" width="25%">
			</div>
			<div class="ed-item cross-center web-50">
				<h4>{{$projectsData->news_title}} {{$projectsData->news_alias}} </h4>
				<p>
					{!! str_limit($projectsData->news_content, $limit = 250, $end = ' ...') !!}
				</p>
				<span>
					<a href="{{ url('/noticia/'.$projectsData->news_id) }}">... Leer más</a>

				</span>
			</div>
			@empty
			No hay proyectos
			@endforelse
			<div class="ed-item main-center" id="paginacion">
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
