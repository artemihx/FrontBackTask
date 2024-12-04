<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Возвращение данных текущего пользователя.
     */
    public function show()
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'avatar' => $user->avatar,
        ]);
    }

    /**
     * Обновка данных профиля.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15',
            'avatar' => 'nullable|image|mimes:jpeg,png|max:2048', // Аватар как файл
        ]);

        $user->update([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
        ]);

        // аватар
        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->update(['avatar' => $path]);
        }

        return response()->json(['message' => 'Profile updated successfully']);
    }
}
