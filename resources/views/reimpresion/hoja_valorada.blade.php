
<html>
<head>
    <title>Baja SISCORP </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <style>
        body{
            font-family: "Helvetica Neue", sans-serif;
        }
        .img_header {

        }
        .titulo{
            position: relative;
            left:0%;
            font-size: 22px;
            text-align: center;
        }
        .subtitulo{
            position: relative;
            left:0%;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
        }
        .subtitulo2{
            position: relative;
            left:0%;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            margin: 10px 0 10px 0;
        }
        .contiene-tabla{
            border: 1px solid rgb(83,129,53);
            padding: 5px;
            border-radius: 20px;

        }
        .contiene-tabla2{
            border: 1px solid rgb(83,129,53);
            padding: 5px;
            border-radius: 35px;
        }
        .table td, .table th {
            padding: 10px !important;
            vertical-align: top;
            border: 1px solid #ffffff !important;
            border-radius: 15px !important;
        }

        .verde-pasto{
            color:rgb(83,129,53);
        }

        .linea-negra{
            width: 100%;
            height: 2px;
            background: black;
        }
        .linea-negra-f{
            width: auto;
            height: 2px;
            background: black;

        }
        .fecha-h{
            font-weight: bold;
            position: absolute;
            top: 30px;
            right: 120px;
            font-size: 12px;
        }
        .fecha-h-t{
            font-weight: bold;
            position: absolute;
            top: 30px;
            right: 20px;
            font-size: 11px;
        }
        .datos-impresor{
            width: 100%;
            height: 20px;
        }

        .imprimio-1{
            position: relative;
            top: 0;
            left: 1%;
            font-size: 12px;
        }
        .imprimio-2{
            font-weight: bold;
            position: relative;
            top: -17px;
            left: 14%;
            font-size: 11px;
        }
        .imprimio-3{
            position: relative;
            top: -34px;
            left: 70%;
            font-size: 12px;
        }
        .imprimio-4{
            font-weight: bold;
            position: relative;
            top: -52px;
            left: 85%;
            font-size: 11px;
        }
        .tabla-style{
            font-size: 10px;
            margin: 10px 0 0 0;
        }
        .zona-firmas{
            position: relative;
            bottom: 50%;
            width: 100%;
            height: 40px;
        }
        .imprimio-5{
            width: 30%;
            text-align: center;
            font-weight: bold;
            position: relative;
            top: 0;
            left: 1%;
            font-size: 12px;
        }
        .imprimio-6{
            width: 33%;
            text-align: center;
            font-weight: bold;
            position: relative;
            top: -21px;
            left: 33%;
            font-size: 11px;
        }
        .imprimio-7{
            width: 28%;
            text-align: center;
            font-weight: bold;
            position: relative;
            top: -39px;
            left: 68%;
            font-size: 12px;
        }
        .header-c{
            position: absolute;
            top: 3%;
            width: 100%;
        }
        .body-c{
            position: absolute;
            top: 17%;
            height: 100px;
        }
        .fotter-c{
            position: fixed;
            bottom: 200px;
            padding: 0;
            margin: 0;
            font-size: 8px;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center bottom;
        }
    </style>
</head>
<body class="container">
    <div class="header-c">
        <img class="img_header" src="images/logoSecretariaEscudoGris.png" alt="">
        <div class="fecha-h">FECHA</div>
        <div class="fecha-h-t">{{$datos['fecha_hoy']}} </div>
        <div class="linea-negra"></div>
        <p class="titulo verde-pasto" >SECRETARÍA DE MOVILIDAD</p>
        <div class="linea-negra" style="margin: -17px 0 0 0;"></div>
        <p class="subtitulo verde-pasto" style="margin: 5px 0 0 0;">BAJA VEHICULAR</p>
    </div>
    <div class="body-c">

                <div class="datos-impresor">
                    <div class="imprimio-1">IMPRIMIO:</div>
                    <div class="imprimio-2">{{$datos['username']}}</div>
                    <div class="imprimio-3">MÓDULO:</div>
                    <div class="imprimio-4">INFORMATICA</div>
                </div>
                <p class="subtitulo2 verde-pasto" style="margin: 5px 0 7px 0;">DATOS DEL PROPIETARIO</p>

        <div class="contiene-tabla">
            <table class="table tabla-style">
                <thead>
                </thead>
                <tbody>
                <tr>
                    <td style="width: 20%;">NOMBRE:</td>
                    <td style="text-align: center;width: 32%"><b>{{$datos['nombre'].' '.$datos['paterno'].' '. $datos['materno']}}</b></td>
                    <td>COLONIA:</td>
                    <td style="text-align: center"><b>{{$datos['colonia']}}</b></td>
                </tr>
                <tr>
                    <td style="width: 14%">RFC:</td>
                    <td style="text-align: center;width: 32%"><b>{{$datos['rfc']}}</b></td>
                    <td>DELEGACIÓN:</td>
                    <td style="text-align: center"><b>{{$datos['alcaldia']}}</b></td>
                </tr>
                <tr>
                    <td>TELÉFONO:</td>
                    <td style="text-align: center"><b>{{$datos['telefono']}}</b></td>
                    <td>ENTIDAD:</td>
                    <td style="text-align: center"><b>{{$datos['entidad_federativa']}}</b></td>
                </tr>
                <tr>
                    <td>CALLE:  </td>
                    <td style="text-align: center"><b>{{$datos['calle']}}</b></td>
                    <td>C.P.  </td>
                    <td style="text-align: center"><b>{{$datos['cp']}}</b></td>
                </tr>
                </tbody>
            </table>
        </div>
        <p class="subtitulo2 verde-pasto" style="margin: 5px 0 7px 0;">DATOS DEL VEHÍCULO</p>

        <div class="contiene-tabla2">
            <table class="table tabla-style">
                <thead>
                </thead>
                <tbody>
                <tr>
                    <td style="width: 20%;">SERIE VEHICULAR:</td>
                    <td style="text-align: center;width: 32%"><b>{{$datos['serie_vh']}}</b></td>
                    <td style="width: 14%">COMBUSTIBLE:</td>
                    <td style="text-align: center;width: 32%"><b>{{$datos['combustible']}}</b></td>
                </tr>
                <tr>
                    <td>PLACA:</td>
                    <td style="text-align: center"><b>{{$datos['placa']}}</b></td>
                    <td>MODELO:  </td>
                    <td style="text-align: center"><b>{{$datos['modelo']}}</b></td>
                </tr>
                <tr>
                    <td>MARCA:  </td>
                    <td style="text-align: center"><b>{{$datos['marca_empresa']}}</b></td>
                    <td>PUERTAS:  </td>
                    <td style="text-align: center"><b>{{$datos['puertas']}}</b></td>
                </tr>
                <tr>
                    <td>LINEA:</td>
                    <td style="text-align: center"><b>{{$datos['linea_modelo']}}</b></td>
                    <td>MOTOR:  </td>
                    <td style="text-align: center"><b>{{$datos['numero_motor']}}</b></td>
                </tr>
                <tr>
                    <td>CVE. VEHÍCULAR:</td>
                    <td style="text-align: center"><b>{{$datos['clave_vehicular']}}</b></td>
                    <td>MOTIVO BAJA:</td>
                    <td style="text-align: center">{{$datos['tipo_movimiento']}}<b></b></td>
                </tr>
                <tr>
                    <td>REPUVE:</td>
                    <td style="text-align: center"><b>repuve</b></td>
                </tr>
                </tbody>
            </table>
        </div>
        <br>

    </div>

<div class="fotter-c">
    <div class="zona-firmas">
        <div class="imprimio-5"><div class="linea-negra-f"></div>Revisor (Nombre y Firma)</div>
        <div class="imprimio-6"><div class="linea-negra-f"></div>Responsable (Nombre y Firma)</div>
        <div class="imprimio-7"><div class="linea-negra-f"></div>Sello</div>
    </div>
    <p style="z-index: 50; font-style: italic">“Con fundamento en el artículo 11 de la Ley de Protección de Datos Personales para el Distrito Federal, la información contenida en
        este documentono es oficial hasta que se confirme por escrito con la firma autógrafa del Servidor Público facultado, por lo que la información
        contenida en el mismono es oficial de la secretaría de Movilidad hasta que se encuentre debidamente firmado en original.
        <br>
        Este documento es confidencial.
        dirigido para el uso exclusivo del destinatario, quedando prohibida su distribución y/o difusión en cualquiermodalidad sin previa autorización
        del Servidor Público que lo emite y coteja en los expedientes físicos del área que detenta”</p>
</div>
</body>
</html>
