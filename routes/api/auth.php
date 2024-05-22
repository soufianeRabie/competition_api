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

Route::apiResource('users', ManageUsersController::class);
Route::get('me' , [ManageUsersController::class , 'getUser']);
Route::put('/profiles/{profil}' , [\App\Http\Controllers\ProfilController::class , 'update']);
Route::put('/entreprise/profile' , [\App\Http\Controllers\EntrepriseController::class , 'updateProfile']);
