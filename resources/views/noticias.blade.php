@extends('layouts.template')

@section('title') Noticias @stop

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
		<div class="banner">
			<img src="{{ asset('/img/banner/noticias.png') }}" alt="">
		</div>
		<article id="" class="noticias">

			<div class="row">
				@if ($principal != null)
				<a href="{{ url('/noticia/'.$principal->news_id) }}">
					<div class="example-1 card">
						<div class="wrapper">
							<img class="logo" src="{{ asset('img/noticias/'.$principal->multimedia_name) }}"
								alt="ESPOCH">
							
							<div class="data">
								<div class="content">
									<div class="title-new"><a
											href="{{ url('/noticia/'.$principal->news_id) }}">{{$principal->news_title}}</a>
									</div>
									<p class="text">{{ str_limit(strip_tags($principal->news_content), $limit = 250, $end
										= ' ...') }}</p>
								</div>

							</div>
						</div>
					</div>
				</a>
				@endif
				@forelse ($news as $noticia)
				@if( $noticia->news_id != $principal->news_id )
				<a href="{{ url('/noticia/'.$noticia->news_id) }}">
					<div class="example-1 card">
						<div class="wrapper">
							@if ($noticia->multimedia_name != '')
							<img class="logo" src="{{ asset('img/noticias/'.$noticia->multimedia_name) }}" alt="">
							@else
							<img class="logo" src="{{ asset('img/fondos/not.jpg') }}" alt="">
							@endif

							<div class="data">
								<div class="content">
									<div class="title-new"><a href="#">{{$noticia->news_title}}</a></div>
									<p class="text">{{$noticia->news_title}}</p>
								</div>
							</div>
						</div>
					</div>
				</a>
				@endif
				@empty
				<div style="height: 380px;">
					<br>
					<br>
					<br>
					<br>
					{{trans ('administration.content.no-news')}}...
				</div>
				@endforelse
			</div>
			<div class="noticias_pagination">
				{{ $news->links() }}
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