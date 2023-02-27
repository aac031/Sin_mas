<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Pizza;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientPizzaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ingredient_pizza')->delete();
        $pizza1 = Pizza::where('name', 'Margherita')->first();
        $pizza2 = Pizza::where('name', 'Pepperoni')->first();
        $pizza3 = Pizza::where('name', 'Hawaiian')->first();
        $sauce = Ingredient::where('name', 'Tomato sauce')->first();
        $cheese = Ingredient::where('name', 'Mozzarella cheese')->first();
        $pepperoni = Ingredient::where('name', 'Pepperoni')->first();
        $ham = Ingredient::where('name', 'Ham')->first();
        $pineapple = Ingredient::where('name', 'Pineapple')->first();
        $mushrooms = Ingredient::where('name', 'Mushrooms')->first();
        $onions = Ingredient::where('name', 'Onions')->first();
        $pizza1->ingredients()->attach([$sauce->id, $cheese->id]);
        $pizza2->ingredients()->attach([$sauce->id, $cheese->id, $pepperoni->id]);
        $pizza3->ingredients()->attach([$sauce->id, $cheese->id, $ham->id, $pineapple->id]);
        $pizza3->ingredients()->attach([$mushrooms->id, $onions->id]);
    }
}
