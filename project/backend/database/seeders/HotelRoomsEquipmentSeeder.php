<?php

namespace Database\Seeders;

use App\Models\HotelRoom;
use App\Models\RoomEquipment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HotelRoomsEquipmentSeeder extends Seeder
{
    public function run(): void
    {
        $rooms = HotelRoom::all();
        $equipments = RoomEquipment::all();

        foreach ($rooms as $index => $room) {
            if ($index < 2) {
                $room->equipment()->attach(1); // Предполагается, что ID отопления = 1
            } else {
                $equipmentIds = $equipments->pluck('id')->take($index + 1);
                $room->equipment()->attach($equipmentIds);
            }
        }

        $premiumRooms = $rooms->whereIn('name', ['Премиум', 'Люкс', 'Дворец']);
        $allEquipmentIds = $equipments->pluck('id');
        foreach ($premiumRooms as $room) {
            $room->equipment()->attach($allEquipmentIds);
        }
    }
}
