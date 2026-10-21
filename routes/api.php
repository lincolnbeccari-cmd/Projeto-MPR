<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ChamadoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\Historico_ChamadoController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/salvar_usuario', [UsuarioController::class, 'salvar_usuario']);
Route::get('/ver_usuario', [UsuarioController::class, 'ver_usuario']);
Route::get('/listar_usuario', [UsuarioController::class, 'listar_usuario']);
Route::put('/alterar_usuario', [UsuarioController::class, 'alterar_usuario']);
Route::delete('/deletar_usuario', [UsuarioController::class, 'deletar_usuario']);

Route::post('/salvar_chamado', [ChamadoController::class, 'salvar_chamado']);
Route::get('/ver_chamado', [ChamadoController::class, 'ver_chamado']);
Route::get('/listar_chamado', [ChamadoController::class, 'listar_chamado']);
Route::put('/alterar_chamado', [ChamadoController::class, 'alterar_chamado']);
Route::delete('/deletar_chamado', [ChamadoController::class, 'deletar_chamado']);

Route::post('/salvar_categoria', [CategoriaController::class, 'salvar_categoria']);
Route::get('/ver_categoria', [CategoriaController::class, 'ver_categoria']);
Route::get('/listar_categoria', [CategoriaController::class, 'listar_categoria']);
Route::put('/alterar_categoria', [CategoriaController::class, 'alterar_categoria']);
Route::delete('/deletar_categoria', [CategoriaController::class, 'deletar_categoria']);

Route::post('/salvar_historico_chamado', [Historico_ChamadoController::class, 'salvar_Historico_Chamado']);
Route::get('/ver_historico_chamado', [Historico_ChamadoController::class, 'ver_historico_chamado']);
Route::get('/listar_historicos_chamado', [Historico_ChamadoController::class, 'listar_historicos_chamado']);
Route::put('/alterar_historico_chamado', [Historico_ChamadoController::class, 'alterar_historico_chamado']);
Route::delete('/deletar_historico_chamado', [Historico_ChamadoController::class, 'deletar_historico_chamado']);


