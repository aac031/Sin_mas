<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\Ingredient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DishIngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $dishes = Dish::all();
        $ingredients = Ingredient::all();

        foreach ($dishes as $dish) {
            $ingredients_with_quantity = [];

            foreach ($ingredients->random(rand(1, 5)) as $ingredient) {
                $quantity = rand(1, 10); // Generar un valor aleatorio para la cantidad del ingrediente
                $ingredients_with_quantity[$ingredient->id] = ['quantity' => $quantity];
            }

            $dish->ingredients()->attach($ingredients_with_quantity);
        }
    }
}
