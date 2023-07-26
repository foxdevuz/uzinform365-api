<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\News;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'=>"Uzinform365 Admin",
            'login' => 'uzinform365-login',
            'password' => bcrypt('uzinform365#passwd'),
            'token'=>Str::random(50)
        ]);
    }
}
