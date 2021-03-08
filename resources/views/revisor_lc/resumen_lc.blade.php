@extends('adminlte::page')

@section('title', 'Resultados de la busqueda')

@section('content_header')
    {{--    <h1 class="m-0 text-dark">Resultados por {{str_replace('_',' ',$campo)}}</h1>--}}
@stop

@section('content')
    @if($pago == null)
    No se obtuvieron resultados con el dato ingresado
    @else
        <div class="row">
            <div class=" container-fluid col-md-10">
                <div class="card text-justify">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="text-bold">LINEA DE CAPTURA: <span class="text-success">{{$pago['dataPago'][0]['lc']}}</span></h4>
                                </div>
                                <div class="col-md-6">
                                    @if(isset($tramite))
                                        @if($tramite['errMessage'] == 'La Línea de Captura aún no ha sido usada en un trámite')
                                            <div class="card text-white bg-success">
                                                <div class="card-body">
                                                    <h5 class="card-text text-bold">{{$tramite['errMessage']}}.</h5>
                                                </div>
                                            </div>
                                        @elseif($tramite['nombre_solicitante'] == "PREASIGNACIÓN")
                                            <div class="card text-white bg-warning">
                                                <div class="card-body">
                                                    <h5 class="card-text text-bold">LA LINEA DE CAPTURA TIENE PLACA ASIGNADA, PERO, NO HA FINALIZADO EL TRAMITE</h5>
                                                </div>
                                            </div>
                                        @else
                                            <div class="card text-white bg-danger">
                                                <div class="card-body">
                                                    <h5 class="card-text text-bold">{{$tramite['errMessage']}}</h5>
                                                </div>
                                            </div>
                                        @endif
                                    @else
                                        <div class="card text-white bg-warning" style="max-width: 30rem; position: relative; left: 60%; top: 50%">
                                            <div class="card-body">
                                                <h5 class="card-text text-bold">La linea de captura no se localizo.</h5>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5 text-justify">
                                <span class="text-bold text-success" style="font-size: 20px">INFORMACION DE PAGO:</span>
                                <br>
                                <br>
                                <span class="text-bold">Concepto de pago de finanzas: <span class="text-secondary">{{$pago['dataPago'][0]['idconcepto']}}</span></span>
                                <br><br>
                                <span class="text-bold">Fecha de pago: <span class="text-secondary">{{$pago['dataPago'][0]['fcobro']}}</span></span>
                                <br><br>
                                <span class="text-bold">Placa asociada: <span class="text-secondary">{{$pago['dataPago'][0]['placa']}}</span></span>
                                <br><br>
                                <span class="text-bold">Importe del pago: <span class="text-secondary">{{$pago['dataPago'][0]['total']}}</span></span>
                                <br><br>
                                <span class="text-bold">Motivo del pago: <span class="text-secondary">{{$pago['dataPago'][0]['descripcion_IdPago']}}</span></span>
                                <br><br>
                            </div>
                            <div class="col-md-1 text-justify"></div>
                            <div class="col-md-6 text-justify">
                                <span class="text-bold text-success" style="font-size: 20px">INFORMACION DE TRAMITE:</span>
                                <br><br>
                                @if(isset($tramite[0]))
                                    <span class="text-bold">Fecha del Tramite: <span class="text-secondary">{{Str::limit($tramite[0]['created_at'],10, '')}}</span></span>
                                    <br><br>
                                    <span class="text-bold">Placa: <span class="text-secondary">{{$tramite[0]['placa']}}</span></span>
                                    <br><br>
                                    <span class="text-bold">Nombre del solicitante: <span class="text-secondary">{{$tramite[0]['nombre_solicitante']}}</span></span>
                                    <br><br>
                                    <span class="text-bold">Operador: <span class="text-secondary">{{$tramite[0]['operador']}}</span></span>
                                    <br><br>
                                    <span class="text-bold">Serie Vehicular: <span class="text-secondary">{{$tramite[0]['serie_vh']}}</span></span>
                                    <br><br>
                                    <span class="text-bold">Modulo: <span class="text-secondary">{{$tramite[0]['modulo']}}</span></span>
                                @elseif(isset($tramite['errCode'])&&$tramite['errMessage']=='La Línea de Captura ha sido usada en un trámite anterior')
                                    <span class="text-bold">Fecha del Tramite: <span class="text-secondary">{{Str::limit($tramite['fecha_uso'],10, '')}}</span></span>
                                    <br><br>
                                    <span class="text-bold">Placa: <span class="text-secondary">{{$tramite['placa']}}</span></span>
                                    <br><br>
                                    <span class="text-bold">Nombre del solicitante: <span class="text-secondary">{{$tramite['nombre_solicitante']}}</span></span>
                                    <br><br>
                                    <span class="text-bold">Operador: <span class="text-secondary">{{$tramite['operador']}}</span></span>
                                    <br><br>
                                    <span class="text-bold">Serie Vehicular: <span class="text-secondary">{{$tramite['serie_vehicular']}}</span></span>
                                    <br><br>
                                    <span class="text-bold">Modulo: <span class="text-secondary">{{$tramite['modulo']}}</span></span>
                                @else
                                    <b>No existe trámite con la línea de captura ingresada</b>
                                @endif
                            </div>
                    </div>
                        <div>
                            <br><br><br>

                            <a href="{{url('imprime/'.$pago['dataPago'][0]['lc'])}}" class="btn btn-success btn-block" target="_blank">GENERAR COMPROBANTE</a>
                        </div>
                    <div class="card-footer text-muted text-center text-bold">
                        La información presentada solamente es válida al generar el comprobante
                    </div>
                </div>
            </div>
        </div>
    @endif
@stop
@section('js')

@stop
@section('footer')
    <div class="row">
        <div class="col" style="font-weight: bold;">Secretaría de Movilidad de la Ciudad de México </div>
        <div class="col">Dirección de Sistemas de Información .2020 &copy;</div>
    </div>
@stop
