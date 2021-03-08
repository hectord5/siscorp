@extends('adminlte::page')

@section('title', 'SISCORP')

@section('content_header')

    <h1 class="text-bold" style="font-size: 30px">ELIGE EL TIPO DE CONTROL</h1>


@stop

@section('content')
    {{--    --------}}
    <div id="contenedor_carga">
        <div class="texto"> Cargando, por favor no actualices o cierres la página...</div>
        <img src="{{url('images/margen.png')}}" alt="" class="log1">

        <img src="{{url('images/m1.png')}}" alt="" class="log2">
        {{--        <div id="carga"></div>--}}
    </div>
    {{--   ------- --}}
    <div class="row">
        @foreach($datos_controles as $i => $v)
        <div class="col-lg-3 col-md-3 col-xs-6" data-toggle="modal" data-target="#modal_historial" onclick="llenaDatos('{{$i}}');">
                <div class="small-box {{$datos_controles[$i]['background']}}">
                    <div class="inner">
                        <h3 style="color: white">{{$datos_controles[$i]['control']}}</h3>
                        <br>
                        <br>
                    </div>
                    <div class="icon">
                        <i class="{{$datos_controles[$i]['iconos']}} icono"></i>
                    </div>
            </div>
        </div>

        @endforeach
        <!-- The Modal -->
            <div class="modal fade" id="modal_historial">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div style="padding: 10px;">
                            <form action="{{route('buscar.historial')}}" method="POST" id="form_vehiculo">
                                @csrf
                                <input type="hidden" id="tipo_control" name="tipo_control">
                                <div class="form-group">
                                    <label for="campo" style="font-size: 25px">Elige el criterio de búsqueda:</label>
                                    <select class="form-control form-control-lg rounded-0" name="campo" id="campo">
                                        <option selected>Elige una opción</option>
                                        <option value="serie_vh">Serie Vehicular</option>
                                        <option value="placa">Placa</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="valor">Ingresa la <b id="nombre_busca">SERIE VEHICULAR</b>:</label>
                                    <input type="text" maxlength="25" class="form-control form-control-lg rounded-0" name="valor" id="valor" required>
                                </div>
                                <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cerrar</button>
                                <div class="btn btn-success btn-lg float-right" id="enviar">Buscar Historial</div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

    </div>
@stop
@section('footer')
    <div class="row">
        <div class="col" style="font-weight: bold;">Secretaría de Movilidad de la Ciudad de México </div>
        <div class="col">Dirección de Sistemas de Información .2020 &copy;</div>
    </div>
@stop

@section('js')
    <script>
        $('#valor').on('keyup',function(){
            $(this).val($(this).val().toUpperCase());
        });

        $('#campo').on('change',function(){
            $('#valor').val('');
            $('#nombre_busca').html($('#campo').val().toUpperCase().replace('_',' '));

        });

        var input = document.getElementById("form_vehiculo");

        // Execute a function when the user releases a key on the keyboard
        input.addEventListener("keyup", function(event) {
            // Number 13 is the "Enter" key on the keyboard
            if (event.keyCode === 13) {
                console.log('cancelo');
                // Cancel the default action, if needed
                event.preventDefault();
                // Trigger the button element with a click
                document.getElementById("enviar").click();
            }
        });

        $('#enviar').on('click', function (){
            var control = $('#tipo_control').val();
            var valor = $('#valor').val();
            var valido = 1;
            if ( $('#campo').val()==='serie_vh' ){
                if( $('#valor').val().length >= 25 ){
                    Swal.fire({
                        text : 'La serie vehicular debe ser de 25 caracteres como maximo',
                        icon: 'error'
                    });
                    return;
                }
            }else{
                if( control == 1 || control == 2){
                    if( valor.length !== 6){
                        Swal.fire({
                            text : 'El control que eligio debe tener una longitud de 6 caracteres alfanumericos',
                            icon: 'error'
                        });
                        return;
                    }
                }else if( control == 10 || control == 3 || control == 4 || control == 5 || control == 8 ){
                    if( valor.length !== 5){
                        Swal.fire({
                            text : 'El control que eligio debe tener una longitud de 5 caracteres alfanumericos',
                            icon: 'error'
                        });
                        return;
                    }
                }else if( control == 7 ){
                    if( !(valor.length > 3 && valor.length < 10)){
                        Swal.fire({
                            text : 'El control que eligio debe tener una longitud entre 4 y 9 caracteres alfanumericos',
                            icon: 'error'
                        });
                        return;
                    }
                }else{
                    if( valor.length > 4 && valor.length < 7 ){
                        Swal.fire({
                            text : 'El control que eligio debe tener una longitud entre 5 y 6 caracteres alfanumericos',
                            icon: 'error'
                        });
                        return;
                    }
                }
            }
            if ( valor == ''){
                Swal.fire({
                    text : 'El parametro de busqueda no puede ser nulo',
                    icon: 'error'
                });
                valido = 0;
                return;
            }
            if( valido === 1){
                $('#contenedor_carga').show('slow')
                $('#form_vehiculo').submit();
            }
        });
        function llenaDatos(control){
            $('#tipo_control').val(control);
        }
    </script>
@stop
