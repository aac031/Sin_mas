<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Author::create([
            'name' => 'Gabriel García Márquez',
            'nationality' => 'Colombiano'
        ]);

        Author::create([
            'name' => 'J.K. Rowling',
            'nationality' => 'Británica'
        ]);

        Author::create([
            'name' => 'Stephen King',
            'nationality' => 'Estadounidense'
        ]);

        Author::create([
            'name' => 'Agatha Christie',
            'nationality' => 'Británica'
        ]);
    }
}
