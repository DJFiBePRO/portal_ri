@extends('layouts.template')

@section('title') Convenios @stop

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
        <div class="page-main">
            <div class="banner">
                <img src="{{ asset('/img/banner/responsabilidades.png') }}" alt="" width="100%">
            </div>
            <article class="ed-container full">
                <div class="ed-item main-center cross-center">
                    <div class="title">
                        <div>
                            <h2>{{trans('administration.forms.agreements')}}</h2>
                        </div>
                    </div>
                </div>

                <section class="plan">
                    <div class="ed-item main-center cross-center">
                        <div class="content">

                            <table class="table-plan">
                                <thead>
                                    <tr class="headers" >
                                        <th>{{trans('administration.page-titles.caracter')}}</th>
                                        <th>{{trans('administration.page-titles.university')}}</th>
                                        <th>{{trans('administration.page-titles.country')}}</th>
                                        <th>{{trans('administration.page-titles.continent')}}</th>
                                        {{-- <th>Acciones</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($covenants as $covenant )
                                    <tr class="data__info" >
                                        <td>{{$covenant->caracter}}</td>
                                        <td>{{$covenant->university}}</td>
                                        <td>{{$covenant->country}}</td>
                                        <td>{{$covenant->continent}}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td></td>
                                        <td class="table__msj">! No hay convenios agregados...</td>
                                        <td></td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>


            </article>
        </div>

    </main>
    @stop
    @section('footer')
    @parent
    @stop
    @section('scripts')
    @parent
    <script type="text/javascript">
        $('nav').addClass('sticky');


		/*$('body').on({
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