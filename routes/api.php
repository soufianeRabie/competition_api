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



Route::post('password/email', [\App\Http\Controllers\ResetPasswordController::class, 'sendResetLinkEmail']);
Route::post('password/reset', [\App\Http\Controllers\ResetPasswordController::class, 'reset']);

Route::get('/catalogue/download', [\App\Http\Controllers\ThemeController::class, 'generatePDF'])->name('catalogue.download');
//Route::get('/catalogue/qrcode', [CatalogueController::class, 'showQRCode'])->name('catalogue.qrcode');



