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

Route::middleware(['auth:sanctum', 'verified', 'editor'])->group(function () {

    Route::get('/area-editor', function() {
        return Inertia::render('AreaEditor', [
            'canLogin' => Route::has('login')
        ]);
    })->name('area-editor');

    Route::get('cadastrar-noticia', function(){
        return Inertia::render('CadastrarNoticia', [
            'canLogin' => Route::has('login')
        ]);
    })->name('cadastrar.noticia');

    Route::get('/dashboard', function(){
        return Inertia::render('Dashboard');
    })->name('dashboard');

});

Route::get('entrar', function () {
    return Inertia::render('Entrar', [
        'canLogin' => Route::has('login')
    ]);
})->name('entrar');

Route::get('/', function () {
    return Inertia::render('Inicio', [
        'canLogin' => Route::has('login')
    ]);
})->name('inicio');

Route::get('/discurcoes', function() {
    return Inertia::render('Discurcoes', [
        'canLogin' => Route::has('login')
    ]);
})->name('discurcoes');

Route::get('/assuntos', function () {
    return Inertia::render('PrincipaisAssuntos', [
        'canLogin' => Route::has('login')
    ]);
})->name('assuntos');

Route::get('/noticia-completa/{id}', function(){
    return Inertia::render('NoticiaCompleta', [
        'canLogin' => Route::has('login')
    ]);
})->name('completa');
