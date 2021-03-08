@extends('adminlte::page')

@section('title', 'Resultados de la busqueda')

@section('content_header')
    <h1 class="m-0 text-dark">Resultados por {{str_replace('_',' ',$campo)}}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-light" id="listado" style="width:100%">
                <thead>
                    <tr>
                        <th>Modelo</th>
                        <th>Estatus</th>
                        <th>Placa</th>
                        <th>Tipo</th>
                        <th>Serie Vehicular</th>
                        <th>Fecha ultimo movimiento</th>
                        <th>Nombre/Razon social</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($respuesta as $r)
                    <tr>
                        <td>{{$r['modelo']}}</td>
                        <td>{{$r['estatus']}}</td>
                        <td>{{$r['placa']}}</td>
                        <td>{{$controles[$r['control_vh']]}}</td>
                        <td>{{$r['serie_vh']}}</td>
                        <td>{{substr($r['created_at'],0,10)}}</td>
                        <td>{{($r['razon_social']!='')?$r['razon_social']:$r['nombre'].' '.$r['paterno'].' '.$r['materno']}}</td>
                        <td><a target="_blank" class="btn btn-outline-dark" href="{{url('sabanas/generaSabana/'.$r['linea_captura'])}}" target="_self">Ver sabana</a></td>
                    </tr>

                @endforeach
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
    </div>
@stop
@section('js')

    <script>
        $(document).ready( function () {
            $('#listado').DataTable({
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });
        } );
    </script>

@stop
@section('footer')
    <div class="row">
        <div class="col" style="font-weight: bold;">Secretaría de Movilidad de la Ciudad de México </div>
        <div class="col">Dirección de Sistemas de Información .2020 &copy;</div>
    </div>

@stop
