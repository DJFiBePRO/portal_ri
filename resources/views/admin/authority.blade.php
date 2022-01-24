@extends('layouts.admin')

@section('title') Directivos @stop

@section('styles')
@parent
<link rel="stylesheet" href="{{ asset ('css/admin.css')}}">
@stop
@section('main')
<main>
	<div class="page__main">		
		<div class="main__insert">
			<div class="main__title">
				<h1>Directivos {{$management->management_area_name}} </h1>
			</div>
			<div class="main__boton">
				<a href="{{route('newAuthority')}}"><i class="fa fa-plus"></i>Nuevo</a>
			</div>
		</div>
		@if (count($errors) > 0 )
		<div class="main__msj">
			<ul id="mensaje">
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		@if(Session::has('mensaje'))
		<div class="main__msj">
			<ul id="mensaje">
				{{Session::get('mensaje')}}
			</ul>
		</div>
		@endIf
		<div class="main__data">
			@forelse($authority as $authorityData)
			<form method="POST" action="{{route('updateAuthority')}}" enctype= multipart/form-data>
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<input type="hidden" name="authorityId" value="{{$authorityData->authority_id}}">
				<div class="data__container">
					<div class="data__img">
						<div class="img__image">
							@if($authorityData->authority_photo !=null)
							<img src="{{asset('img/authority/'.$authorityData->authority_photo)}}">
							@else
							<img src="{{asset('img/authority/IMAGEN-AUTORIDADES.png')}}">
							@endIf
						</div>
						<div class="img__item">
							<input type="file" name="authorityPhoto">

						</div>
					</div>
					<div class="data__name">
						<div class="data__item">
							<label>Nombres:</label>
							<input type="text" name="authorityName"  value="{{$authorityData->authority_name}}" >
						</div>

						<div class="data__item">
							<label>Apellidos:</label>
							<input type="text" name="authorityLastName" value="{{$authorityData->authority_last_name}}" >
						</div>

						<div class="data__item">
							<label>Hoja de vida actual:</label>
							@if($authorityData->authority_cv !=null)
							<a target="_blank" href="{{asset('docs/authority/'.$authorityData->authority_cv)}}"><i class="fa fa-file-pdf-o"></i></a>
							@endIf
						</div>
					</div>
					<div class="data__name">
						<div class="data__item">
							<label>Cargo:</label>
							<select name="authorityType" >
								@forelse($types as $authorityType)
								@if($authorityData->authority_type != $authorityType->authority_type_id)
								<option  value="{{$authorityType->authority_type_id}}">{{$authorityType->authority_type_description}}</option>
								@else
								<option  selected value="{{$authorityType->authority_type_id}}">{{$authorityType->authority_type_description}}</option>
								@endIf

								@empty
								<option>No existen cargos </option>
								@endforelse
							</select>
						</div>

						<div class="data__item">
							<label>Departamento:</label>
							<select name="authorityArea" disabled>
								<option value="{{$management->management_area_id}}">{{$management->management_area_name}}</option>
							</select>					
						</div>

						<div class="data__item">
							<label>Nueva Hoja de vida:</label>
							<input type="file" name="authorityCv">
						</div>
					</div>
					
					<div class="data__button">
						<div>
							<input type="submit" name="btnGuardar" value="Modificar">
						</div>
						<div>
							<input type="button" required" name="btnCancelar" class="cancel__btn" value="Cancelar">
						</div>
					</div>
				</div>
			</form>
			@empty
			<div class="data__msj">! No hay directivos registrados... </div>
			@endforelse
		</div>
	</div>
</main>
@stop

@section('scripts')
@parent

<script type="text/javascript">
	//$('input.fecha').datepicker({ dateFormat: 'yy-mm-dd' });

	$('.cancel__btn').click(function(event) {
		location.reload();
	});

	$('#mensaje').fadeOut(5000);


</script>

@stop