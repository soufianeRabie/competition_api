<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ManageUsersController;
use App\Http\Controllers\ProfileSettingController;
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
Route::resources([
    'intervenants'=>\App\Http\Controllers\IntervenantController::class,
    'actions'=>\App\Http\Controllers\ActionController::class,
    'regions'=>\App\Http\Controllers\RegionController::class,
    'profiles'=>\App\Http\Controllers\ProfilController::class
]);
Route::put('/entreprise/profile' , [\App\Http\Controllers\EntrepriseController::class , 'updateProfile']);
Route::get('getInit' ,[\App\Http\Controllers\InitalController::class ,'init'] );

Route::post('/users/role/{user}' , [ManageUsersController::class , 'updateRole']);

