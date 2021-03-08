{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Candados')

@section('content_header')
    <h1 class="text-bold">CANDADOS: LICENCIAS <i class="far fa-id-badge"></i> </h1>

@endsection

@section('content')
{{--    @if (count($errors) > 0)--}}
{{--        @php--}}
{{--            //dd($errors);--}}
{{--                $datos = json_decode($errors->default->get(0)[0]);--}}
{{--        @endphp--}}

{{--        @if($datos == null)--}}

{{--        @else--}}
{{--            <div class="panel yesPrint" id="div_error">--}}
{{--                <div class="panel-heading bg-danger-800">--}}
{{--                    <span class="text-bold fs-28 m-15">Error</span><br>--}}
{{--                </div>--}}
{{--                <div class="panel-body">--}}
{{--                    <span class="text-bold fs-24"> Errores en la solictud <span style="text-decoration: underline">{{date('d/m/Y')}}</span> .</span>--}}
{{--                </div>--}}
{{--                <div class="panel-footer">--}}
{{--                    <div class="text-center">--}}
{{--                        <button type="button" class="btn btn-xlg bg-danger-800 noPrint text-bold" onclick="imprimir()">--}}
{{--                            <span>Imprimir</span> <i class="icon-printer2 ml-10"></i>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endif--}}
{{--    @endif--}}

<div class="container-fluid">
    <div class="">
        <div class="row">
            <div class="col-6">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <div id="accordion">
                    <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->
                    <div class="card card-success">
                        <div class="card-header text-center">
                           <h3 class="text-bold">ACTIVAR CANDADOS</h3>

                        </div>
                        <div id="collapseOne" class="">
                            <div class="card-body">
                                <form id="modal_form_alta" action="{{route('candados.licencias.crea.candado')}}" method="POST">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>CURP suspendido</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                    </div>
                                                    <input type="text" class="text-uppercase form-control"  name="txt_curp_a" id="txt_curp_a"  placeholder="Curp..." autofocus required>
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Tipo de Licencia:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-file-alt"></i></span>
                                                    </div>
                                                    <select class="text-uppercase form-control" name="txt_tipo_lic_a" id="txt_tipo_lic_a" required>
                                                        <option selected="selected"></option>
                                                        <option value='A' >A</option>
                                                        <option value='B' >B</option>
                                                        <option value='C' >C</option>
                                                        <option value='D' >D</option>
                                                        <option value='E' >E</option>
                                                        <option value='E1_Apps' >Apps</option>
                                                        <option value='E2_Patrullas' >Patrulla</option>
                                                        <option value='E3_Ambulancias' >Ambulancias</option>
                                                        <option value='E4_Bomberos' >Bomberos</option>
                                                        <option value='E5_Escolar' >Escolar</option>
                                                        <option value='E6_Personal' >Personal</option>
                                                        <option value='E7_Turisitico' >Turistico</option>
                                                        <option value='E8_Valores' >Valores</option>
                                                        <option value='E9_Custodia' >Custodia</option>
                                                        <option value='E10_Internos' >Internos</option>
                                                        <option value='E11_Escolta' >Escolta</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Oficio</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-archive"></i></span>
                                                    </div>
                                                    <input type="text" class="text-uppercase form-control"  name="txt_oficio"  id="txt_oficio" placeholder="Oficio..." autofocus required>
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                        </div>
                                        <!-- /.col-lg-6 -->
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Juzgado</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-book"></i></span>
                                                    </div>
                                                    <input type="text" class="text-uppercase form-control"  name="txt_juzgado" id="txt_juzgado"  placeholder="Juzgado..." required >
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Juez</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-id-card"></i></span>
                                                    </div>
                                                    <input type="text" class="text-uppercase form-control"  name="txt_juez" id="txt_juez"  placeholder="Juez..." autofocus required>
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                        </div>
                                        <!-- /.col-lg-6 -->
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Turno</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-id-badge"></i></span>
                                                    </div>
                                                    <input type="text" class="text-uppercase form-control"  name="txt_turno" id="txt_turno" placeholder="Turno..." required >
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Fecha Inicio:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                                    </div>
                                                    <input type="date" class="text-uppercase form-control"  name="date_ini"  id="date_ini"   required>
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Fecha fin:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                                    </div>
                                                    <input type="date" class="text-uppercase form-control"  name="date_fin" id="date_fin" placeholder="Serie Vehicular" required>
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Folio suspendido</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                    </div>
                                                    <input type="text" class="text-uppercase form-control"  name="txt_folio" id="txt_folio" placeholder="Folio..." onKeyPress="return soloNumeros(event)" autofocus required>
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Observación:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-id-badge"></i></span>
                                                    </div>
                                                    <input type="text" class="text-uppercase form-control"  name="txt_observacion" id="txt_observacion" placeholder="Observación" required>
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <button class="btn btn-primary fs-18 bg-info-800 btn-xlg"  type="button"  onclick="inputs_requeridos_alta()">ACEPTAR</button>
                                        <a href="{{url('/')}}" class="btn  fs-18 bg-secondary btn-xlg">REGRESAR</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="text-bold text-center">DESACTIVAR CANDADOS</h3>
                    </div>
                    <div id="collapseTwo" class="">
                        <div class="card-body">
                            <form id="modal_form" action="{{url('candados.licencias.quita.candado')}}" method="POST">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Tipo de Licencia:</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="far fa-user"></i></span>
                                                        </div>
                                                        <select class="text-uppercase form-control" name="txt_tipo_lic" id="txt_tipo_lic" required>
                                                            <option selected="selected"></option>
                                                            <option value='A' >A</option>
                                                            <option value='B' >B</option>
                                                            <option value='C' >C</option>
                                                            <option value='D' >D</option>
                                                            <option value='E' >E</option>
                                                            <option value='E1_Apps' >Apps</option>
                                                            <option value='E2_Patrullas' >Patrulla</option>
                                                            <option value='E3_Ambulancias' >Ambulancias</option>
                                                            <option value='E4_Bomberos' >Bomberos</option>
                                                            <option value='E5_Escolar' >Escolar</option>
                                                            <option value='E6_Personal' >Personal</option>
                                                            <option value='E7_Turisitico' >Turistico</option>
                                                            <option value='E8_Valores' >Valores</option>
                                                            <option value='E9_Custodia' >Custodia</option>
                                                            <option value='E10_Internos' >Internos</option>
                                                            <option value='E11_Escolta' >Escolta</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>CURP /RFC :</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="far fa-id-badge"></i></span>
                                                        </div>
                                                        <input type="text" class="text-uppercase form-control"  name="txt_curp" id="txt_curp" placeholder="CURP o RFC" required>
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>
                                <div class="justify-content-center">
                                    <button class="btn  btn-primary " id="edit" type="button" onclick="inputs_requeridos_baja()" >ACEPTAR</button>
                                    <a href="{{url('/')}}" class="btn btn-secondary">REGRESAR</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- Edit Modal  Baja-->
<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tobindex="-1" id="modal-insert1">
    <form method="POST" action=""  target="_blank"  id="modal_">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <input type="hidden" name="" id="" value="" />
                <div class="modal-header bg-success">
                    <h3 class="modal-title text-center">Verifica que los datos que ingresaste son correctos</h3>
                </div>

                <div class="modal-body">


                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-bold fs-14" for="">Oficio</label>

                            <input type="text" name="oficio"  id="oficio" class="form-control input-lg" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-bold fs-14" for="">JUZGADO</label>

                            <input type="text" name="juzgado"  id="juzgado" class="form-control input-lg" readonly>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-bold fs-14" for="">JUEZ</label>

                            <input type="text" name="juez"  id="juez" class="form-control input-lg" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-bold fs-14" for="">TURNO</label>

                            <input type="text" name="turno"  id="turno" class="form-control input-lg" readonly>
                        </div>
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-bold fs-14" for="">CURP / RFC</label>

                                <input type="text" name="curp1"  id="curp1" class="form-control input-lg" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-bold fs-14" for="">FECHA FIN</label>

                                <input type="text" name="fec_ini"  id="fec_ini" class="form-control input-lg" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-bold fs-14" for="">FOLIO</label>
                                <input type="text" name="folio"  id="folio" class="form-control input-lg" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-bold fs-14" for="">FECHA FIN</label>
                                <input type="text" name="fec_fin"  id="fec_fin" class="form-control input-lg" readonly>
                            </div>
                        </div>
                    </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-bold fs-14" for="">TIPO DE LICENCIA</label>

                            <input type="text" name="tipo_lic1"  id="tipo_lic1" class="form-control input-lg" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-bold fs-14" for="">OBSERVACIÓN</label>

                            <input type="text" name="observacion"  id="observacion" class="form-control input-lg" readonly>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" id="btn_cancelarr" data-dismiss="modal" class="btn btn-link">Cancelar</button>
                    <button type="button" id="btn_aceptar" class="btn btn-primary" onclick="finalizar_alta()">Aceptar</button>
                </div>
            </div>
        </div>
       </div>
    </form>
</div>
<!-- /.modal -->
@stop
@section('css')

@stop

@section('js')

    <script>
        function campos(){

            var var_tipo_lic = $('#txt_tipo_lic').val();
            var var_curp = $('#txt_curp').val();
            $('#modal-insert').modal({backdrop: 'static', keyboard: false});
            $('#modal-insert').on('shown.bs.modal', function () {
                $('#btn_cancelar').attr("disabled",false).show();
                $('#btn_aceptar').attr("disabled",false).show();
                $('#btn_confirma').attr("disabled",true).hide();
                $('#tipo_lic').val(var_tipo_lic);
                $('#curp').val(var_curp);
            });
        }


        function finalizar() {
            $("#modal_form").submit()
        }

        function inputs_requeridos_baja() {
            if ($("#txt_tipo_lic").val() === "") {
                $("#txt_tipo_lic").focus();
                return false;
            }
            if ($("#txt_curp").val() === "") {
                $("#txt_curp").focus();
                return false;
            }
            campos();
        }

        function campos_alta(){

            var var_oficio = $('#txt_oficio').val();
            var var_juzgado = $('#txt_juzgado').val();
            var var_juez = $('#txt_juez').val();
            var var_turno = $('#txt_turno').val();
            var var_curp_a = $('#txt_curp_a').val();
            var var_fec_ini = $('#date_ini').val();
            var var_folio = $('#txt_folio').val();
            var var_fec_fin = $('#date_fin').val();
            var var_tipo_lic_a = $('#txt_tipo_lic_a').val();
            var var_observacion = $('#txt_observacion').val();
            var var_nombre = $('#txt_nombre').val();
            var var_paterno = $('#txt_paterno').val();
            var var_materno = $('#txt_materno').val();
            $('#modal-insert1').modal({backdrop: 'static', keyboard: false});
            $('#modal-insert1').on('shown.bs.modal', function () {
                $('#btn_cancelar').attr("disabled",false).show();
                $('#btn_aceptar').attr("disabled",false).show();
                $('#btn_confirma').attr("disabled",true).hide();
                $('#oficio').val(var_oficio);
                $('#juzgado').val(var_juzgado);
                $('#juez').val(var_juez);
                $('#turno').val(var_turno);
                $('#curp1').val(var_curp_a);
                $('#fec_ini').val(var_fec_ini);
                $('#folio').val(var_folio);
                $('#fec_fin').val(var_fec_fin);
                $('#tipo_lic1').val(var_tipo_lic_a);
                $('#observacion').val(var_observacion);
                $('#nombre').val(var_nombre);
                $('#paterno').val(var_paterno);
                $('#materno').val(var_materno);
            });
        }


        function finalizar_alta() {
            $("#modal_form_alta").submit()
        }

        function inputs_requeridos_alta() {
            if ($("#txt_oficio").val() === "") {
                $("#txt_oficio").focus();
                return false;
            }
            if ($("#txt_juzgado").val() === "") {
                $("#txt_juzgado").focus();
                return false;
            } if ($("#txt_juez").val() === "") {
                $("#txt_juez").focus();
                return false;
            }
            if ($("#txt_turno").val() === "") {
                $("#txt_turno").focus();
                return false;
            } if ($("#txt_curp_a").val() === "") {
                $("#txt_curp_a").focus();
                return false;
            }
            if ($("#date_ini").val() === "") {
                $("#date_ini").focus();
                return false;
            } if ($("#date_fin").val() === "") {
                $("#date_fin").focus();
                return false;
            }
            if ($("#txt_tipo_lic_a").val() === "") {
                $("#txt_tipo_lic_a").focus();
                return false;
            }  if ($("#txt_observacion").val() === "") {
                $("#txt_observacion").focus();
                return false;
            } if ($("#txt_nombre").val() === "") {
                $("#txt_nombre").focus();
                return false;
            }
            if ($("#txt_paterno").val() === "") {
                $("#txt_paterno").focus();
                return false;
            }if ($("#txt_materno").val() === "") {
                $("#txt_materno").focus();
                return false;
            }
            campos_alta();
        }

            var nerros = {{count($errors)}};
            if(nerros > 0) {
                var text = "{{$errors->all()[0] ?? ''}}";
                console.log(text);
                Swal.fire({
                    title: "{{$errors->all()[1] ?? 'error'}}",
                    text: "{{$errors->all()[2] ?? 'Oops...'}}",
                    type: "{{$errors->all()[0] ?? 'algo salio mal'}}",
                    showCancelButton: true,
                    confirmButtonColor: "#ff0005",
                    allowOutsideClick: true,
                    allowEscapeKey: true,
                    confirmButtonText: "Aceptar"
                });
            };


            function soloNumeros(e){
                var key = window.Event ? e.which : e.keyCode
                return (key >= 48 && key <= 57)
            }

        $('.select2').select2();
    </script>
@stop
