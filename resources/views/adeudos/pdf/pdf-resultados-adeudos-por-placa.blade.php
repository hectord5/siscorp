<html>
<head>
    <title>Reporte adeudos SISCORP</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .table td, .table th {
            padding: .25rem !important;
            vertical-align: top;
            border-top: 0 solid #dee2e6 !important;
            font-family: "a r i a l", serif !important;
        }

        .contenido{
            border:1px solid darkgreen;
            border-radius: 10px;
            padding: 15px;
            height: auto;
            position: relative;


        }
        .header-s{
            height: 70px;
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
        leyenda{
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
    </style>
</head>
<body>

<div class="header-s">
    <img src="{{url('images/banner.png')}}" alt="" style="height: 70px;margin: 0 0 0 130px;">
</div>
<div class="container contenido">
    <div class="card-title alert-success alert">
        <h4 style="text-align: center">Adeudos de la placa: {{$respuesta['placa']}}</h4>
    </div>
    <div class="card-body" style="font-size: 12px">
        @foreach($respuesta as $i => $v)
            @if($i ==='placa')
            @elseif($i === 'adeudo_tenencia')
            @elseif($i === 'adeudo_sancion')
                <table class="table table-striped">
                    <tr>
                        <td width="100">
                            <div class="bg-light">
                                Estatus de Sancion
                            </div>
                        </td>
                        <td>
                            @if($v)
                                La placa {{$respuesta['placa']}} tiene sanción
                            @else
                                La placa {{$respuesta['placa']}} no tiene sanción
                            @endif
                        </td>
                    </tr>
                </table>
            @elseif($i === 'adeudo_infraccion')
                <table class="table table-striped">
                    <tr>
                        <td width="100">
                            <div class="bg-light">
                                Estatus de Multas
                            </div>
                        </td>
                        <td>
                            @if($v)
                                La placa {{$respuesta['placa']}} tiene multas pendientes
                            @else
                                La placa {{$respuesta['placa']}} no tiene multas pendientes
                            @endif
                        </td>
                    </tr>
                </table>
            @elseif($i === 'verifica')
                <table class="table table-striped">
                    <tr>
                        <td width="100">
                            <div class="bg-light">
                                Estatus de Verificación
                            </div>
                        </td>
                        <td>
                            @if($v)
                                La placa {{$respuesta['placa']}} verificación pendiente
                            @else
                                La placa {{$respuesta['placa']}} verificación al corriente
                            @endif
                        </td>
                    </tr>
                </table>
            @elseif($i === 'economicas')
                <table class="table table-striped">
                    <tr>
                        <td width="100">
                            <div class="bg-light">
                                Multas economicas
                            </div>
                        </td>
                        <td>
                            @if(count($v) <= 0)
                                La placa {{$respuesta['placa']}} No tiene multas pendientes
                            @else
                                <table class="table table-striped">
                                    <tr style="font-weight: bold">
                                        <td>Folio</td><td>Fecha</td><td>Estatus</td>
                                    </tr>

                                    @foreach($v as $indice => $valor)
                                        <tr>
                                            <td>{{$valor['folio']}}</td>
                                            <td>{{$valor['fecha']}}</td>
                                            <td>{{$valor['status']}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            @endif
                        </td>
                    </tr>
                </table>
            @elseif($i === 'adeudo_fotocivicas')
                <table class="table table-striped">
                    <tr>
                        <td width="100">
                            <div class="bg-light">
                                Adeudo fotocivicas
                            </div>
                        </td>
                        <td>
                            <table class="table table-striped">
                                <tr style="font-weight: bold">
                                    <td>Puntos</td><td>Debe fotocivicas</td><td>Debe asistir precencial</td>
                                    <td>Debe realizar curso en linea</td>
                                </tr>
                                <tr>
                                    @foreach($v as $indice => $valor)
                                        @if($indice=='puntos')
                                            <td>{{$valor}}</td>
                                        @else
                                            <td>{{$valor?'SI':'NO'}}</td>
                                        @endif

                                    @endforeach
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            @elseif($i === 'sanciones')
                <table class="table table-striped">
                    <tr>
                        <td width="100">
                            <div class="bg-light">
                                Sanciones
                            </div>
                        </td>
                        <td>
                            @if(count($v) <= 0)
                                La placa {{$respuesta['placa']}} No tiene sanciones
                            @else
                                <table class="table table-striped">
                                    <tr style="font-weight: bold">
                                        <td>Folio</td><td>Fecha</td><td>Estatus</td>
                                    </tr>
                                    @foreach($v as $indice => $valor)
                                        <tr>
                                            <td>{{$valor['folio']}}</td>
                                            <td>{{$valor['fecha']}}</td>
                                            <td>{{$valor['status']}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            @endif
                        </td>
                    </tr>
                </table>
            @elseif($i === 'tenencias')
                <table class="table table-striped">
                    <tr>
                        <td width="100">
                            <div class="bg-light">
                                Estatus de Tenencias
                            </div>
                        </td>
                        <td>
                            @if(count($v) <= 0)
                                La placa {{$respuesta['placa']}} no debe tenencias
                            @else
                                <h7>{{$respuesta['mensaje_tenencia']}}</h7>
                                <table class="table table-striped">
                                    @foreach($v as $indice => $valor)
                                        <tr>
                                            <td>Año</td><td>{{$valor}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            @endif
                        </td>
                    </tr>
                </table>

            @endif
        @endforeach
    </div>

</div>

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

