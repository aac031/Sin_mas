<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ingredients')->delete();

        $meatType = Type::where('name', 'Meat')->first();
        $vegType = Type::where('name', 'Vegetable')->first();
        $cheeseType = Type::where('name', 'Cheese')->first();
        $sauceType = Type::where('name', 'Sauce')->first();

        $user1 = User::first();
        Ingredient::create(['name' => 'Tomato sauce', 'user_id' => $user1->id, 'type_id' => $sauceType->id, 'price' => 0.50]);
        Ingredient::create(['name' => 'Mozzarella cheese', 'user_id' => $user1->id, 'type_id' => $cheeseType->id, 'price' => 0.75]);
        Ingredient::create(['name' => 'Pepperoni', 'user_id' => $user1->id, 'type_id' => $meatType->id, 'price' => 1.00]);
        Ingredient::create(['name' => 'Ham', 'user_id' => $user1->id, 'type_id' => $meatType->id, 'price' => 1.25]);
        Ingredient::create(['name' => 'Pineapple', 'user_id' => $user1->id, 'type_id' => $vegType->id, 'price' => 0.50]);
        Ingredient::create(['name' => 'Mushrooms', 'user_id' => $user1->id, 'type_id' => $vegType->id, 'price' => 0.75]);
        Ingredient::create(['name' => 'Onions', 'user_id' => $user1->id, 'type_id' => $vegType->id, 'price' => 0.50]);

        $user2 = User::find(2);
        Ingredient::create(['name' => 'Bacon', 'user_id' => $user2->id, 'type_id' => $meatType->id, 'price' => 1.50]);
        Ingredient::create(['name' => 'Cheddar cheese', 'user_id' => $user2->id, 'type_id' => $cheeseType->id, 'price' => 1.00]);
        Ingredient::create(['name' => 'Green peppers', 'user_id' => $user2->id, 'type_id' => $vegType->id, 'price' => 0.75]);
        Ingredient::create(['name' => 'Red onions', 'user_id' => $user2->id, 'type_id' => $vegType->id, 'price' => 0.50]);
        Ingredient::create(['name' => 'Black olives', 'user_id' => $user2->id, 'type_id' => $vegType->id, 'price' => 0.50]);
    }
}
