<html>
<head>
    <title>LINEA DE CAPTURA</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <style>
        body{
            font-family: "Helvetica Neue", sans-serif;
            font-size: 12px;

        }
        .img_header {
            position: fixed;
            left: 10%;
            height: 90px;
            top: -34px;
        }

        table tbody tr td{
            padding: 6px 3px;
            width: 50%;
            font-size: 15px;
        }
        .fod{
            position: fixed;
            bottom: 50px;
            padding: 0;
            margin: 0;
            font-size: 7px;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center bottom;
        }
        .footter{
            position: fixed;
            left: -2%;
            height: 50px;
            bottom: -30px;
        }

        .titulo{
            font-weight: bold;
            color:white;
            font-size: 15px;
            height: 20px;
        }
        .bordetabla{
            padding: 15px;
            border-radius: 15px;
        }
        .bodycontainer{
            position: absolute;
            top: 60px;
        }
        .contiene-tabla{
            border:1px solid #646464;
            border-radius: 15px;
            background-color: white;
        }
        .img_qr{
            position: fixed;
            right: 19%;
            height: 75px;
            bottom: 50px;
        }
        .cont_titulo{
            margin: 5px;
            background: #3db820;
            border-radius: 5px;
        }
        .subtitulo{
            position: fixed;
            left:18%;
            top: 60px;
            width: 50%;
            font-size: 14px;
            color:#3db820;
            padding: 2px;
            text-align: center;
            border: 3px solid #3db820;
            border-radius: 10px;
        }
        .leyenda{
            font-size: 12px;
            position: fixed;
            color: grey;
            bottom: 5%;
        }
        .si_existe{
            position: absolute;
            bottom: 40%;
            left: -4%;
            text-align: center;
        }
        .no_existe{
            position: absolute;
            bottom: 40%;
            left: -4%;
            text-align: center;
        }

    </style>
</head>
<body>
<header>
    <div class="cabezera">
        <img class="img_header" src="images/banner.png" alt="">
        <p class="subtitulo" >REPORTE DE LINEA DE CAPTURA</p>
        <br>
        <br>
        <br>
    </div>

</header>

<div class="panel bodycontainer">
    <br><br>
    <div class="panel-body" >
        <div class="col-md-6 col-lg-offset-3 text-left">
            <div class="text-center cont_titulo">
                <span class="titulo">DATOS DEL PAGO EN LA SECRETARIA DE FINANZAS</span>
            </div>
            <div class="contiene-tabla">
                <table class=" bordetabla" style="width: 100%">
                    <thead>
                    </thead>
                    <tbody>
                    <tr>
                        <td class=""><b>Linea de Captura:</b><span style="color: #4b4949">{{$datos['pago']['dataPago'][0]['lc']}}</span></td>

                    </tr>
                    <tr>
                        <td class=""><b>Consepto del Pago de Finanzas: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949">{{$datos['pago']['dataPago'][0]['idconcepto']}}</span></td>
                        <td class=""><b>Placa Asociada al Pago: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949"> {{$datos['pago']['dataPago'][0]['placa']}}</span></td>
                    </tr>
                    <tr>
                        <td style=""><b>Importe del Pago: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949">{{$datos['pago']['dataPago'][0]['total']}} </span></td>
                        <td style=""><b>Fecha del Pago: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949">{{$datos['pago']['dataPago'][0]['fcobro']}} </span></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <br><br><br><br>
            @if(isset($datos['tramite'][0]['placa']))
                <div class="text-center cont_titulo">
                    <span class="titulo">DATOS DEL USO DEL TRÁMITE</span>
                </div>
                <div class="contiene-tabla">
                    <table class=" bordetabla" style="width: 100%">
                        <thead>
                        </thead>
                        <tbody>
                        <tr>
                            <td class=""><b>Placa: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949;font-size: 16px;font-weight: bold; font-style: oblique">{{$datos['tramite'][0]['placa']}} </span></td>
                            <td class=""><b>Solicitante: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949"> {{$datos['tramite'][0]['nombre_solicitante']}} </span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            @elseif(isset($datos['tramite']['placa']))
                <div class="text-center cont_titulo">
                    <span class="titulo">DATOS DEL USO DEL TRÁMITE</span>
                </div>
                <div class="contiene-tabla">
                    <table class=" bordetabla" style="width: 100%">
                        <thead>
                        </thead>
                        <tbody>
                        <tr>
                            <td class=""><b>Fecha del Tramite: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><span class="text-secondary">{{Str::limit($datos['tramite']['fecha_uso'],10, '')}}</span></td>
                            <td class=""><b>Placa: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949"> {{$datos['tramite']['placa']}} </span></td>
                        </tr>
                         <tr>
                             <td class=""><b>Nombre del Solicitante: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span class="text-secondary">{{$datos['tramite']['nombre_solicitante']}}</span></td>
                            <td class=""><b>Operador: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949"> {{$datos['tramite']['operador']}}</span></td>
                        </tr>
                        <tr>
                             <td class=""><b>Serie Vehicular: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span class="text-secondary">{{$datos['tramite']['serie_vehicular']}}</span></td>
                            <td class=""><b>Modulo: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949"> {{$datos['tramite']['modulo']}}</span></td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
    @if(isset($datos['tramite'][0]['placa']))
    <div class="si_existe">
        <span style="font-weight: bold; font-size: 20px">OBSERVACIONES</span>
        <p style="color:#3db820; font-size: 18px; width: 100%">{{$datos['tramite']['errMessage']}}</p>
    </div>
    @elseif(isset($datos['tramite']['errCode'])&&$datos['tramite']['errCode']==200)
        <div class="si_existe">
            <span style="font-weight: bold; font-size: 20px">OBSERVACIONES</span>
            <p style="color:#3db820; font-size: 18px; width: 100%">{{$datos['tramite']['errMessage']}}</p>
        </div>
    @else
        <div class="no_existe">
            <span style="font-weight: bold; font-size: 20px">OBSERVACIONES</span>
            <p style="color:#b8230e; font-size: 18px; width: 100%">No existe tramite con la linea de captura ingresada</p>
        </div>
    @endif
<div class="fod">

    <hr>
    <p class="leyenda"> Dirección de Sistemas, Secretaría de Movilidad Ciudad de México 2020 &copy;</p>

    <p style="z-index: 5">"Con fundamento en el artículo 11 de la Ley de Protección de Datos Personales para el Distrito Federal,
        la información contenida en este documento no es oficial hasta que se confirme por escrito con
        la firma autógrafa del Servidor Público facultado, por lo que la información contenida en el mismo no es oficial de la
        Secretaría de Movilidad hasta que se encuentre debidamente firmado en original.Este documento es confidencial, dirigido
        para uso exclusivo del destinatario, quedando prohibida su distribución y/o difusión en cualquier modalidad sin
        previa autorización del Servidor Público que lo emite y coteja en los expedientes físicos del área que la detenta.</p>
    <img class="footter"  src="images/footer.png" alt="">
</div>
</body>
</html>
