<html>
<head>
    <title>Historial de movimientos SISCORP {{$datos[0]['placa']}}</title>
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
            position: relative;
            left: 200px;
            height: 70px;
            margin: 0 0 0 150px;
        }

        .footter{
            position: fixed;
            left: -2%;
            height: 50px;
            bottom: -30px;
        }
        .fod{
            position: fixed;
            bottom: 80px;
            padding: 0;
            margin: 0;
            font-size: 8px;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center bottom;
        }



        .subtitulo{
            position: relative;
            left:24%;
            width: 50%;
            font-size: 14px;
            color:#3db820;
            padding: 2px;
            text-align: center;
            border: 3px solid #3db820;
            border-radius: 10px;
        }
        .leyenda{
            font-size: 10px;
            position: fixed;
            color: grey;
            bottom: 80px;
            float: left;
        }
        .fecha_now{
            font-size: 10px;
            position: fixed;
            color: grey;
            bottom: 80px;
            right: 0;
            float: right;
        }
        table tr td{
            height: 10px !important;
        }
        .contiene-tabla{
            border:1px solid #646464;
            font-size: 10px;
            padding: 0 2px 0 2px;
        }
        .table td, .table th {
            padding: 0 !important;
            vertical-align: top;
            border: 1px solid #ffffff !important;
        }
        .fondo-gris{
            background: #DDDDDD;
            border: 1px solid #DDDDDD !important;
        }
        .medida{
            width: 16%;
        }
    </style>
</head>
<body>
<img class="img_header" src="images/banner.png" alt="">
<p class="subtitulo" >HISTORIAL DE MOVIMIENTOS</p>
<div class="contiene-tabla">
    <table class="table bordetabla">
        <thead>
        </thead>
        <tbody>
        <tr>
            <td class="medida"><b>NIV:</b></td>
            <td class="medida"><span style="color: #4b4949">{{$datos[0]['serie_vh']}}</span></td>
            <td class="medida"><b>Modelo:</b></td>
            <td class="medida"><span style="color: #4b4949">{{$datos[0]['modelo']}}</span></td>
            <td class="medida"><b>Número de motor:</b></td>
            <td class="medida"><span style="color: #4b4949">{{$datos[0]['numero_motor']}}</span></td>

        </tr>
        <tr>
            <td style=""><b>Clave Vehicular:</b></td>
            <td style=""><span style="color: #4b4949">{{$datos[0]['clave_vehicular']}}</span></td>
            <td class=""><b>REPUVE:  </b></td>
            <td class=""><span style="color: #4b4949">{{$datos[0]['repuve']}}</span></td>
            <td class=""><b>Tipo de Vehiculo:  </b></td>
            <td class=""><span style="color: #4b4949"> {{$datos[0]['clave_tipo']}}</span></td>
        </tr>
        <tr>
            <td class=""><b>Importe de factura:  </b></td>
            <td class=""><span style="color: #4b4949"> {{$datos[0]['importe_factura']}}</span></td>
            <td class=""><b>Número de factura:  </b></td>
            <td class=""><span style="color: #4b4949"> {{$datos[0]['folio_factura']}}</span></td>
            <td class=""><b>Fecha de Factura:  </b></td>
            <td class=""><span style="color: #4b4949"> {{$datos[0]['fecha_factura']}}</span></td>
        </tr>
        <tr>
            <td class=""><b>Linea:</b></td>
            <td class=""><span style="color: #4b4949"> {{$datos[0]['linea_modelo']}}</span></td>
            <td class=""><b>Marca:  </b></td>
            <td class=""><span style="color: #4b4949"> {{$datos[0]['marca_empresa']}}</span></td>
            <td class=""><b>Versión:</b></td>
            <td class=""><span style="color: #4b4949"> {{$datos[0]['ver_version']}}</span></td>
        </tr>

        </tbody>
    </table>
</div>
<br>
@foreach($datos as $indice=>$movimiento)
    @if($indice == 0)
        <div style="width: 100%;">
            <div style=";float: right;color:#777777;text-align: center; font-weight: bold; padding: 3px; width: 50%">CURP de impresor: {{$datos[0]['revisor']}}</div>
        </div>
        @endif
    <div style="color:{{getColorTabla($indice)}};text-align: center; font-weight: bold;border: 1px solid {{getColorTabla($indice)}}; padding: 3px; width: 27%; border-radius: 0 10px 0 0">Movimiento:{{count($datos)-$indice}}</div>

    <div class="contiene-tabla">
        <table class="table bordetabla" style="font-size: 9px;">
            <thead></thead>
            <tbody>
            <tr>
                <td class="font-weight-bold fondo-gris">Placa:</td><td>{{$movimiento['placa']}}</td><td class="font-weight-bold fondo-gris">Placa anterior:</td><td>{{$movimiento['placa_anterior']}}</td><td class="font-weight-bold fondo-gris">Clave Vehicular:</td><td>{{$movimiento['clave_vehicular']}}</td><td class="font-weight-bold fondo-gris">NIV:</td><td>{{$movimiento['serie_vh']}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold fondo-gris">Estatus:</td><td>{{$movimiento['estatus']}}</td><td class="font-weight-bold fondo-gris">Folio lógico:</td><td>{{$movimiento['folio_logico_tc']}}</td><td class="font-weight-bold fondo-gris">Folio fisico:</td><td>{{$movimiento['folio_fisico_tc']}}</td><td class="font-weight-bold fondo-gris">Procedencia:</td><td>{{$movimiento['procedencia']}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold fondo-gris">Fecha expedición:</td><td>{{$movimiento['expedicion_tc']}}</td><td class="font-weight-bold fondo-gris">Fecha de alta:</td><td>{{substr(end($datos)['vehiculo_created_at'],0,10)}}</td><td class="font-weight-bold fondo-gris">Fecha MOV:</td><td>{{$movimiento['created_at']}}</td><td class="font-weight-bold fondo-gris">Modulo MOV:</td><td>{{$movimiento['modulo']}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold fondo-gris">Movimiento T:</td><td>{{$movimiento['tipo_movimiento']}}</td><td class="font-weight-bold fondo-gris">Modulo T:</td><td>{{$movimiento['modulo']}}</td><td class="font-weight-bold fondo-gris">Revisor:</td><td>{{$movimiento['curp_operador']}}</td><td class="font-weight-bold fondo-gris">RFC:</td><td>{{$movimiento['rfc']}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold fondo-gris">Nombre:</td><td>{{$movimiento['nombre']}}</td><td class="font-weight-bold fondo-gris">Ap.Paterno:</td><td>{{$movimiento['paterno']}}</td><td class="font-weight-bold fondo-gris">Ap.Materno:</td><td>{{$movimiento['materno']}}</td><td class="font-weight-bold fondo-gris">Razón Social:</td><td>{{$movimiento['razon_social']}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    @endforeach
    <div class="fod">
        <hr>
        <p class="leyenda"> Dirección de Sistemas, Secretaría de Movilidad Ciudad de México 2020 &copy;</p>
        <p class="fecha_now"><b>SISCORP</b> {{now()}}</p>


        <p style="z-index: 50">"Con fundamento en el artículo 11 de la Ley de Protección de Datos Personales para el Distrito Federal,
            la información contenida en este documento no es oficial hasta que se confirme por escrito con
            la firma autógrafa del Servidor Público facultado, por lo que la información contenida en el mismo no es oficial de la
            Secretaría de Movilidad hasta que se encuentre debidamente firmado en original.Este documento es confidencial, dirigido
            para uso exclusivo del destinatario, quedando prohibida su distribución y/o difusión en cualquier modalidad sin
            previa autorización del Servidor Público que lo emite y coteja en los expedientes físicos del área que la detenta.</p>
        <img class="footter"  src="images/footer.png" alt="">
    </div>
</body>
</html>
