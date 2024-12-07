<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomPhoto extends Model
{
    protected $table = 'rooms_photos';

    protected $fillable = ['room_id', 'photo'];
}
