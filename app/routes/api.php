<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonneController;
use App\Http\Controllers\CiviliteController;
use App\Http\Controllers\SecteurActiviteController;

use App\Http\Controllers\LocalisationController;
use App\Http\Controllers\EntrepriseController;
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

// Personnes
Route::post('/personnes', [PersonneController::class, 'store']);
Route::get('/personnes', [PersonneController::class, 'index']);
Route::get('/personnes/{id}', [PersonneController::class, 'show']);
Route::put('/personnes/{id}', [PersonneController::class, 'update']);
Route::delete('/personnes/{id}', [PersonneController::class, 'destroy']);
// Civilités
Route::get('/civilites', [CiviliteController::class, 'index']);

// Entreprises
Route::get('/entreprises', [EntrepriseController::class, 'index']);
Route::post('/entreprises', [EntrepriseController::class, 'store']);
Route::get('/entreprises/{id}', [EntrepriseController::class, 'show']);
Route::put('/entreprises/{id}', [EntrepriseController::class, 'update']);
Route::delete('/entreprises/{id}', [EntrepriseController::class, 'destroy']);

// Localisations
Route::get('/localisations', [LocalisationController::class, 'index']);

// Secteurs d'activité
Route::get('/secteurs-activite', [SecteurActiviteController::class, 'index']);