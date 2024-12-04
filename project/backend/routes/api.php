<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeaderController;

// авторизация регистрация
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
// данные шапки
Route::get('/header', [HeaderController::class, 'index']);

Route::get('/rooms', [RoomController::class, 'index']);
Route::get('/rooms/{room}', [RoomController::class, 'show']);



Route::group(['middleware' => 'auth:sanctum'], function (){
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/updatePhoto', [AuthController::class, 'updateAvatar']);
});

// Обновление (авторизованные админы)
Route::middleware('auth:sanctum')->put('/header', [HeaderController::class, 'update']);
