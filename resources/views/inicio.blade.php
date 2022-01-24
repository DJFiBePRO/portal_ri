@extends('layouts.template')

@section('title') Inicio @stop

@section('estilos')
@parent
<link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">

@stop

@section('body')

<body class="page">
	@parent
	@section('menu')
	@parent
	@stop
	@section('header')
	<header id="header" class="page-header">
		<section class="slider">
			<video playsinline="" autoplay="" muted="" loop="" class="mySlides" aria-label="Background Video">
				<source src="{{asset('/video/espoch.mp4')}}" type="video/mp4" class="mySlides2">
			</video>
		</section>

		<div class="title">
			<div class="logo__content">
				<a href="https://espoch.edu.ec" target="_blank"><img class="logo"
						src="{{asset('img/logos/espoch_v.png')}}" alt="ESPOCH"></a>
			</div>
		</div>
	</header>
	@stop
	@section('main')
	<main class="page-main">


		<section id="" class="autorithies">
			<div class="title">
				<h2> {{trans('administration.titles.work-team')}} </h2>
			</div>
			<div class="content">


				@foreach($authoritys as $key => $authoritysData)
				@if($authoritysData->authority_id == 1)
				<div class="box-main">
					@else
					<div class="box">
						@endif
						<div class="autorithy-img">
							<a href="">
								<span><i class="" aria-hidden="true"></i></span>
								@if($authoritysData->authority_photo != null)
								<img class="graphic"
									src="{{ asset('img/authority/'.$authoritysData->authority_photo) }}" alt="">
								@else
								<img class="graphic" src="{{asset('img/authority/IMAGEN-AUTORIDADES.png')}}">
								@endif
							</a>
						</div>
						<div class="autorithy-name">
							{{$authoritysData->authority_name}} {{$authoritysData->authority_last_name}}
						</div>
						<div class="autorithy-position">
							<a style="color:black;" target="_blank" href="" title="Ir al sitio"></a>
						</div>
					</div>

					<br>
					@endforeach
				</div>
		</section>

		<section class="events">
			<div class="title">
				<h2> {{trans('administration.headers.releases')}} </h2>
			</div>

		</section>
		<section id="imagen"></section>
		<section class="news">
			<div class="title">
				<h2> {{trans('administration.headers.news')}} </h2>
			</div>
			<div class="owl-carousel owl-theme">
				@php($i=0)
				@forelse($news as $item)
				@if($item->news_id == 1)
				@if($i < 6) <div class="item box">
					<div class="mhn-inner">
						<a href="{{ url('/noticia/'.$item->news_id) }}" style="color: #4d4d4d"><img
								src="{{ asset('/img/noticias/') }}"></a>
						<div class="mhn-img">
							<div class="loader-circle">
								<div class="loader-stroke-left"></div>
								<div class="loader-stroke-right"></div>
							</div>
						</div>
						<div class="text">
							<a href="{{ url('/noticia/'.$item->news_id) }}" style="color: #4d4d4d">
								<h4>{{$item->news_title}}</h4>
								<p>{{ str_limit(strip_tags($item->news_content), $limit = 250, $end = ' ...') }}</p>
							</a>
						</div>
					</div>
			</div>

			@php($i++)
			@endif
			@endif
			@empty
			{{trans('administration.content.no-news')}}
			@endforelse

			</div>
		</section>
		<section id="contactos">
			<div class="title">
				<h2> {{trans('administration.page-titles.contacts')}} </h2>
			</div>
			<div class="article-img">
				<iframe
					src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.148063993969!2d-78.67853098524562!3d-1.6579360987910208!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d307c252930ed9%3A0x6ad1a526f47e5b0c!2sEscuela+Superior+Polit%C3%A9cnica+de+Chimborazo!5e0!3m2!1ses!2sec!4v1527190814282"
					class="frame" width="100%" height="400" frameborder="0" allowfullscreen></iframe>
			</div>

			<div class="article-content">
				<p><span class="fa fa-envelope fa-3x"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </p>
				<p><span class="fa fa-phone-square fa-3x"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </p>
				<p><span class="fa fa-map-marker fa-3x"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Panamericana Sur Km 1 1/2
				</p>

			</div>
		</section>
	</main>
	&nbsp;
	@stop
	@section('footer')
	@parent
	@stop
	@section('scripts')
	@parent
	<script>
		const images = document.querySelectorAll('.anim');

        observer = new IntersectionObserver((entries) => {

            entries.forEach(entry => {
                if(entry.intersectionRatio > 0) {
                    entry.target.style.animation = `anim1 1s ${entry.target.dataset.delay} forwards ease-out`;
                }
                else {
                    entry.target.style.animation = 'none';
                }
            })

        })

        images.forEach(image => {
            observer.observe(image)
        })
    
	</script>
	<script type="text/javascript" charset="utf-8" async defer>
		$(function() {
      var $win = $(window);
      var $pos = 10;
      $win.scroll(function() {
        if ($win.scrollTop() <= $pos) $('nav').removeClass('sticky');
        else {
          $('nav').addClass('sticky');
        }
      });
    });
   
      function myFunction() {
        var element = document.getElementById("myDIV");
        element.classList.toggle("mystyle");
      }

	  
	</script>


	<script src="{{asset('js/owl.carousel.min.js')}}"></script>
	<script>
		$(document).ready(function(){
		$('.owl-carousel').owlCarousel({
			loop:true,
			margin:10,
			nav:true,
			responsive:{
				0:{
					items:1
				},
				600:{
					items:3
				},
				1000:{
					items:5
				}
			}
		})
	});

	$(function(){
	$('.mhn-slide').owlCarousel({
		nav:true,
		//loop:true,
		slideBy:'page',
		rewind:false,
		responsive:{
			0:{items:1},
			480:{items:2},
			600:{items:3},
			1000:{items:4}
		},
		smartSpeed:70,
		navText:['<svg viewBox="0 0 24 24"><path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"></path></svg>','<svg viewBox="0 0 24 24"><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"></path></svg>']
	});
});
	</script>
	@stop
</body>
@stop