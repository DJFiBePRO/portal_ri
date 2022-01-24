@extends('layouts.template')

@section('title') Proyectos @stop

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
		<article class="mision" id="">
			<div class="title">
				<h3>Proyectos Culturales {{$management->management_area_name}}</h3>
			</div>
			<div class="article-content">
				@forelse($projects as $projectsData)
				<div class="title">
					<div class="content">
						<h2> {{$projectsData->news_title}} </h2>
						<img src="{{ asset('img/noticias/'.$projectsData->multimedia_name) }}" alt="">
						<p>{!! str_limit($projectsData->news_content, $limit = 250, $end = ' ...') !!}</p>
						<span>
							<a href="{{ url('/noticia/'.$projectsData->news_id) }}">... Leer más</a>

						</span>
					</div>
				</div>
				@empty
				<div class="title">
					No hay proyectos
				</div>

				@endforelse
			</div>
			{{$projects->links()}}

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