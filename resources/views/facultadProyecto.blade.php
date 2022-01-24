@extends('layouts.template')

@section('title') Proyecto @stop

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
		<article class="ed-container full" id="noticia-facultad">
			<div class="ed-item">
				<h3>Proyecto</h3>
			</div>
			<div class="ed-item padding-2">
				<h4>{{$news->faculty_news_name}} </h4>
				<p>
					{!!$news->faculty_news_description!!}
				</p>
				<br>
				<h4 >Contenido Multimedia</h4>
				<br>
				<img src="{{asset('img/facultyNews/'.$news->faculty_news_image)}}" >

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
