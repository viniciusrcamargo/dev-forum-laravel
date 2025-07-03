<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/duvidas', App\Http\Controllers\DuvidaController::class);
Route::resource('/categorias', App\Http\Controllers\CategoriaController::class)->except(['show']);
Route::resource('/solucoes', App\Http\Controllers\SolucoesController::class)->except(['show']);
Route::post('/solucoes/updateStatus/{id}', [App\Http\Controllers\SolucoesController::class, 'updateStatus'])->name('solucoes.updateStatus');
