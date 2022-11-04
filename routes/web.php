<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MotosController;

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
    return view('home');
});

Route::get('/',[HomeController::class,'MostrarHome'])->name('home');
Route::get('/editar-motos',[MotosController::class,'MostrarEditarMotos'])->name('editar-motos');
Route::get('/cadastrar-motos',[MotosController::class,'FormularioCadastro'])->name('cadastrar-motos');
Route::post('/cadastrar-motos',[MotosController::class,'SalvarBanco'])->name('salvar-banco');
//deletar

Route::delete('/editar-motos/{registrosMotos}',[MotosController::class,'ApagarBancoMotos'])->name('apagar-motos');
//alterar
Route::get('/alterar-motos/{registrosMotos}',[MotosController::class,'MostrarAlterarMotos'])->name('alterar-motos');
Route::put('/editar-motos/{registrosMotos}',[MotosController::class,'AlterarBancoMotos'])->name('alterar-banco-motos');
