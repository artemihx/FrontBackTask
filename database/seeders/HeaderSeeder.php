<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Header;

class HeaderSeeder extends Seeder
{
    public function run()
    {
        Header::create([
            'name' => 'Котейка',
            'city' => 'Томск',
            'slogan' => 'Уют для вашего кота – забота в каждом мурлыканье!',
        ]);
    }
}

