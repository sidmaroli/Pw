<?php

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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
    return view('welcome');
})->name('home');

Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos')->middleware('auth');

Route::post('/produtos', [ProdutoController::class, 'index']);

Route::get('/produtos/add', [ProdutoController::class, 'add'])->name('produtos.add');

Route::post('/produtos/add', [ProdutoController::class, 'addSave'])->name('produtos.addSave');

Route::get('/produtos/{produto}', [ProdutoController::class, 'view'])->name('produtos.view');

Route::get('/produtos/edit/{produto}', [ProdutoController::class, 'edit'])->name('produtos.edit');

Route::post('/produtos/edit/{produto}', [ProdutoController::class, 'editSave'])->name('produtos.editSave');

Route::get('/produtos/delete/{produto}', [ProdutoController::class, 'delete'])->name('produtos.delete');

Route::delete('/produtos/delete/{produto}', [ProdutoController::class, 'deleteForReal'])->name('produtos.deleteForReal');

Route::prefix('/usuarios')->middleware('auth')->group(function () {
    Route::get('', [UsuarioController::class, 'index'])->name('usuarios');

    Route::get('view', [UsuarioController::class, 'view'])->name('usuarios.view');

    Route::get('add', [UsuarioController::class, 'add'])->name('usuarios.add');

    Route::post('add', [UsuarioController::class, 'add']);

    Route::get('edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');

    Route::get('delete', [UsuarioController::class, 'delete'])->name('usuarios.delete');


});

Route::get('login', [UsuarioController::class, 'login'])->name('login');
Route::post('login', [UsuarioController::class, 'login'])->name('login');

Route::get('logout', [UsuarioController::class, 'logout'])->name('logout');

// Rotas automáticas da verificação de e-mail
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('home');
})->name('verification.verify');



