<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/qwe', function () {
    return view('songs.test');
});
Route::get('/test', function () {
    return 'hello';
});
Route::prefix('songs')->group(function () {
    Route::get('/all', [SongsController::class, 'getAllSongs'])->name('songs');
    Route::get('/create', [SongsController::class, 'create']);
    Route::get('/{id}', [SongsController::class, 'getById']);
    Route::get('/update/{id}', [SongsController::class, 'updateSong']);
    Route::put('up/{id}',  [SongsController::class, 'update']);
    Route::get('/delete/{id}', [SongsController::class, 'delete']);
    Route::post('/create/store', [SongsController::class, 'store']);
});
Route::get('/login', function () {
    return view('login.index');
})->name('login');
