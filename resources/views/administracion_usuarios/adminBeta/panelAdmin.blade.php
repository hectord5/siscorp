@extends('adminlte::page')

@section('title', 'Buscando: Vehiculo')

@section('content_header')

@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-auto text-center">
                    <br>
                    <h1><i class="far fa-id-badge"></i> ADMINISTRADOR DE USUARIOS</h1>
                    <br>
                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal">
                        AGREGAR USUARIO
                    </button>

                </div>
            </div>
            <br><br><br>
        </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h1 class="text-center text-bold">TIPO DE CONTROL VEHICULAR    <i class="fas fa-car-alt"></i></h1>

                                    <div class="container-fluid text-center">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id='checkall' value="option1">
                                            <label class="form-check-label" for="inlineRadio1">OPERADOR</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                            <label class="form-check-label" for="inlineRadio2">SUPERVISOR</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="text-center fs-6 text-bold">Selecciona el tipo de control:</p>

                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <form action="/action_page.php">

                                                    <div class="form-check">
                                                        <label class="form-check-label" for="radio1">
                                                            <input type="checkbox" class="form-check-input" id="radio1" name="optradio" value="option1">GRIS
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input">VERDE
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input">MOTOCICLETA
                                                        </label>
                                                    </div>

                                                </form>

                                            </div>
                                            <div class="col-md-3">
                                                <form action="/action_page.php">

                                                    <div class="form-check">
                                                        <label class="form-check-label" for="radio2">
                                                            <input type="checkbox" class="form-check-input" id="radio2" name="optradio" value="option2">ANTIGUO
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input">REMOLQUE
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input">DISCAPACIDAD
                                                        </label>
                                                    </div>

                                                </form>
                                            </div>
                                            <div class="col-md-3">
                                                <form action="/action_page.php">

                                                    <div class="form-check">
                                                        <label class="form-check-label" for="radio2">
                                                            <input type="checkbox" class="form-check-input" id="radio2" name="optradio" value="option2">RUTA
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input">TAXI
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input">ESCOLTA
                                                        </label>
                                                    </div>

                                                </form>
                                            </div>
                                            <div class="col-md-3">
                                                <form action="/action_page.php">

                                                    <div class="form-check">
                                                        <label class="form-check-label" for="radio2">
                                                            <input type="checkbox" class="form-check-input" id="radio2" name="optradio" value="option2">ESPECIALIZADO
                                                        </label>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <br><br>
                                        <h3 class="text-center text-bold">TIPO DE AUTORIZACIÓN</h3>

                                        <div class="row">
                                            <div class="col-md-12 align-content-lg-center">

                                                <table class="table table-striped table-hover">

                                                    <tr class="table">
                                                        <td style="collapse: 3; ">HISTORIAL DE MOVIMIENTOS</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><input type="checkbox" class="checkbox" ></td>
                                                    </tr>
                                                    <tr>
                                                        <td>ADEUDOS</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><input type="checkbox" class="checkbox" style=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td>VERIFICAR LINEA DE CAPTURA</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><input type="checkbox" class="checkbox" style=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td>LICENCIAS</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><input type="checkbox" class="checkbox" style=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td>SABANAS</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><input type="checkbox" class="checkbox" style=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td>ACTIVIDAD DE USUARIOS</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><input type="checkbox" class="checkbox" style=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td>REIMPRESION</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><input type="checkbox" class="checkbox" style=""></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
                    <button type="button" class="btn btn-primary">ACTIVAR</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')
    <div class="row">
        <div class="col" style="font-weight: bold;">Secretaría de Movilidad de la Ciudad de México </div>
        <div class="col">Dirección de Sistemas de Información .2020 &copy;</div>
    </div>

@stop

@section('js')
    <script>

        $(document).ready(function(){
            // Check or Uncheck All checkboxes
            $("#checkall").change(function(){
                var checked = $(this).is(':checked');
                if(checked){
                    $(".checkbox").each(function(){
                        $(this).prop("checked",true);
                    });
                }else{
                    $(".checkbox").each(function(){
                        $(this).prop("checked",false);
                    });
                }
            });

            // Changing state of CheckAll checkbox
            $(".checkbox").click(function(){

                if($(".checkbox").length == $(".checkbox:checked").length) {
                    $("#checkall").prop("checked", true);
                } else {
                    $("#checkall").removeAttr("checked");
                }

            });
        });
    </script>

@stop

