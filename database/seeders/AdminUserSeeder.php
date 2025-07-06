<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Kantin',
            'email' => 'admin@kantin.com',
            'password' => Hash::make('password'), // ganti dengan password aman
            'role_id' => 1, // pastikan 1 = admin
        ]);
    }
}
