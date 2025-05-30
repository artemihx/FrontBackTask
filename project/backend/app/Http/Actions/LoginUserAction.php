<?php

namespace App\Http\Actions;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Hash;

class LoginUserAction
{
    public static function execute(LoginRequest $request): string
    {
        $user = User::query()->where('email', '=', $request->get('email'))->first();
        if(!$user || !Hash::check($request->get('password'), $user->password))
        {
            throw new HttpResponseException(response()->json(['message' => 'Auth failed'], 401));
        }
        $token = $user->createToken('auth_token')->plainTextToken;

        return $token;
    }
}
