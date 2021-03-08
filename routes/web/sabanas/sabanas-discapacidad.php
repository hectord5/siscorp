<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Siscorp\Sabanas\DiscapacidadSabanaController;

Route::prefix('sabanas')->middleware(['role:admin|disca|sistemas'])->group(function(){
    Route::get('seleccionEmpresaDiscapacidad/{tipo_control}',[DiscapacidadSabanaController::class, 'seleccionaEmpresa'])->name('seleccionEmpresa.discapacidad');
    Route::post('busqueda_por_empresa_discapacidad', [DiscapacidadSabanaController::class, 'buscaPorEmpresa'])->name('sabanas.buscar.empresa.discapacidad');

    Route::get('seleccionCiudadanoDiscapacidad/{tipo_control}', [DiscapacidadSabanaController::class, 'seleccionaCiudadano'])->name('seleccionCiudadano.discapacidad');
    Route::post('busqueda_por_ciudadano_discapacidad', [DiscapacidadSabanaController::class, 'buscaPorCiudadano'])->name('sabanas.buscar.ciudadano.discapacidad');

    Route::get('seleccionVehiculoDiscapacidad/{tipo_control}', [DiscapacidadSabanaController::class, 'seleccionaVehiculo'])->name('seleccionVehiculo.discapacidad');
    Route::post('busqueda_por_vehiculo_discapacidad', [DiscapacidadSabanaController::class, 'buscaPorVehiculo'])->name('sabanas.buscar.vehiculo.discapacidad');

});

