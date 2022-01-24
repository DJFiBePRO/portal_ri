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

{{-- <section>
    <div class="page__delete">


        <div class="form__title">
            <h1>Eliminar Convenio</h1>
        </div>

        {{ csrf_field() }}{{ method_field('DELETE') }}

        <div class="data__container">
            <div class="data__name">
                <div class="data__item">
                    <label>Caracter:</label>
                    <input disabled type="text" name="caracter">
                </div>
                <div class="data__item">
                    <label>Universidad:</label>
                    <input disabled type="text" name="university">
                </div>
                <div class="data__item">
                    <label>País:</label>
                    <input disabled type="text" name="country">
                </div>
                <div class="data__item">
                    <label>Continente:</label>
                    <input disabled type="text" name="continent">
                </div>
            </div>
            <div class="data__name">
                <div class="data__item">
                    <label>Resolución:</label>
                    <input disabled type="file" name="resolution">
                </div>
                <div class="data__item">
                    <label>Validez:</label>
                    <input disabled type="text" name="is_validity">
                </div>
            </div>
        </div>
        <div class="form__button">
            <div class="button__save">
                <input type="submit" value="Eliminar">
            </div>
            <div class="button__cancel">
                <input type="button" class="cancel__btn" value="Cancelar">
            </div>
        </div>

    </div>
</section> --}}
<main>
    <div class="page__main">
        <div class="main__title">
            @if (Auth::user()->user_type == 4)
            <h1>Ofertas laborales {{Auth::user()->user_name." ".Auth::user()->user_last_name}}</h1>
            @else
            <h1>Convenios {{$management->management_area_name}}</h1>
            @endIf
        </div>

        <div class="main__insert">
            <div class="main__function">
                @if (Auth::user()->user_type == 4)
                <h2>Agregar Oferta Laboral</h2>
                @else
                <h2>Agregar Convenios </h2>
                @endIf
            </div>
            <div class="insert__form">
                <form id="form__insert" class="action__form" action={{ route('covenant.store') }} method="POST" enctype= multipart/form-data>
                    {{ csrf_field() }}
                    <div class="form__container">
                        <div class="container__label">
                            <label>Ingrese caracter:</label>
                        </div>
                        <div class="container__item ">
                            <select style="width:90%" name="caracter" id="caracter" required>
                                <option hidden value="">Seleccione un caracter</option>
                                <option value="MARCO DE COOPERACIÓN">MARCO DE COOPERACIÓN</option>
                                <option value="CONVENIO ESPECÍFICO">CONVENIO ESPECÍFICO</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="form__container">
                        <div class="container__label">
                            <label>Ingrese Universidad:</label>
                        </div>
                        <div class="container__item ">
                            <input type="text" maxlength="20" onkeypress="return soloLetras(event);"
                                class="form-control" id="university" name="university" placeholder="Ingrese Universidad"
                                value="" required>
                        </div>
                    </div>
                    <br>
                    <div class="form__container">
                        <div class="container__label">
                            <label>Seleccione Continente:</label>
                        </div>
                        <div class="container__item ">
                            <select style="width:90% "  id="idContinent" required>
                                <option hidden value="">Seleccione continente</option>
                                @foreach ($continents as $continent)
                                <option value="{{ $continent->id }}">{{ $continent->continent }}</option>
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

                            <select style="width:90%" name="idCountry" id="idCountry" required>
                                <option hidden value="">Seleccione un país</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="form__container">
                        <div class="container__label">
                            <label>Ingrese Resolución:</label>
                        </div>
                        <div class="container__item ">
                            <input type="file"  name="resolution">
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
                                placeholder="Ingrese validación" value="" required>

                        </div>
                    </div>
                    @if(Session::has('mensaje'))
                    <div class="form__container">
                        <div id="mensaje">
                            {{Session::get('mensaje')}}
                        </div>
                    </div>
                    @endIf

                    @if (count($errors) > 0)
                    <div class="form__container">
                        <ul id="mensaje">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="form__button">
                        <div class="button__save">
                            <input type="submit" value="Agregar" id="a">
                        </div>
                        <div class="button__cancel">
                            <input type="button" class="cancel__btn" id="cancel__btn" value="Cancelar">
                        </div>
                    </div>
                </form>
            </div>
            <div class="main__content">
                @if (Auth::user()->user_type == 4)
                <h2>Ofertas Laborales Existentes</h2>
                @else
                <h2>Convenios Existentes</h2>
                @endIf
                <table class="content__table" id="news">
                    <thead class="table__head">
                        <tr>
                            <th>Caracter</th>
                            <th>Universidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($covenants as $covenant )
                        <tr class="data__info" data-id="{{$covenant->id}}" data-caracter="{{$covenant->caracter}}"
                            data-universidad="{{$covenant->university}}" data-pais="{{$covenant->idCountry}}"
                             data-resolucion="{{$covenant->resolution}}">
                            <td>{{$covenant->caracter}}</td>
                            <td>{{$covenant->university}}</td>
                            <td>
                                <form action={{ route('covenant.destroy', $covenant->id) }} method="POST">
                                    <a href="{{ route('covenant.show',[$covenant->id]) }}" title="visualizar" href=""><i
                                            class="fa fa-search" aria-hidden="true"></i></a>
                                    {{-- <a class="resource" title="contenido"><i class="fa fa-upload"
                                            aria-hidden="true"></i></a> --}}
                                    <a href={{ route('covenant.edit', $covenant->id) }} class="update"
                                        title="modificar"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                                    {{ csrf_field() }}{{ method_field('DELETE') }}
                                    <button type="submit" {{--class="delete" --}} title="eliminar"><i
                                            class="fa fa-trash-o" aria-hidden="true"
                                            onclick="return confirm('¿Desea eliminar esto?')"></i></button>

                                </form>

                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td></td>
                            <td class="table__msj">¡No hay convenios agregados!...</td>
                            <td></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</main>
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