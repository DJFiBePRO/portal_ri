@extends('layouts.template')

@section('title') Noticias @stop

@section('estilos')
@parent

@stop

@section('body')

<body class="page">
	@parent
	@section('menu')
	@parent
	@stop
	@section('main')
	<main class="page-main">
		<article id="" class="noticia">
			<div class="title">
				<h1>{{$news->news_title}}</h1>
			</div>

			<div class="options">
				@forelse ($multimedia as $contenido)



				@if ($contenido->multimedia_type == 1)
				<a href="{{ asset('img/noticias/'.$contenido->multimedia_name) }}"><img class="image"
						src="{{ asset('img/noticias/'.$contenido->multimedia_name) }}" alt=""></a>
				@endif
				@if ($contenido->multimedia_type == 2)

				<a class="link" href="{{ asset('docs/noticias/'.$contenido->multimedia_name) }}"> Documento: {{
					$contenido->multimedia_name }} </a>

				@endif
				@if ($contenido->multimedia_type == 3)

				{{--<a class="link" href="{{ $contenido->url_m }}" target="blank"> Enlace: {{ $contenido->url_m }} </a>--}}

				@endif
				@empty
				{{trans('administration.content.no-image')}}
				@endforelse
			</div>
			<div class="content">
				<p>
					{!!$news->news_content!!}
				</p>
			</div>

		</article>
	</main>
	@stop
	@section('footer')
	@parent
	@stop
	@section('scripts')
	@parent
	<script>
		$('nav').addClass('sticky');
	</script>
	@stop
</body>
@stop