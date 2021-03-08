@extends('adminlte::page')

@section('title', 'Resultado de adeudos')

@section('content_header')
@stop

@section('content')
    <style>
        .color-letra{
            color: grey !important;
        }
        .color-letra.active{
            color: darkgreen !important;
        }
    </style>
<div class="container">
    <div class="card">
        <div class="card-header alert-success alert">
            <h4>Adeudos de la placa: {{$respuesta['placa']}}</h4>
        </div>
        <div class="card-body">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    @foreach($respuesta as $i => $v)
                        @if($i ==='placa')
                        @elseif($i === 'mensaje_tenencia')
                        @elseif($i === 'adeudo_tenencia')
                            <a class="nav-item nav-link active color-letra" id="nav-{{$i}}-tab" data-toggle="tab" href="#nav-{{$i}}" role="tab" aria-controls="nav-{{$i}}" aria-selected="true">{{str_replace('_',' ',strtoupper($i))}}</a>
                        @else
                            <a class="nav-item nav-link color-letra" id="nav-{{$i}}-tab" data-toggle="tab" href="#nav-{{$i}}" role="tab" aria-controls="nav-{{$i}}" aria-selected="false">{{str_replace('_',' ',strtoupper($i))}}</a>
                        @endif
                    @endforeach
                </div>
            </nav>

            <div class="tab-content" id="myTabContent">
                @foreach($respuesta as $i => $v)
                    @if($i ==='placa')
                    @elseif($i === 'adeudo_tenencia')
                        <div class="tab-pane fade show active" id="nav-{{$i}}" role="tabpanel" aria-labelledby="nav-{{$i}}-tab">
                            <div class="card">
                                <div class="card-header bg-light">
                                    Estatus de Tenencia
                                </div>
                                <div class="card-body">
                                    @if(!$v)
                                        <h5 class="card-title">La placa {{$respuesta['placa']}} tiene la tenencia al corriente</h5>
                                    @else
                                        <h5 class="card-title">La placa {{$respuesta['placa']}} tiene tenencia pendiente</h5>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @elseif($i === 'adeudo_sancion')
                        <div class="tab-pane fade" id="nav-{{$i}}" role="tabpanel" aria-labelledby="nav-{{$i}}-tab">
                            <div class="card">
                                <div class="card-header bg-light">
                                    Estatus de Sancion
                                </div>
                                <div class="card-body">
                                    @if($v)
                                        <h5 class="card-title">La placa {{$respuesta['placa']}} tiene sanción</h5>
                                    @else
                                        <h5 class="card-title">La placa {{$respuesta['placa']}} no tiene sanción</h5>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @elseif($i === 'adeudo_infraccion')
                        <div class="tab-pane fade" id="nav-{{$i}}" role="tabpanel" aria-labelledby="nav-{{$i}}-tab">
                            <div class="card">
                                <div class="card-header bg-light">
                                    Estatus de Multas
                                </div>
                                <div class="card-body">
                                    @if(!$v)
                                        <h5 class="card-title">La placa {{$respuesta['placa']}} tiene multas pendientes</h5>
                                    @else
                                        <h5 class="card-title">La placa {{$respuesta['placa']}} no tiene multas pendientes</h5>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @elseif($i === 'verifica')
                        <div class="tab-pane fade" id="nav-{{$i}}" role="tabpanel" aria-labelledby="nav-{{$i}}-tab">
                            <div class="card">
                                <div class="card-header bg-light">
                                    Estatus de Verificación
                                </div>
                                <div class="card-body">
                                    <table>

                                    </table>
                                    @if($v)
                                        <h5 class="card-title">La placa {{$respuesta['placa']}} puede verificar</h5>
                                    @else
                                        <h5 class="card-title">La placa {{$respuesta['placa']}} tiene una sancion y no puede verificar</h5>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @elseif($i === 'economicas')
                        <div class="tab-pane fade" id="nav-{{$i}}" role="tabpanel" aria-labelledby="nav-{{$i}}-tab">
                            <div class="card">
                                <div class="card-header bg-light">
                                    Multas economicas
                                </div>
                                <div class="card-body">
                                    @if(count($v) <= 0)
                                        <h5 class="card-title">La placa {{$respuesta['placa']}} No tiene multas pendientes</h5>
                                    @else
                                        <table class="table table-striped">
                                            <tr style="font-weight: bold">
                                                <td>Folio</td><td>Fecha</td><td>Estatus</td>
                                            </tr>
                                        @foreach($v as $indice => $valor)
                                            <tr>
                                                <td>{{$valor['folio']}}</td>
                                                <td>{{$valor['fecha']}}</td>
                                                <td>{{$valor['status']}}</td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @elseif($i === 'adeudo_fotocivicas')
                        <div class="tab-pane fade" id="nav-{{$i}}" role="tabpanel" aria-labelledby="nav-{{$i}}-tab">
                            <div class="card">
                                <div class="card-header bg-light">
                                    Adeudo fotocivicas
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <tr style="font-weight: bold">
                                            <td>Puntos</td><td>Debe fotocivicas</td><td>Debe asistir precencial</td>
                                            <td>Debe realizar curso en linea</td>
                                        </tr>
                                        <tr>
                                            @foreach($v as $indice => $valor)
                                                @if($indice=='puntos')
                                                    <td>{{$valor}}</td>
                                                @else
                                                    <td>{{$valor?'SI':'NO'}}</td>
                                                @endif

                                            @endforeach
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @elseif($i === 'sanciones')
                        <div class="tab-pane fade" id="nav-{{$i}}" role="tabpanel" aria-labelledby="nav-{{$i}}-tab">
                            <div class="card">
                                <div class="card-header bg-light">
                                    Sanciones
                                </div>
                                <div class="card-body">
                                    @if(count($v) <= 0)
                                        <h5 class="card-title">La placa {{$respuesta['placa']}} No tiene sanciones</h5>
                                    @else
                                        <table class="table table-striped">
                                            <tr style="font-weight: bold">
                                                <td>Folio</td><td>Fecha</td><td>Estatus</td>
                                            </tr>
                                            @foreach($v as $indice => $valor)
                                                <tr>
                                                    <td>{{$valor['folio']}}</td>
                                                    <td>{{$valor['fecha']}}</td>
                                                    <td>{{$valor['status']}}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @elseif($i === 'tenencias')
                        <div class="tab-pane fade" id="nav-{{$i}}" role="tabpanel" aria-labelledby="nav-{{$i}}-tab">
                            <div class="card">
                                <div class="card-header bg-light">
                                    Estatus de Tenencias
                                </div>
                                <div class="card-body">
                                    @if(count($v) <= 0)
                                        <h5 class="card-title">La placa {{$respuesta['placa']}} no debe tenencias</h5>
                                    @else
                                        <h5>{{$respuesta['mensaje_tenencia']}}</h5>
                                        <table class="table table-striped">
                                            @foreach($v as $indice => $valor)
                                                <tr>
                                                    <td>Año</td><td>{{$valor}}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="btn btn-block btn-outline-primary" id="enviar_form" href="{{url('adeudos/buscar_adeudos')}}">Descargar PDF</div>
            </div>
            <div class="col-md-6">
                <a class="btn btn-block btn-outline-secondary" href="{{url('adeudos/buscar_adeudos')}}">Regresar</a>
            </div>
        </div>
        <form action="{{route('imprime.historial.adeudos')}}" method="post" id="form_datos" target="_blank" >
            @csrf
            <input type="hidden" name="datos_adeudos" id="datos_adeudos" value="{{json_encode($respuesta)}}">
        </form>

    </div>
</div>


@stop
@section('js')
    <script>
        $('#enviar_form').on('click',function (){
            $('#form_datos').submit();
        })
    </script>
@stop
@section('footer')
    <div class="row">
        <div class="col" style="font-weight: bold;">Secretaría de Movilidad de la Ciudad de México </div>
        <div class="col">Dirección de Sistemas de Información .2020 &copy;</div>
    </div>

@stop
