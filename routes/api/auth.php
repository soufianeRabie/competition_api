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
