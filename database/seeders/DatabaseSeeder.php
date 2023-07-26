<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'=>"Uzinform365 Admin",
            'login' => 'uzinform365-login',
            'password' => bcrypt('uzinform365#passwd'),
        ]);
    }
}
