<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Siscorp\Adeudos\AdeudosController;

Route::prefix('adeudos')->middleware(['role:admin|adeudos|sistemas'])->group(function(){
    Route::get('buscar_adeudos',[AdeudosController::class, 'AdeudosBuscar'])->name('adeudos-buscar');
    Route::post('getInfoToAdeudo',[AdeudosController::class, 'getInfoToAdeudo'])->name('getInfoToAdeudo');
    Route::post('/imprimir',[AdeudosController::class, 'imprimeHistorial'])->name('imprime.historial.adeudos');
});


