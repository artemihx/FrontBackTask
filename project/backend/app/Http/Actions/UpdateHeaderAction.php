<?php

namespace App\Http\Actions;

use App\Http\Requests\HeaderRequest;
use App\Models\Header;

class UpdateHeaderAction
{
    public static function execute(HeaderRequest $request)
    {
        $header = Header::first();

        if (!$header) {
            return response()->json(['error' => 'Header not found'], 404);
        }

        $header->update($request);

        return response()->json([
            'message' => 'Header updated successfully', $header
        ]);
    }
}
