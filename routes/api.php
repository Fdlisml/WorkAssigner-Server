<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProjectController;

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

Route::get('/laporan', [LaporanController::class, 'dataLaporan']);

Route::middleware('auth:sanctum')->group(function () {   
   Route::post('/logout', [AuthController::class, 'logout']);
   
   Route::resource('users', UserController::class);
   
   Route::resource('projects', ProjectController::class);
   
   Route::resource('tugas', TugasController::class);
   
   Route::resource('laporans', LaporanController::class);
});