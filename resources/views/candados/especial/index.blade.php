{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Candados Especial')

@section('content_header')
    <h1 class="text-bold">CANDADOS: ESPECIAL</h1>
@endsection

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="row justify-content-center align-items-center">
        <div class="col-8 col-sm-8 col-lg-8">
            <div id="accordion">
                <div class="card">
                    <div class="card-header bg-gradient-navy">
                        <h3 class="text-center text-bold">CANDADOS ACTIVOS</h3>
                    </div>
                    <div id="collapseOne" class="panel-collapse active">
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-id-card"></i></span>
                                                </div>
                                                <input type="text" name="searchplaca" id="searchplaca" class="text-uppercase form-control" placeholder="Placa">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-id-badge"></i></span>
                                                </div>
                                                <input type="text" name="searchserievh" id="searchserievh" class="text-uppercase form-control" placeholder="Serie Vehicular">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <button type="button" class="btn bg-secondary btn-block" id="bt-pt-search">BUSCAR</button>

                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="table-responsive">
                                <table id="tablaparticular" class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th style="display: none">ID</th>
                                        <th>SERIE</th>
                                        <th>PLACA</th>
                                        <th>OFICIO</th>
                                        <th>CANDADO</th>
                                        <th>USUARIO</th>
                                        <th>FECHA</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody id="llenartabla"></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <btn data-toggle="collapse" data-parent="#accordion"  id="accordionloadlist" href="#collapseTwo" class="btn bg-gradient-navy btn-block">
                            ACTIVAR CANDADO
                        </btn>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Tipo de Candado:</label>
                                            <div class="input-group">
                                                <select name="cvecandado" id="cvecandado" class="form-control">
                                                </select>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Placa:</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-id-card"></i></span>
                                                </div>
                                                <input type="text" name="placa" id="placa" class="text-uppercase form-control" placeholder="Placa">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Serie Vehicular:</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-id-badge"></i></span>
                                                </div>
                                                <input type="text" name="serievh" id="serievh" class="text-uppercase form-control" placeholder="Serie Vehicular">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Número de Oficio:</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-arrow-alt-circle-right"></i></span>
                                                </div>
                                                <input type="text" name="noficio" id="noficio" class="text-uppercase form-control" placeholder="Número de Oficio">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <div class="form-group">
                                <button type="button" class="btn btn-secondary btn-block" id="bt-pt-alta">ACEPTAR</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@section('css')

@stop

@section('js')
    <script>
        $('#tablaparticular').hide();

        $('.select2').select2();


        $('#accordionloadlist').on('click', function () {
            var cvecandado = $('#cvecandado');
            html = '<option value="default" selected>--</option>';
            cvecandado.html(html);
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "{{route('candados.particular.lista')}}",
                type: "GET",

                success: function (registros) {
                    $.each(registros, function (index, registro) {
                        html = html + '<option value=\"' + registro.cvecand + '\">' + registro.dsc + '</option>';
                    });
                    cvecandado.html(html);
                }
            });

        });

        $("#tablaparticular").on('click','.btnDelete',function(){
            // get the current row
            var currentRow = $(this).closest("tr")[0];

            var rowCells = $(this).closest("tr").children();
            var firstCell = rowCells.eq( 0 ).text();

            Swal.fire({
                title: '¿Estas seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCloseButton: true,
                confirmButtonText: '!Si, continuar!'
            }).then((result) => {
                if (result.value) {
                    Swal.fire({
                        icon: 'info',
                        title: "Oficio de Baja",
                        text: "Por favor indica el número de oficio de baja",
                        input: 'text',
                        showCloseButton: true,
                        confirmButtonText: '¡Dar de baja!',
                        footer: '<code>Recuerda que ya no podrás revertir esto</code>'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                url: "{{route('candados.particular.baja.candado')}}",
                                type: "POST",
                                data:{"rowid":firstCell,"oficiobaja":result.value},

                                success: function (resultado) {
                                    if(resultado.errCode == 0)
                                    {
                                        searchInTable();
                                        Swal.fire(
                                            'Exito...',
                                            '¡Candado dado de baja correctamente!',
                                            'success'
                                        )
                                    }else{
                                        Swal.fire(
                                            'Lo sentimos...',
                                            resultado.errMsg,
                                            'error'
                                        )
                                    }
                                },
                                error: function (e) {
                                    Swal.fire(
                                        'Lo sentimos...',
                                        '¡Algo salio mal, favor de reintentar!',
                                        'error'
                                    )
                                }
                            });
                        }else{
                            Swal.fire(
                                'Error',
                                'Valide correctamente el número de oficio',
                                'error'
                            )
                        }
                    });
                }
            })


        });

        $('#bt-pt-search').on('click', function () {
            searchInTable();
        });

        $('#bt-pt-alta').on('click', function () {
            var placa = $('#placa').val();
            var serievh = $('#serievh').val();
            var noficio = $('#noficio').val();
            var cvecandado = $('#cvecandado').val();
            html = '';

            var validacion = validaciones(placa,serievh,noficio,cvecandado);

            if(validacion){
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: "{{route('candados.particular.alta.candado')}}",
                    type: "POST",
                    data:{"placa":placa,"serievh":serievh,"noficio":noficio,"cvecandado":cvecandado},

                    success: function (resultado) {
                        if(resultado.errCode == 0)
                        {
                            Swal.fire(
                                'Exito',
                                '¡Candado creado correctamente!',
                                'success'
                            )
                        }else{
                            Swal.fire(
                                'Error',
                                resultado.errMsg,
                                'error'
                            )
                        }
                    },
                    error: function (e) {
                        console.log(e);
                        Swal.fire(
                            'Error',
                            '¡Algo salio mal, favor de reintentar!',
                            'error'
                        )
                    }
                });
            }
        });

        function  searchInTable() {
            var searchplaca = $('#searchplaca').val();
            var searchserievh = $('#searchserievh').val();
            var llenartabla =  $('#llenartabla');
            html = '';

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "{{route('candados.particular.busca.candado')}}",
                type: "POST",
                data:{"placa":searchplaca,"serievh":searchserievh},

                success: function (registros) {
                    $.each(registros, function (index, registro) {
                        if(registro.estatus == 'A') {
                            html = html + '<tr>' +
                                '<td style="display: none">' + registro.rowid + '</td>' +
                                '<td>' + registro.serievh + '</td>' +
                                '<td>' + registro.placa + '</td>' +
                                '<td>' + registro.oficio_no + '</td>' +
                                '<td>' + registro.cvecand + '</td>' +
                                '<td>' + registro.usr_candado + '</td>' +
                                '<td>' + registro.feccand + '</td>' +
                                '<td><a class="btn btn-danger btnDelete" href=\"#\">Dar de baja</a></td>' +
                                '</tr>';
                        }
                    });
                    llenartabla.html(html);
                    $('#tablaparticular').show(500);
                },
                error: function () {
                    Swal.fire(
                        'Error',
                        '¡Algo salio mal, favor de reintentar!',
                        'error'
                    )
                }
            });
        }

        function validaciones(placa,serievh,noficio,cvecandado) {
            var validacion = false;
            if(placa === null || placa === undefined || placa === ''){
                Swal.fire(
                    'Advertencia',
                    '¡Por favor especifique la Placa!',
                    'warning'
                )
            }else if(serievh === null || serievh === undefined || serievh === ''){
                Swal.fire(
                    'Advertencia',
                    '¡Por favor especifique la Serie Vehicular!',
                    'warning'
                )
            }else if(noficio === null || noficio === undefined || noficio === ''){
                Swal.fire(
                    'Advertencia',
                    '¡Por favor especifique el Número de Oficio!',
                    'warning'
                )
            }else if(cvecandado === 'default'){
                Swal.fire(
                    'Advertencia',
                    '¡Por favor seleccione un tipo de candado!',
                    'warning'
                )
            }else{
                validacion = true;
            }
            return validacion;
        }
    </script>
@stop
