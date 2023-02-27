<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Gender::create([
            'name' => 'Ficción'
        ]);

        Gender::create([
            'name' => 'No ficción'
        ]);

        Gender::create([
            'name' => 'Terror'
        ]);

        Gender::create([
            'name' => 'Romance'
        ]);

        Gender::create([
            'name' => 'Aventura'
        ]);
    }
}
