<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KeretaController;
use App\Http\Controllers\StasiunController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/kereta', [KeretaController::class, 'index']);
Route::post('/kereta', [KeretaController::class, 'store']);
Route::put('/kereta/{id}', [KeretaController::class, 'update']);
Route::delete('/kereta/{id}', [KeretaController::class, 'destroy']);
Route::get('/kereta/{id}', [KeretaController::class, 'show']);


Route::get('/stasiun', [StasiunController::class, 'index']);
Route::post('/stasiun', [StasiunController::class, 'store']);
Route::put('/stasiun/{id}', [StasiunController::class, 'update']);
Route::delete('/stasiun/{id}', [StasiunController::class, 'destroy']);
Route::get('/stasiun/{id}', [StasiunController::class, 'show']);

Route::get('/jadwal', [JadwalController::class, 'index']);
Route::post('/jadwal', [JadwalController::class, 'store']);
Route::put('/jadwal/{id}', [JadwalController::class, 'update']);
Route::delete('/jadwal/{id}', [JadwalController::class, 'destroy']);
Route::get('/jadwal/{id}', [JadwalController::class, 'show']);

Route::post('login', [AuthController::class, 'login']);
