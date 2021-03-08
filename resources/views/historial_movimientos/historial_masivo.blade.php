@extends('adminlte::page')

@section('title', 'Historial de movimiento masivo')

@section('content_header')
@stop

@section('content')
    <style>
        input[type="file"] {
            display: none;
        }
        .estilo-btn{
            font-size: 14px;
            font-weight: 600;
            color: #fff;
            background-color: #26a010;
            display: inline-block;
            transition: all .5s;
            cursor: pointer;
            padding: 15px 40px !important;
            text-transform: uppercase;
            width: fit-content;
            text-align: center;
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
<div class="col-md-12">
            <div class="row">
                <div class="col-md-6 mx-auto">

                    <!-- form card login -->
                    <div class="card rounded-0">
                        <div class="card-header">
                            <h3 class="mb-0">Genera historiales masivos por placa: <i class="animate__animated animate__fadeInLeft animate__delay-1s  far fa-list"></i> </h3>
                            <h5>El archivo debe contener solo una columna conformada por las placas a generar</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{route($ruta)}}" method="POST" id="form_sabanas" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="btn btn-block btn-outline-secondary" id="etiqueta-archivo_csv" onclick="cambio('archivo_csv')">
                                        Seleccionar CSV
                                    </div>
                                    <input type="file" accept="CSV" class="form-control-file" id="archivo_csv" name="archivo_csv">
                                </div>
                                <div class="form-group">
                                        <h5>Correo para enviar el archivo</h5>
                                    <input type="text" class="form-control" id="mail" name="mail" onblur="validarEmail(this.value)">
                                </div>
                            </form>
                            <div class="btn btn-outline-success btn-block" id="enviar">Generar Sabanas</div>
                        </div>
                        <!--/card-block-->
                    </div>
                    <!-- /form card login -->
                </div>
            </div>
            <!--/row-->
        </div>
<script>
    function cambio(id){
        $('#'+id).click();
    }

    var input = document.getElementById("form_sabanas");

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
    function validarDocumentos(id_form){
        var form = document.getElementById(id_form);

        var valido = 1;
        var titulo = 'Debes proporcionar todos los documentos solicitados:';
        var texto = '<ul>';
        var e = '';
        var limite = 0;
        $.each(form, function (i, elemento) {
            if ( elemento.type == 'file' && elemento.value == '' ){
                e = document.getElementById(elemento.id);
                valido = 0;
                texto += '<li>Proporciona '+ e.id.toUpperCase().replace('_',' ') +'</li>';
                limite++;
            }else if( elemento.type == 'text' && elemento.value == '' ){
                e = document.getElementById(elemento.id);
                valido = 0;
                texto += '<li>Proporciona '+ e.id.toUpperCase().replace('_',' ') +'</li>';
                limite++;
            }
            if(limite === 5){return false;}
        });
        texto += '</ul>';
        if (valido === 1){
            // $('#contenedor_carga').show('slow')
            consumeajax();
            // $('#'+id_form).submit();
        }
        else{
            Swal.fire({
                icon: 'error',
                title: titulo,
                html: texto,
            }).then(function () {
                e.focus();
                e.style.borderColor="red";
            });
        }
    }
    $('#enviar').on('click', function (){
        validarDocumentos('form_sabanas');

    });
    $('input[type="file"]').on('change', function(){
        let tipo_ingresado = 'CSV';
        let ext = $( this ).val().split('.').pop();
        if( tipo_ingresado.toLowerCase() !== ext.toLowerCase() ){
            Swal.fire({
                icon: 'warning',
                title: '¡Precaución formato equivocado',
                text: 'el documento debe ser '+tipo_ingresado+'!'
            });
            $(this).val('')
        }
        if($( this ).val() !== '') {
            if( ext.toUpperCase() == "CSV" ){
                if($(this)[0].files[0].size > 548576){
                    Swal.fire({
                        icon: 'warning',
                        title: '¡Precaución el documento excede el tamaño máximo!',
                        text: "Se solicita un archivo no mayor a 500Kb. Por favor verifica."
                    });
                    $(this).val('')
                }else{

                }
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Extencion no permitida',
                    text: "La extensión es: " + ext
                });
                $(this).val('');
            }
        }



    });
    jQuery('input[type=file]').change(function(){
        var filename = jQuery(this).val().split('\\').pop();
        var idname = jQuery(this).attr('id');
        console.log(jQuery(this).val());
        console.log(filename);
        $('#etiqueta-'+idname).html(filename===''?'Seleccione archivo':filename);
        console.log(idname);
        jQuery('span.'+idname).next().find('span').html(filename);
    });
    function validarEmail(valor) {
        emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
        //Se muestra un texto a modo de ejemplo, luego va a ser un icono
        if (!emailRegex.test(valor)) {
            Swal.fire({
                icon: 'error',
                title: 'Verifica el correo ingresado',
            });
            $('#mail').val('');
        }
    }

    function consumeajax() {
        var loader = $('#contenedor_carga');
        loader.show();
        var csv = $("#archivo_csv").val();
        var mail = $("#mail").val();
        var formData = new FormData();
        jQuery.each($('input[type=file]')[0].files, function(i, file) {
            formData.append('csv', file);
        });
        formData.append('csv',csv);
        formData.append('mail',mail);
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "{{url('historial/historial-masivo_2')}}",
            type: "post",
            processData: false,
            contentType: false,
            data: formData,
            beforeSend: function() {
                // loader.hide();
                // Swal.fire({
                //     icon: 'success',
                //     title: 'Se commenzo el processo',
                //     html: 'Sen enviara un correo a:' +mail+ ' al finalizar, la pagina se actualizara en unos segundos',
                // }).then(function () {
                //     location.reload();
                // });
                // setInterval(function(){
                //     location.reload();
                // }, 30000);


            },
            success: function (data) {

                loader.hide();
                Swal.fire({
                    icon: 'warning',
                    title: 'Atención!',
                    html: data,
                })
                console.log(data);
            }
        });
    }
</script>
@stop
@section('footer')
    <div class="row">
        <div class="col" style="font-weight: bold;">Secretaría de Movilidad de la Ciudad de México </div>
        <div class="col">Dirección de Sistemas de Información .2020 &copy;</div>
    </div>

@stop
