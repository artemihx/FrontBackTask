<?php

namespace Database\Seeders;

use App\Models\Header;
use App\Models\HotelRoom;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Header::create([
            'city' => 'Томск',
            'slogan' => 'Уют для вашего кота – забота в каждом мурлыканье!',
        ]);

        $this->call([
            HotelRoomSeeder::class,
            EquipmentSeeder::class,
            HotelRoomsEquipmentSeeder::class,
        ]);
    }
}
