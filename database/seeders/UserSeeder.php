<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run()
    {
        User::create([
            'name' => 'TNET',
            'email' => 'tnet@gmail.com',
            'password' => bcrypt('tnet123'),
            'email_verified_at' => now(),
        ]);
    }
}
