<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body>
<header>
    <div class="cabezera">
        <img class="img_header" src="images/banner.png" alt="">
        <p class="subtitulo" >SABANA DE DATOS <b>SISCORP</b></p>
    </div>
</header>
<div class="panel bodycontainer">

    <div class="panel-body" >
        <div class="col-md-6 col-lg-offset-3 text-left">
            <div class="text-center cont_titulo">
                <span class="titulo">DATOS DEL PROPIETARIO</span>
            </div>
            <div class="contiene-tabla">
                <table class=" bordetabla" style="width: 100%">
                    <thead>
                    </thead>
                    <tbody>
                    <tr>
                        <td class=""><b>Nombre:&nbsp;&nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['nombre'].' '.$datos['paterno'].' '.$datos['materno']}}</span></td>
                        <td class=""><b>Genero:&nbsp;&nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['sexo']}}</span></td>
                    </tr>
                    <tr>
                        <td style=""><b>CURP/RFC:&nbsp;&nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['rfc']}}</span></td>
                        <td style=""><b>Telefono:&nbsp;&nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['telefono']}}</span></td>

                    </tr>
                    <tr>
                        <td class=""><b>Codigo Postal:&nbsp;&nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['cp']}}</span></td>
                        <td class=""><b>Entidad:&nbsp;&nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['entidad_federativa']}}</span></td>
                    </tr>
                    <tr>
                        <td class=""><b>Calle:&nbsp;&nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['calle']}}</span></td>
                        <td class=""><b>Alcaldia:&nbsp;&nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['entidad_federativa']}}</span></td>
                    </tr>
                    <tr>
                        <td class=""><b>Colonia:&nbsp;&nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['colonia']}}</span></td>
                        @if($datos['interior'])
                            <td class=""><b>Nro.Ext: &nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['exterior']}}</span>&nbsp;&nbsp;&nbsp;<b>Nro.Int:&nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['interior']}}</span></td>
                        @else
                            <td class=""><b>Nro.Ext:: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949"> {{$datos['exterior']}}</span></td>
                        @endif
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="text-center cont_titulo">
                <span class="titulo">DATOS DEL VEHICULO</span>
            </div>

            <div class="contiene-tabla">
                <table class=" bordetabla" style="width: 100%">
                    <thead>
                    </thead>
                    <tbody>
                    <tr>
                        <td class=""><b>NIV:&nbsp;&nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['serie_vh']??'NO APLICA'}}</span></td>
                        <td class=""><b>REPUVE:&nbsp;&nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['repuve']??'NO APLICA'}}</span></td>
                    </tr>
                    <tr>
                        <td style=""><b>Numero de Motor:&nbsp;&nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['numero_motor']??'NO APLICA'}}</span></td>
                        <td class=""><b>Valor Factura:&nbsp;&nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['importe_factura']??'NO APLICA'}}.00</span></td>
                    </tr>
                    <tr>
                        <td class=""><b>Centimetros Cubicos:&nbsp;&nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['cmcub']??'NO APLICA'}}</span></td>
                        <td class=""><b>Tipo de combustible:&nbsp;&nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['combustible']??'NO APLICA'}}</span></td>
                    </tr>
                    <tr>
                        <td class=""><b>Uso:&nbsp;&nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['uso']??'NO APLICA'}}</span></td>
                        <td class=""><b> Poliza de Seguro:&nbsp;&nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['folio_poliza']??'NO APLICA'}}</span></td>

                    </tr>
                    <tr>
                        <td style=""><b>Clave Vehicular:&nbsp;&nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['clave_vehicular']}}</span></td>
                        <td style=""><b>Tipo:&nbsp;&nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['clave_tipo']}}</span></td>

                    </tr>
                    <tr>
                        <td style=""><b>Marca:&nbsp;&nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['marca_real']==''??'NO REGISTRADA'}}</span></td>
                        <td style=""><b>Clase:&nbsp;&nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['clave_clase']==''??'NO REGISTRADA'}}</span></td>

                    </tr>
                    <tr>
                        <td style=""><b>Linea:&nbsp;&nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['linea_real']}}</span></td>
                        <td class=""><b>Puertas:&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #4b4949">{{$datos['puertas']??'NO APLICA'}}</span></b></td>

                    </tr>
                    <tr>
                        <td class=""><b>Version:&nbsp;&nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['ver_version']??'NO APLICA'}}</span></td>
                        <td class=""><b>Pasajeros:&nbsp;&nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['pasajeros']??'NO APLICA'}}</span></td>

                    </tr>
                    <tr>
                        <td class=""><b>Modelo:&nbsp;&nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['modelo']??'NO REGISTRADA'}}</span></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="text-center cont_titulo">
                <span class="titulo">DATOS DEL TRÁMITE</span>
            </div>
            <div class="contiene-tabla">
                <table class=" bordetabla" style="width: 100%">
                    <thead>
                    </thead>
                    <tbody>
                    <tr>
                        <td class=""><b>Placa:&nbsp;&nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['placa']}}</span></td>
                        <td class=""><b>Placa Anterior:&nbsp;&nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['placa_anterior']??'NO APLICA'}}</span></td>

                    </tr>
                    <tr>
                        <td class=""><b>Folio TC:&nbsp;&nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['folio_fisico_tc']}}</span></td>
                        <td class=""><b>Fecha Alta del Vehiculo:&nbsp;&nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{Str::limit($datos['created_at'],10, '')}}</span></td>

                    </tr>
                    <tr>
                        <td class=""><b>Tipo de Movimiento:&nbsp;&nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['tipo_movimiento']}}</span></td>
                        <td class=""><b>Fecha de Movimiento:&nbsp;&nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{Str::limit($datos['expedicion_tc'],10, '')}}</span></td>

                    </tr>
                    <tr>
                        <td class=""><b>Operador:&nbsp;&nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['operador']}}</span></td>
                        <td class=""><b>Numero de Modulo:&nbsp;&nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['numero_modulo']}}</span></td>

                    </tr>
                    <tr>
                        <td class=""><b>Modulo:&nbsp;&nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['modulo']}}</span></td>
                        <td class=""><b>Curp Solicitante:&nbsp;&nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['curp']}}</span></td>

                    </tr>
                    <tr>
                        <td class=""><b>Estatus Tramite:&nbsp;&nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['estatus']}}</span></td>


                    </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <div class="contiene-tabla" style="margin: 0 0 0 50px;width: 50%;">
                <table style="width: 100%">
                    <tr>
                        <th width="1"></th>
                        <th>EXPEDIDO CON FECHA:</th>
                        <td style="color: #4b4949">{{date('Y-m-d H:i:s')}}</td>
                    </tr>
                    <tr>
                        <th width="1"></th>
                        <th>IMPRIMIO CURP:</th>
                        <td style="color: #4b4949">{{$datos['username']}}</td>
                    </tr>
                </table>
            </div>

        </div>
    </div>
</div>
<img class="img_qr"  src="data:image/png;base64, {!! $datos['QR'] !!}">

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
