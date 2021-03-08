<?php

use App\Http\Controllers\Siscorp\Candados\Antiguo\CandadosAntiguoController;
use App\Http\Controllers\Siscorp\Candados\Moto\CandadosMotoController;
use App\Http\Controllers\Siscorp\Candados\Remolque\CandadosRemolqueController;
use App\Http\Controllers\Siscorp\Candados\Verde\CandadosVerdeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Siscorp\Candados\Particular\CandadosParticularController;
use App\Http\Controllers\Siscorp\Candados\Taxi\CandadosTaxiController;
use App\Http\Controllers\Siscorp\Candados\Ruta\CandadosRutaController;
use App\Http\Controllers\Siscorp\Candados\Escolta\CandadosEscoltaController;
use App\Http\Controllers\Siscorp\Candados\Especial\CandadosEspecialController;
use App\Http\Controllers\Siscorp\Candados\Discapacitados\CandadosDiscapacitadosController;
use App\Http\Controllers\Siscorp\Candados\Licencias\CandadosLicenciasController;

Route::middleware(['role:admin|particular|sistemas'])->group(function(){
    Route::get('/particular',[CandadosParticularController::class, 'index'])->name('candados.particular.index');
    Route::get('lista',[CandadosParticularController::class, 'getListaCandadosParticular'])->name('candados.particular.lista');
    Route::post('/alta',[CandadosParticularController::class, 'setCandadoParticular'])->name('candados.particular.alta.candado');
    Route::post('/baja',[CandadosParticularController::class, 'setDownCandadoParticular'])->name('candados.particular.baja.candado');
    Route::post('/busca',[CandadosParticularController::class, 'getCandadosParticular'])->name('candados.particular.busca.candado');
});

Route::middleware(['role:admin|taxi|sistemas'])->group(function(){
    Route::get('/taxi',[CandadosTaxiController::class, 'index'])->name('candados.taxi.index');
    Route::post('/consulta-taxi',[CandadosTaxiController::class, 'consultaCandado'])->name('candados.taxi.busca.candado');
    Route::post('/activa-taxi',[CandadosTaxiController::class, 'activacionCandado'])->name('candados.taxi.activa.candado');
    Route::post('/desativacion-taxi',[CandadosTaxiController::class, 'desativacionCandado'])->name('candados.taxi.desactiva.candado');
});

Route::middleware(['role:admin|verde|sistemas'])->group(function() {
    Route::get('/verde', [CandadosVerdeController::class, 'indexVerde'])->name('candados.verde.index');
    Route::get('listaVerde',[CandadosVerdeController::class, 'getListaCandadosVerde'])->name('candados.verde.lista');
    Route::post('/altaVerde',[CandadosVerdeController::class, 'setCandadoVerde'])->name('candados.verde.alta.candado');
    Route::post('/bajaVerde',[CandadosVerdeController::class, 'setDownCandadoVerde'])->name('candados.verde.baja.candado');
    Route::post('/buscaVerde',[CandadosVerdeController::class, 'getCandadosVerde'])->name('candados.verde.busca.candado');
});
Route::middleware(['role:admin|moto|sistemas'])->group(function() {
    Route::get('/moto', [CandadosMotoController::class, 'indexMoto'])->name('candados.moto.index');
    Route::get('listaMoto',[CandadosMotoController::class, 'getListaCandadosMoto'])->name('candados.moto.lista');
    Route::post('/altaMoto',[CandadosMotoController::class, 'setCandadoMoto'])->name('candados.moto.alta.candado');
    Route::post('/bajaMoto',[CandadosMotoController::class, 'setDownCandadoMoto'])->name('candados.moto.baja.candado');
    Route::post('/buscaMoto',[CandadosMotoController::class, 'getCandadosMoto'])->name('candados.moto.busca.candado');
});
Route::middleware(['role:admin|antiguo|sistemas'])->group(function() {
    Route::get('/antiguo', [CandadosAntiguoController::class, 'indexAntiguo'])->name('candados.antiguo.index');
    Route::get('listaAntiguo',[CandadosAntiguoController::class, 'getListaCandadosAntiguo'])->name('candados.antiguo.lista');
    Route::post('/altaAntiguo',[CandadosAntiguoController::class, 'setCandadoAntiguo'])->name('candados.antiguo.alta.candado');
    Route::post('/bajaAntiguo',[CandadosAntiguoController::class, 'setDownCandadoAntiguo'])->name('candados.antiguo.baja.candado');
    Route::post('/buscaAntiguo',[CandadosAntiguoController::class, 'getCandadosAntiguo'])->name('candados.antiguo.busca.candado');
});
Route::middleware(['role:admin|remolque|sistemas'])->group(function() {
    Route::get('/remolque', [CandadosRemolqueController::class, 'indexRemolque'])->name('candados.remolque.index');
    Route::get('listaRemolque',[CandadosRemolqueController::class, 'getListaCandadosRemolque'])->name('candados.remolque.lista');
    Route::post('/altaRemolque',[CandadosRemolqueController::class, 'setCandadoRemolque'])->name('candados.remolque.alta.candado');
    Route::post('/bajaRemolque',[CandadosRemolqueController::class, 'setDownCandadoRemolque'])->name('candados.remolque.baja.candado');
    Route::post('/buscaRemolque',[CandadosRemolqueController::class, 'getCandadosRemolque'])->name('candados.remolque.busca.candado');
});
Route::middleware(['role:admin|ruta|sistemas'])->group(function() {
    Route::get('/ruta', [CandadosRutaController::class, 'indexRuta'])->name('candados.ruta.index');
    Route::get('listaRuta',[CandadosRutaController::class, 'getListaCandadosRuta'])->name('candados.ruta.lista');
    Route::post('/altaRuta',[CandadosRutaController::class, 'setCandadoRuta'])->name('candados.ruta.alta.candado');
    Route::post('/bajaRuta',[CandadosRutaController::class, 'setDownCandadoRuta'])->name('candados.ruta.baja.candado');
    Route::post('/buscaRuta',[CandadosRutaController::class, 'getCandadosRuta'])->name('candados.ruta.busca.candado');
});
Route::middleware(['role:admin|escolta|sistemas'])->group(function() {
    Route::get('/escolta', [CandadosEscoltaController::class, 'indexEscolta'])->name('candados.escolta.index');
    Route::get('listaEscolta',[CandadosEscoltaController::class, 'getListaCandadosEscolta'])->name('candados.escolta.lista');
    Route::post('/altaEscolta',[CandadosEscoltaController::class, 'setCandadoEscolta'])->name('candados.escolta.alta.candado');
    Route::post('/bajaEscolta',[CandadosEscoltaController::class, 'setDownCandadoEscolta'])->name('candados.escolta.baja.candado');
    Route::post('/buscaEscolta',[CandadosEscoltaController::class, 'getCandadosEscolta'])->name('candados.escolta.busca.candado');
});
Route::middleware(['role:admin|especial|sistemas'])->group(function() {
    Route::get('/especial', [CandadosEspecialController::class, 'indexEspecial'])->name('candados.especial.index');
    Route::get('listaEspecial',[CandadosEspecialController::class, 'getListaCandadosEspecial'])->name('candados.especial.lista');
    Route::post('/altaEspecial',[CandadosEspecialController::class, 'setCandadoEspecial'])->name('candados.especial.alta.candado');
    Route::post('/bajaEspecial',[CandadosEspecialController::class, 'setDownCandadoEspecial'])->name('candados.especial.baja.candado');
    Route::post('/buscaEspecial',[CandadosEspecialController::class, 'getCandadosEspecial'])->name('candados.especial.busca.candado');
});
Route::middleware(['role:admin|disca|sistemas'])->group(function() {
    Route::get('/discapacitados', [CandadosDiscapacitadosController::class, 'indexDisca'])->name('candados.disca.index');
    Route::get('listaDisca',[CandadosDiscapacitadosController::class, 'getListaCandadosDisca'])->name('candados.disca.lista');
    Route::post('/altaDisca',[CandadosDiscapacitadosController::class, 'setCandadoDisca'])->name('candados.disca.alta.candado');
    Route::post('/bajaDisca',[CandadosDiscapacitadosController::class, 'setDownCandadoDisca'])->name('candados.disca.baja.candado');
    Route::post('/buscaDisca',[CandadosDiscapacitadosController::class, 'getCandadosDisca'])->name('candados.disca.busca.candado');
});

Route::middleware(['role:admin|licencias|sistemas'])->group(function() {
    Route::view('/licencias', 'candados.licencias.index')->name('candados.licencias.index');
    Route::post('1',[CandadosLicenciasController::class, 'crea_candado'])->name('candados.licencias.crea.candado');
    Route::post('2',[CandadosLicenciasController::class, 'quita_candado'])->name('candados.licencias.quita.candado');
});

