<!DOCTYPE html>
<html lang="es">

<head>
	<title>@yield('title')</title>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="icon" href="{{ asset('img/iconos/drni.jpeg') }}">
	@section('styles')
	<link rel="stylesheet" href="{{ asset ('css/font-awesome.css')}}">
	<link rel="stylesheet" href="{{ asset ('css/jquery-ui.min.css')}}">
	<link rel="stylesheet" href="{{ asset ('DataTables-1.10.13/media/css/jquery.dataTables.min.css')}}">
	<script src="{{asset('ckeditor/ckeditor.js')}}"></script>

	@show
</head>

<body>
	@section('body')
	<div class="container">
		@section('main')
		@show
	</div>

	@section('footer')
	<footer>
		<div class="page__footer">
			<center>
				<div class="footer__info">
					<a href=""> Términos de Uso </a> |
					<a href=""> Políticas de Privacidad </a> |
					<a href=""> Acerca de </a> |
					<a href=""> Créditos </a>
				</div>
			</center>
		</div>
	</footer>
	@show
	@show
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"
	integrity="sha512-Tn2m0TIpgVyTzzvmxLNuqbSJH3JP8jm+Cy3hvHrW7ndTDcJ1w5mBiksqDBb8GpE2ksktFvDB/ykZ0mDpsZj20w=="
	crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@section('js')
@show

</html>