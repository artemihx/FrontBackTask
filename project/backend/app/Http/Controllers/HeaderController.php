<?php

namespace App\Http\Controllers;

use App\Http\Requests\HeaderRequest;
use App\Models\Contact;
use App\Models\Header;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Actions\UpdateHeaderAction;

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

    public function update(HeaderRequest $request): JsonResponse
    {
        $response = UpdateHeaderAction::execute($request);
        return response()->json($response);
    }
}
