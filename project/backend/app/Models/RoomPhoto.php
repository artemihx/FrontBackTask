<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomPhoto extends Model
{
    use HasFactory;
    protected $table = 'rooms_photos';

    protected $fillable = ['room_id', 'photo'];

    public function room()
    {
        return $this->belongsTo(HotelRoom::class, 'room_id');
    }
}
