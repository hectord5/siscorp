@extends('adminlte::page')

@section('title', 'Busca licencia por folio ')

@section('content_header')
@stop

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span> No puede continuar debido a detalles en su consulta</span>
            <ul>
                @foreach($errors->all() as $error)
                    <li><strong>{{$error}}</strong></li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    {{--    --------}}
    <div id="contenedor_carga">
        <div class="texto"> Cargando, por favor no actualices o cierres la página...</div>
        <img src="{{url('images/margen.png')}}" alt="" class="log1">

        <img src="{{url('images/m1.png')}}" alt="" class="log2">
        {{--        <div id="carga"></div>--}}
    </div>
    {{--   ------- --}}
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 mx-auto">

                        <!-- form card login -->
                        <div class="card rounded-0">
                            <div class="card-header">
                                <h3 class="mb-0">Consulta la información de tu licencia <i class="animate__animated animate__fadeInLeft animate__delay-1s  far fa-id-card"></i> </h3>
                            </div>
                            <div class="card-body">
                                <form action="{{route($ruta)}}" method="POST" id="form_licencia" >
                                    @csrf
{{--                                    <input type="hidden" name="#" value="{{$tipo_control}}">--}}
                                    <div class="form-group">
                                        <label for="valor">Ingresa el <b>Folio de tu licencia</b>:</label>
                                        <input type="text" maxlength="100" class="form-control form-control-lg rounded-0" name="folio_lic" id="folio_lic" required>
                                        <div class="invalid-feedback">Se te olvida este.</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="campo">Elige tipo de licencia:</label>
                                        <select class="form-control form-control-lg rounded-0" name="tipo_lic" id="tipo_lic">
                                            <option value="" SELECTED>TIPO LICENCIA</option>
                                            <option value="A">A-Particular</option>
                                            <option value="B">B-Taxi</option>
                                            <option value="C">C-Ruta</option>
                                            <option value="D">D-Carga</option>
                                            <option value="E1_Apps">E-Apps</option>
                                            <option value="E2_Patrullas">E-Patrullas</option>
                                            <option value="E3_Ambulancias">E-Ambulancias</option>
                                            <option value="E4_Bomberos">E-Bomberos</option>
                                            <option value="E5_Escolar">E-Escolar</option>
                                            <option value="E6_Personal">E-Personal</option>
                                            <option value="E7_Turisitico">E-Turístico</option>
                                            <option value="E8_Valores">E-Valores</option>
                                            <option value="E9_Custodia">E-Custodia</option>
                                            <option value="E10_Internos">E-Internos</option>
                                            <option value="E11_Escolta">E-Escolta</option>
                                            <option value="E12_Otros">E-Otros</option>
                                        </select>
                                        <div class="invalid-feedback">Se te olvida este.</div>
                                    </div>


                                    <div class="btn btn-success btn-lg float-right" id="enviar">Buscar licencia</div>
                                </form>
                            </div>
                            <!--/card-block-->
                        </div>
                        <!-- /form card login -->
                    </div>
                </div>
                <!--/row-->
                <div id="muestra_resultados" style="display: none">

                </div>
            </div>
            <script>
                $('#folio_lic').on('keyup',function(){
                    $(this).val($(this).val().toUpperCase());
                });

                $('#tipo_lic').on('change',function(){
                    $('#nombre_busca').html($('#tipo_lic').val().toUpperCase().replace('_',' '));

                });

                var input = document.getElementById("form_licencia");

                // Execute a function when the user releases a key on the keyboard
                input.addEventListener("keyup", function(event) {
                    // Number 13 is the "Enter" key on the keyboard
                    if (event.keyCode === 13) {
                        // Cancel the default action, if needed
                        event.preventDefault();
                        // Trigger the button element with a click
                        document.getElementById("enviar").click();
                    }
                });

                $('#enviar').on('click', function (){
                   if(valida()){
                       // consumeajax();
                       $('#form_licencia').submit();
                   }
                });
                function consumeajax() {
                    var loader = $('#contenedor_carga');
                    var tipo_lic = $("#tipo_lic").val();
                    var folio_lic = $("#folio_lic").val();
                    var formData = new FormData();
                    formData.append('rfc',folio_lic);
                    formData.append('tipo_lic',tipo_lic);
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: "{{url('licencias/getInfoLicencia')}}",
                        type: "post",
                        processData: false,
                        contentType: false,
                        data: formData,
                        beforeSend: function() {
                            $('#muestra_resultados').hide('slow');
                            loader.show();
                        },
                        success: function (data) {
                            var html='<div style="background-color:red;font-size: 32px;color:purple;">'+data+'</div>';
                            $('#muestra_resultados').html(html);
                            $('#muestra_resultados').show('slow');
                            loader.hide();
                            console.log(data);
                        }
                    });
                }
                function valida(){
                    let control = $('#tipo_lic').val();
                    let rfc = $('#folio_lic').val();
                    console.log(control);
                    console.log(rfc);
                    if (control === "" || rfc === ""){
                        Swal.fire({
                            text : 'Debes ingresar los datos solicitados para la busqueda',
                            icon: 'error'
                        });
                        return false;
                    }
                    return true;
                }
            </script>
            @stop
            @section('footer')
                <div class="row">
                    <div class="col" style="font-weight: bold;">Secretaría de Movilidad de la Ciudad de México </div>
                    <div class="col">Dirección de Sistemas de Información .2020 &copy;</div>
                </div>

@stop
