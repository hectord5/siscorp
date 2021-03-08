<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Siscorp\Sabanas\EspecialSabanaController;

Route::prefix('sabanas')->middleware(['role:admin|especial|sistemas'])->group(function(){
    Route::get('seleccionEmpresaEspecial/{tipo_control}',[EspecialSabanaController::class, 'seleccionaEmpresa'])->name('seleccionEmpresa.especial');
    Route::post('busqueda_por_empresa_especial', [EspecialSabanaController::class, 'buscaPorEmpresa'])->name('sabanas.buscar.empresa.especial');

    Route::get('seleccionCiudadanoEspecial/{tipo_control}', [EspecialSabanaController::class, 'seleccionaCiudadano'])->name('seleccionCiudadano.especial');
    Route::post('busqueda_por_ciudadano_especial', [EspecialSabanaController::class, 'buscaPorCiudadano'])->name('sabanas.buscar.ciudadano.especial');

    Route::get('seleccionVehiculoEspecial/{tipo_control}', [EspecialSabanaController::class, 'seleccionaVehiculo'])->name('seleccionVehiculo.especial');
    Route::post('busqueda_por_vehiculo_especial', [EspecialSabanaController::class, 'buscaPorVehiculo'])->name('sabanas.buscar.vehiculo.especial');

});

