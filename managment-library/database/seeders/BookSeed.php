<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Book::create([
            'title' => 'Harry Potter',
            'category_id' => 1,
            'author_id' => 1,
            'stock' => 10,
            'year' => 2000
        ]);
        Book::create([
            'title' => 'Manga',
            'category_id' => 1,
            'author_id' => 1,
            'stock' => 10,
            'year' => 1999
        ]);
    }
}
