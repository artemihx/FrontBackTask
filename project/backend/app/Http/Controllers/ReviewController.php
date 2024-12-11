<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use Illuminate\Support\Facades\Gate;

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
        $review = Review::create(
            [
                'user_id' => auth()->user()->id,
                'content' => $request->content,
                'rating' => $request->rating
            ]);
        return response()->json($review, 201);
    }

    /**
     * Обновить существующий отзыв.
     */
    public function update(ReviewRequest $request, Review $review)
    {
        Gate::authorize('update', $review);
        $review->update($request->validated());
        return response()->json($review);
    }

    /**
     * Удалить отзыв.
     */
    public function delete(Review $review)
    {
        Gate::authorize('delete', $review);
        $review->delete();
        return response()->json(['message' => 'Review deleted successfully']);
    }

    public function getRandomReviews()
    {
        $reviews = Review::inRandomOrder()->take(5)->get();
        return response()->json($reviews);
    }
}
