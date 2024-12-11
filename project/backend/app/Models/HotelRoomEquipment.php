<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelRoomEquipment extends Model
{
    use HasFactory;

    protected $table = 'hotel_rooms_equipment';

    protected $fillable = [
       'hotel_room_id',
       'equipment_id',
    ];
}
