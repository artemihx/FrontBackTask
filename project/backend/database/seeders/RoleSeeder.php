<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'admin']);

        $user = User::create([
            "name" => "Admin",
            "email" => "admin@admin.com",
            "password" => Hash::make("superadmin"),
            "phone" => "+71112223344"
        ]);

        $user->assignRole('admin');

    }
}
