<?php

namespace App\Http\Actions;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UpdateUserAction
{
    public static function execute(UserRequest $request): string
    {
        $user = auth()->user(); // получение текущего авторизованного пользователя

        // проверка и обновление пароля
        if (!empty($request['password'])) {
            $request['password'] = Hash::make($request['password']);
        }

        try {
            $user->update($request); // обновление пользователя
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
    }
}
