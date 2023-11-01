<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = [
            "name" => "Admin",
            "surname" => "Admin",
            "email" => "admin@admin.io",
            "password" => "adminpassword"
        ];

        User::create([
            'name' => $admin["name"],
            'surname' => $admin["surname"],
            'email' => $admin["email"],
            'password' => $admin["password"],
        ]);
    }
}
