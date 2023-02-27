<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Type::create(['name' => 'Entrante']);
        Type::create(['name' => 'Plato principal']);
        Type::create(['name' => 'Postre']);
    }
}
