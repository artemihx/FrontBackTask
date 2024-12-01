<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeaderController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function (){
    Route::get('/logout', [AuthController::class, 'logout']);
});


// данные шапки
Route::get('/header', [HeaderController::class, 'index']);

// Обновление (авторизованные админы)
Route::middleware('auth:sanctum')->put('/header', [HeaderController::class, 'update']);
