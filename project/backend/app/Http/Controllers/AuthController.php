<?php

namespace App\Http\Controllers;

use App\Http\Actions\LoginUserAction;
use App\Http\Actions\RegisterUserAction;
use App\Http\Actions\UpdateAvatarUserAction;
use App\Http\Actions\UpdateUserAction;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Регистрация
    public function register(RegisterRequest $request): JsonResponse
    {
        $token = RegisterUserAction::execute($request);
        return response()->json(['user_token' => $token], 201);
    }

    // Обновление аватара
    public function updateAvatar(Request $request): JsonResponse
    {
        $avatar = UpdateAvatarUserAction::execute($request);
        return response()->json(['avatar' => $avatar], 201);
    }

    // Получение авторизованного пользователя
    public function user()
    {
        return response()->json(auth()->user());
    }

    // Вход
    public function login(LoginRequest $request)
    {
        $token = LoginUserAction::execute($request);
        return response()->json(['user_token' => $token], 200);
    }

    // Выход
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json(['message' => 'logout'], 200);
    }
        // Обновление данных пользователя
    public function updateUser(UserRequest $request)
    {
        $response = UpdateUserAction::execute($request);
        return response()->json($response, 200);
    }
}
