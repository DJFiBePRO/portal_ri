@extends('layouts.admin')

@section('title') Inicio @stop

@section('styles')
@parent
<link rel="stylesheet" href="{{ asset ('css/admin.css')}}">
@stop
@section('main')
<main>
	<div class="page__main">

		<div class="main__link">
			<a href="{{route('userType')}}">Usuarios</a>
			<a href="{{route('authorityType')}}">Autoridades</a>
			<a href="{{route('multimediaType')}}">Multimedia</a>
			<a href="{{route('newsType')}}">Noticias</a>
		</div>
		<div class="main__title">
			<h1>Parametrización General</h1>
		</div>

		<div class="main__insert">
			
			<div class="insert__form">
				<div>
					<p>
						En esta página usted podrá encontrar los enlaces para modificar las principales categorías como: Tipo de Usuarios, autoridades, multimedia y noticias.
					</p>

					<p>
						Estas categorías permitirán que la información se genere correctamente en el portal web.
					</p>
				</div>
			</div>
		</div>

	</div>
</div>
</main>
@stop