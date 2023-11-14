<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProyekController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
   return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {   
   Route::post('/logout', [AuthController::class, 'logout']);
   
   Route::resource('users', UserController::class);
   
   Route::resource('proyeks', ProyekController::class);
   
   Route::resource('pekerjaans', PekerjaanController::class);
   
   Route::resource('laporans', LaporanController::class);
});