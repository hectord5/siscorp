<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Siscorp\Reimpresion\ReimpresionController;


Route::prefix('licencias')->middleware(['role:licencias|admin'])->group(function() {

    Route::get('/valorada', [ReimpresionController::class, 'SeleccionValorada'])->name('seleccionvalorada');
    Route::get('/obtener-datos', [ReimpresionController::class, 'getDatos'])->name('obtener-datos');
    Route::post('/imprime', [ReimpresionController::class, 'ImprimeAcuse'])->name('ImprimeAcuse');
});
