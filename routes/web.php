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

Route::resource('superheroes', SuperheroController::class);
Route::get('/superheroes/deleted', [SuperheroController::class, 'deleted'])->name('superheroes.deleted');
Route::get('/superheroes/restore/{id}', [SuperheroController::class, 'restore'])->name('superheroes.restore');
