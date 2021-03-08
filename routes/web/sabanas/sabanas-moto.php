<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Siscorp\Sabanas\MotoSabanaController;

Route::prefix('sabanas')->middleware(['role:admin|moto|sistemas'])->group(function(){
    Route::get('seleccionEmpresaMoto/{tipo_control}',[MotoSabanaController::class, 'seleccionaEmpresa'])->name('seleccionEmpresa.moto');
    Route::post('busqueda_por_empresa_moto', [MotoSabanaController::class, 'buscaPorEmpresa'])->name('sabanas.buscar.empresa.moto');

    Route::get('seleccionCiudadanoMoto/{tipo_control}', [MotoSabanaController::class, 'seleccionaCiudadano'])->name('seleccionCiudadano.moto');
    Route::post('busqueda_por_ciudadano_moto', [MotoSabanaController::class, 'buscaPorCiudadano'])->name('sabanas.buscar.ciudadano.moto');

    Route::get('seleccionVehiculoMoto/{tipo_control}', [MotoSabanaController::class, 'seleccionaVehiculo'])->name('seleccionVehiculo.moto');
    Route::post('busqueda_por_vehiculo_moto', [MotoSabanaController::class, 'buscaPorVehiculo'])->name('sabanas.buscar.vehiculo.moto');


});

