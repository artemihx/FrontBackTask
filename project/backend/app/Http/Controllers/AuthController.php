<?php

namespace App\Http\Controllers;

use App\Http\Actions\LoginUserAction;
use App\Http\Actions\RegisterUserAction;
use App\Http\Actions\UpdateAvatarUserAction;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
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

    public function userPhoto(User $user)
    {
        return $user->photo;
    }
        // Обновление данных пользователя
    public function updateUser(Request $request)
    {
        $user = $request->user(); // получение текущего авторизованного пользователя

        // Валидака
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'phone' => 'nullable|string|max:20',
        ]);

        // проверка и обновление пароля
        if (!empty($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }

        try {
            $user->update($validatedData); // обновление пользователя
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ошибка при обновлении данных пользователя.',
                'error' => $e->getMessage(),
            ], 500);
        }

        return response()->json([
            'success' => true,
            'message' => 'Данные пользователя успешно обновлены.',
            'user' => $user,
        ]);

        $user->update($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Данные пользователя успешно обновлены.',
            'user' => $user,
        ]);
    }
}
