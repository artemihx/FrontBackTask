<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
        public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Связь с таблицей пользователей
            $table->foreignId('room_id')->constrained('hotel_rooms')->onDelete('cascade'); // Исправляем на hotel_rooms
            $table->date('start_date'); // Дата начала бронирования
            $table->date('end_date');   // Дата окончания бронирования
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
