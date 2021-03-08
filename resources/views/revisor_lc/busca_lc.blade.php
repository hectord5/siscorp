

@extends('adminlte::page')

@section('title', 'Buscando: Vehiculo')

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
            top: 0;
            left: 0;
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
                border-radius: 10%;
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
                border-radius: 10%;
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
                border-radius: 10%;
                height: 70px;
                top: 0;
                left: 25%;
                right: 20%;
                bottom: 0;
                margin: auto;
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
                margin:auto;
                text-shadow: 0 20px 25px #2e2e31, 0 40px 60px #2e2e31;
                text-align: center;
                width: 70%;
                letter-spacing: -3px;
            }
            .log1{
                position: absolute;
                width: 125px;
                top: 0;
                left: 22%;
                right: 20%;
                bottom: 0;
                margin: auto;
                -webkit-animation: girar 3s linear infinite;
                -o-animation: girar 3s linear infinite;
                animation: girar 3s linear infinite;
            }
            .log2{
                position: absolute;
                border-radius: 10%;
                width: 40px;
                top: 0;
                left: 25%;
                right: 24%;
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
                border-radius: 10%;
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
                border-radius: 10%;
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
                border-radius: 10%;
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
                border-radius: 10%;
                height: 70px;
                top: 0;
                left: 25%;
                right: 20%;
                bottom: 0;
                margin: auto;
            }
            .bootstrap-select > .dropdown-toggle.bs-placeholder:active {
                background: #FFF;
                color: #000;
                border-color: #999;
            }
        }
        /*.select-css {*/
        /*    display: block;*/
        /*    font-size: 21px;*/
        /*    font-family: 'Verdana', sans-serif;*/
        /*    font-weight: 400;*/
        /*    color: #444;*/
        /*    line-height: 1.3;*/
        /*    padding: .4em 1.4em .3em .8em;*/
        /*    width: 400px;*/
        /*    max-width: 100%;*/
        /*    box-sizing: border-box;*/
        /*    margin: 20px auto;*/
        /*    border: 1px solid #aaa;*/
        /*    box-shadow: 0 1px 0 1px rgba(0,0,0,.03);*/
        /*    border-radius: .3em;*/
        /*    -moz-appearance: none;*/
        /*    -webkit-appearance: none;*/
        /*    appearance: none;*/
        /*    background-color: #fff;*/
        /*    background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23007CB2%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'),*/
        /*    linear-gradient(to bottom, #ffffff 0%,#f7f7f7 100%);*/
        /*    background-repeat: no-repeat, repeat;*/
        /*    background-position: right .7em top 50%, 0 0;*/
        /*    background-size: .65em auto, 100%;*/
        /*}*/
        /*.select-css::-ms-expand {*/
        /*    display: none;*/
        /*}*/
        /*.select-css:hover {*/
        /*    border-color: #888;*/
        /*}*/
        /*.select-css:focus {*/
        /*    border-color: #aaa;*/
        /*    box-shadow: 0 0 1px 3px rgba(59, 153, 252, .7);*/
        /*    box-shadow: 0 0 0 3px -moz-mac-focusring;*/
        /*    color: #222;*/
        /*    outline: none;*/
        /*}*/
        /*.select-css option {*/
        /*    font-weight:normal;*/
        /*}*/



        /*.select-css option[selected] {*/
        /*    background-color: orange;*/
        /*}*/






        /*.sidebar-box select{*/
        /*    display:block;*/
        /*    padding: 5px 10px;*/
        /*    height:42px;*/
        /*    margin:10px auto;*/
        /*    min-width: 225px;*/
        /*    -webkit-appearance: none;*/
        /*    height: 34px;*/
        /*    !* background-color: #ffffff; *!*/
        /*    background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23007CB2%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'),*/
        /*    linear-gradient(to bottom, #ffffff 0%,#f7f7f7 100%);*/
        /*    background-repeat: no-repeat, repeat;*/
        /*    background-position: right .7em top 50%, 0 0;*/
        /*    background-size: .65em auto, 100%;*/
        /*}*/
    </style>
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span> No puede continuar con la busqueda</span>
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
    <div id="contenedor_carga">
        <div class="texto"> Cargando, por favor no actualices o cierres la página...</div>
        <img src="{{url('images/margen.png')}}" alt="" class="log1">

        <img src="{{url('images/m1.png')}}" alt="" class="log2">
    </div>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="card rounded-0">
                            <div class="card-header">
                                <h3 class="mb-0">Verificar línea de captura &nbsp; <i class= "fas fa-file-alt"></i> </h3>
                            </div>

                            <div class="card-body">


                                <div>
                                    <form action="{{url('datos/lc')}}" method="POST" id="form_lc" >
                                        @csrf
                                        <input type="hidden" name="#" >

                                        <input type="hidden" name="blade">
                                        <div class="muestra_nombre">
                                            <div class="form-group">
                                                <label for="apellido">Ingresa la línea de captura:</label>
                                                <input type="text" class="form-control" maxlength="25" id="lc" name="lc" aria-describedby="ingresa la linea de captura" placeholder="Línea de captura" required>
                                            </div>

                                        </div>

                                        <br>
                                        <br>
                                        <input type="hidden" id="linea_captura">
                                        <div  class="btn btn-success btn-block" id="enviar" value="Generar acuse">Buscar<i class="ml-3 fas fa-search"></i></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>


        $('#valor').on('keyup',function(){
            if ( $('#campo').val()==='curp' ){
                $(this).val($(this).val().toUpperCase());
            }
        });

        $('#enviar').on('click', function (){
            if(valida()){
                // consumeajax();
                $('#form_lc').submit();
            }
        });

        function valida(){
            $('#contenedor_carga').show('slow')
            let LC = $('#lc').val();
            let placa = $('#placa').val();
            console.log(placa);
            console.log(LC);
            if (LC === "" || placa === ""){
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

