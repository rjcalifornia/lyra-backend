<?php

use App\Http\Controllers\api\AuthenticationController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/v1/seguridad')->group(function () {
    Route::post('/admin/login', [LoginController::class, 'login'])
        ->name('autenticacion-admin');

    Route::post('/dashboard/login', [AuthenticationController::class, 'dashboardLogin'])
        ->name('autenticacion-dashboard');

    Route::post('/mobile/pin-validation', [AuthenticationController::class, 'mobileLogin'])
        ->name('autenticacion-movil');

});
