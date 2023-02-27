<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('types')->delete();
        Type::create(['name' => 'Meat']);
        Type::create(['name' => 'Vegetable']);
        Type::create(['name' => 'Cheese']);
        Type::create(['name' => 'Sauce']);
    }
}
