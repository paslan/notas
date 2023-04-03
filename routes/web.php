<?php

use App\Http\Controllers\CidadeController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\PropostaController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\NotasController;
use App\Http\Controllers\TesteController;
use App\Models\Notasfiscais;
use Illuminate\Routing\Route as RoutingRoute;
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
    //return view('welcome');
    return view('index');
})->name('menu');

Route::get('pdf/{id}/{emp}/{tipo}', [NotasController::class, 'teste']);


Route::get('teste/pdf', [TesteController::class, 'createPDF'])->name('teste.pdf');

Route::get('/notas_empresa/{id}', [EmpresaController::class, 'notas'])->name('empresas.notas');

Route::get('notas/create/{emp?}', [NotasController::class, 'create'])->name('notas.createemp');

Route::post('encontrar-cidades', [CidadeController::class, 'encontraCidades']);

Route::post('encontrar-contratos', [ContratoController::class, 'encontraContratos']);


Route::resource('estados', EstadoController::class);

Route::resource('cidades', CidadeController::class);

Route::resource('empresas', EmpresaController::class);

Route::resource('contratos', ContratoController::class);

Route::resource('propostas', PropostaController::class);

Route::resource('contatos', ContatoController::class);

Route::resource('notas', NotasController::class);
