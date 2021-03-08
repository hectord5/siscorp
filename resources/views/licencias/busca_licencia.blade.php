@extends('adminlte::page')

@section('title', 'Busca licencia por CURP')

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
                                    <div class="form-group">
                                        <label for="valor">Ingresa el <b>CURP</b>:</label>
                                        <input type="text" maxlength="18" class="form-control form-control-lg rounded-0" name="curp" id="curp" required>
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
                $('#curp').on('keyup',function(){
                    $(this).val($(this).val().toUpperCase());
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
                       // alert('hola');
                       // return;
                       $('#contenedor_carga').show();
                       $('#form_licencia').submit();
                   }
                });
                {{--function consumeajax() {--}}
                {{--    var loader = $('#contenedor_carga');--}}
                {{--    // var tipo_lic = $("#tipo_lic").val();--}}
                {{--    var curp = $("#curp").val();--}}
                {{--    var formData = new FormData();--}}
                {{--    formData.append('curp',curp);--}}
                {{--    // formData.append('tipo_lic',tipo_lic);--}}
                {{--    $.ajax({--}}
                {{--        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},--}}
                {{--        url: "{{url('licencias/getCandados')}}",--}}
                {{--        type: "post",--}}
                {{--        processData: false,--}}
                {{--        contentType: false,--}}
                {{--        data: formData,--}}
                {{--        beforeSend: function() {--}}
                {{--            $('#muestra_resultados').hide('slow');--}}
                {{--            loader.show();--}}
                {{--        },--}}
                {{--        success: function (data) {--}}
                {{--            var html='<div style="background-color:red;font-size: 32px;color:purple;">'+data+'</div>';--}}
                {{--            $('#muestra_resultados').html(html);--}}
                {{--            $('#muestra_resultados').show('slow');--}}
                {{--            loader.hide();--}}
                {{--            console.log(data);--}}
                {{--        }--}}
                {{--    });--}}
                {{--}--}}
                function valida(){
                    let curp = $('#curp').val();

                    if(curp.length<18){
                        Swal.fire({
                            text : 'Debes ingresar 18 digitos',
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
