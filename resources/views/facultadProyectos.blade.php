@extends('layouts.template')

@section('title') Proyectos @stop

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
		<article class="ed-container full" id="noticias-facultad">
			<div class="ed-item main-end cross-center">
				@foreach($faculty as $facultyData)
				<h3>{{$facultyData->faculty_name}}</h3>
				@endforeach
			</div>
			<div class="ed-item">
				@forelse($news as $newsData)
				<div class="ed-container proyecto">
					<div class="ed-item cross-center web-15">
						<img src="{{ asset('img/facultyNews/'.$newsData->faculty_news_image) }}" alt="">
					</div>
					<div class="ed-item cross-center web-85 contenido">
						<h2> {{$newsData->faculty_news_name}} </h2>
						<p>{!! str_limit($newsData->faculty_news_description, $limit = 250, $end = ' ...') !!}</p>
						<span>
							<a href=" {{url('/facultad/proyecto/'.$newsData->faculty_news_id)}}">... Leer más</a>
						</span>
					</div>
				</div>
				@empty
				<p>No hay Proyectos...</p>
				@endforelse

			</div>
			<div class="ed-item main-center" id="paginacion">
				{{$news->links()}}

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


		$(function () {
			var $win = $(window);
			var $pos = 100;
			$win.scroll(function () {
				if ($win.scrollTop() <= $pos)
					$('nav').removeClass('sticky');
				else {

				}
			});
		});
	</script>
	@stop
</body>
@stop
