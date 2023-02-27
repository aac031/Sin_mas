<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Ingredient::create(['name' => 'Harina']);
        Ingredient::create(['name' => 'Azúcar']);
        Ingredient::create(['name' => 'Huevos']);
        Ingredient::create(['name' => 'Leche']);
        Ingredient::create(['name' => 'Aceite']);
        Ingredient::create(['name' => 'Sal']);
        Ingredient::create(['name' => 'Pimienta']);
        Ingredient::create(['name' => 'Ajo']);
        Ingredient::create(['name' => 'Cebolla']);
    }
}
