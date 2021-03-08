@extends('adminlte::page')

@section('title', 'SISCORP')

@section('content_header')
    <h1 class="text-bold" style="font-size: 30px">ELIGE EL TIPO DE CONTROL</h1>

@stop
@section('content')

    <div class="row">
        @foreach($datos_controles as $i => $v)
        <div class="col-lg-3 col-md-3 col-xs-6" data-toggle="modal" data-target="#modal{{$datos_controles[$i]['control']}}">
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
        <!-- The Modal -->
            <div class="modal fade" id="modal{{$datos_controles[$i]['control']}}">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">SELECCIONA TU METODO DE BUSQUEDA:</h4>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <a href="{{url('sabanas/seleccionEmpresa'.$datos_controles[$i]['vista'])}}">
                                <button type="button" class="btn btn-block btn-outline-success">
                                    <span>EMPRESA</span> &nbsp; <i class="far fa-building"></i>
                                </button>
                            </a>
                            <br>
                            <a href="{{url('sabanas/seleccionCiudadano'.$datos_controles[$i]['vista'])}}">
                                <button type="button" class="btn btn-block btn-outline-success">
                                    <span>CIUDADANO</span> &nbsp; <i class="fas fa-user-alt"></i>
                                </button>
                            </a>
                            <br>
                            <a href="{{url('sabanas/seleccionVehiculo'.$datos_controles[$i]['vista'])}}">
                                <button type="button" class="btn btn-block btn-outline-success">
                                    <span>VEHICULO</span> &nbsp; <i class="fas fa-car"></i>
                                </button>
                            </a>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach

    </div>
@stop
@section('footer')
    <div class="row">
        <div class="col" style="font-weight: bold;">Secretaría de Movilidad de la Ciudad de México </div>
        <div class="col">Dirección de Sistemas de Información .2020 &copy;</div>
    </div>
@stop
