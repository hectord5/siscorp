<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Siscorp\Reimpresion\ReimpresionController;


Route::prefix('acuse')->middleware(['role:admin|sistemas'])->group(function() {

    Route::get('/acuse', [ReimpresionController::class, 'SeleccionAcuse'])->name('seleccionacuse');
    Route::get('/valorada', [ReimpresionController::class, 'SeleccionValorada'])->name('seleccionvalorada');
    Route::get('/obtener-datos', [ReimpresionController::class, 'getDatos'])->name('obtener-datos');
    Route::post('/imprime/', [ReimpresionController::class, 'ImprimeAcuse'])->name('ImprimeAcuse');
});
