<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\NiveauMatiereController;
use App\Http\Controllers\ExamenController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\PrimeController;
use App\Http\Controllers\CongeController;
use App\Http\Controllers\ChargeHoraireController;
use App\Http\Controllers\AnneeUniversitaireController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {return $request->user();});

Route::middleware('api')->group(function () {Route::resource('salles', SalleController::class);});
Route::middleware('api')->group(function () {Route::resource('niveaux', NiveauController::class);});
Route::middleware('api')->group(function () {Route::resource('matieres', MatiereController::class);});


Route::middleware('api')->group(function () {Route::resource('enseignants', EnseignantController::class); });
Route::middleware('api')->group(function () {Route::resource('primes', PrimeController::class); });
Route::get('/ensg/{idcat}',[PrimeController::class,'showEnseignantByCAT']);
Route::middleware('api')->group(function () {Route::resource('conges', CongeController::class); });
Route::get('/ensg/{idcat}',[CongeController::class,'showEnseignantByCAT']);


Route::middleware('api')->group(function () { Route::resource('niveau_matieres', NiveauMatiereController::class);});
Route::get('/res/{idniveau}',[NiveauMatiereController::class,'showniveau']);
Route::get('/res/{idmatiere}',[NiveauMatiereController::class,'showmatiere']);














Route::middleware('api')->group(function () { Route::resource('charge_horaires', ChargeHoraireController::class);});
Route::get('/res/{idniveaumatiere}',[ChargeHoraireController::class,'showniveaumatiere']);
Route::get('/res/{idenseignant}',[ChargeHoraireController::class,'showenseignant']);




Route::middleware('api')->group(function () {Route::resource('annee_universitaires', AnneeUniversitaireController::class); });
Route::get('/annee/{idcat}',[AnneeUniversitaireController::class,'showAnneeUniversitaire']);











Route::middleware('api')->group(function () {Route::resource('groupes', GroupeController::class);});
Route::get('/gp/{idcat}',[GroupeController::class,'showGroupeByCAT']);


Route::middleware('api')->group(function () {Route::resource('examens', ExamenController::class);});
Route::get('/ex/{idcat}',[ExamenController::class,'showExamenByCAT']);
    