@extends('adminlte::page')

@section('title', 'Resultados de la busqueda')

@section('content_header')
    {{--    <h1 class="m-0 text-dark">Resultados por {{str_replace('_',' ',$campo)}}</h1>--}}
    <h1 style="font-weight: bold">Selecciona el nombre del cual deseas ver los datos:</h1>
@stop

@section('content')

    <div id="accordion">
        @foreach($datos as $indice => $v)

        <div class="card">
            <div class="card-header" id="heading{{$indice}}">
                <h5 class="mb-0">
                    <h5>Nombre:</h5>
                    <div class="input-group-preapend" >
                        <input type="text" class="form-control" value="{{$datos[$indice]['nombre']}}  {{$datos[$indice]['paterno']}}  {{$datos[$indice]['materno']}}  ({{$datos[$indice]['curp']}}) " readonly>
                    </div>
                    <br>
                    <button class="btn btn-outline-success" data-toggle="collapse" data-target="#collapse{{$indice}}" aria-expanded="false" aria-controls="collapse{{$indice}}">
                        <label>Ver licencia tipo:  {{$datos[$indice]['tipo_licencia']}} <i class="fas fa-search"></i></label>
                    </button>

                </h5>
            </div>


            <div class="row collapse" id="collapse{{$indice}}" aria-labelledby="heading{{$indice}}" data-parent="#accordion">
                <div class=" container col-md-4">
                    <div class="card" style="width:auto">
                        <div class="card-header">
                            <h2>Datos Personales:</h2>
                        </div>
                            <div class="card-body">
                                <h4 class="card-title"></h4>
                                <label>Nombre:</label>
                                <div class="input-group-prepend">
                                    <input type="text" class="form-control" value="{{$datos[$indice]['nombre']}}" readonly>
                                </div>
                                <label>Apellido Paterno:</label>

                                <div class="input-group-prepend">
                                    <input type="text" class="form-control" value="{{$datos[$indice]['paterno']}}" readonly>
                                </div>
                                <label>Apellido Materno:</label>

                                <div class="input-group-prepend">
                                    <input type="text" class="form-control" value="{{$datos[$indice]['materno']}}" readonly>
                                </div>
                                <label>CURP:</label>

                                <div class="input-group-prepend">
                                    <input type="text" class="form-control" value="{{$datos[$indice]['curp']}}" readonly>
                                </div>
                                <label>Fecha de Nacimiento:</label>

                                <div class="input-group-prepend">
                                    <input type="text" class="form-control" value="{{$datos[$indice]['fecha_nacimiento']}}" readonly>
                                </div>
                                <label>Telefono:</label>

                                <div class="input-group-prepend">
                                    <input type="text" class="form-control" value="{{$datos[$indice]['telefono']}}" readonly>
                                </div>
                            </div>

                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card rounded-0">
                        <div class="card-header">
                            <h2>Datos de licencia:</h2>
                        </div>
                        <div class="card-body">
                            <label>Folio de Licencia:</label>
                            <div class="input-group-prepend">
                                <input type="text" class="form-control" value="{{$datos[$indice]['folio']}}" readonly>
                            </div>
                            <label>Tipo de Licencia:</label>
                            <div class="input-group-prepend">
                                <input type="text" class="form-control" value="{{$datos[$indice]['tipo_licencia']}}" readonly>
                            </div>
                            <label>Fecha de inicio:</label>
                            <div class="input-group-prepend">
                                <input type="text" class="form-control" value="{{substr($datos[$indice]['fecha_expedicion'],0,10)}}" readonly>
                            </div>
                            <label>Fecha de fin:</label>
                            <div class="input-group-prepend">
                                <input type="text" class="form-control" value="{{substr($datos[$indice]['fecha_vencimiento'],0,10)}}" readonly>
                            </div>
                            <label>Vigencia:</label>
                            <div class="input-group-prepend">
{{--                                <input type="text" class="form-control" value="{{(int)(substr($datos[$indice]['fecha_vencimiento'],7,10))-(int)(substr($datos[$indice]['fecha_expedicion'],7,10))}} años" readonly>--}}
                            </div>
                        </div>
                        <div class="card-footer">
                            <h2>Candados:</h2>
                            <hr>
                            <div class="card">
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Estado</th>
                                            <th>Razón</th>
                                            <th>Folio</th>
                                            <th>Fecha inicio</th>
                                            <th>Fecha fin</th>
                                        </tr>
                                        </thead>

{{--                                        <tbody>--}}
{{--                                        @if(isset($candados[0]))--}}
{{--                                            @foreach($candados as $candado)--}}
{{--                                                <tr>--}}
{{--                                                    <td>{{$candado['status']}}</td>--}}
{{--                                                    <td>{{$candado['motivo']}}</td>--}}
{{--                                                    <td>{{$candado['folioLicencia']}}</td>--}}
{{--                                                    <td>{{$candado['fechaInicio']}}</td>--}}
{{--                                                    <td>{{$candado['fechaTermino']}}</td>--}}
{{--                                                </tr>--}}
{{--                                            @endforeach--}}
{{--                                        @elseif(isset($candados['errCode']) && $candados['errCode'] == 404)--}}
{{--                                            <tr>--}}
{{--                                                <td colspan="5"><h4 style="text-align: center">{{$candados['errMessage']}}</h4></td>--}}
{{--                                            </tr>--}}

{{--                                        @else--}}
{{--                                            <tr>--}}
{{--                                                <td>{{$candados['status']}}</td>--}}
{{--                                                <td>{{$candados['motivo']}}</td>--}}
{{--                                                <td>{{$candados['folioLicencia']}}</td>--}}
{{--                                                <td>{{$candados['fechaInicio']}}</td>--}}
{{--                                                <td>{{$candados['fechaTermino']}}</td>--}}
{{--                                            </tr>--}}
{{--                                        @endif--}}
{{--                                        </tbody>--}}


                                    </table>

                                </div>
                            </div><br><br>
                            <h2>Historial:</h2>

                            <div class="card">
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Movimiento</th>
                                            <th>Tipo Lic</th>
                                            <th>Folio Lic</th>
                                            <th>Vigencia</th>
                                            <th>Fecha inicio</th>
                                            <th>Fecha fin</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($datos as $licencia)
                                            <tr>
                                                <td>{{$licencia['tipo_movimiento']}}</td>
                                                <td>{{$licencia['tipo_licencia']}}</td>
                                                <td>{{$licencia['folio']}}</td>
                                                <td>{{Str::limit($licencia['fecha_vencimiento'],10, '')}}</td>
                                                <td>{{Str::limit($licencia['fecha_expedicion'],10, '')}}</td>
                                                <td>{{Str::limit($licencia['fecha_vencimiento'],10, '')}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <div>
                            <form action="{{route('ImprimeSabanaLicencia')}}" method="post" id="datos" target="_blank" >
                                @csrf
                                <input type="submit" class="btn btn-success btn-block" value="Generar Sabana">
                                <input type="hidden" name="folio" id="folio" value="{{$datos[$indice]['folio']}}">
{{--                                <input type="hidden" name="tipo_lic" id="tipo_lic" value="{{$datos[$indice]['tipo_licencia']}}">--}}
                                    <input type="hidden" name="curp" id="curp" value="{{$dataCurp}}">
                            </form>
                        </div>
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
