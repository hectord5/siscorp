<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Siscorp\Sabanas\EscoltaSabanaController;

Route::prefix('sabanas')->middleware(['role:admin|escolta|sistemas'])->group(function(){
    Route::get('seleccionEmpresaEscolta/{tipo_control}',[EscoltaSabanaController::class, 'seleccionaEmpresa'])->name('seleccionEmpresa.escolta');
    Route::post('busqueda_por_empresa_escolta', [EscoltaSabanaController::class, 'buscaPorEmpresa'])->name('sabanas.buscar.empresa.escolta');

    Route::get('seleccionCiudadanoEscolta/{tipo_control}', [EscoltaSabanaController::class, 'seleccionaCiudadano'])->name('seleccionCiudadano');
    Route::post('busqueda_por_ciudadano_escolta', [EscoltaSabanaController::class, 'buscaPorCiudadano'])->name('sabanas.buscar.ciudadano.escolta');

    Route::get('seleccionVehiculoEscolta/{tipo_control}', [EscoltaSabanaController::class, 'seleccionaVehiculo'])->name('seleccionVehiculo');
    Route::post('busqueda_por_vehiculo_escolta', [EscoltaSabanaController::class, 'buscaPorVehiculo'])->name('sabanas.buscar.vehiculo.escolta');

});

