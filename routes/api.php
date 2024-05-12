<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\NiveauMatiereController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('api')->group(function () {
Route::resource('salles', SalleController::class);
});
Route::middleware('api')->group(function () {
    Route::resource('niveaux', NiveauController::class);
    });

    Route::middleware('api')->group(function () {
        Route::resource('matieres', MatiereController::class);
        });



Route::middleware('api')->group(function () { Route::resource('niveau_matieres', NiveauMatiereController::class);});
Route::get('/res/{idniveau}',[NiveauMatiereController::class,'showniveau']);
Route::get('/res/{idmatiere}',[NiveauMatiereController::class,'showmatiere']);











    Route::middleware('api')->group(function () {
    Route::resource('groupes', GroupeController::class);
    });
    Route::get('/gp/{idcat}',
    [GroupeController::class,'showGroupeByCAT']);
    