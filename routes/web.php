<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->name('dashboard');

// NOVO
// GRUPO DE ROTAS ACESSADAS PELO LOGIN
Route::middleware(['auth:sanctum', 'verified', 'editor'])->group(function () {

    // ROTA DO EDITOR
    Route::get('/area-editor', function() {
        return Inertia::render('AreaEditor', [
            'canLogin' => Route::has('login')
        ]);
    })->name('area-editor');

    // ROTA PARA CADASTRAR NOTÍCIA
    Route::get('cadastrar-noticia', function(){
        return Inertia::render('CadastrarNoticia', [
            'canLogin' => Route::has('login')
        ]);
    })->name('cadastrar.noticia');

    // ROTA FALSA PROVISÓRIA
    Route::get('/dashboard', function(){
        return Inertia::render('Dashboard');
    })->name('dashboard');

});

// ROTA DE LOGIN
Route::get('entrar', function () {
    return Inertia::render('Entrar', [
        'canLogin' => Route::has('login')
    ]);
})->name('entrar');

// ROTA DE CADASTRO
Route::get('registrar', function () {
    return Inertia::render('Registrar', [
        'canLogin' => Route::has('login')
    ]);
})->name('registrar');

// ROTA DE INICIO
Route::get('/', function () {
    return Inertia::render('Inicio', [
        'canLogin' => Route::has('login')
    ]);
})->name('inicio');

// ROTA DE DISCURÇÕES
Route::get('/discurcoes', function() {
    return Inertia::render('Discurcoes', [
        'canLogin' => Route::has('login')
    ]);
})->name('discurcoes');

// ROTA DE PRINCIPAIS ASSUNTOS
Route::get('/assuntos', function () {
    return Inertia::render('PrincipaisAssuntos', [
        'canLogin' => Route::has('login')
    ]);
})->name('assuntos');

// ROTA DA NOTICIA COMPLETA COM COMENTARIOS
Route::get('/noticia-completa/{id}', function(){
    return Inertia::render('NoticiaCompleta', [
        'canLogin' => Route::has('login')
    ]);
})->name('completa');
