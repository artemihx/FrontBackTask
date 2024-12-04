<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    public function run()
    {
        Contact::create([
            'address' => 'Герцена, 18, Томск',
            'work_hours' => 'Пн-Пт: 09:00 - 18:00',
            'phone' => '+7 (999) 123-45-67',
            'email' => 'info@koteyka.ru',
            'social_links' => [
                'vk' => 'https://vk.com/koteyka',
                'instagram' => 'https://instagram.com/koteyka',
            ],
            'room_type' => 'Стандарт',
        ]);
    }
}

