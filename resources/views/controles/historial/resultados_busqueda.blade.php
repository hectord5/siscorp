@extends('adminlte::page')

@section('title', 'SISCORP')

@section('content_header')

@stop

@section('content')
    <style>
        .table td, .table th {
            padding: .25rem !important;
            vertical-align: top;
            border-top: 0 solid #dee2e6 !important;
        }

    </style>
    <div class="row table-responsive">
        <div class="col-md-12">
            <h3>DATOS DEL VEHICULO</h3>
            <table class="table table-striped">
                <thead>
                <tr class="bg-success">
                    <th>NIV</th>
                    <th>Modelo</th>
                    <th>Número de motor</th>
                    <th>Clave Vehicular</th>
                    <th>REPUVE</th>
                    <th>Tipo de Vehiculo</th>
                    <th>Importe de factura</th>
                    <th>Marca</th>
                    <th>Fecha de Factura</th>
                    <th>Linea</th>
                    <th>Número de factura</th>
                    <th>Versión</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{$datos[0]['serie_vh']}}</td>
                    <td>{{$datos[0]['modelo']}}</td>
                    <td>{{$datos[0]['numero_motor']}}</td>
                    <td>{{$datos[0]['clave_vehicular']}}</td>
                    <td>{{$datos[0]['repuve']}}</td>
                    <td>{{$datos[0]['clave_tipo']}}</td>
                    <td>{{$datos[0]['importe_factura']}}</td>
                    <td>{{$datos[0]['marca_empresa']}}</td>
                    <td>{{$datos[0]['fecha_factura']}}</td>
                    <td>{{$datos[0]['linea_modelo']}}</td>
                    <td>{{$datos[0]['folio_factura']}}</td>
                    <td>{{$datos[0]['ver_version']}}</td>
                </tr>
                </tbody>
                <tfooter></tfooter>
            </table>
        </div>
    </div>
    <div class="row table-responsive ">
        <div class="col-md-12 ">
            <h3 style="color:#263223">HISTORIAL DE MOVIMIENTOS</h3>

                @foreach($datos as $indice=>$movimiento)

                <table class="table table-striped" style="font-size: 12px">
                    <thead></thead>
                    <tbody>
                    <tr style="text-align: center;background:{{getColorTabla($indice)}};color:#FFFFFF"><td style="text-align: center;background:{{getColorTabla($indice)}};color:#FFFFFF; font-size: 16px; width: 10px"></td><td colspan="4" >Datos del trámite</td></tr>
                    <tr>
                        <td style="text-align: center;background:{{getColorTabla($indice)}};color:#FFFFFF; font-size: 16px; width: 10px"></td><td style="font-weight: bold; width: 150px">Placa</td><td style="width: 150px">{{$movimiento['placa']}}</td><td style="font-weight: bold; width: 150px">Placa anterior</td><td style="width: 150px">{{$movimiento['placa_anterior']}}</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;background:{{getColorTabla($indice)}};color:#FFFFFF; font-size: 16px; width: 10px"></td><td style="font-weight: bold; width: 150px">Clave Vehicular</td><td style="width: 150px">{{$movimiento['clave_vehicular']}}</td><td style="font-weight: bold; width: 150px">NIV</td><td style="width: 150px">{{$movimiento['serie_vh']}}</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;background:{{getColorTabla($indice)}};color:#FFFFFF; font-size: 16px; width: 10px"></td><td style="font-weight: bold; width: 150px">Estatus</td><td style="width: 150px">{{$movimiento['estatus']}}</td><td style="font-weight: bold; width: 150px">Folio logico</td><td style="width: 150px">{{$movimiento['folio_logico_tc']}}</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;background:{{getColorTabla($indice)}};color:#FFFFFF; font-size: 16px; width: 10px"></td><td style="font-weight: bold; width: 150px">Folio fisico</td><td style="width: 150px">{{$movimiento['folio_fisico_tc']}}</td><td style="font-weight: bold; width: 150px">Procedencia</td><td style="width: 150px">{{$movimiento['procedencia']}}</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;background:{{getColorTabla($indice)}};color:#FFFFFF; font-size: 16px; width: 10px"></td><td style="font-weight: bold; width: 150px">Fecha expedicion</td><td style="width: 150px">{{$movimiento['expedicion_tc']}}</td><td style="font-weight: bold; width: 150px">Fecha de alta</td><td>{{substr(end($datos)['vehiculo_created_at'],0,10)}}</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;background:{{getColorTabla($indice)}};color:#FFFFFF; font-size: 16px; width: 10px"></td><td style="font-weight: bold; width: 150px">Fecha MOV</td><td style="width: 150px">{{$movimiento['created_at']}}</td><td style="font-weight: bold; width: 150px">Modulo MOV</td><td style="width: 150px">{{$movimiento['modulo']}}</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;background:{{getColorTabla($indice)}};color:#FFFFFF; font-size: 16px; width: 10px"></td><td style="font-weight: bold; width: 150px">Movimiento T</td><td style="width: 150px">{{$movimiento['tipo_movimiento']}}</td><td style="font-weight: bold; width: 150px">Modulo T.</td><td style="width: 150px">{{$movimiento['modulo']}}</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;background:{{getColorTabla($indice)}};color:#FFFFFF; font-size: 16px; width: 10px"></td><td style="font-weight: bold; width: 150px">Revisor</td><td style="width: 150px">{{$movimiento['curp_operador']}}</td><td style="font-weight: bold; width: 150px">RFC</td><td style="width: 150px">{{$movimiento['rfc']}}</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;background:{{getColorTabla($indice)}};color:#FFFFFF; font-size: 16px; width: 10px"></td><td style="font-weight: bold; width: 150px">Nombre</td><td style="width: 150px">{{$movimiento['nombre']}}</td><td style="font-weight: bold; width: 150px">Ap.Paterno</td><td style="width: 150px">{{$movimiento['paterno']}}</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;background:{{getColorTabla($indice)}};color:#FFFFFF; font-size: 16px; width: 10px"></td><td style="font-weight: bold; width: 150px">Ap.Materno</td><td style="width: 150px">{{$movimiento['materno']}}</td><td style="font-weight: bold; width: 150px">Razon Social</td><td style="width: 150px">{{$movimiento['razon_social']}}</td>
                    </tr>
                    </tbody>
                    <tfooter></tfooter>
                </table>

                @endforeach

        </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 btn btn-outline-success" onclick="enviar()">IMPRIMIR HISTORIAL</div>
    </div>
    <form action="{{route('imprime.historial')}}" method="post" id="datos" target="_blank" >
        @csrf
        <input type="hidden" name="datos_historial" id="datos_historial" value="{{json_encode($datos)}}">
    </form>
@stop
@section('footer')
    <div class="row">
        <div class="col" style="font-weight: bold">Secretaría de Movilidad de la Ciudad de México </div>
        <div class="col">Dirección de Sistemas de Información .2020 &copy;</div>
    </div>
@stop

@section('js')
    <script>
        function enviar(){
            {{--var datos = $('#datos_historial').val(@json($datos));--}}
            {{--const user = {!! json_encode($datos) !!};--}}
            // console.log(user);
            // console.log(JSON.parse(datos.val()));
            $('#datos').submit();
        }
    </script>
@stop
