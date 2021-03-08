<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Siscorp\Sabanas\TaxiSabanaController;

Route::prefix('sabanas')->middleware(['role:admin|taxi|sistemas'])->group(function(){
    Route::get('seleccionEmpresaTaxi/{tipo_control}',[TaxiSabanaController::class, 'seleccionaEmpresa'])->name('seleccionEmpresa.taxi');
    Route::post('busqueda_por_empresa_taxi', [TaxiSabanaController::class, 'buscaPorEmpresa'])->name('sabanas.buscar.empresa.taxi');

    Route::get('seleccionCiudadanoTaxi/{tipo_control}', [TaxiSabanaController::class, 'seleccionaCiudadano'])->name('seleccionCiudadano.taxi');
    Route::post('busqueda_por_ciudadano_taxi', [TaxiSabanaController::class, 'buscaPorCiudadano'])->name('sabanas.buscar.ciudadano.taxi');

    Route::get('seleccionVehiculoTaxi/{tipo_control}', [TaxiSabanaController::class, 'seleccionaVehiculo'])->name('seleccionVehiculo.taxi');
    Route::post('busqueda_por_vehiculo_taxi', [TaxiSabanaController::class, 'buscaPorVehiculo'])->name('sabanas.buscar.vehiculo.taxi');
});

