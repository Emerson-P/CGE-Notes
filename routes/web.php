<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\notesController;

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



Route::get('/',[notesController::class, 'notes']);
Route::post('/criarNote',[notesController::class, 'criarNote']);

// /{id} é o id do note
Route::post('/deletar/{id?}',[notesController::class, 'deletarNote']);
Route::post('/alterar/{id?}',[notesController::class, 'alterarNote']);



// rotas usadas para cadastrar,autenticar e logar o usuario, devido ao erro na auth foi desativado

// Route::post('/dadosCadastro',[UserController::class,'CadastrarUser']);
// Route::post('/dadosLogin',[UserController::class,'login']);

// Route::get('/', function () {
//     return view('login');
// });
// Route::get('/cadastrar', function(){
//     return view('cadastro');
// });