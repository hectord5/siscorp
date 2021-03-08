

@extends('adminlte::page')

@section('title', 'Acuse')

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
                    <div class="col-md-6 mx-auto">
                        <div class="card rounded-0">
                            <div class="card-header">
                                <h3 class="mb-0">Buscar acuse &nbsp; <i class= "animate__animated animate__fadeInLeft animate__delay-2s fas fa-scroll"></i> </h3>
                            </div>

                            <div class="card-body">


                                    <div>
                                        <form action="{{route('ImprimeAcuse')}}" method="post" id="valida" target="_blank">
                                            @csrf
                                            <input type="hidden" name="tipo_control">
                                            <input type="hidden" name="blade" value="{{$blade}}">
                                            <div class="muestra_nombre">
                                                <div class="form-group">
                                                    <label for="nombre">Elige el tipo de movimiento:</label>
{{--                                                    <input type="text" class="form-control" maxlength="25" id="placa"  name="placa" aria-describedby="Ingresa placa" placeholder="A0001" required>--}}
                                                    <select class="form-control form-control-md rounded-0" name="tipo_mov" id="tipo_mov">
                                                        <option value="" SELECTED>TIPO DE MOV</option>
                                                        <option value="1">ALTA</option>
                                                        <option value="2">BAJA</option>
                                                        <option value="3">CAMBIO DE PROPIETARIO</option>
                                                        <option value="4">CAMBIO DE DOMICILIO</option>
                                                        <option value="5">CAMBIO DE MOTOR</option>
                                                        <option value="6">CAMBIO DE CARROCERIA</option>
                                                        <option value="7">REPOSICION DE TARJETA</option>
                                                        <option value="8">ALTA USADOS</option>
                                                        <option value="9">REPOSICION DE PLACAS</option>
                                                        <option value="10">BAJA ADMINISTRATIVA</option>
                                                        <option value="12">ALTA AGENCIA</option>
                                                        <option value="13">ALTA FORANEO</option>
                                                        <option value="14">BAJA POR ROBO</option>
                                                        <option value="15">BAJA SINIESTRO</option>
                                                        <option value="16">RENOVACION DE TARJETA</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="apellido">Ingresa la línea de captura:</label>
                                                    <input type="text" class="form-control" maxlength="20" id="lc" name="lc" aria-describedby="ingresa la linea de captura" placeholder="linea de captura" required>
                                                </div>

                                            </div>

                                            <br>
                                            <br>
                                            <input type="hidden" id="linea_captura">
                                            <div  class="btn btn-success btn-block" id="enviar" value="Generar acuse">Generar Acuse</div>
                                        </form>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#valor').on('keyup',function(){
            if ( $('#campo').val()==='curp' ){
                $(this).val($(this).val().toUpperCase());
            }
        });

        $('#enviar').on('click', function (){
            if(valida()){
                // consumeajax();
                $('#valida').submit();
            }
        });

        function valida(){
            let LC = $('#lc').val();
            let placa = $('#placa').val();
            console.log(placa);
            console.log(LC);
            if (LC === "" || placa === ""){
                Swal.fire({
                    text : 'Debes ingresar los datos solicitados para la busqueda',
                    icon: 'error'
                });
                return false;
            }
            return true;
        }
    </script>
@stop

@section('footer')
    <div class="row">
        <div class="col" style="font-weight: bold;">Secretaría de Movilidad de la Ciudad de México </div>
        <div class="col">Dirección de Sistemas de Información .2020 &copy;</div>
    </div>

@stop


