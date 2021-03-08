<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Siscorp\Sabanas\RutaSabanaController;

Route::prefix('sabanas')->middleware(['role:admin|ruta|sistemas'])->group(function(){
    Route::get('seleccionEmpresaRuta/{tipo_control}',[RutaSabanaController::class, 'seleccionaEmpresa'])->name('seleccionEmpresa.ruta');
    Route::post('busqueda_por_empresa_ruta', [RutaSabanaController::class, 'buscaPorEmpresa'])->name('sabanas.buscar.empresa.ruta');

    Route::get('seleccionCiudadanoRuta/{tipo_control}', [RutaSabanaController::class, 'seleccionaCiudadano'])->name('seleccionCiudadano.ruta');
    Route::post('busqueda_por_ciudadano_ruta', [RutaSabanaController::class, 'buscaPorCiudadano'])->name('sabanas.buscar.ciudadano.ruta');

    Route::get('seleccionVehiculoRuta/{tipo_control}', [RutaSabanaController::class, 'seleccionaVehiculo'])->name('seleccionVehiculo.ruta');
    Route::post('busqueda_por_vehiculo_ruta', [RutaSabanaController::class, 'buscaPorVehiculo'])->name('sabanas.buscar.vehiculo.ruta');

});

