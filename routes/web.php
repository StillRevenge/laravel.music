<?php

use App\Http\Controllers\ArtistsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongsController;

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

Route::get('/{page}', [App\Http\Controllers\HomeController::class, 'index'])->where('page', '.*');

/*

Route::prefix('songs')->group(function () {
    Route::get('/all', [SongsController::class, 'getAllSongs'])->name('songs');
    Route::get('/create', [SongsController::class, 'create'])->name('create');
    Route::get('/get/{id}', [SongsController::class, 'getById']);
    Route::get('/{id}/edit', [SongsController::class, 'edit'])->name('edit');
    Route::put('/{id}/update', [SongsController::class, 'update'])->name('songs.update');
    Route::get('/delete/{id}', [SongsController::class, 'delete'])->name('delete');
    Route::post('/create/store', [SongsController::class, 'store']);
    Route::get('/addsong/{id}', [SongsController::class, 'addSong'])->name('addSong');
});*/
//Route::get('/login', function () {
// return view('login.index');
//})->name('login');
Auth::routes();
