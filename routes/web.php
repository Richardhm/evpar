<?php

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


Route::prefix('/admin')->middleware('auth')->group(function(){

    Route::get("teste-acl",function(){
        auth()->user();
    });



    Route::get("/","App\Http\Controllers\Admin\AdminController@index")->name('home');

    Route::get("/funcionarios","App\Http\Controllers\Admin\FuncionariosController@index")->name("listar.funcionarios");    
    Route::get("/funcionarios/cadastrar","App\Http\Controllers\Admin\FuncionariosController@create")->name("listar.funcionarios.cadastrar");    
    Route::post("/funcionarios","App\Http\Controllers\Admin\FuncionariosController@store")->name('funcionarios.store');
    Route::get("/funcionarios/ajax","App\Http\Controllers\Admin\FuncionariosController@listarfuncionariosajax")->name('funcionarios.listarfuncionariosajax');
    Route::get("/funcionarios/ajaxgt","App\Http\Controllers\Admin\FuncionariosController@listarfuncionariosajaxgt")->name('funcionarios.listarfuncionariosajaxgt');

    Route::post("/funcionarios/editar","App\Http\Controllers\Admin\FuncionariosController@editarFuncionarios")->name('funcionarios.editar');

    Route::get("/funcionarios/listarfuncionariosti","App\Http\Controllers\Admin\FuncionariosController@listarfuncionariosti")->name('funcionarios.listarfuncionariosti');
    Route::get("/funcionarios/listarfuncionariosrh","App\Http\Controllers\Admin\FuncionariosController@listarfuncionariosrh")->name('funcionarios.listarfuncionariosrh');
    Route::get("/funcionarios/listarfuncionariosfinanceiro","App\Http\Controllers\Admin\FuncionariosController@listarfuncionariosfinanceiro")->name('funcionarios.listarfuncionariosfinanceiro');

    Route::get("/funcionarios/listarfuncionariostigt","App\Http\Controllers\Admin\FuncionariosController@listarfuncionariostigt")->name('funcionarios.listarfuncionariostigt');
    Route::get("/funcionarios/listarfuncionariosrhgt","App\Http\Controllers\Admin\FuncionariosController@listarfuncionariosrhgt")->name('funcionarios.listarfuncionariosrhgt');
    Route::get("/funcionarios/listarfuncionariosfinanceirogt","App\Http\Controllers\Admin\FuncionariosController@listarfuncionariosfinanceirogt")->name('funcionarios.listarfuncionariosfinanceirogt');

    Route::post("/funcionarios/excluir","App\Http\Controllers\Admin\FuncionariosController@deletarFuncionario")->name('funcionarios.deletar');

});

// Route::prefix('/admin')->middleware()



Auth::routes();

