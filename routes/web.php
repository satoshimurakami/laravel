<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\Admin\CursoController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\LoginController;
use App\Http\Controllers\Admin\UserController;
//sacada para utilizar a mesma classe em arquivos diferentes, apelidos ou aliases
use App\Http\Controllers\Api\V1\DFeController as DFeV1Controller; 
use App\Http\Controllers\Api\V2\DFeController as DFeV2Controller;


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

Route::get('/', [HomeController::class, 'index'])->name('site.home');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/login/sair', [LoginController::class, 'sair'])->name('site.login.sair');
Route::post('/login/entrar', [LoginController::class, 'entrar'])->name('site.login.entrar');

Route::get('/contato/{id?}', [ContatoController::class, 'index']);
Route::post('/contato', [ContatoController::class, 'criar']);
Route::put('/contato', [ContatoController::class, 'editar']);


//Route::group(['middleware' => 'auth'], function () { //modo antigo 5.5
Route::middleware(['auth'])->group(function () { //modo novo 10.12
    //aula13 e 14 - na rota esta passando atalho ['as'=>'admin.cursos','uses'=>'Admin\CursoController@index']]
    //isso era no laravel 5.4 agora no 10.12 é [CursoController::class,'index'])->name('admin.cursos')
    Route::get('/admin/cursos', [CursoController::class, 'index'])->name('admin.cursos');
    Route::get('/admin/cursos/adicionar', [CursoController::class, 'adicionar'])->name('admin.cursos.adicionar');
    Route::post('/admin/cursos/salvar', [CursoController::class, 'salvar'])->name('admin.cursos.salvar');
    Route::get('/admin/cursos/editar/{id}', [CursoController::class, 'editar'])->name('admin.cursos.editar');
    Route::put('/admin/cursos/atualizar/{id}', [CursoController::class, 'atualizar'])->name('admin.cursos.atualizar');
    Route::get('/admin/cursos/deletar/{id}', [CursoController::class, 'deletar'])->name('admin.cursos.deletar');
    
    // Route::get('/admin/cursos',['as'=>'admin.cursos','uses'=>'Admin\CursoController@index']);
    // Route::get('/admin/cursos/adicionar',['as'=>'admin.cursos.adicionar','uses'=>'Admin\CursoController@adicionar']);
    // Route::post('/admin/cursos/salvar',['as'=>'admin.cursos.salvar','uses'=>'Admin\CursoController@salvar']);
    // Route::get('/admin/cursos/editar/{id}',['as'=>'admin.cursos.editar','uses'=>'Admin\CursoController@editar']);
    // Route::put('/admin/cursos/atualizar/{id}',['as'=>'admin.cursos.atualizar','uses'=>'Admin\CursoController@atualizar']);
    // Route::get('/admin/cursos/deletar/{id}',['as'=>'admin.cursos.deletar','uses'=>'Admin\CursoController@deletar']);
    
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
    Route::get('/admin/users/adicionar', [UserController::class, 'adicionar'])->name('admin.users.adicionar');
    Route::post('/admin/users/salvar', [UserController::class, 'salvar'])->name('admin.users.salvar');
    Route::get('/admin/users/editar/{id}', [UserController::class, 'editar'])->name('admin.users.editar');
    Route::put('/admin/users/atualizar/{id}', [UserController::class, 'atualizar'])->name('admin.users.atualizar');
    Route::get('/admin/users/deletar/{id}', [UserController::class, 'deletar'])->name('admin.users.deletar');
    

    //métodos API fiscal
    Route::prefix('api')->group(function(){
        Route::prefix('v1')->group(function(){
            Route::get('/', [DFeV1Controller::class, 'index'])->name('api.v1');
            Route::get('/status', [DFeV1Controller::class, 'status'])->name('api.v1.status');
        });

        Route::prefix('v2')->group(function(){
            Route::get('/', [DFeV2Controller::class, 'index'])->name('api.v2');
            Route::get('/status', [DFeV2Controller::class, 'status'])->name('api.v2.status');
        });
        
    });
    
});
