<?php

namespace App\Http\Controllers;

use App\Models\Header;
use Illuminate\Http\JsonResponse;

class HeaderController extends Controller
{
    public function index(): JsonResponse
    {
        $header = Header::first();
        if (!$header) {
            return response()->json(['error' => 'Header not found'], 404);
        }

        return response()->json([
            'name' => $header->name,
            'city' => $header->city,
            'slogan' => $header->slogan,
        ]);
    }
}
