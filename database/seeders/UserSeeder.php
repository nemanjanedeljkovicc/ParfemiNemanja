<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'user@gmail.com'],
            [
                'name' => 'user',
                'surname' => 'user',
                'phone' => '0123456789',
                'age' => 22,
                'gender' => 'male',
                'password' => Hash::make('user12345'),
                'role_id' => 2,
            ]
        );
    }
}
