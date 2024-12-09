<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelRoom extends Model
{
    use HasFactory;
    protected $table = 'hotel_rooms';

    protected $fillable = [
        'name',
        'width',
        'height',
        'length',
        'price',
        'on_main',
    ];

    protected $appends = ['area'];

    public function getAreaAttribute()
    {
        return $this->width * $this->length;
    }
    public function equipment()
    {
        return $this->belongsToMany(RoomEquipment::class, 'hotel_rooms_equipment', 'hotel_room_id', 'equipment_id');
    }

    public function photos()
    {
        return $this->hasMany(RoomPhoto::class, 'room_id');
    }
}
