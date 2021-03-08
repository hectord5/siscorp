

@extends('adminlte::page')

@section('title', 'Buscando: Vehiculo')
<link rel="icon" href="images/logo-movi.png" type="image/png">

@section('content_header')
@stop

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span> No puede continuar debido a detalles en su trámite</span>
            <ul>
                @foreach($errors->all() as $error)
                    <li><strong>{{$error}}</strong></li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    {{--    --------}}
    <div id="contenedor_carga">
        <div class="texto"> Cargando, por favor no actualices o cierres la página...</div>
        <img src="{{url('images/margen.png')}}" alt="" class="log1">

        <img src="{{url('images/m1.png')}}" alt="" class="log2">
{{--        <div id="carga"></div>--}}
    </div>
    {{--   ------- --}}
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-10 mx-auto">
                        <div class="card rounded-0">
                            <div class="card-header">
                                <h3 class="mb-0">Buscar por CURP o Nombre &nbsp; <i class= "animate__animated animate__fadeInLeft animate__delay-2s fas fa-id-card-alt"></i> </h3>
                            </div>

                            <div class="card-body">
                                <form action="{{route($ruta)}}" method="POST" id="form_ciudadano">
                                    @csrf
                                    <input type="hidden" name="tipo_control" value="{{$tipo_control}}">
                                    <select name="campo" id="campo" class="bootstrap-select form-control form-control-lg rounded-0">
                                        <option selected>Elige una opción</option>
                                        <option value="nombre">NOMBRE</option>
                                        <option value="curp">CURP</option>
                                    </select>
                                    <div class="muestra_curp" style="display: none">
                                        <div class="form-group">
                                            <label for="CURP">Ingresa el CURP:</label>
                                            <input type="text" onkeyup="" class="form-control form-control-lg rounded-0" maxlength="30" name="valor" id="valor">
                                            <div class="invalid-feedback">Oops, you missed this one.</div>
                                        </div>
                                    </div>

                                    {{--                                    <form action="{{route('sabanas.nombre')}}" method="POST">--}}

                                    <div class="muestra_nombre">
                                        <div class="form-group">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" class="form-control" maxlength="25" id="nombre"  name="nombre" aria-describedby="Ingresa nombre" placeholder="Ingresa nombre">
                                        </div>
                                        <div class="form-group">
                                            <label for="apellido">Apellido Paterno</label>
                                            <input type="text" class="form-control" maxlength="25" id="apellido1" name="apellido1" aria-describedby="Ingresa apellido" placeholder="Ingresa apellido">
                                        </div>
                                        <div class="form-group">
                                            <label for="apellido2">Apellido Materno</label>
                                            <input type="text" class="form-control" maxlength="25" id="apellido2" name="apellido2" aria-describedby="Ingresa apellido" placeholder="Ingresa apellido">
                                        </div>
                                    </div>

                                    <br>
                                    <br>

                                    <div  class="btn btn-success btn-lg float-right" id="enviar">Buscar sabana</div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#campo').on('change',function(){
            var selectValor = $(this).val();
            if(selectValor == 'nombre') {
                $('.muestra_nombre').show();
                $('.muestra_curp').hide();
                return;

            }else if (selectValor == 'curp'){
                $('.muestra_curp').show();
                $('.muestra_nombre').hide();
                return;
            }
        });
        $('#valor').on('keyup',function(){
            if ( $('#campo').val()==='curp' ){
                $(this).val($(this).val().toUpperCase());
            }
        });
        $('#nombre,#apellido1,#apellido2').on('keyup',function(){
            $(this).val($(this).val().toUpperCase());
        });

        var input = document.getElementById("form_ciudadano");

        // Execute a function when the user releases a key on the keyboard
        input.addEventListener("keyup", function(event) {
            // Number 13 is the "Enter" key on the keyboard
            if (event.keyCode === 13) {
                // Cancel the default action, if needed
                event.preventDefault();
                // Trigger the button element with a click
                document.getElementById("enviar").click();
            }
        });

        $('#enviar').on('click', function (){
            if ( $('#campo').val()==='curp' ){
                if( $('#valor').val().length < 9  ){
                    Swal.fire({
                        text : 'El campo debe tener por lo menos 10 caracteres',
                        icon: 'error'
                    });
                    return;
                }
            }else{
                if( $('#nombre').val()=='' && $('#apellido1').val()==''){
                    Swal.fire({
                        text : 'Ingresa por lo menos nombre, o apellido paterno',
                        icon: 'error'
                    });
                    return;
                }
            }
            $('#contenedor_carga').show('slow')
            $('#form_ciudadano').submit();
        });
    </script>
@stop

@section('footer')
    <div class="row">
        <div class="col" style="font-weight: bold;">Secretaría de Movilidad de la Ciudad de México </div>
        <div class="col">Dirección de Sistemas de Información .2020 &copy;</div>
    </div>

@stop
