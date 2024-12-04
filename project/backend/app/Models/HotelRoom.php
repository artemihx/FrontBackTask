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
        'on_main'
    ];
}
