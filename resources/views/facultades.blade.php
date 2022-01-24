@extends('layouts.template')

@section('title') Proyectos @stop

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
				<article class="ed-container full" id="proyectos">
					<div class="ed-item main-center">
						<h3>PROYECTOS</h3>
					</div>
					@forelse($faculty as $facultyData)
					<div class="ed-item proyecto web-25">
						<div class="ed-container full">
							<div class="ed-item main-center cross-center">
								<a href="{{ url('/facultad/'.$facultyData->faculty_id) }}">
									<img src="{{ asset('img/faculty/'.$facultyData->faculty_image) }}" alt="">
								</a>
							</div>
							<div class="ed-item main-center cross-center">
								<a href="{{ url('/facultad/'.$facultyData->faculty_id) }}">{{$facultyData->faculty_name}}</a>
							</div>
						</div>
					</div>
					@empty
					<p>No hay proyectos...</p>
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

				// $('body').on({
				// 	'mousewheel': function(e) {
				// 		if (e.target.id == 'el') return;
				// 			e.preventDefault();
				// 			e.stopPropagation();
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
