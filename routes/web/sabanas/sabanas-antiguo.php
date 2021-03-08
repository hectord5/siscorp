<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Siscorp\Sabanas\AntiguoSabanaController;

Route::prefix('sabanas')->middleware(['role:admin|antiguo|sistemas'])->group(function(){
    Route::get('seleccionEmpresaAntiguo/{tipo_control}',[AntiguoSabanaController::class, 'seleccionaEmpresa'])->name('seleccionEmpresa.antiguo');
    Route::post('busqueda_por_empresa_antiguo', [AntiguoSabanaController::class, 'buscaPorEmpresa'])->name('sabanas.buscar.empresa.antiguo');

    Route::get('seleccionCiudadanoAntiguo/{tipo_control}', [AntiguoSabanaController::class, 'seleccionaCiudadano'])->name('seleccionCiudadano.antiguo');
    Route::post('busqueda_por_ciudadano_antiguo', [AntiguoSabanaController::class, 'buscaPorCiudadano'])->name('sabanas.buscar.ciudadano.antiguo');

    Route::get('seleccionVehiculoAntiguo/{tipo_control}', [AntiguoSabanaController::class, 'seleccionaVehiculo'])->name('seleccionVehiculo');
    Route::post('busqueda_por_vehiculo_antiguo', [AntiguoSabanaController::class, 'buscaPorVehiculo'])->name('sabanas.buscar.vehiculo.antiguo');

});

