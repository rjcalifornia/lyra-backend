<?php

use App\Http\Controllers\api\AuthenticationController;
use App\Http\Controllers\api\CatalogosController;
use App\Http\Controllers\api\TransmisionController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\ValidacionDispositivo;
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

    Route::post('/mobile/pin-validation', [AuthenticationController::class, 'autenticarDispositivo'])
        ->name('autenticacion-movil');

});

Route::prefix('/v1/mobile/catalogos')->group(function () {
    Route::get('/juntas/receptoras', [CatalogosController::class, 'obtenerJuntasReceptoras'])
        ->middleware([ValidacionDispositivo::class, 'auth:sanctum','can:verJuntasReceptoras, App\Models\JuntasReceptoras']);
});

Route::prefix('/v1/tranmision')->group(function () {
    Route::get('/', [TransmisionController::class, 'obtenerTransmisiones'])
        ->middleware([ValidacionDispositivo::class, 'auth:sanctum', 'can:listarTransmision, App\Models\ActaElectoral']);
});
