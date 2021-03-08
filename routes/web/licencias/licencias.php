<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Siscorp\Licencias\LicenciasController;


Route::prefix('licencias')->middleware(['role:licencias|admin|sistemas'])->group(function(){
    Route::get('/busca/CURP',[LicenciasController::class, 'ControlLicencias'])->name('busca_licencia');
    Route::get('/busca/Folio',[LicenciasController::class, 'ControlLicenciasPorFolio'])->name('busca_licencia_folio');
    Route::post('/getInfoLicencia',[LicenciasController::class, 'getInfoLicencia'])->name('getInfoLicencia');
    Route::post('/getCandados',[LicenciasController::class, 'resumenCandados'])->name('getCandados');
    Route::post('/getInfoLicenciaFolio',[LicenciasController::class, 'getInfoLicenciaFolio'])->name('getInfoLicenciaFolio');
    Route::post('/imprime', [LicenciasController::class, 'ImprimeSabanaLicencia'])->name('ImprimeSabanaLicencia');
});


