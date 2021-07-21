<?php

use App\Http\Controllers\{
    ComentarioController,
    NoticiaController,
    UserController
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware(['auth:sanctum'])->group(function(){
    
    // ROTA DE USUÁRIOS
    Route::get('/user/logged', [UserController::class, "me"])->name("me");
});

Route::middleware(['api'])->group(function(){
    // ROTA DAS NOTICIAS
    Route::resource('noticia', NoticiaController::class);

    // ROTA DOS COMENTARIOS SOBRE AS NOTICIAS
    Route::resource('comentario', ComentarioController::class);
});
