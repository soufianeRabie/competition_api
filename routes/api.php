<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);


Route::get('getInit' ,[InitalController::class ,'init'] );
Route::resources([
    'intervenants'=>IntervenantController::class,
    'actions'=>ActionController::class,
    'regions'=>RegionController::class,
    'certifications'=>CertificationController::class,
    'themes'=>ThemeController::class,
    'competences'=>CompetenceController::class,
]);
// Route::post('/themes/{themeId}/assignIntervenants', [ThemeIntervenantController::class, 'assignIntervenants']);

// Route::get('/themeIntervenants', [ThemeIntervenantController::class, 'themeIntervenants']);

Route::get('/themes', [ThemeController::class, 'index']);

Route::get('/intervenants/potential', [IntervenantController::class, 'getPotentialIntervenants']);
