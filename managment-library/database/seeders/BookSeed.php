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

        Book::create([
            'title' => 'The Lord of The Rings',
            'category_id' => 1,
            'author_id' => 2,
            'stock' => 10,
            'year' => 2001
        ]);

        Book::create([
            'title' => 'The Hobbit',
            'category_id' => 1,
            'author_id' => 2,
            'stock' => 10,
            'year' => 2002
        ]);

        Book::create([
            'title' => 'The Fellowship of The Ring',
            'category_id' => 1,
            'author_id' => 2,
            'stock' => 10,
            'year' => 2003
        ]);

        Book::create([
            'title' => 'The Two Towers',
            'category_id' => 1,
            'author_id' => 2,
            'stock' => 10,
            'year' => 2004
        ]);

        Book::create([
            'title' => 'The Return of The King',
            'category_id' => 1,
            'author_id' => 2,
            'stock' => 10,
            'year' => 2005
        ]);

        Book::create([
            'title' => 'The Silmarillion',
            'category_id' => 1,
            'author_id' => 2,
            'stock' => 10,
            'year' => 2006
        ]);
    }
}
