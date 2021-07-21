<?php

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

Route::middleware(['api'])->group(function(){
    // ROTA DAS NOTICIAS
    Route::resource('noticia', NoticiaController::class);

    // ROTA DOS COMENTARIOS SOBRE AS NOTICIAS
    Route::resource('comentario', ComentarioController::class);
});
