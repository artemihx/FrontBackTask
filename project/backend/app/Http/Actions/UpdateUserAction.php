<?php

namespace App\Http\Actions;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\HttpException;

class UpdateUserAction
{
    public static function execute(UserRequest $request): User
    {
        $user = auth()->user(); // получение текущего авторизованного пользователя

        // проверка и обновление пароля
        if (!empty($request['password'])) {
            $request['password'] = Hash::make($request['password']);
        }

        $user->update($request->validated());

        return $user;
    }
}
