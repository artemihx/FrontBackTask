<?php

namespace App\Http\Controllers;

use App\Http\Actions\LoginUserAction;
use App\Http\Actions\RegisterUserAction;
use App\Http\Actions\UpdateAvatarUserAction;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function register(RegisterRequest $request): JsonResponse
    {
        $token = RegisterUserAction::execute($request);
        return response()->json(['user_token' => $token], 201);
    }

    public function updateAvatar(Request $request): JsonResponse
    {
        $avatar = UpdateAvatarUserAction::execute($request);
        return response()->json(['avatar' => $avatar], 201);
    }

    public function user()
    {
        return response()->json(auth()->user());
    }

    public function login(LoginRequest $request)
    {
        $token = LoginUserAction::execute($request);
        return response()->json(['user_token' => $token], 200);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json(['message' => 'logout'], 200);
    }
}
