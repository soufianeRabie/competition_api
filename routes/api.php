<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ManageUsersController;
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

Route::group(['middleware' => ['admin']], function () {
    Route::get('users', [ManageUsersController::class, 'index']);
    Route::get('users/{id}', [ManageUsersController::class, 'show']);
    Route::post('users', [ManageUsersController::class, 'store']);
    Route::put('users/{id}', [ManageUsersController::class, 'update']);
    Route::delete('users/{id}', [ManageUsersController::class, 'destroy']);
});


