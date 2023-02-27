<?php

namespace Database\Seeders;

use App\Models\Pizza;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PizzasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('pizzas')->delete();

        $user1 = User::find(1);
        $user2 = User::find(2);

        Pizza::create(['name' => 'Margherita', 'user_id' => $user1->id]);
        Pizza::create(['name' => 'Pepperoni', 'user_id' => $user1->id]);
        Pizza::create(['name' => 'Hawaiian', 'user_id' => $user2->id]);
    }
}
