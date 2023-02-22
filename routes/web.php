<?php

use App\Http\Controllers\CidadeController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\PropostaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::resource('estados', EstadoController::class);

Route::resource('cidades', CidadeController::class);

Route::resource('empresas', EmpresaController::class);

Route::resource('contratos', ContratoController::class);

Route::resource('propostas', PropostaController::class);
