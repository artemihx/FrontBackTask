<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Review::create([
            'user_id' => 1,
            'content' => 'Отличный отель! Чистые номера и прекрасный сервис.',
            'rating' => 5
        ],
        [
            'user_id' => 1,
            'content' => 'Отличный отель! Чистые номера и прекрасный сервис.',
            'rating' => 4
        ],
        [
            'user_id' => 1,
            'content' => 'Отличный отель! Чистые номера и прекрасный сервис.',
            'rating' => 3
        ],
        [
            'user_id' => 1,
            'content' => 'Отличный отель! Чистые номера и прекрасный сервис.',
            'rating' => 2
        ],
        [
            'user_id' => 1,
            'content' => 'Отличный отель! Чистые номера и прекрасный сервис.',
            'rating' => 1
        ]);

    }
}
