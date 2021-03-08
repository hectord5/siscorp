<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Siscorp\Historial\ControlHistorialController;

Route::prefix('historial')->middleware(['role:historial|admin|sistemas'])->group(function(){
    Route::get('/controles',[ControlHistorialController::class, 'EligeControl'])->name('elige_controles');
    Route::post('/buscar',[ControlHistorialController::class, 'buscarHistorial'])->name('buscar.historial');
    Route::post('/imprimir',[ControlHistorialController::class, 'imprimeHistorial'])->name('imprime.historial');
});

Route::prefix('historial')->middleware(['role:sistemas'])->group(function(){
    Route::view('/historial-masivo_1','historial_movimientos.historial_masivo',['ruta' => 'historial-masivo_2'])->name('historial-masivo_1');
    Route::post('/historial-masivo_2',[ControlHistorialController::class, 'GetHistorialMasivo'])->name('historial-masivo_2');
});

