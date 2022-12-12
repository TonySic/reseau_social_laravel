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

// routes de l'authentification
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/messages', App\Http\Controllers\MessageController::class)->except(['index', 'show']);

Route::resource('/commentaires', App\Http\Controllers\MessageController::class)->except(['index', 'show', 'create']);

Route::resource('/users', App\Http\Controllers\UserController::class)->except(['index', 'create', 'store']);

Route::get('/user/profil/{user}', [App\Http\Controllers\UserController::class, 'profil'])->name('profil');

Route::get('/user/moncompte/{user}', [App\Http\Controllers\UserController::class, 'moncompte'])->name('moncompte');

Route::get('/user/modif-info/{user}', [App\Http\Controllers\UserController::class, 'modifInfo'])->name('modif-info');

Route::put('/user/modif-password/{user}', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('updatePassword');