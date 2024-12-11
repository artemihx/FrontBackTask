<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Admin\RoomController as AdminRoomController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoomFeatureController;
use App\Http\Controllers\BookingController;

// Авторизация и регистрациq
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Данные шапки
Route::get('/header', [HeaderController::class, 'index']);

// Номера
Route::get('/rooms', [RoomController::class, 'index']);
Route::get('/rooms/{room}', [RoomController::class, 'show']);

// Маршруты для фото
Route::get('/users/{user}/photo', [AuthController::class, 'userPhoto']);
Route::get('/rooms/{room}/photos', [RoomController::class, 'roomPhotos']);

// Отзывы
Route::get('/reviews', [ReviewController::class, 'index']);

Route::get('/filters', [RoomController::class, 'getFilters']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
    Route::put('/user', [AuthController::class, 'updateUser']);
    Route::post('/updatePhoto', [AuthController::class, 'updateAvatar']);

    Route::post('/reviews', [ReviewController::class, 'store']);
    Route::put('/reviews/{review}', [ReviewController::class, 'update']);
    Route::delete('/reviews/{review}', [ReviewController::class, 'delete']);

    Route::get('/bookings', [BookingController::class, 'index']); // Список бронирований
    Route::post('/bookings', [BookingController::class, 'store']); // Создать бронирование
    Route::delete('/bookings/{booking}', [BookingController::class, 'delete']); // Удалить бронирование

    Route::group(['middleware' => 'role:admin'], function ()
    {
        Route::get('/admin/rooms', [AdminRoomController::class, 'index']);
        Route::post('/admin/rooms', [AdminRoomController::class, 'store']);
        Route::put('/admin/rooms/{id}', [AdminRoomController::class, 'update']);
        Route::delete('/admin/rooms/{id}', [AdminRoomController::class, 'destroy']);

        Route::get('/admin/room-features', [RoomFeatureController::class, 'index']);
        Route::post('/admin/room-features', [RoomFeatureController::class, 'store']);
        Route::put('/admin/room-features/{id}', [RoomFeatureController::class, 'update']);
        Route::delete('/admin/room-features/{id}', [RoomFeatureController::class, 'destroy']);
    });
});


