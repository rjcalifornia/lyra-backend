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
    Route::get('/juntas-receptoras', [CatalogosController::class, 'obtenerJuntasReceptoras'])
        ->middleware([ValidacionDispositivo::class, 'auth:sanctum','can:verJuntasReceptoras, App\Models\JuntasReceptoras']);

    Route::get('/partidos-politicos/{idTipoActa}', [CatalogosController::class, 'obtenerCandidatos'])
        ->middleware([ValidacionDispositivo::class, 'auth:sanctum','can:verPartidosPoliticos, App\Models\PartidosPoliticos']);

    Route::get('/elecciones', [CatalogosController::class, 'obtenerEleccionesDisponibles']);
});

Route::prefix('/v1/mobile/tranmisiones')->group(function () {
    Route::get('/', [TransmisionController::class, 'obtenerTransmisiones'])
        ->middleware([ValidacionDispositivo::class, 'auth:sanctum', 'can:listarTransmision, App\Models\ActaElectoral']);

    Route::get('/{idActa}', [TransmisionController::class, 'verDetalleTransmision'])
        ->middleware([ValidacionDispositivo::class, 'auth:sanctum', 'can:verTransmision, App\Models\ActaElectoral']);

    Route::post('/{idTipoActa}', [TransmisionController::class, 'almacenarTransmision'])
        ->middleware([ValidacionDispositivo::class, 'auth:sanctum', 'can:crearTransmision, App\Models\ActaElectoral']);
});
