<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\UsuarioController;



Route::get('/', function () {
    return view('welcome');
});


Route::get('/Cadastro', [CadastroController::class, 'Cadastro'])->name('Cadastro');
Route::post('/Cadastro', [CadastroController::class, 'salvar_usuario'])->name('salvar_usuario');
Route::get('/login', [CadastroController::class, 'login'])->name('login');
Route::post('/login', [CadastroController::class, 'autenticar'])->name('autenticar');
Route::get('/home', [CadastroController::class, 'home'])->name('home');
Route::get('/logout', [CadastroController::class, 'logout'])->name('logout');
Route::get('/listar_usuarios', [UsuarioController::class, 'listar_usuarios'])->name('listar_usuarios');
Route::get('/ver_usuario/{id}', [UsuarioController::class, 'ver_usuario'])->name('ver_usuario');
Route::get('/alterar_usuario/{id}', [UsuarioController::class, 'alterar_usuario'])->name('alterar_usuario');
Route::post('/alterar_usuario/{id}', [UsuarioController::class, 'salvar_alteracao_usuario'])->name('salvar_alteracao_usuario');
Route::get('/deletar_usuario/{id}', [UsuarioController::class, 'deletar_usuario'])->name('deletar_usuario');
