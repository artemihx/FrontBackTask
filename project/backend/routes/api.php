<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Admin\RoomController as AdminRoomController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoomFeatureController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;

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

// Авторизация для обновления данных пользователя
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
    Route::put('/user', [AuthController::class, 'updateUser']);
    Route::post('/updatePhoto', [AuthController::class, 'updateAvatar']);
});

// Отзывы
Route::get('/reviews', [ReviewController::class, 'index']);
Route::post('/reviews', [ReviewController::class, 'store']);
Route::put('/reviews/{id}', [ReviewController::class, 'update']);
Route::delete('/reviews/{id}', [ReviewController::class, 'destroy']);

// Бронирование (для авторизованных пользователей)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/bookings', [BookingController::class, 'index']); // Список бронирований
    Route::post('/bookings', [BookingController::class, 'store']); // Создать бронирование
    Route::delete('/bookings/{booking}', [BookingController::class, 'destroy']); // Удалить бронирование

    // Контакты
    Route::post('/contacts', [ContactController::class, 'store']); // Создать сообщение
    Route::get('/contacts', [ContactController::class, 'index']); // Просмотреть свои сообщения
});

// Обновление данных шапки (только для админов)
Route::middleware('auth:sanctum')->put('/header', [HeaderController::class, 'update']);

// Информация об отеле для животных
Route::get('/contact', [ContactController::class, 'hotelInfo']);

// Админка (только для админов)
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

Route::get('/filters', [RoomController::class, 'getFilters']);
