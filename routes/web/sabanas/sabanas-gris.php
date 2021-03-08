<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Siscorp\Sabanas\GrisesSabanaController;


Route::prefix('sabanas')->middleware(['role:admin|gris|sistemas'])->group(function(){

    Route::get('seleccionEmpresaGris/{tipo_control}',[GrisesSabanaController::class, 'seleccionaEmpresa'])->name('seleccionEmpresa.gris');
    Route::post('busqueda_por_empresa_gris', [GrisesSabanaController::class, 'buscaPorEmpresa'])->name('sabanas.buscar.empresa.gris');

    Route::get('seleccionCiudadanoGris/{tipo_control}', [GrisesSabanaController::class, 'seleccionaCiudadano'])->name('seleccionCiudadano.gris');
    Route::post('busqueda_por_ciudadano_gris', [GrisesSabanaController::class, 'buscaPorCiudadano'])->name('sabanas.buscar.ciudadano.gris');

    Route::get('seleccionVehiculoGris/{tipo_control}', [GrisesSabanaController::class, 'seleccionaVehiculo'])->name('seleccionVehiculo.gris');
    Route::post('busqueda_por_vehiculo_gris', [GrisesSabanaController::class, 'buscaPorVehiculo'])->name('sabanas.buscar.vehiculo.gris');

    Route::get('generaSabana/{lc}',[GrisesSabanaController::class, 'generaSabana'])->name("genera.sabana");
});


