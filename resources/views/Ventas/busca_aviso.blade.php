
@extends('adminlte::page')

@section('title', 'Aviso de Venta')

@section('content_header')
@stop

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span> No puede continuar con la busqueda</span>
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
                    <div class="col-md-8 mx-auto">
                        <div class="card rounded-0">
                            <div class="card-header">
                                <h3 class="mb-0">CONSULTA AVISO DE VENTA &nbsp; <i class= "fas fa-file-alt"></i> </h3>
                            </div>

                            <div class="card-body">
                                <div>
                                    <form action="{{url('datos/lc')}}" method="POST" id="form_lc" >
                                        @csrf
                                        <input type="hidden" name="#" >

                                        <input type="hidden" name="blade">
                                        <div class="muestra_nombre">
                                            <div class="form-group">
                                                <label for="">LINEA DE CAPTURA:</label>
                                                <input type="text" class="form-control" maxlength="18" id="curp" name="curp" aria-describedby="ingresa curp/rfc" placeholder="curp/rfc" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">INGRESA LA PLACA:</label>
                                                <input type="text" class="form-control" maxlength="6" id="placa" name="placa" aria-describedby="ingresa la placa" placeholder="placa" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">CURP/RFC:</label>
                                                <input type="text" class="form-control" maxlength="18" id="curp" name="curp" aria-describedby="ingresa curp/rfc" placeholder="curp/rfc" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">FECHA DE VENCIMIENTO:</label>
                                                <input type="text" class="form-control" maxlength="18" id="curp" name="curp" aria-describedby="ingresa curp/rfc" placeholder="00/00/0000" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">SUBIR CONTRATO DE COMPRA/VENTA:</label>
                                                <input type="file" class="form-control-file btn btn-outline-success" >
                                            </div>
                                            <div class="form-group">
                                                <label for="">SUBIR FACTURA:</label>
                                                <input type="file" class="form-control-file btn btn-outline-success" >
                                            </div>
                                        </div>
                                        <br>
                                        <input type="hidden" id="linea_captura">
                                        <div  class="btn btn-success btn-block" id="enviar" value="Generar acuse">Buscar <i class="fas fa-search"></i></div>
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
                $('#form_lc').submit();
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

