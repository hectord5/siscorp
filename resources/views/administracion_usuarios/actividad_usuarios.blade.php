@extends('adminlte::page')

@section('title', 'SISCORP')

@section('content_header')
<h3 class="text-bold">ACTIVIDAD DE LOS USUARIOS</h3>
@stop

@section('content')
    <div class="card row p-3">
        <div class="col-12 table-responsive">
            <table class="table table-striped" id="t-lista" style="width:100%">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Área</th>
                    <th>Consulta</th>
                    <th>Tipo de Consulta</th>
                    <th>Fecha de consulta</th>

                </tr>
                </thead>
                <tbody>
                    @foreach($bitacoras as $b)
                        <tr>
                            <td>{{$b->username}}</td>
                            <td>{{$b->texto}}</td>
                            <td>{{$b->consulta}}</td>
                            <td>{{$b->tipo_consulta}}</td>
                            <td>{{$b->fecha_consulta}}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
    </div>
@stop
@section('footer')

@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#t-lista').DataTable(
                {
                    "language": {
                        "sProcessing":     "Procesando...",
                        "sLengthMenu":     "Mostrar _MENU_ registros",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "Ningún dato disponible en esta tabla",
                        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix":    "",
                        "sSearch":         "Buscar:",
                        "sUrl":            "",
                        "sInfoThousands":  ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst":    "Primero",
                            "sLast":     "Último",
                            "sNext":     "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        },
                        "buttons": {
                            "copy": "Copiar",
                            "colvis": "Visibilidad"
                        }
                    }
                }
            );
        } );
    </script>
@stop
