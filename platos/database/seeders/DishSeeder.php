<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\Ingredient;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = User::all();
        $types = Type::all();

        for ($i = 1; $i <= 10; $i++) {
            $userIndex = ($i % 2 == 0) ? 1 : 0; // alternar entre los dos usuarios
            $dish = Dish::create([
                'name' => "Plato $i",
                'type_id' => $types->random()->id,
                'user_id' => $users[$userIndex]->id,
            ]);
        }
    }
}
