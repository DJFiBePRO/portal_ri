@extends('layouts.template')

@section('title') Revistas @stop

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
			<div class="ed-item main-center">
				<h3>Revista</h3>
			</div>
			<div class="ed-item web-100 ed-container">
				@forelse($magazines as $magazine)
				<div class="ed-item movil-100 tablet-50 web-1-3 revista__item main-center">
					<a href="{{url('/revista/'.$magazine->magazine_id)}}"><img class="item__portada" src="{{asset('magazines/image/'.$magazine->magazine_image)}}" alt="Imagen revista"></a>
					<p class="revista_description"><a href="{{url('magazines/file/'.$magazine->magazine_file)}}" download>{{$magazine->magazine_name}} <img class="icon__pdf" src="{{asset('img/iconos/file-pdf-solid.svg')}}" alt=""></a>	</p>
				</div>
				@empty
				<p>No existen registros</p>
				@endforelse

				<!-- <div class="ed-item movil-100 tablet-50 web-1-3 revista__item main-center">
					<a href="{{url('/revista')}}"><img class="item__portada" src="{{asset('img/portadas/Portada Revista.PNG')}}" alt=""></a>
				</div>
				<div class="ed-item movil-100 tablet-50 web-1-3  revista__item main-center">
					<a href="{{url('/revista')}}"><img class="item__portada" src="{{asset('img/portadas/Portada Revista.PNG')}}" alt=""></a>
				</div>
				<div class="ed-item movil-100 tablet-50 web-1-3 revista__item main-center">
					<a href="{{url('/revista')}}"><img class="item__portada" src="{{asset('img/portadas/Portada Revista.PNG')}}" alt=""></a>
				</div>
				<div class="ed-item movil-100 tablet-50 web-1-3  revista__item main-center">
					<a href="{{url('/revista')}}"><img class="item__portada" src="{{asset('img/portadas/Portada Revista.PNG')}}" alt=""></a>
				</div> -->
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
