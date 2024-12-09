<?php

namespace App\Http\Actions;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class RegisterUserAction
{
    public static function execute(RegisterRequest $request): string
    {
        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'password'=> Hash::make($request->get('password')),
        ]);
        if ($photo = $request->file('photo'))
        {
            $path = 'avatars/' . $photo->hashName();
            Storage::disk('public')->put($path, file_get_contents($photo));
            $photoUrl = Storage::disk('public')->url($path);
            $user->photo = $photoUrl;
        }
        $user->save();

        $token = $user->createToken('auth_token')->plainTextToken;

        return $token;
    }
}
