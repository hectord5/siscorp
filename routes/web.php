<?php

use App\Http\Controllers\Siscorp\Administrador\ActividadUsersController;
use App\Http\Controllers\Siscorp\Revisa_lc\RevisaLController;
use App\Http\Controllers\Siscorp\Licencias\LicenciasController;
use App\Http\Controllers\Siscorp\Ventas\AvisoVentaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Siscorp\Administrador\AdminController;
use App\Http\Controllers\Siscorp\Sabanas\ControlSabanaController;
use App\Http\Controllers\Siscorp\Candados\ControlCandadosController;
use App\Http\Controllers\Siscorp\Historial\ControlHistorialController;
use App\Http\Controllers\Siscorp\Reimpresion\ReimpresionController;
if(config('app.env') == 'production'){
    URL::forceScheme('https');
}
Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('Administrador/update_password',[AdminController::class, 'updatePassword'])->name('update.password');
    Route::post('Administrador/admin/cambia-pasword-user',[AdminController::class, 'actualizaContraseña'])->name('cambio.contraseña.usuario');
    Route::middleware('update_password')->group(function () {


        Route::get('/', function() {
            return view('home');
        })->name('home');

        require __DIR__ . '/web/sabanas/sabanas-gris.php';
        require __DIR__ . '/web/sabanas/sabanas-verde.php';
        require __DIR__ . '/web/sabanas/sabanas-moto.php';
        require __DIR__ . '/web/sabanas/sabanas-antiguo.php';
        require __DIR__ . '/web/sabanas/sabanas-remolque.php';
        require __DIR__ . '/web/sabanas/sabanas-taxi.php';
        require __DIR__ . '/web/sabanas/sabanas-ruta.php';
        require __DIR__ . '/web/sabanas/sabanas-escolta.php';
        require __DIR__ . '/web/sabanas/sabanas-especial.php';
        require __DIR__ . '/web/sabanas/sabanas-discapacidad.php';
        require __DIR__ . '/web/historial/historial.php';
        require __DIR__ . '/web/licencias/licencias.php';
        require __DIR__ . '/web/correcciones/correcciones.php';
        require __DIR__ . '/web/reimpresion/acuse.php';
        require __DIR__ . '/web/adeudos/adeudos-placa.php';

        Route::prefix('candados')->middleware(['role:admin|candados|sistemas'])->group(function() {
            require __DIR__ . '/web/candados/candados.php';
            Route::get('/controles',[ControlCandadosController::class, 'EligeControl'])->name('elige.controles.candados');
        });



        Route::prefix('Administrador')->middleware(['role:admin|sistemas'])->group(function(){

            Route::get('AdminUsers',[AdminController::class, 'AdminUsuario'])->name('AdminUsers');
            Route::post('AdminUsers',[AdminController::class, 'ActualizarUsuario'])->name('ActualizaUsers');
            Route::post('EliminarRole',[AdminController::class, 'EliminarRole'])->name('EliminarRole');
            Route::post('HabilitaDeshabilitaUser',[AdminController::class, 'HabilitaDeshabilitaUser'])->name('HabilitaDeshabilitaUser');
            Route::post('restablecerContraseña',[AdminController::class, 'restablecerContraseña'])->name('restablecerContraseña');

            Route::post('NuevaDireccion',[AdminController::class, 'NuevaDireccion'])->name('NuevaDireccion');


            Route::get('AdminUsersBeta',[AdminController::class, 'PanelAdmin'])->name('AdminUsersBeta');
            Route::post('AdminUsers',[AdminController::class, 'ActualizarUsuario'])->name('ActualizaUsers');
            Route::post('HabilitaDeshabilitaUser',[AdminController::class, 'HabilitaDeshabilitaUser'])->name('HabilitaDeshabilitaUser');
        });

        Route::prefix('sabanas')->middleware(['role:sabanas|admin|sistemas'])->group(function(){
            Route::get('/controles',[ControlSabanaController::class, 'EligeControl'])->name('elige_controles');
        });

        Route::prefix('sabanas')->middleware(['role:sistemas'])->group(function(){
            Route::view('/sabanas-masivas_1','sabanas.sabanas_masivas',['ruta' => 'sabanas-masivas_2'])->name('sabanas-masivas_1');
            Route::post('/sabanas-masivas_2',[ControlSabanaController::class, 'GetSabanasMasivas'])->name('sabanas-masivas_2');
        });

         Route::middleware(['role:verificarLinea|admin|sistemas'])->group(function(){
             Route::get('revisa/lc',[RevisaLController::class, 'buscaLC'])->name('buscaLC');
             Route::post('datos/lc',[RevisaLController::class, 'resumenLC'])->name('datosLC');
             Route::get('imprime/{lc}', [RevisaLController::class, 'ImprimeLC'])->name('imprimeLC');
         });

        Route::get('descarga/{nombre}', [RevisaLController::class, 'descargaZip'])->name('descargaZip');

//        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::view('/404', 'avisos.no-se-encontro')->name('archivo.404');

        Route::middleware(['role:director|admin|sistemas'])->group(function(){
            Route::get('/actividad', [ActividadUsersController::class, 'revisaActividad'])->name('actividadUsers');
        });
        Route::get('/busca_aviso', [AvisoVentaController::class, 'BuscaAviso'])->name('busca_aviso');
        Route::post('/resultado_aviso', [AvisoVentaController::class, 'PreviaAviso'])->name('resultado_aviso');
    });
});




