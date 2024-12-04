<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['address', 'work_hours', 'phone', 'email', 'social_links', 'room_type'];

    protected $casts = [
        'social_links' => 'array',
    ];
}
