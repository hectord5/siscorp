<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Siscorp\Correcciones\CorreccionesController;

Route::prefix('correcciones')->middleware(['role:admin|correcciones|sistemas'])->group(function(){
    Route::get('ControlCorrecciones',[CorreccionesController::class, 'ControlCorrecciones'])->name('ControlCorrecciones');
    Route::get('getInfoToCorregir',[CorreccionesController::class, 'getInfoToCorregir'])->name('getInfoToCorregir');
});


