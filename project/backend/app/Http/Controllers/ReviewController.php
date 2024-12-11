<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
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
    public function store(ReviewRequest $request)
    {
        $review = Review::create($request);
        return response()->json($review, 201);
    }

    /**
     * Обновить существующий отзыв.
     */
    public function update(ReviewRequest $request, $review)
    {
        $review->update($request);
        return response()->json($review);
    }

    /**
     * Удалить отзыв.
     */
    public function destroy($review)
    {
        $review->delete();
        return response()->json(['message' => 'Review deleted successfully']);
    }
}
