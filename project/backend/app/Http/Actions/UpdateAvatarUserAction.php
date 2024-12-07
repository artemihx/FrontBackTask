<?php

namespace App\Http\Actions;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateAvatarUserAction
{
    public static function execute(Request $request): string
    {
        $photo = $request->file('photo');
        Storage::disk('public')->put('avatars/' . $photo->hashName(), file_get_contents($photo));
        auth()->user()->update(['photo' => 'avatars/' . $photo->hashName()]);
        return response()->json(['avatar' => $photo->hashName()]);
    }
}
