<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\ReviewController;
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

// Отзывы
Route::get('/reviews', [ReviewController::class, 'index']);

Route::get('/filters', [RoomController::class, 'getFilters']);

Route::get('/randReviews', [ReviewController::class, 'getRandomReviews']);
Route::get('/randRooms', [RoomController::class, 'getRandomRooms']);

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
        Route::post('/admin/rooms', [App\Http\Controllers\Admin\RoomController::class, 'store']);
        Route::put('/admin/rooms/{room}', [App\Http\Controllers\Admin\RoomController::class, 'update']);
        Route::delete('/admin/rooms/{room}', [App\Http\Controllers\Admin\RoomController::class, 'delete']);
        Route::post('/admin/rooms/{room}/photos', [App\Http\Controllers\Admin\RoomController::class, 'addPhoto']);
        Route::delete('/admin/rooms/photos/{photo}', [App\Http\Controllers\Admin\RoomController::class, 'deletePhoto']);
        Route::post('/admin/rooms/{room}/equipments/{equipment}', [App\Http\Controllers\Admin\RoomController::class, 'addEquipments']);
        Route::delete('/admin/rooms/{room}/equipments/{equipment}', [App\Http\Controllers\Admin\RoomController::class, 'deleteEquipment']);

        Route::get('/admin/equipments', [RoomFeatureController::class, 'index']);
        Route::post('/admin/equipments', [RoomFeatureController::class, 'store']);
        Route::put('/admin/equipments/{equipment}', [RoomFeatureController::class, 'update']);
        Route::delete('/admin/equipments/{equipment}', [RoomFeatureController::class, 'delete']);

        Route::get('/admin/bookings', [App\Http\Controllers\Admin\BookingsController::class, 'index']);
        Route::delete('/admin/bookings/{booking}', [App\Http\Controllers\Admin\BookingsController::class, 'delete']);
        Route::put('/admin/bookings/{booking}', [App\Http\Controllers\Admin\BookingsController::class, 'accept']);

        Route::put('/admin/header', [HeaderController::class, 'update']);
    });
});


