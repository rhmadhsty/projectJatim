<?php

use App\Http\Controllers\API\Auth\AuthController;
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

Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/profile', [AuthController::class, 'profile'])->middleware('auth:sanctum');
    Route::post('/changepass', [AuthController::class, 'changePass'])->middleware('auth:sanctum');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
});

// Route::group(['prefix' => 'siswa', 'middleware' => 'auth:sanctum'], function () {
//     Route::post('/vote/{id}', [VoteApiController::class, 'vote']);
//     Route::get('/calon-osis', [CalonOsisApiController::class, 'calonOsis']);
// });
