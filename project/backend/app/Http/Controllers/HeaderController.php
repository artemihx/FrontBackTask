<?php

namespace App\Http\Controllers;

use App\Models\Header;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class HeaderController extends Controller
{
    /**
     * Возвращение данные шапки.
     */
    public function index(): JsonResponse
    {
        $header = Header::first();

        if (!$header) {
            return response()->json(['error' => 'Header not found'], 404);
        }

        return response()->json([
            'city' => $header->city,
            'slogan' => $header->slogan,
        ]);
    }

    /**
     * Обновление данных шапки (админ).
     */
    public function update(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'city' => 'required|string|max:255',
            'slogan' => 'required|string|max:255',
        ]);

        $header = Header::first();

        if (!$header) {
            return response()->json(['error' => 'Header not found'], 404);
        }

        $header->update($validated);

        return response()->json([
            'message' => 'Header updated successfully',
            'header' => [
                'city' => $header->city,
                'slogan' => $header->slogan,
            ],
        ]);
    }
}
