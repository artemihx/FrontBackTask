<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function (){
    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:sanctum')->group(function () {
    // Получение данных профиля
    Route::get('/profile', [ProfileController::class, 'show']);
    // Обновление данных профиля
    Route::put('/profile', [ProfileController::class, 'update']);
});


// данные шапки
Route::get('/header', [HeaderController::class, 'index']);

// Обновление (авторизованные админы)
Route::middleware('auth:sanctum')->put('/header', [HeaderController::class, 'update']);

// Профиль
Route::middleware('auth:sanctum')->get('/profile', [ProfileController::class, 'show']);
Route::middleware('auth:sanctum')->put('/profile', [ProfileController::class, 'update']);

// Контакты
Route::get('/contacts', [ContactController::class, 'index']);
Route::middleware('auth:sanctum')->put('/contacts', [ContactController::class, 'update']);
