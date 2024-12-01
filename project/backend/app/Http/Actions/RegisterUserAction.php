<?php

namespace App\Http\Actions;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterUserAction
{
    public static function execute(RegisterRequest $request): string
    {
        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'password'=> Hash::make($request->get('password'))
        ]);
        $user->save();

        $token = $user->createToken('auth_token')->plainTextToken;

        return $token;
    }
}
