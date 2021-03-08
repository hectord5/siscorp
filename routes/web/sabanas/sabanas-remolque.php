<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Siscorp\Sabanas\RemolqueSabanaController;

Route::prefix('sabanas')->middleware(['role:admin|remolque|sistemas'])->group(function(){
    Route::get('seleccionEmpresaRemolque/{tipo_control}',[RemolqueSabanaController::class, 'seleccionaEmpresa'])->name('seleccionEmpresa.remolque');
    Route::post('busqueda_por_empresa_remolque', [RemolqueSabanaController::class, 'buscaPorEmpresa'])->name('sabanas.buscar.empresa.remolque');

    Route::get('seleccionCiudadanoRemolque/{tipo_control}', [RemolqueSabanaController::class, 'seleccionaCiudadano'])->name('seleccionCiudadano.remolque');
    Route::post('busqueda_por_ciudadano_remolque', [RemolqueSabanaController::class, 'buscaPorCiudadano'])->name('sabanas.buscar.ciudadano.remolque');

    Route::get('seleccionVehiculoRemolque/{tipo_control}', [RemolqueSabanaController::class, 'seleccionaVehiculo'])->name('seleccionVehiculo.remolque');
    Route::post('busqueda_por_vehiculo_remolque', [RemolqueSabanaController::class, 'buscaPorVehiculo'])->name('sabanas.buscar.vehiculo.remolque');

});

