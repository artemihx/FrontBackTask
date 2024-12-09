<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hotel_rooms_equipment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotel_room_id')->constrained('hotel_rooms');
            $table->foreignId('equipment_id')->constrained('room_equipment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_rooms_equipment');
    }
};
