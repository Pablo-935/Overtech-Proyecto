<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345'),
        ]);

        User::create([
            'name' => 'Tejada-Vendedor',
            'email' => 'vendedor@gmail.com',
            'password' => Hash::make('12345'),
        ]);

        User::create([
            'name' => 'Ferreyra-Cajero',
            'email' => 'cajero@gmail.com',
            'password' => Hash::make('12345'),
        ]);

        User::create([
            'name' => 'Quiroga-Repositor',
            'email' => 'repositor@gmail.com',
            'password' => Hash::make('12345'),
        ]);
    }
}
