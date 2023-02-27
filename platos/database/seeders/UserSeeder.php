<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        // Elimina todos los registros antiguos de la tabla 'administrators'
        // DB::table('administrators')->truncate();

        // Genero todos los datos aleatorios para introducirlos en la tabla 'administrators'
        for ($i = 1; $i <= 2; $i++) {
            $rol = $i <= 1 ? 'gerente' : 'recepcionista';

            $email = $faker->unique()->safeEmail;

            User::create([
                'name' => $faker->name,
                'email' => $email,
                'password' => Hash::make($email),
                'rol' => $rol
            ]);
        }
    }
}
