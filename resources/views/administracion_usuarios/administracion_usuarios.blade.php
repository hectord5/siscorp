{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'SISCORP')

@section('content_header')
    <h1 class="text-dark text-bold">Administración de usuarios</h1>
@stop

@section('content')
    <div class="row">

        <div class="col-lg-6">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-lg btn-secondary" onclick="ModalNuevoUsuario()">Nuevo usuario</button>
                <button type="button" class="btn btn-lg btn-secondary" onclick="ModalNuevoRol()">Descripción de roles</button>
                @if($user['direccion_id'] == 0)
                    <button type="button" class="btn btn-lg btn-secondary" onclick="ModalNuevaDireccion()">Agregar Direccíon</button>
                @endif
              </div>
        </div>

        <div class="col-lg-12">
            <div class="panel table-responsive">
                <table class="table table-bordered" id="table1">
                    <thead class="table bg-success">
                        <tr>
                            <th>NOMBRE</th>
                            <th>CURP</th>
                            <th>EMAIL</th>
                            <th>DIRECCIÓN</th>
                            <th>ESTATUS</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="bg-light">
                    @foreach($usuarios as $usuario)
                        <input type="hidden" name="dir_{{$usuario->id}}" id="dir_{{$usuario->id}}" value="{{$usuario->direccion_id}}">
                        <tr>
                            <td><div id="name_{{$usuario->id}}">{{$usuario->name}}</div></td>
                            <td><div id="username_{{$usuario->id}}">{{$usuario->username}}</div></td>
                            <td><div id="email_{{$usuario->id}}">{{$usuario->email}}</div></td>
                            <td><div>{{ $usuario->direccion->texto ?? '' }}</div></td>
                            <td><div>{{ txtEstatus($usuario->estatus) }}</div></td>
                            <td>
                                <div class="btn btn-sm btn-primary" id="id_user_pass_{{$usuario->id}}" onclick="llenaModal('{{$usuario->name}}','{{$usuario->id}}')">Cambiar</div>
                                <div class="btn btn-sm btn-{{ colorBtnEstatus($usuario->estatus) }}" id="id_user_desha_{{$usuario->id}}" onclick="habilita('{{$usuario->name}}','{{$usuario->id}}','{{ txtEstatus($usuario->estatus) }}')">{{ $usuario->estatus=='B'?'Habilitar':'Deshabilitar'}}</div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_header_sm"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('ActualizaUsers')}}" id="form_roles" name="form_usuarios" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="modal-body" id="modal_body_sm"></div>
                </form>
                <div class="modal-footer" id="modal_footer_sm"></div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div id="myModal" class="modal fade bd-example-modal-lg" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content" style="background-color: rgb(255,255,255);">

                <div class="modal-body" style="height: auto; overflow: auto;">
                    <form action="{{route('ActualizaUsers')}}" id="form_usuarios" name="form_usuarios" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row" id="headers_body">----</div>
                        <div class="row" id="modal_body" style="padding: 10px;">
                            ---
                        </div>
                        <input type="hidden" name="roles_usuario" id="roles_usuario">
                    </form>
                </div>
                <div class="modal-footer">
                    <div id="modal_footer" style="padding: 15px 0px;">

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="direccionesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_header_dir"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('NuevaDireccion')}}" id="form_dir" name="form_dir" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="modal-body" id="modal_body_dir"></div>
                </form>
                <div class="modal-footer" id="modal_footer_dir"></div>
            </div>
        </div>
    </div>
    <form action="{{route('EliminarRole')}}" id="form_elim_rol" method="POST">
        @csrf
        <input type="hidden" name="role_id" id="role_id">
    </form>
    <form action="{{route('HabilitaDeshabilitaUser')}}" id="form_desabilitaUs" method="POST">
        @csrf
        <input type="hidden" name="user_id" id="user_id">
        <input type="hidden" name="opcion_ad" id="opcion_ad">
    </form>
    <form action="{{route('restablecerContraseña')}}" id="form_restablecePass" method="POST">
        @csrf
        <input type="hidden" name="user_id_restablece" id="user_id_restablece">
    </form>
@stop
@section('footer')
        <div class="row">
            <div class="col" style="font-weight: bold;">Secretaria de Movilidad de la Ciudad de México </div>
            <div class="col">Direccion de Sistemas de Informacion .2020 &copy;</div>
        </div>

@stop
@section('css')
    <style>
    .elementos_list{
        text-align: center;
        list-style: none;
        padding: 10px;
        border:1px solid darkgrey;
        border-radius: 2px;
    }
    .elementos_list:hover {
        font-weight: bold;
        background-color: #2fc836;
        border-radius: 10px;
        color: white;
    }
    .elementos_list:active {
        background-color: darkgrey;
        color: white;
        border-radius: 5px;
    }
    .elementos_list2{

    }
    .elementos_list3{
        text-align: center;
        padding: 20px;
        border:1px solid darkgrey;
        border-radius: 5px;
        background-color: #0e2231;
    }
    .elementos_list2:hover {
        font-weight: bold;
        background-color: #2fc836;
        border-radius: 10px;
        color: white;
    }
    .elementos_list2:active {
        background-color: darkgrey;
        color: white;
        border-radius: 5px;
    }
    .elementos_list4{
        text-align: center;
        width: 50px;
        margin: 7px;
        border: 1px solid darkgrey;
        border-radius: 5px;
        background-color: #2fc836;
        color:white;
        font-weight: bold;
    }
    .elementos_list4:active {
        background-color: darkgrey;
        color: white;
        border-radius: 5px;
    }
    .elementos_list3{
        text-align: center;
        width: 50px;
        margin: 7px;
        border: 1px solid darkgrey;
        border-radius: 5px;
        background-color: rgba(240,240,240,.8);
    }
    .elementos_list3:active {
        background-color: darkgrey;
        color: white;
        border-radius: 5px;
    }
    .elementos_list3:hover {
        background-color: cadetblue;
        color: white;
        border-radius: 5px;
    }
    .elementos_list4:hover {
        background-color: cadetblue;
        color: white;
        border-radius: 5px;
    }
    .contenedor_listas{
        max-height: 50%;
        height: 100%;
        overflow: auto;
        background-color: white;
        padding: 5px;
    }

    .estilo_elementos_list2{
        text-align: center;
        list-style: none;
        padding: 10px;
        border:1px solid darkgrey;
        border-radius: 2px;
    }

    .estilo_elementos_list2:active {
        background-color: darkgrey;
        color: white;
        border-radius: 5px;
    }

    .estilo_listado{
        width: 100%;
    }
    .titulos{
        text-align: center;
        color: white;
        font-weight: bold;
        background-color:#3d673f;
    }
    </style>
@stop

@section('js')
    <script>
        function mayusculas(id){
            $('#'+id).val($('#'+id).val().toUpperCase());
        }
        var controles_disp = direcciones = roles ='';
        @foreach($roles as $rol)
            @if(!in_array($rol->name,array('gris','verde','moto','antiguo','remolque','taxi','ruta','escolta','especial','disca')))
            roles +='<li onclick="cambioDLista({{$rol->id}})" class="elementos_list" id="elem_rol_{{$rol->id}}" name="elem_rol_{{$rol->id}}" value="{{$rol->id}}">{{$rol->name=='director'?'ACTIVIDAD USUARIOS':strtoupper($rol->name)}}</li>';
            @else
            controles_disp +='<div onclick="cambioDSeleccion({{$rol->id}})" class="elementos_list3 col-md-2" id="elem_rol_{{$rol->id}}" name = "elem_rol_{{$rol->id}}"  value="{{$rol->id}}">{{strtoupper($rol->name)}}</div>';
            @endif
        @endforeach
                let direcciones_p = '';
        @foreach($direcciones as $dir)
            direcciones +='<option value="{{$dir->id}}">{{$dir->texto}}</option>';
            direcciones_p +='<p>{{$dir->texto}}</p>';
        @endforeach
        function ModalNuevoUsuario(){
            $('#headers_body').html('<div class="col-md-12">CREACIÓN DE USUARIO:</div><div class="col-md-12 titulos">DATOS DEL USUARIO</div>');
            var rol_existentes = '<div class="col-md-6 contenedor_listas"><div class="titulos">SECCIONES DEL SISTEMA</div><ul style="max-height: 300px;overflow: auto" id="rol_existentes" class="estilo_listado container-fluid">' + roles +
                '</ul></div>';
            var controles_actuales = '<div class="col-md-12 titulos">CONTROLES</div><div class="row">'+controles_disp+'</div>';
            var rol_user = '<div class="col-md-6 contenedor_listas"><div class="titulos">PERMISOS DEL USUARIO</div><ul style="max-height: 300px;overflow: auto" id="rol_user" class="estilo_listado container-fluid"></ul></div>';
            var body =  '<div class="col-md-12"><table style="width: 100%">' +
                '<tr><td>CURP: </td><td><input id="username" onkeyup="mayusculas(\'username\')" class="form-control" name="username"></td></tr>'+
                '<tr><td>NOMBRE: </td><td><input id="name" class="form-control" name="name"></td></tr>'+
                '<tr><td>DIRECCIÓN: </td><td><select class="form-control" name="direccion_id" id="direccion_id"><option value="-">Selecciona una Dirección</option>'+direcciones+'</select></td></tr>'+
                '<tr><td>EMAIL: </td><td><input id="EMAIL" class="form-control" name="EMAIL" ></td></tr>'+
                '<tr><td>CONTRASEÑA: </td><td><input id="PASS" class="form-control" disabled name="PASS" placeholder="Por defecto se asignará la contraseña 1234abcd"></td></tr>'+
                '</table></div> '+rol_existentes+rol_user+controles_actuales;
            var footer ='<button type="button" onclick="enviar_datos()" class="btn btn-success" data-dismiss="modal">GUARDAR</button>' +
                '        <button type="button" class="btn btn-dark" data-dismiss="modal">CANCELAR</button>';
            $('#myModal').modal('show');
            $('#modal_body').html(body);
            $('#modal_footer').html(footer);
        }
        function llenaModal(usuario, id){
            $('#headers_body').html('<div class="col-md-12">MODIFICACIÓN DE USUARIO '+ usuario+':</div><div class="col-md-12 titulos">DATOS DEL USUARIO</div>');
            var rol_existentes = '<div class="col-md-6 contenedor_listas"><div class="titulos">SECCIONES DEL SISTEMA</div><ul style="max-height: 300px;overflow: auto" id="rol_existentes" class="estilo_listado container-fluid">' + roles +
                '</ul></div>';
            var controles_actuales = '<div class="col-md-12 titulos">CONTROLES</div><div class="row">'+controles_disp+'</div>';
            let username = $('#name_'+id).text();
            let curp = $('#username_'+id).text();
            let direccion = $('#dir_'+id).val();
            let email = $('#email_'+id).text();
            var rol_user = '<div class="col-md-6 contenedor_listas"><div class="titulos">PERMISOS DEL USUARIO</div><ul style="max-height: 300px;overflow: auto" id="rol_user" class="estilo_listado container-fluid"></ul></div>';
            var body =  '<div class="col-md-12"><input type="hidden" name="id_user" value="'+id+'"> <table style="width: 100%">' +
                '<tr><td>NOMBRE: </td><td><input id="name" class="form-control" name="name" value="'+username+'"></td></tr>'+
                '<tr><td>CURP: </td><td><input id="username" onkeyup="mayusculas(\'username\')" class="form-control" name="username" value="'+curp+'"></td></tr>'+
                '<tr><td>DIRECCIÓN: </td><td><select class="form-control" name="direccion_id" id="direccion_id"><option value="-">Selecciona una direccion</option>'+direcciones+'</select></td></tr>'+
                '<tr><td>EMAIL: </td><td><input id="EMAIL" class="form-control" name="EMAIL" value="'+email+'"></td></tr>'+
                '<tr><td>CONTRASEÑA: </td><td><div class="btn btn-outline-secondary btn-block" onclick="restablecePass('+id+')">Restablece contraseña a: 1234abcd</div></td></tr>'+
                '</table></div>'+rol_existentes+ rol_user+controles_actuales ;
            var footer ='<button type="button" onclick="enviar_datos()" class="btn btn-success" data-dismiss="modal">GUARDAR</button>' +
                '        <button type="button" class="btn btn-dark" data-dismiss="modal">CANCELAR</button>';
            $('#myModal').modal('show');
            $('#modal_body').html(body);
            $('#modal_footer').html(footer);
            $('#direccion_id').val(direccion);
            var roles_u = Array();
            var r_usuario = Array();
            @foreach($roles_usuario as $r_u)
            roles_u.push({{$r_u->role_id}});
            r_usuario.push({{$r_u->user_id}});
            @endforeach
            for(let i=0; i < r_usuario.length; i++){
                if(id == r_usuario[i]){
                    cambioDLista(roles_u[i]);
                }
            }
        }


        function enviar_datos(){
            var roles_usuario = document.getElementsByClassName('elementos_list2');
            var roles_usuario2 = document.getElementsByClassName('elementos_list4');
            var roles = '';

            for(let i = 0; i < roles_usuario.length; i++){
                roles += roles_usuario[i].id;
            }
            for(let i = 0; i < roles_usuario2.length; i++){
                roles += roles_usuario2[i].id;
            }
            if($('#username').val()=='' || $('#name').val()==''){
                swal.fire({
                    title: "¡Cuidado!",
                    html: "<span class='fs-24'>Ingresa un CURP</span>",
                    type: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#ff0005",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    confirmButtonText: "Aceptar"
                });
                return;
            }
            $('#roles_usuario').val(roles);
            $('#form_usuarios').submit();
        }
        function enviar_datos_rol(){
            $('#form_roles').submit();
        }

        const ModalNuevaDireccion = ()=>{
            const body = '<label for="nombre_dir">Nombre de la dirección que deseas agregar</label><input class="form-control" name="nombre_dir" id="nombre_dir">' +
                '<div><h2>Direcciones actuales</h2>'+direcciones_p+'</div>';
            const footer ='<button type="button" onclick="enviar_datos_dir()" class="btn btn-success" data-dismiss="modal">GUARDAR</button>' +
                '        <button type="button" class="btn btn-dark" data-dismiss="modal">CANCELAR</button>';
            $('#modal_header_dir').html('Nueva dirección');
            $('#modal_body_dir').html(body);
            $('#modal_footer_dir').html(footer);
            $('#direccionesModal').modal('show');

        }

        const enviar_datos_dir = ()=>{
            $('#form_dir').submit();
        }

        function ModalNuevoRol(){
            var body =  '<div class="col-lg-12">'
                    +'<div class="panel table-responsive">'
                +'<table class="table table-bordered" id="table2">'
                +'<thead class="table bg-success">'
                +'<tr>'
                +'              <th>ROLE</th>'
                +'               <th>DESCRIPCIÓN</th>'
                +'            </tr>'
                +'            </thead>'
                +'           <tbody>'
                            @foreach($roles as $rol)
                @if(!in_array($rol->name,array('gris','verde','moto','antiguo','remolque','taxi','ruta','escolta','especial','disca')))
                +'        <tr>'
                +'         <td><div id="rolname_{{$rol->id}}">{{$rol->name}}</div></td>'
                +'          <td><div id="nombre_{{$rol->id}}">{{$rol->description}}</div></td>'
                +'          </tr>'
                @endif
                            @endforeach
                +'        </tbody>'
                +'        <tfooter></tfooter>'
                +'      </table>'
                +'  </div>'
                +'</div>';
            var footer ='<button type="button" class="btn btn-dark" data-dismiss="modal">CERRAR</button>';
            $('#basicExampleModal').modal('show');
            $('#modal_header_sm').html('Crear nuevo Rol');
            $('#modal_body_sm').html(body);
            $('#modal_footer_sm').html(footer);
        }
        function cambioDLista(id, indice= 0){
            var elemento = document.getElementById('elem_rol_'+id);
            var clase = elemento.getAttribute('class');
            if(clase === 'elementos_list'){
                $('#rol_user').append(elemento);
                elemento.removeAttribute('class', 'elementos_list');
                elemento.setAttribute('class', 'estilo_elementos_list2 elementos_list2');
                elemento.setAttribute('name', 'elem_rol_'+id);
            }else{
                $('#rol_existentes').append(elemento);
                elemento.removeAttribute('class', 'estilo_elementos_list2 elementos_list2');
                elemento.removeAttribute('name', 'elem_rol_'+id);
                elemento.setAttribute('class', 'elementos_list');
            }
        }
        function cambioDSeleccion(id){
            var elemento = document.getElementById('elem_rol_'+id);
            var clase = elemento.getAttribute('class');
            console.log(clase);
            if(clase === 'elementos_list3 col-md-2'){
                elemento.removeAttribute('class', 'elementos_list3 col-md-2');
                elemento.setAttribute('class', 'elementos_list4 col-md-2');
                elemento.setAttribute('name', 'elem_rol_'+id);
            }else{
                elemento.removeAttribute('class', 'elementos_list4 col-md-2');
                elemento.removeAttribute('name', 'elem_rol_'+id);
                elemento.setAttribute('class', 'elementos_list3 col-md-2');
            }
        }
        function eliminaRol(id){
            swal.fire({
                title: "¡Cuidado!",
                html: "<span class='fs-24'>¿Seguro que desea eliminar este rol?</span>",
                type: "error",
                confirmButtonColor: "#ff0005",
                confirmButtonText: "Aceptar"
            }).then((result) => {
                if (result.value) {
                    $('#role_id').val(id);
                    $('#form_elim_rol').submit();
                }
            });
        }
        function habilita(nombre, id,op){
            swal.fire({
                title: "¡Cuidado!",
                html: "<span class='fs-24'>¿Seguro que desea modificar este usuario?</span>",
                type: "error",
                confirmButtonColor: "#ff0005",
                confirmButtonText: "Aceptar",
                showCancelButton: true
            }).then((result) => {
                if (result.value) {
                    $('#user_id').val(id);
                    $('#opcion_ad').val(op);
                    $('#form_desabilitaUs').submit();
                }
            });

        }
        function restablecePass(id){
            swal.fire({
                title: "¡Cuidado!",
                html: "<span class='fs-24'>¿Seguro que desea restablecer la contraseña?</span>",
                type: "error",
                confirmButtonColor: "#26ff00",
                confirmButtonText: "Aceptar"
            }).then((result) => {
                if (result.value) {
                    $('#user_id_restablece').val(id);
                    $('#form_restablecePass').submit();
                }
            });

        }
        $(document).ready(function() {
            $('#table1').DataTable(
                {
                    "language": {
                        "sProcessing":     "Procesando...",
                        "sLengthMenu":     "Mostrar _MENU_ registros",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "Ningún dato disponible en esta tabla",
                        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix":    "",
                        "sSearch":         "Buscar:",
                        "sUrl":            "",
                        "sInfoThousands":  ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst":    "Primero",
                            "sLast":     "Último",
                            "sNext":     "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        },
                        "buttons": {
                            "copy": "Copiar",
                            "colvis": "Visibilidad"
                        }
                    }
                }
            );
        } );

        $(document).ready(function() {

        } );
    </script>

@stop


