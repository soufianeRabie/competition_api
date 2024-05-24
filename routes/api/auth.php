<?php

use App\Http\Controllers\ActionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CertificationController;
use App\Http\Controllers\CompetenceController;
use App\Http\Controllers\InitalController;
use App\Http\Controllers\IntervenantController;
use App\Http\Controllers\ManageUsersController;
use App\Http\Controllers\ProfileSettingController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ThemeController;
use Illuminate\Support\Facades\Route;

// * AUTH API
Route::get('init', [AuthController::class, 'user']);
Route::post('logout', [AuthController::class, 'logout']);
// * Profile settings
Route::prefix('profile')->controller(ProfileSettingController::class)->group(function () {
    Route::put('change-password', 'updatePassword');
});

Route::put('/actions/validate/{action}' , [\App\Http\Controllers\ActionController::class , 'validateAction'] );

Route::apiResource('users', ManageUsersController::class);
Route::get('me' , [ManageUsersController::class , 'getUser']);

Route::get('getInit' ,[InitalController::class ,'init'] );
Route::resources([
    'intervenants'=>IntervenantController::class,
    'actions'=>ActionController::class,
    'regions'=>RegionController::class,
    'certifications'=>CertificationController::class,
    'themes'=>ThemeController::class,
    'competences'=>CompetenceController::class,
    'profiles'=>\App\Http\Controllers\ProfilController::class
]);
//Route::get('/themes', [ThemeController::class, 'index']);
Route::put('/entreprise/profile' , [\App\Http\Controllers\EntrepriseController::class , 'updateProfile']);
Route::get('getInit' ,[\App\Http\Controllers\InitalController::class ,'init'] );

Route::post('/users/role/{user}' , [ManageUsersController::class , 'updateRole']);

Route::post('/intervenant/affect' , [\App\Http\Controllers\ThemeIntervenantController::class , 'assignIntervenants']);

