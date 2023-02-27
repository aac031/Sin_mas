<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $book = Book::create([
            'title' => 'Cien años de soledad',
            'isbn' => '9780307474728',
            'published_at' => '1967-06-05',
            'gender_id' => 1
        ]);

        $book->authors()->attach(1);

        $book = Book::create([
            'title' => 'Harry Potter y la piedra filosofal',
            'isbn' => '9788478884957',
            'published_at' => '1997-06-26',
            'gender_id' => 1
        ]);

        $book->authors()->attach(2);

        $book = Book::create([
            'title' => 'El resplandor',
            'isbn' => '9788401352405',
            'published_at' => '1977-01-28',
            'gender_id' => 3
        ]);

        $book->authors()->attach(3);

        $book = Book::create([
            'title' => 'Diez negritos',
            'isbn' => '9788497595749',
            'published_at' => '1939-11-06',
            'gender_id' => 1
        ]);

        $book->authors()->attach(4);
    }
}
