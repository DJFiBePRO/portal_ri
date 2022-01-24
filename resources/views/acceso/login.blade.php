
@extends('layouts.acceso')

@section('title') Inicio @stop

@section('main')
<main>
	<div class="page__main">
		<div class="main__logo">
		<div class="main__title">
				<a href="{{url('/')}}"><img src="img/logos/logo_espoch.png" alt=""></a>
				<h1>{{$management->management_area_name}}</h1>
			</div>
			
			<form role="form" action="{{route('login')}}" method="POST" class="form__login">
				{{ csrf_field() }}
				<div class="login__item"> 
					@if (count($errors) > 0)
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
					@endif					
				</div>
				<div class="login__item1">
					<input type="email" name="user_mail" value="" placeholder="Correo Electrónico" value="{{ old('user_mail') }}"  autofocus>
				</div>
				<div class="login__item2">
					<input type="password" name="password" value="" placeholder="Contraseña" >
				</div>
				<div class="login__item3">
					<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 
					<span>Mantener sesión activa</span>
				</div>
				<div class="login__item4">
					<input type="submit" value="Iniciar Sesión">
					<!--<a href="">Olvidó su contraseña?</a>-->
				</div>
			</form>
		</div>
	</div>
</main>
@stop

