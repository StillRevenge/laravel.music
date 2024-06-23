<?php

use App\Http\Controllers\ArtistsController;
use App\Http\Controllers\SongsController;
use App\Models\Artist;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('songs')->group(function () {
    Route::get('/all', [SongsController::class, 'getAllSongs']);
    Route::get('/get/{id}', [SongsController::class, 'getById']);
    Route::delete('/delete/{id}', [SongsController::class, 'delete']);
    Route::post('/store', [SongsController::class, 'store']);
    Route::patch('/edit/{id}', [SongsController::class, 'update']);
    Route::get('/get-page', [SongsController::class, 'getPage']);
});
Route::get('albums/all', [ArtistsController::class, 'getAllArtists']);
Route::get('album/get/{id}', [ArtistsController::class, 'getAlbum']);
Route::get('album/delete/{id}', [ArtistsController::class, 'delete']);
Route::get('album/addsong/{id}', [ArtistsController::class, 'add']);
Route::get('album/getname/{id}', [ArtistsController::class, 'getName']);
Route::get('albums/names', [ArtistsController::class, 'getNames']);
Route::post('songs/upload/{id}', [SongsController::class, 'uploadSong']);
