{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Candados')

@section('content_header')
    <h1 class="text-bold">CANDADOS: TAXI</h1>
@endsection

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col-8 col-sm-8 col-lg-8">
            <form >
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <div id="accordion">
                    <div class="card">
                            <div class="card-header bg-gradient-pink">
                                <h3 class="text-center text-bold">CANDADOS ACTIVOS</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Placa:</label>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-id-card"></i></span><br>
                                            <input type="text" class="text-uppercase form-control" placeholder="A0000A" id="placa_taxi">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Folio Taxi:</label>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-id-card"></i></span><br>
                                            <input type="number" class="text-uppercase form-control" placeholder="123456" id="folio_taxi">
                                        </div>
                                    </div>
                                </div>
                                <br><input  type="button" class="btn btn-secondary btn-block bg-gradient-secondary" value="Buscar" id="btn_taxi" name="btn_taxi"><br><br>
                                <div class="input-group" id="datos_taxi" name="datos_taxi">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Listado de Candados</h3>
                                        </div>
                                        <div class="card-body table-responsive p-0" id="here_mytable">
                                            <table class="table table-hover table-bordered" id="table_candadoTaxi" name="table_candadoTaxi">
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="btn btn-block bg-gradient-pink text-bold">
                                    Activar Candados
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Esta sección está destinada a la activación de candados ingresando los campos que son solicitados. Favor de prestar
                                                    atención al llenar dicho candado.</label><br><br>
                                                <div>
                                                    <label>Se desea aplicar un candado del tipo: </label>
                                                    <select id="txt_candado" name="txt_candado" required autofocus  class="form-control">
                                                        <option value="UNICAMENTE PODRA HACER MOVIMIENTOS EN CONTROL VEHICULAR POR EL TITULAR">UNICAMENTE PODRA HACER MOVIMIENTOS EN CONTROL VEHICULAR POR EL TITULAR</option>
                                                        <option value="REGISTRO PUBLICO BASE 333">REGISTRO PUBLICO BASE 333</option>
                                                        <option value="POR SOLICITUD DE DIRECCION GENERAL DEL TAXI">POR SOLICITUD DE DIRECCION GENERAL DEL TAXI</option>
                                                        <option value="CANDADO TEMPORAL">CANDADO TEMPORAL</option>
                                                        <option value="POR SOLICITUD DE JUEZ DE LO FAMILIAR">POR SOLICITUD DE JUEZ DE LO FAMILIAR</option>
                                                        <option value="ROBO DE DOCUMENTOS">ROBO DE DOCUMENTOS</option>
                                                        <option value="EXTRAVIO DE PLACAS, ENGOMADO Y DOCUMENTOS">EXTRAVIO DE PLACAS, ENGOMADO Y DOCUMENTOS</option>
                                                        <option value="EXTRAVIO DE LAMINA TRASERA DE TAXI">EXTRAVIO DE LAMINA TRASERA DE TAXI</option>
                                                        <option value="ROBO DE PLACAS DE TAXI">ROBO DE PLACAS DE TAXI</option>
                                                        <option value="ROBO DE VEHICULO">ROBO DE VEHICULO</option>
                                                        <option value="POR FALTA DE PAGO, CARTERA VENCIDA">POR FALTA DE PAGO, CARTERA VENCIDA</option>
                                                        <option value="POR INCIDENTE DE CUMPLIMIENTO DE PENSION ALIMENTICIA.">POR INCIDENTE DE CUMPLIMIENTO DE PENSION ALIMENTICIA.</option>
                                                        <option value="POR SOLICITUD DEL AGENTE DEL MINISTERIO PUBLICO DE LA FEDERACION ADSCRITO A LA UEIS DE LA SIEDO">POR SOLICITUD DEL AGENTE DEL MINISTERIO PUBLICO DE LA FEDERACION ADSCRITO A LA UEIS DE LA SIEDO</option>
                                                        <option value="REVISION POR CONTRALORIA (AUDITORIA)">REVISION POR CONTRALORIA (AUDITORIA)</option>
                                                        <option value="DIRECCION GENERAL 2010">DIRECCION GENERAL 2010</option>
                                                        <option value="CONFLICTO DE TITULARIDAD">CONFLICTO DE TITULARIDAD</option>
                                                        <option value="PROGRAMA DE SUSTITUCIÓN VEHICULAR 2013">PROGRAMA DE SUSTITUCIÓN VEHICULAR 2013</option>
                                                        <option value="ACTIVACION POR DELITO DE FRAUDE">ACTIVACION POR DELITO DE FRAUDE</option>
                                                        <option value="INICIO DE PROCEDIMIENTO DE REVOCACION DE CONCESION">INICIO DE PROCEDIMIENTO DE REVOCACION DE CONCESION</option>
                                                        <option value="ABUSO DE CONFIANZA">ABUSO DE CONFIANZA</option>
                                                        <option value="POR SOLICITUD DE DIRECCION GENERAL DE REGISTRO PUBLICO DEL TRANSPORTE">POR SOLICITUD DE DIRECCION GENERAL DE REGISTRO PUBLICO DEL TRANSPORTE</option>
                                                        <option value="CONCESION REVOCADA">CONCESION REVOCADA</option>
                                                        <option value="FALTA DE PAGOS DE CONCESION">FALTA DE PAGOS DE CONCESION</option>
                                                        <option value="ACTIVACION POR SOLICITUD DE OFICIO">ACTIVACION POR SOLICITUD DE OFICIO</option>
                                                    </select>
                                                    <label> a la concesión con placa: </label>
                                                    <input id="txt_placa" name="txt_placa" placeholder="A0000A" type="text" size="6"  maxlength="6" class="text-uppercase uppercase form-control"/>
                                                    <label >con folio taxi: </label>
                                                    <input id="txt_folio" name="txt_folio" placeholder="123456" type="text" size="6"  maxlength="7" class="text-uppercase form-control"/>
                                                    <label> obedeciendo al documento emitido por: </label>
                                                    <select id="txt_documento" name="txt_documento" required autofocus class="form-control">
                                                        <option value="MINISTERIO PUBLICO">MINISTERIO PUBLICO</option>
                                                        <option value="JUEZ DE LO FAMILIAR">JUEZ DE LO FAMILIAR</option>
                                                        <option value="DIRECCIÓN GENERAL DE ASUNTOS JURIDICOS">DIRECCIÓN GENERAL DE ASUNTOS JURÍDICOS</option>
                                                        <option value="PROCURADORIA GENERAL DE JUSTICIA">PROCURADORIA GENERAL DE JUSTICIA</option>
                                                        <option value="SUBDIRECCIÓN DE SEGUIMIENTO EN INTEGRACIÓN DE TRANSPORTE VEHICULAR">SUBDIRECCIÓN DE SEGUIMIENTO EN INTEGRACIÓN DE TRANSPORTE VEHICULAR</option>
                                                        <option value="INSTTITUTO DE DE VERIFICACIÓN ADMINISTRATIVA DE LA CIUDAD DE MÉXICO">INSTTITUTO DE DE VERIFICACIÓN ADMINISTRATIVA DE LA CIUDAD DE MÉXICO</option>
                                                        <option value="ÓRGANO DE CONTROL INTERNO">ÓRGANO DE CONTROL INTERNO</option>
                                                        <option value="OFICINA DEL C. SECRETARIO DE MOVILIDAD">OFICINA DEL C. SECRETARIO DE MOVILIDAD</option>
                                                        <option value="DIRECCIÓN GENERAL DE ATENCIÓN CIUDADANA">DIRECCIÓN GENERAL DE ATENCIÓN CIUDADANA</option>
                                                        <option value="CONCESIONARIOS">CONCESIONARIOS</option>
                                                    </select>
                                                    <label> con no. de oficio: </label>
                                                    <input id="txt_documento_folio" name="txt_documento_folio" placeholder="1234" type="text" size="6"  maxlength="12" required autofocus class="text-uppercase form-control"/>
                                                    <label> en el cual se expresan los motivos de: </label>
                                                    <textarea id="txt_motivos" name="txt_motivos" placeholder="motivo de aplicación de candado" type="textar" cols="125" maxlength="200" required autofocus class="text-uppercase form-control"></textarea>
                                                </div>
                                                <br><button type="button" class="btn btn-secondary btn-block bg-gradient-secondary" id="agregar_candado" name="agregar_candado">Agregar Candado</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
        <div class="modal fade" id="modalSubscriptionForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">¡Está apunto de desactivar un candado!</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="form3">Por favor ingresa el folio del taxi:</label>
                            <input type="text" id="folio_taxi_des" class="form-control validate">
                        </div>
                        <div class="md-form mb-4">
                            <label data-error="wrong" data-success="right" for="form2">Ingresa el número del tipo de candado</label>
                            <input type="email" id="folio_candado_des" class="form-control validate">
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-danger" onclick="desactivarCandados()">Aceptar <i class="fas fa-paper-plane-o ml-1"></i></button>
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
        $(document).ready(function () {
            //$('#table_candadoTaxi').DataTable();
        });
        $('.select2').select2();

        $('#datos_taxi').hide();
        $('#btn_taxi').on('click',function () {
            var placa = $("#placa_taxi").val();
            var folio = $("#folio_taxi").val();

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "{{route('candados.taxi.busca.candado')}}",
                type: "post",
                data: {
                    "placa": placa,
                    "folio_taxi": folio
                },
                success: function (data) {
                    //console.log(data.candados.length);
                    //var datos = $.parseJSON(data);
                    if (data.errCode == 0) {
                        if(data.candados.length != 0){
                            var content = ""
                            jQuery.each(data.candados,function(i,val){
                                if(val.desactivado == 'N'){
                                    var acciones = "\n" +
                                        "            <a href=\"\" class=\"btn btn-info btn-rounded mb-4\" data-toggle=\"modal\" data-target=\"#modalSubscriptionForm\">Desactivar</a>\n";
                                }else{var acciones = 'Inactivo';}
                                content += '<tr><th>Folio Taxi:</th><th>'+val.folio+'</th></tr>'+
                                            '<tr><th>Tipo Candado:</th><th>'+val.tipo_candado+'</th></tr>'+
                                            '<tr><th>Fecha Activación:</th><th>'+val.fecha_activacion+'</th></tr>'+
                                            '<tr><th>Referencia Activación:</th><th>'+val.referencia_activacion+'</th></tr>'+
                                            '<tr><th>Usuario Activacion:</th><th>'+val.usuario_activacion+'</th></tr>'+
                                            '<tr><th>Usuario Desactivación:</th><th>'+val.usuario_desbloqueo+'</th></tr>'+
                                            '<tr><th>Fecha Desactivación:</th><th>'+val.fecha_desbloqueo+'</th></tr>'+
                                            '<tr><th>Referencia Desbloqueo:</th><th>'+val.referencia_desbloqueo+'</th></tr>'+
                                            '<tr><th>Acciones:</th><th>'+acciones+'</th></tr>';
                            });
                            $('#table_candadoTaxi').append(content);
                            $('#datos_taxi').show(1000);
                        }else{
                            Swal.fire(
                                'La placa ingresada no cuenta con bloqueos administrativos.',
                                '',
                                'success'
                            )
                        }
                    } else {
                        Swal.fire(
                            data.errMsg,
                            '',
                            'error'
                        )
                    }
                }
            });
        });

        $('#agregar_candado').on('click',function (){
            var tipo_candado = $("#txt_candado").val();
            var placa = $("#txt_placa").val();
            var folio_taxi = $("#txt_folio").val();
            var documento = $("#txt_documento").val();
            var oficio = $("#txt_documento_folio").val();
            var motivo = $("#txt_motivos").val();

            if(tipo_candado != "" && placa != "" && folio_taxi != "" && documento != "" && oficio != "" && motivo != ""){
                Swal.fire({
                    title: 'Estás seguro que quieres activar el candado?',
                    text: "Se activará un cado a la placa "+placa,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, estoy seguro!'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            url: "{{route('candados.taxi.activa.candado')}}",
                            type: "post",
                            data: {
                                "tipo_candado":tipo_candado,
                                "placa":placa,
                                "folio_taxi":folio_taxi,
                                "documento":documento,
                                "oficio":oficio,
                                "motivo":motivo
                            },
                            success: function (data) {
                                //var datos = $.parseJSON(data)
                                if(data.errCode == 0){
                                    Swal.fire(
                                        'Activado!',
                                        'Se ha activado exitosamente el candado.',
                                        'success'
                                    )
                                }else{
                                    Swal.fire(
                                        'Error!',
                                        data.errMsg,
                                        'error'
                                    )
                                }
                            }
                        });
                    }
                })
            }else{
                Swal.fire(
                'Error',
                'Datos faltantes. Favor de revisar.',
                'error'
            )}
        });

        function desactivarCandados(){
            var taxi = $('#folio_taxi_des').val();
            var candado = $('#folio_candado_des').val();
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "{{route('candados.taxi.desactiva.candado')}}",
                type: "post",
                data: {
                    "taxi": taxi,
                    "candado": candado
                },success: function (data) {
                    //var datos = $.parseJSON(data);
                    if(data.errCode == 0){
                        Swal.fire(
                            'Activado!',
                            'Se ha desactivado exitosamente el candado.',
                            'success'
                        )
                    }else{
                        Swal.fire(
                            'Error!',
                            'No ha sido posible desactivar el candado.',
                            'error'
                        )
                    }
                }
            });
        }
    </script>
@stop
