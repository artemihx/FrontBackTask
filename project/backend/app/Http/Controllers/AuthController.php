<?php

namespace App\Http\Controllers;

use App\Http\Actions\LoginUserAction;
use App\Http\Actions\RegisterUserAction;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
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
        $photo = $request->file('photo');
        Storage::disk('public')->put('avatars/' . $photo->hashName(), file_get_contents($photo));
        auth()->user()->update(['photo' => 'avatars/' . $photo->hashName()]);
        return response()->json(['avatar' => $photo->hashName()]);
    }

    public function user()
    {
        // return Storage::disk('public')->files(auth()->user()->photo);
        return response()->json(Storage::disk('public')->files('avatars/'));
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
