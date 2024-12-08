<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Admin\RoomController as AdminRoomController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoomFeatureController;

// Авторизация и регистрация
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Данные шапки
Route::get('/header', [HeaderController::class, 'index']);

// Номера
Route::get('/rooms', [RoomController::class, 'index']);
Route::get('/rooms/{room}', [RoomController::class, 'show']);

// Авторизация для обновления данных пользователя
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/updatePhoto', [AuthController::class, 'updateAvatar']);
});

// Отзывы
Route::get('/reviews', [ReviewController::class, 'index']);
Route::post('/reviews', [ReviewController::class, 'store']);
Route::put('/reviews/{id}', [ReviewController::class, 'update']);
Route::delete('/reviews/{id}', [ReviewController::class, 'destroy']);

// Обновление данных шапки (только для авторизованных администраторов)
Route::middleware('auth:sanctum')->put('/header', [HeaderController::class, 'update']);

// Админка (только для авторизованных администраторов)
Route::middleware('auth:api')->group(function () {
    // Админка: Пользователи
    Route::get('/admin/users', [UserController::class, 'index']);
    Route::post('/admin/users', [UserController::class, 'store']);
    Route::put('/admin/users/{id}', [UserController::class, 'update']);
    Route::delete('/admin/users/{id}', [UserController::class, 'destroy']);

    // Админка: Номера
    Route::get('/admin/rooms', [AdminRoomController::class, 'index']);
    Route::post('/admin/rooms', [AdminRoomController::class, 'store']);
    Route::put('/admin/rooms/{id}', [AdminRoomController::class, 'update']);
    Route::delete('/admin/rooms/{id}', [AdminRoomController::class, 'destroy']);

    // Админка: Оснащение номеров
    Route::get('/admin/room-features', [RoomFeatureController::class, 'index']);
    Route::post('/admin/room-features', [RoomFeatureController::class, 'store']);
    Route::put('/admin/room-features/{id}', [RoomFeatureController::class, 'update']);
    Route::delete('/admin/room-features/{id}', [RoomFeatureController::class, 'destroy']);
});
