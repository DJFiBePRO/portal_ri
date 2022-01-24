@extends('layouts.admin')

@section('title') Convenios @stop

@section('styles')
@parent
<link rel="stylesheet" href="{{ asset ('css/admin.css')}}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
@stop

@section('main')
<main>
    <div class="page__main">
        <div class="main__title">
            <h1>Modificar Convenio {{$covenant->id}}</h1>
        </div>
        <div class="main__insert">
            <div class="main__boton">

                <a href="{{route('covenant.index')}}"><i class="fa fa-chevron-circle-left"></i>Regresar</a>

            </div>
            <div class="main__insert">
                <div class="insert__form">
                    <form id="form__insert" class="action__form" action={{ route('covenant.update', $covenant->id)}}
                        enctype=multipart/form-data
                        method="POST"
                        novalidate>
                        {{ csrf_field() }} {{ method_field('PATCH') }}
                        <div class="form__container">
                            <div class="container__label">
                                <label>Ingrese caracter:</label>
                            </div>
                            <div class="container__item ">

                                <select style="width:90%" name="caracter" id="" required>
                                    <option hidden value="">Seleccione un caracter</option>
                                    <option value="MARCO DE COOPERACIÓN" @if ("MARCO DE COOPERACIÓN"==$covenant->
                                        caracter) selected @endif>MARCO DE COOPERACIÓN</option>
                                    <option value="CONVENIO ESPECÍFICO" @if ("CONVENIO ESPECÍFICO"==$covenant->caracter)
                                        selected @endif>CONVENIO ESPECÍFICO</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="form__container">
                            <div class="container__label">
                                <label>Ingrese universidad:</label>
                            </div>
                            <div class="container__item ">
                                <input type="text" maxlength="20" onkeypress="return soloLetras(event);"
                                    class="form-control" id="university" name="university"
                                    placeholder="Ingrese university"
                                    value="{{ isset($covenant->university) ? $covenant->university : '' }}" required>
                            </div>
                        </div>
                        <br>
                        <div class="form__container">
                            <div class="container__label">
                                <label>Seleccione Continente:</label>
                            </div>
                            <div class="container__item ">
                                <select style="width:90% " id="idContinent" required>
                                    <option hidden value="">Seleccione continente</option>
                                    @foreach ($continents as $continent)
                                    <option value="{{ isset($continent->id) ? $continent->id : '' }}" @foreach($countrys
                                        as $country) @if ($country->id == $covenant->idCountry &&
                                        $continent->id == $country->idContinent) selected @endif @endforeach>{{
                                        $continent->continent }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <br>
                        <div class="form__container">
                            <div class="container__label">
                                <label>Seleccione País:</label>
                            </div>
                            <div class="container__item">
                                <select style="width:90% " name="idCountry" id="idCountry" required>
                                    @foreach ($countrys as $country)
                                    <option value="{{ isset($country->id) ? $country->id : '' }}" @if ($country->id ==
                                        $covenant->idCountry) selected @endif>
                                        {{ $country->country }}</option>

                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <br>
                        <div class="form__container">
                            <div class="container__label">
                                <label>Ingrese Resolución:</label>
                            </div>
                            <div class="container__item ">
                                <input type="file" name="resolution">
                            </div>
                        </div>
                        <br>
                        <div class="form__container">
                            <div class="container__label">
                                <label>Ingrese Validación:</label>
                            </div>
                            <div class="container__item ">
                                <input type="text" maxlength="20" onkeypress="return soloLetras(event);"
                                    class="form-control" id="is_validity" name="is_validity"
                                    placeholder="Ingrese validity"
                                    value="{{ isset($covenant->is_validity) ? $covenant->is_validity : '' }}" required>

                            </div>
                        </div>
                        <br>
                        <div class="form__button">
                            <div class="button__save">
                                <input type="submit" value="Modificar" id="a">
                            </div>
                        </div>
                    </form> <!--   -->
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    function soloLetras(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toString();
        letras = "ABECDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚabcdefghijklmnñopqrstuvwxyzáéíóú1234567890-_";
        especiales = [8, 32];
        tecla_especial = false;
        for (var i in especiales) {
            if (key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }
        if (letras.indexOf(tecla) == -1 && !tecla_especial) {
            alert("Este campo registra letras y caracter '-_' ");
            return false;
        }
    }
    $('#mensaje').fadeOut(5000);
    $('#cancel__btn').click(function(event){
		location.reload();
	});
    
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#idContinent').on("change", function() {
            $.ajax({
                url: "{{ route('admin.countrys.bycontinent') }}?idContinent=" + $(this).val(),
                method: 'GET',
                //console.log(data);
                //$('#idParroquia').html(data.html);
                success: function(result) {
                    console.log(result);
                    var dbSelect = $('#idCountry');
                    dbSelect.empty();
                    for (var i = 0; i < result.length; i++) {
                        dbSelect.append($('<option/>', {
                            value: result[i].id,
                            text: result[i].country
                        }));
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(thrownError);
                }
            });
        })
    });
</script>
<script>
    $(function() {
        $('select').each(function() {
            $(this).select2({
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass(
                    'w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
                closeOnSelect: !$(this).attr('multiple'),
                language: "es",
            });
        });
    });
</script>
@stop

@section('scripts')
@parent
<script type="text/javascript">
    function soloLetras(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toString();
        letras = "ABECDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚabcdefghijklmnñopqrstuvwxyzáéíóú1234567890-_";
        especiales = [8, 32];
        tecla_especial = false;
        for (var i in especiales) {
            if (key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }
        if (letras.indexOf(tecla) == -1 && !tecla_especial) {
            alert("Este campo registra letras y caracter '-_' ");
            return false;
        }
    }
    $('#mensaje').fadeOut(5000);
    /*$('.delete').on('click', function(event) {
		event.preventDefault();
		var datos = $(this).closest('.data__info').data();
		cargarFormulario(datos);
		$('.page__delete').slideToggle();
	});*/
    $('#cancel__btn').click(function(event){
		location.reload();
	});
    /*function cargarFormulario(datos){
		$('.action__form')[0].reset();
		$(".action__form input[name=caracter]").val(datos['caracter']);
		$(".action__form input[name=university]").val(datos['university']);
		
    }*/
    $(document).ready(function() {
		$('#news').DataTable({
			"ordering": false,
			"info":     false,
			"paging":   false
		});
	} );
    
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#idContinent').on("change", function() {
            $.ajax({
                url: "{{ route('admin.countrys.bycontinent') }}?idContinent=" + $(this).val(),
                method: 'GET',
                //console.log(data);
                //$('#idParroquia').html(data.html);
                success: function(result) {
                    console.log(result);
                    var dbSelect = $('#idCountry');
                    dbSelect.empty();
                    for (var i = 0; i < result.length; i++) {
                        dbSelect.append($('<option/>', {
                            value: result[i].id,
                            text: result[i].country
                        }));
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(thrownError);
                }
            });
        })
    });
</script>
<script>
    $(function() {
        $('select').each(function() {
            $(this).select2({
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass(
                    'w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
                closeOnSelect: !$(this).attr('multiple'),
                language: "es",
            });
        });
    });
</script>
@stop