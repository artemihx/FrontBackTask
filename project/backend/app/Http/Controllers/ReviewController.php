<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Получить все отзывы.
     */
    public function index()
    {
        return response()->json(Review::with('user')->get());
    }

    /**
     * Создать новый отзыв.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'content' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $review = Review::create($validated);

        return response()->json($review, 201);
    }

    /**
     * Обновить существующий отзыв.
     */
    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);

        $validated = $request->validate([
            'content' => 'nullable|string|max:1000',
            'rating' => 'nullable|integer|min:1|max:5',
        ]);

        $review->update($validated);

        return response()->json($review);
    }

    /**
     * Удалить отзыв.
     */
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return response()->json(['message' => 'Review deleted successfully']);
    }
}
