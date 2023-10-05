<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CorController;

Route::group(['prefix'=>'marca'], function(){
    Route::get('/',[MarcaController::class,'index']);
    Route::get('/novo',[MarcaController::class,'inserir']);
    Route::post('/novo',[MarcaController::class,'salvar_novo']);
    Route::get('/excluir/{id}',[MarcaController::class,'excluir']);
    Route::get('/update/{id}',[MarcaController::class,'alterar']);
    Route::post('/update',[MarcaController::class,'salvar_update']);
});

Route::group(['prefix'=>'categoria'], function(){
    Route::get('/',[CategoriaController::class,'index']);
    Route::get('/novo',[CategoriaController::class,'inserir']);
    Route::post('/novo',[CategoriaController::class,'salvar_novo']);
    Route::get('/excluir/{id}',[CategoriaController::class,'excluir']);
    Route::get('/update/{id}',[CategoriaController::class,'alterar']);
    Route::post('/update',[CategoriaController::class,'salvar_update']);
});

Route::group(['prefix'=>'cor'], function(){
    Route::get('/',[CorController::class,'index']);
    Route::get('/novo',[CorController::class,'inserir']);
    Route::post('/novo',[CorController::class,'salvar_novo']);
    Route::get('/excluir',[CorController::class,'excluir']);
    Route::get('/update',[CorController::class,'alterar']);
});

Route::get('/', [MarcaController::class,'index']);





