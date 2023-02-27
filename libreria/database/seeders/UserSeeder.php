<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Juan Pérez',
            'email' => 'juanperez@example.com',
            'password' => bcrypt('juanperez@example.com')
        ]);


        User::create([
            'name' => 'María González',
            'email' => 'mariagonzalez@example.com',
            'password' => bcrypt('mariagonzalez@example.com')
        ]);
    }
}
