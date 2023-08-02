<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'=>"Uzinform365 Admin",
            'login' => 'uzinform365-login',
            'password' => Hash::make('uzinform365#passwd'),
            'token'=>Str::random(50)
        ]);
    }
}
