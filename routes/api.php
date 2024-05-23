<?php

use App\Http\Controllers\ActionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CertificationController;
use App\Http\Controllers\CompetenceController;
use App\Http\Controllers\InitalController;
use App\Http\Controllers\IntervenantController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ThemeController;
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

Route::post('password/email', [\App\Http\Controllers\ResetPasswordController::class, 'sendResetLinkEmail']);
Route::post('password/reset', [\App\Http\Controllers\ResetPasswordController::class, 'reset']);
