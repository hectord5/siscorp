@extends('adminlte::page')

@section('title', 'Buscando: Empresa')

@section('content_header')
@stop

@section('content')
    <style>
        *,*:after, *:before{
            margin: 0;
            padding: 0;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        #contenedor_carga{
            height: 100%;
            width: 100%;
            top: 0px;
            left: 0px;
            z-index: 10000;
            display: none;
            background: rgba(145,145,145,.5);
            position: fixed;
            -webkit-transition: all 1s ease;
            -o-transition: all 1s ease;
        }

        /*#carga{*/
        /*    border: 35px solid #555;*/
        /*    border-top-color: #555;*/
        /*    border-bottom-color: #555;*/
        /*    border-left-color: #555;*/
        /*    border-right-color: #555;*/
        /*    height: 300px;*/
        /*    width: 300px;*/

        /*    position: absolute;*/
        /*    top: 0;*/
        /*    left: 20%;*/
        /*    right: 10%;*/
        /*    bottom: 0;*/
        /*    margin: auto;*/
        /*    -webkit-animation: girar 1,5s linear infinite;*/
        /*    -o-animation: girar 1.5s linear infinite;*/
        /*    animation: girar 1.5s linear infinite;*/
        /*}*/

        @keyframes girar {
            from { transform: rotate(0deg);}
            to {transform: rotate(360deg);}


        }

        @media only screen and (min-width: 960px) {
            /* styles for browsers larger than 960px; */
            #carga{
                border: 35px solid #555;
                border-top-color: #00b44e;
                border-top-style:groove ;
                height: 300px;
                width: 300px;
                border-radius: 100%;

                position: absolute;
                top: 0;
                left: 25%;
                right: 20%;
                bottom: 0;
                margin: auto;
                -webkit-animation: girar 1,5s linear infinite;
                -o-animation: girar 1.5s linear infinite;
                animation: girar 1.5s linear infinite;
            }
            .texto{
                position: absolute;
                color: #fffbf1;
                font-size: 80px;
                font-weight: bold;
                z-index: 10;
                padding: 20px;
                border-radius:7px;
                top: 5%;
                left: 20%;
                position: absolute;
                margin:auto;
                text-shadow: 0 20px 25px #2e2e31, 0 40px 60px #2e2e31;
                text-align: center;
                width: 70%;
                letter-spacing: -3px;
            }
            .log1{
                position: absolute;
                width: 250px;
                top: 0;
                left: 25%;
                right: 20%;
                bottom: 0;
                margin: auto;
                -webkit-animation: girar 3s linear infinite;
                -o-animation: girar 3s linear infinite;
                animation: girar 3s linear infinite;
            }
            .log2{
                position: absolute;
                border-radius: 40%;
                height: 70px;
                top: 0;
                left: 25%;
                right: 20%;
                bottom: 0;
                margin: auto;
            }
        }
        @media only screen and (min-width: 1440px) {
            /* styles for browsers larger than 1440px; */
            #carga{
                border: 35px solid #555;
                border-top-color: #00b44e;
                border-top-style:groove ;
                height: 300px;
                width: 300px;
                border-radius: 100%;

                position: absolute;
                top: 0;
                left: 25%;
                right: 20%;
                bottom: 0;
                margin: auto;
                -webkit-animation: girar 1,5s linear infinite;
                -o-animation: girar 1.5s linear infinite;
                animation: girar 1.5s linear infinite;
            }
            .texto{
                position: absolute;
                color: #fffbf1;
                font-size: 80px;
                font-weight: bold;
                z-index: 10;
                padding: 20px;
                border-radius:7px;
                top: 5%;
                left: 20%;
                position: absolute;
                margin:auto;
                text-shadow: 0 20px 25px #2e2e31, 0 40px 60px #2e2e31;
                text-align: center;
                width: 70%;
                letter-spacing: -3px;
            }
            .log1{
                position: absolute;
                width: 250px;
                top: 0;
                left: 25%;
                right: 20%;
                bottom: 0;
                margin: auto;
                -webkit-animation: girar 3s linear infinite;
                -o-animation: girar 3s linear infinite;
                animation: girar 3s linear infinite;
            }
            .log2{
                position: absolute;
                border-radius: 40%;
                height: 70px;
                top: 0;
                left: 25%;
                right: 20%;
                bottom: 0;
                margin: auto;
            }
        }
        @media only screen and (min-width: 2000px) {
            /* for sumo sized (mac) screens */
            #carga{
                border: 35px solid #555;
                border-top-color: #00b44e;
                border-top-style:groove ;
                height: 300px;
                width: 300px;
                border-radius: 100%;

                position: absolute;
                top: 0;
                left: 10%;
                right: 20%;
                bottom: 0;
                margin: auto;
                -webkit-animation: girar 1,5s linear infinite;
                -o-animation: girar 1.5s linear infinite;
                animation: girar 1.5s linear infinite;
            }
            .texto{
                position: absolute;
                color: #fffbf1;
                font-size: 80px;
                font-weight: bold;
                z-index: 10;
                padding: 20px;
                border-radius:7px;
                top: 5%;
                left: 25%;
                position: absolute;
                margin:auto;
                text-shadow: 0 20px 25px #2e2e31, 0 40px 60px #2e2e31;
                text-align: center;
                width: 70%;
                letter-spacing: -3px;
            }
        }
        @media only screen and (max-device-width: 480px) {
            /* styles for mobile browsers smaller than 480px; (iPhone) */
            #carga{
                border: 35px solid #555;
                border-top-color: #00b44e;
                border-top-style:groove ;
                height: 200px;
                width: 200px;
                border-radius: 100%;

                position: absolute;
                top: 0;
                left: 10%;
                right: 10%;
                bottom: 0;
                margin: auto;
                -webkit-animation: girar 1,5s linear infinite;
                -o-animation: girar 1.5s linear infinite;
                animation: girar 1.5s linear infinite;
            }
            .texto{
                position: absolute;
                color: #fffbf1;
                font-size: 30px;
                font-weight: bold;
                z-index: 10;
                padding: 20px;
                border-radius:7px;
                top: 5%;
                left: 10%;
                position: absolute;
                margin:auto;
                text-shadow: 0 20px 25px #2e2e31, 0 40px 60px #2e2e31;
                text-align: center;
                width: 70%;
                letter-spacing: -3px;
            }
            .log1{
                position: absolute;
                width: 250px;
                top: 0;
                left: 25%;
                right: 20%;
                bottom: 0;
                margin: auto;
                -webkit-animation: girar 3s linear infinite;
                -o-animation: girar 3s linear infinite;
                animation: girar 3s linear infinite;
            }
            .log2{
                position: absolute;
                border-radius: 40%;
                height: 70px;
                top: 0;
                left: 25%;
                right: 20%;
                bottom: 0;
                margin: auto;
            }
        }
        @media only screen and (device-width: 768px) {
            /* default iPad screens */
            #carga{
                border: 35px solid #555;
                border-top-color: #00b44e;
                border-top-style:groove ;
                height: 200px;
                width: 200px;
                border-radius: 100%;

                position: absolute;
                top: 0;
                left: 10%;
                right: 10%;
                bottom: 0;
                margin: auto;
                -webkit-animation: girar 1,5s linear infinite;
                -o-animation: girar 1.5s linear infinite;
                animation: girar 1.5s linear infinite;
            }
            .texto{
                position: absolute;
                color: #fffbf1;
                font-size: 30px;
                font-weight: bold;
                z-index: 10;
                padding: 20px;
                border-radius:7px;
                top: 5%;
                left: 10%;
                position: absolute;
                margin:auto;
                text-shadow: 0 20px 25px #2e2e31, 0 40px 60px #2e2e31;
                text-align: center;
                width: 70%;
                letter-spacing: -3px;
            }
            .log1{
                position: absolute;
                width: 250px;
                top: 0;
                left: 25%;
                right: 20%;
                bottom: 0;
                margin: auto;
                -webkit-animation: girar 3s linear infinite;
                -o-animation: girar 3s linear infinite;
                animation: girar 3s linear infinite;
            }
            .log2{
                position: absolute;
                border-radius: 40%;
                height: 70px;
                top: 0;
                left: 25%;
                right: 20%;
                bottom: 0;
                margin: auto;
            }
        }
        /* different techniques for iPad screening */
        @media only screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait) {
            /* For portrait layouts only */
            #carga{
                border: 35px solid #555;
                border-top-color: #00b44e;
                border-top-style:groove ;
                height: 200px;
                width: 200px;
                border-radius: 100%;

                position: absolute;
                top: 0;
                left: 10%;
                right: 10%;
                bottom: 0;
                margin: auto;
                -webkit-animation: girar 1,5s linear infinite;
                -o-animation: girar 1.5s linear infinite;
                animation: girar 1.5s linear infinite;
            }
            .texto{
                position: absolute;
                color: #fffbf1;
                font-size: 30px;
                font-weight: bold;
                z-index: 10;
                padding: 20px;
                border-radius:7px;
                top: 5%;
                left: 10%;
                position: absolute;
                margin:auto;
                text-shadow: 0 20px 25px #2e2e31, 0 40px 60px #2e2e31;
                text-align: center;
                width: 70%;
                letter-spacing: -3px;
            }
            .log1{
                position: absolute;
                width: 250px;
                top: 0;
                left: 25%;
                right: 20%;
                bottom: 0;
                margin: auto;
                -webkit-animation: girar 3s linear infinite;
                -o-animation: girar 3s linear infinite;
                animation: girar 3s linear infinite;
            }
            .log2{
                position: absolute;
                border-radius: 40%;
                height: 70px;
                top: 0;
                left: 25%;
                right: 20%;
                bottom: 0;
                margin: auto;
            }
        }

        @media only screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape) {
            /* For landscape layouts only */
            #carga{
                border: 35px solid #555;
                border-top-color: #00b44e;
                border-top-style:groove ;
                height: 200px;
                width: 200px;
                border-radius: 100%;

                position: absolute;
                top: 0;
                left: 10%;
                right: 10%;
                bottom: 0;
                margin: auto;
                -webkit-animation: girar 1,5s linear infinite;
                -o-animation: girar 1.5s linear infinite;
                animation: girar 1.5s linear infinite;
            }
            .texto{
                position: absolute;
                color: #fffbf1;
                font-size: 30px;
                font-weight: bold;
                z-index: 10;
                padding: 20px;
                border-radius:7px;
                top: 5%;
                left: 10%;
                position: absolute;
                margin:auto;
                text-shadow: 0 20px 25px #2e2e31, 0 40px 60px #2e2e31;
                text-align: center;
                width: 70%;
                letter-spacing: -3px;
            }
            .log1{
                position: absolute;
                width: 250px;
                top: 0;
                left: 25%;
                right: 20%;
                bottom: 0;
                margin: auto;
                -webkit-animation: girar 3s linear infinite;
                -o-animation: girar 3s linear infinite;
                animation: girar 3s linear infinite;
            }
            .log2{
                position: absolute;
                border-radius: 40%;
                height: 70px;
                top: 0;
                left: 25%;
                right: 20%;
                bottom: 0;
                margin: auto;
            }
        }
        @media only screen and (max-width: 980px) and (min-width: 821px) {
            .texto{
                position: absolute;
                color: #fffbf1;
                font-size: 30px;
                font-weight: bold;
                z-index: 10;
                padding: 20px;
                border-radius:7px;
                top: 5%;
                left: 10%;
                margin:auto;
                text-shadow: 0 20px 25px #2e2e31, 0 40px 60px #2e2e31;
                text-align: center;
                width: 70%;
                letter-spacing: -3px;
            }
            .log1{
                position: absolute;
                width: 250px;
                top: 0;
                left: 25%;
                right: 20%;
                bottom: 0;
                margin: auto;
                -webkit-animation: girar 3s linear infinite;
                -o-animation: girar 3s linear infinite;
                animation: girar 3s linear infinite;
            }
            .log2{
                position: absolute;
                border-radius: 40%;
                height: 70px;
                top: 0;
                left: 25%;
                right: 20%;
                bottom: 0;
                margin: auto;
            }
        }
    </style>
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
                                <h3 class="mb-0">Busca por RFC / Razón Social <i class="animate__animated animate__fadeInLeft animate__delay-1s  far fa-id-card"></i> </h3>
                            </div>
                            <div class="card-body">
                                <form action="{{route($ruta)}}" method="POST" id="form_empresa">
                                    @csrf
                                    <input type="hidden" name="tipo_control" value="{{$tipo_control}}">
                                    <div class="form-group">
                                        <label for="CURP">Elige el criterio de búsqueda:</label>
                                        <select class="form-control form-control-lg custom-select-lg" name="campo" id="campo">
                                            <option selected>Elige una opción</option>
                                            <option value="rfc">RFC</option>
                                            <option value="nombre">Razón social</option>
                                        </select>
                                        <div class="invalid-feedback">Se te olvida este.</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="CURP">Ingresa el <b id="nombre_busca" >RFC</b>:</label>
                                        <input type="text" maxlength="100" class="form-control form-control-lg rounded-0" name="valor" id="valor" required>
                                        <div class="invalid-feedback">Se te olvida este.</div>
                                    </div>

                                    <div class="btn btn-success btn-lg float-right" id="enviar">Buscar sabana</div>
                                </form>
                            </div>
                            <!--/card-block-->
                        </div>
                        <!-- /form card login -->
                    </div>
                </div>
                <!--/row-->
            </div>
    <script>
        $('#valor').on('keyup',function(){
            if ( $('#campo').val()==='rfc' ){
                $(this).val($(this).val().toUpperCase());

            }
        });
        $('#campo').on('change',function(){
            $('#valor').val('');
            $('#nombre_busca').html($('#campo').val().toUpperCase());
        });

        var input = document.getElementById("form_empresa");

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
            if ( $('#campo').val()==='rfc' ){
                emailRegex = /^([A-ZÑ&]{3}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/;
                if(!emailRegex.test( $('#valor').val() )){
                    main_valido = 0;
                    Swal.fire({
                        icon: 'error',
                        title: "Ingresa un RFC Valido",
                        text: "No cumple con la estructura de un RFC de persona moral",
                    }).then(function () {
                        e.focus();
                        e.style.borderColor="red";
                    });
                    return;
                }
            }else{
                if( $('#valor').val().length > 149){
                    Swal.fire({
                        text : 'El nombre excede el largo permitido',
                        icon: 'error'
                    });
                    return;
                }
            }
            $('#contenedor_carga').show('slow')
            $('#form_empresa').submit();
        });
    </script>
@stop
@section('footer')
    <div class="row">
        <div class="col" style="font-weight: bold;">Secretaría de Movilidad de la Ciudad de México </div>
        <div class="col">Dirección de Sistemas de Información .2020 &copy;</div>
    </div>

@stop
