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


Route::get('getInit' ,[\App\Http\Controllers\InitalController::class ,'init'] );
Route::resources([
    'intervenants'=>\App\Http\Controllers\IntervenantController::class,
    'actions'=>\App\Http\Controllers\ActionController::class,
    'regions'=>\App\Http\Controllers\RegionController::class
]);


