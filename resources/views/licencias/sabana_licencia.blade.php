<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <title>Sabanas Licencia</title>
</head>
<body>
<style>
    body{
        font-family: "Helvetica Neue", sans-serif;
        font-size: 12px;

    }
    .img_header {
        position: fixed;
        left: 15%;
        height: 70px;
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
        font-size: 12px;
        height: 20px;
    }
    .bordetabla{
        padding: 15px;
        border-radius: 15px;
    }
    .contiene-tabla{
        border:1px solid #646464;
        border-radius: 15px;
        background-color: white;
        top: 13%;
        position: fixed;
    }
    .contiene-tabla2{
        border:1px solid #646464;
        border-radius: 15px;
        background-color: white;
        top: 56%;
        position: fixed;
    }
    .contiene-tabla3{
        border:1px solid #646464;
        border-radius: 15px;
        background-color: white;
        bottom: 12%;
        left: -6%;
        position: fixed;
    }
    .cont_titulo{
        background: #3db820;
        border-radius: 5px;
        top: 10%;
        position: fixed;
    }
    .cont_titulo2{
        background: #3db820;
        border-radius: 5px;
        top: 53%;
        position: fixed;
    }

    .subtitulo{
        position: fixed;
        left:18%;
        top: 44px;
        width: 50%;
        font-size: 17px;
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
    table{
        width: 100%;
    }

</style>
<header>
    <img class="img_header" src="images/banner.png" alt="">
    <p class="subtitulo" >SABANA DE CONSULTA DE LICENCIAS Y PERMISOS DE CONDUCIR</p>
</header>
<main>
    <div class="panel-body" >
        <div class="col-md-6 col-lg-offset-3 text-left">
            <div class="text-center cont_titulo">
                <span class="titulo">DATOS DEL CIUDADANO</span>
            </div>
            <div class="contiene-tabla">
                <table class=" bordetabla" style="width: 100%">
                    <tbody>
                    <tr>
                        <td colspan="2"><b>Nombre: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><br><span style="color: #4b4949;">{{$datos['datos_lic']['nombre'].' '.$datos['datos_lic']['paterno'].' '.$datos['datos_lic']['materno']}}</span></td>
                    </tr>
                    <tr>
                        <td style=""><b>CURP/RFC: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><br><span style="color: #4b4949">{{$datos['datos_lic']['curp']}}</span></td>
                        <td style=""><b>Nacionalidad: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><br><span style="color: #4b4949">{{$datos['datos_lic']['nacionalidad']}}</span></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style=""><b>Genero: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><br><span style="color: #4b4949">{{$datos['datos_lic']['sexo']}}</span></td>
                        <td style=""><b>Tipo sanguineo: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><br><span style="color: #4b4949">{{$datos['datos_lic']['tipo_sanguineo']}}</span></td>
                    </tr>
                    <tr>
                        <td class=""><b>Alcaldia: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><br><span style="color: #4b4949">{{$datos['datos_lic']['municipio']}}</span></td>
                        <td class=""><b>Codigo Postal: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><br><span style="color: #4b4949">{{$datos['datos_lic']['cp']}}</span></td>
                    </tr>
                    <tr>
                        <td class=""><b>Calle: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><br><span style="color: #4b4949">{{$datos['datos_lic']['calle']}}</span></td>
                        <td class=""><b>Colonia: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><br><span style="color: #4b4949">{{$datos['datos_lic']['colonia']}}</span></td>
                    </tr>
                    <tr>
                        @if($datos['datos_lic']['nro_int'])
                            <td class=""><b>Nro.Ext: &nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['datos_lic']['nro_ext']}}</span>&nbsp;&nbsp;&nbsp;<b>Nro.Int:&nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['datos_lic']['nro_int']}}</span></td>
                        @else
                            <td class=""><b>Nro.Ext: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><br><span style="color: #4b4949">{{$datos['datos_lic']['nro_ext']}}</span></td>
                        @endif
                            <td style=""><b>Entidad: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><br><span style="color: #4b4949">{{$datos['datos_lic']['estado']}}</span></td>
                    </tr>
                    <tr>
                        <td style=""><b>Telefono: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><br><span style="color: #4b4949">{{$datos['datos_lic']['telefono']}}</span></td>
                    </tr>
                    </tbody>
                </table>
                <img style="width: 27%; position:fixed; right: 4%; top: 14%; border-radius: 15px;" src="data:image/png;base64,{{ $datos['foto_lic']}}" alt="" >

                <h6 style="position:absolute; right: 25%; top: 36%">Firma</h6>

                <img style="width: 100px;position:fixed; right: 18%; top: 34%"src="data:image/png;base64,{{ $datos['firma_lic']}}" alt="" >

                <h6 style="position:absolute; right: 8%; top: 36%">Huella</h6>

                <img style="width: 90px; position:fixed; right: 4%; top: 34%" src="data:image/png;base64,{{ $datos['huella_lic']}}" alt="" >
            </div>
            <div class="text-center cont_titulo2">
                <span class="titulo">DATOS DE LA LICENCIA</span>
            </div>
            <div class="text-center contiene-tabla2">
                <table class="bordetabla">
                    <tr>
                        <th>MOVIMIENTO</th>
                        <th>TIPO LICENCIA</th>
                        <th>FOLIO</th>
                        <th>AÑOS</th>
                        <th>FECHA INICIO</th>
                        <th>FECHA FIN</th>
                        <th>MODULO</th>
                        <th>CANDADOS</th>
                    </tr>
                    <tr>
                        <td>{{$datos['datos_lic']['tipo_movimiento']}}</td>
                        <td>{{$datos['datos_lic']['tipo_licencia']}}</td>
                        <td>{{$datos['datos_lic']['folio']}}</td>
                        <td>{{(int)(substr($datos['datos_lic']['fecha_vencimiento'],6,10))-(int)(substr($datos['datos_lic']['fecha_expedicion'],6,10))}} años</td>
                        <td>{{substr($datos['datos_lic']['fecha_expedicion'],0,10)}}</td>
                        <td>{{substr($datos['datos_lic']['fecha_vencimiento'],0,10)}}</td>
                        <td>{{$datos['datos_lic']['modulo']}}</td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="contiene-tabla3 " style="margin: 50px 0 0 50px;width: 50%;">
            <table style="width: 100%; padding: 2px">
                <tr>
                    <td>
                        <strong>EXPEDIDO CON FECHA:</strong> {{date('Y-m-d H:i:s')}}
                        <br>
                        <strong>IMPRIMIO CURP:</strong> {{$datos['username']}}
                    </td>
                </tr>
            </table>
        </div>
    </div>
</main>
<footer>
    <div class="fod">

        <hr style=" border-top: 1px dotted;">
        <p class="leyenda"> Dirección de Sistemas, Secretaría de Movilidad Ciudad de México 2020 &copy;</p>
        <p style="z-index: 5">"Con fundamento en el artículo 11 de la Ley de Protección de Datos Personales para el Distrito Federal,
            la información contenida en este documento no es oficial hasta que se confirme por escrito con
            la firma autógrafa del Servidor Público facultado, por lo que la información contenida en el mismo no es oficial de la
            Secretaría de Movilidad hasta que se encuentre debidamente firmado en original.Este documento es confidencial, dirigido
            para uso exclusivo del destinatario, quedando prohibida su distribución y/o difusión en cualquier modalidad sin
            previa autorización del Servidor Público que lo emite y coteja en los expedientes físicos del área que la detenta.</p>
        <img class="footter"  src="images/footer.png" alt="">
    </div>
</footer>


</body>
</html>
