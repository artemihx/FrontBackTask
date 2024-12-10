<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Header;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class HeaderController extends Controller
{
    public function index(): JsonResponse
    {
        $header = Header::first();

        if (!$header) {
            return response()->json(['error' => 'Header not found'], 404);
        }

        return response()->json($header);
    }

    public function update(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'city' => 'string',
            'slogan' => 'string',
            'adress' => 'string',
            'phone' => 'string',
            'email' => 'string',
            'worktime' => 'string',
            'vk' => 'string',
            'tg' => 'string',
            'whatsapp' => 'string'
        ]);

        $header = Header::first();

        if (!$header) {
            return response()->json(['error' => 'Header not found'], 404);
        }

        $header->update($validated);

        return response()->json([
            'message' => 'Header updated successfully', $header
        ]);
    }
}
