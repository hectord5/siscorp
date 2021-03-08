@extends('layouts.passwordLayout')

@section('content')
    <div class="container" style="margin-top: 10%">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container">
                    <h1 class="text-green text-center animate__animated animate__bounceIn animate__delay-1s"><img src="{{ asset('images/semovi/cdmx.png') }}" width="380" height="100"><strong>
                            <img src="../images/logo-movi.png" width="50" alt="">SISCORP</strong></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="container col-md-4">
            <div class="card animate__animated animate__flipInX animate__delay-1s" style="border-radius: 25px">
                <div class="card-header text-center text-info animate__animated animate__bounceIn animate__delay-2s" value="{{$user->username}}"><strong>{{$user->username}}</strong></div>
                <div class="card-body">
                    <form name="updatePassword" action="{{route('cambio.contraseña.usuario')}}" method="post" id="form-cambio-contraseña">
                        @csrf
                        <div class="form-group animate__animated animate__bounceIn animate__delay-2s text-center">
                            <label for="formGroupExampleInput2">CONTRASEÑA</label>
                            <input type="password" pattern="(?=.*\d)(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ].*" title="Debe tener al menos una mayúscula, una minúscula y un dígito" class="form-control text-center" id="formGroupExampleInput2" name="password">
                        </div>
                        <div class="form-group animate__animated animate__bounceIn animate__delay-2s text-center">
                            <label for="formGroupExampleInput">CONFIRMAR CONTRASEÑA</label>
                            <input type="password" pattern="(?=.*\d)(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ].*" title="Debe tener al menos una mayúscula, una minúscula y un dígito" class="form-control text-center" id="formGroupExampleInput2" name="passwordConfirmacion">
                        </div>
                        <input type="button" class="btn btn-lg btn-block btn-outline-secondary animate__animated animate__bounceIn animate__delay-2s" onClick="comprobarClave()" value="Cambiar Contraseña">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 10%"></div>


    <script>
        Swal.fire({
            title: 'Oops...',
            text : 'Estimado Usuario, para continuar deberas cambiar tu contraseña',
            icon: 'info'
        });
        function comprobarClave(){
            contraseña1 = document.updatePassword.password.value
            contraseña2 = document.updatePassword.passwordConfirmacion.value

            if (contraseña1.length == 0 || contraseña2.length == 0) {
                Swal.fire({
                    title: 'Oops...',
                    text : 'Por favor, llena todos los campos',
                    icon: 'error'
                });
                return false;
            }

            if (contraseña1.length < 8 || contraseña2.length < 8) {
                Swal.fire({
                    title: 'Oops...',
                    text : 'La contraseña debe contener 8 digitos por lo menos',
                    icon: 'error'
                });
                return false;
            }

            if (contraseña1 == '1234abcd' || contraseña2.length == '12345678') {
                Swal.fire({
                    title: 'Oops...',
                    text : 'La contraseña no puede ser la misma a la actual',
                    icon: 'error'
                });
                return false;
            }

            if (contraseña1 == contraseña2)
            {
                Swal.fire({
                    title: 'Excelente',
                    text : 'El cambio de contraseña ya fue realizado',
                    icon: 'success'
                });
                $('#form-cambio-contraseña').submit();
            }
            else
            {
                Swal.fire({
                    title: 'Oops...',
                    text : 'Las contraseñas no coinciden',
                    icon: 'error'
                });
            }
        }
    </script>
@stop
