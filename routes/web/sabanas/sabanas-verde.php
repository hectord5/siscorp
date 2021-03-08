<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Siscorp\Sabanas\VerdeSabanaController;



Route::prefix('sabanas')->middleware(['role:admin|verde|sistemas'])->group(function(){
    Route::get('seleccionEmpresaVerde/{tipo_control}',[VerdeSabanaController::class, 'seleccionaEmpresa'])->name('seleccionEmpresa.verde');
    Route::post('busqueda_por_empresa_verde', [VerdeSabanaController::class, 'buscaPorEmpresa'])->name('sabanas.buscar.empresa.verde');

    Route::get('seleccionCiudadanoVerde/{tipo_control}', [VerdeSabanaController::class, 'seleccionaCiudadano'])->name('seleccionCiudadano.verde');
    Route::post('busqueda_por_ciudadano_verde', [VerdeSabanaController::class, 'buscaPorCiudadano'])->name('sabanas.buscar.ciudadano.verde');

    Route::get('seleccionVehiculoVerde/{tipo_control}', [VerdeSabanaController::class, 'seleccionaVehiculo'])->name('seleccionVehiculo.verde');
    Route::post('busqueda_por_vehiculo_verde', [VerdeSabanaController::class, 'buscaPorVehiculo'])->name('sabanas.buscar.vehiculo.verde');

});

