<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PumpController;

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

Route::post('fleet/auth-pump', [PumpController::class, 'store']);
Route::post('pump/status', [PumpController::class, 'pump_status']);
Route::post('start_fueling', [PumpController::class, 'start_fueling']);
Route::get('start_fueling', [PumpController::class, 'start_fueling']);
Route::post('done_fueling', [PumpController::class, 'done_fueling']);
Route::get('done_fueling', [PumpController::class, 'done_fueling']);
Route::get('gamezone', [GamezoneController::class, 'index']);

