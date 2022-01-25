
<!DOCTYPE html>
<html lang="es">

<head>
    <title>@yield('title') - RI</title>
    <meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="icon" href="{{ asset('img/iconos/logo_negro_espoch.ico') }}">
	@section('estilos')
	<link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
	<link rel="stylesheet" href="{{ asset('css/app.css')}}">
    @show
</head>
@section('body')
@section('menu')
<nav class="menu">
    <div class="menu-act">
        <a class="menu-toggle">
            <i class="fa fa-bars fa-2x"></i>
        </a>
    </div>
    <div class="menu-logo-left">
        <a href="{{url('/')}}">
            <img src="{{ asset('img/logos/'.$management->management_area_logo)}}"
                alt="{{ asset('img/logos/'.$management->management_area_logo)}}">
        </a>
    </div>
    <div class="menu-items">
        <ul class="menu-lista">
            <li class="menu-act">
                <a href="{{ url('/') }}">
                    Menú <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </li>

            <li>
                <a>{{trans('administration.page-titles.vice')}}</a>
                <ul>
                    <li><a href="{{ url('/quienes-somos') }}">{{trans('administration.forms.about') }}</a></li>
                    <li><a href="{{ url('/mision') }}">{{trans('administration.forms.mision-vision') }}</a></li>
                    <li><a href="{{ url('/objetivos') }}">{{trans('administration.forms.objectives') }}</a></li>
                    <li><a href="{{ url('/funciones') }}">{{trans('administration.headers.responsabilities') }}</a></li>
                    <!-- <li><a href="{{ url('/funciones') }}">{{trans('administration.forms.functions') }}</a></li> -->
                    <!-- <li><a href="{{ url('/info') }}">Información</a></li> -->
                </ul>
            </li>
            {{-- <li><a href="{{ url('/areas') }}">{{trans('administration.forms.areas') }}</a></li>
            <li><a href="{{ url('/plan') }}">{{trans('administration.forms.plan') }}</a></li> --}}
            <li><a href="{{ url('/noticias') }}">{{trans('administration.page-titles.news')}}</a></li>
            <li>
                <a href="{{url('/convenio')}}">{{trans('administration.page-titles.agreements')}}</a>
            </li>
            <li>
                <a href="{{ url('/proyectos') }}">{{trans('administration.headers.events')}}</a>
                <ul>
                    <li>
                        <a href="{{ url('/proyectos') }}">{{trans('administration.headers.events1')}}</a>
                    </li>
                    <li>
                        <a href="{{ url('/proyectos') }}">{{trans('administration.headers.events2')}}</a>
                    </li>
                    <li>
                        <a href="{{ url('/proyectos') }}">{{trans('administration.headers.events3')}}</a>
                    </li>
                </ul>
            </li>
            <!--	<li><a href="{{ url('/convenios') }}">{{trans('administration.page-titles.agreements')}}</a></li>
			<li></li>
				<a href="#">Investigación  </a>
				<ul>
					<li><a href="{{ url('/centros-investigacion') }}">Centros de Investigación</a></li>
					<li><a href="{{ url('/revistas') }}">Revistas Científicas</a></li>
				</ul>
			</li> aqui cambiar la rutas-->
            <!-- <li><a href="{{ url('/noticiasresumen') }}">Servicio {{trans('administration.page-titles.news')}}</a></li>			 -->
            {{--<li>
                <a href="{{ url('/contactos') }}">Contactos</a>

            </li>--}}
            <li><a href="{{ url('/descargas') }}">{{trans('administration.nav.downloads')}}</a></li>
            <li>
                <a>{{trans('administration.page-titles.languages')}}</a>
                <ul>
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li>
                        <a rel="alternate" hreflang="{{ $localeCode }}"
                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    </li>
                    @endforeach
                </ul>

            </li>
            {{--<li>
                <a><span class="fa fa-search fa-3x search" style="color: white;  font-size: 1.3em;"></span></a>
                <ul>
                    <li>
                        <form method="POST" class="form-search" action="{{route('busqueda')}}" class="" id=""
                            autocomplete="off">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input class="searchBox" type="text" name="searchBox" />
                            <button class="btn-search-box">Buscar</button>
                        </form>
                    </li>
            </li>--}}
    </div>
    <div class="menu-logo-right">
        <img src="{{ asset('img/logos/logo-gestion.png') }}" alt="">
    </div>

</nav>

@show
@section('header')

@show
@section('main')

@show
@section('footer')

<footer class="page-footer">
    <div class="footer-img">
        <a class="footer-img-red" target="_blank" href="https://www.facebook.com/cimogsys"><img
                src="{{ asset('img/logos/cimogsys.svg') }}" alt=""></a>
        @foreach($social as $socialData)
        <a class="footer-img-red" target="_blank" href="{{$socialData->social_network_url}}"><img
                src="{{ asset('img/sn/'.$socialData->social_network_image)}}" alt=""></a>
        @endforeach
    </div>
    <div class="footer-info">
        <p>{{$management->management_area_name}} - ESPOCH</p>
        <p><a target="_blank" target="_blank"
                href="{{ asset('docs/terminos-de-uso-y-politicas-de-privacidad.pdf') }}">{{trans('login.terms')}}</a> |
            <a target="_blank" href="{{ asset('docs/acerca-de.pdf') }}">{{trans('login.about')}}</a> | <a
                href="{{ asset('docs/creditos.pdf') }}" target="_blank">{{trans('login.credits')}}</a> | <a
                href="{{route('login')}}">Login</a>
        </p>
    </div>
</footer>
@show
@section('scripts')
<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script type="text/javascript">

</script>
@show
@show

</html>