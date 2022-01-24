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
	<main>		
		@forelse($cultural as $culturalData)

		<article class="ed-container full" id="{{$culturalData->cultural_management_id}}">

			<div class="ed-item main-center">
				<a href="#{{$culturalData->cultural_management_id-1}}" class="ancla2"> <i class="fa fa-angle-up"></i></a>
			</div>
			<div class="ed-item web-10"></div>

			<div class="ed-item cross-center web-30">

				<div class="ed-item main-center cross-center web-100 tituloimg">
					<h3 class="tituloimg2" style="text-align: center;">	{{$culturalData->cultural_management_name}}		</h3>
				</div>
				<div class="ed-item main-center cross-center imgesc">
					<a href="{{ url('/formacion/'.$culturalData->cultural_management_id) }}">

						<img  src="{{asset('img/culturalManagements/'.$culturalData->cultural_management_image)}}" >
					</a>
				</div>
			</div>
			<div class="ed-item web-10"></div>
			<div class="ed-item cross-center web-50">
				<a href="{{ url('/formacion/'.$culturalData->cultural_management_id) }}">

					<h3>{{$culturalData->cultural_management_name}}	</h3>
					<p> {!!$culturalData->cultural_management_description!!}</p>
				</a>
			</div>
			<div class="ed-item main-center">
				<a href="#{{$culturalData->cultural_management_id+1}}" class="ancla2"> <i class="fa fa-angle-down"></i></a>
			</div>
		</article>
		@empty
		@endforelse

	</main>
	@stop
	@section('footer')
	@parent
	@stop
	@section('scripts')
	@parent
	<script type="text/javascript">

		$('nav').addClass('sticky');

/*
		$('body').on({
			'mousewheel': function(e) {
				if (e.target.id == 'el') return;
				e.preventDefault();
				e.stopPropagation();
			}
		})
		*/

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
