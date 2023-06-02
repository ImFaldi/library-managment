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
            'title' => 'Harry Potter and the Philosopher\'s Stone',
            'category_id' => 1,
            'author_id' => 1,
            'status' => 'available',
            'year' => 1997,
        ]);

        Book::create([
            'title' => 'Harry Potter and the Chamber of Secrets',
            'category_id' => 2,
            'author_id' => 2,
            'status' => 'available',
            'year' => 1998,
        ]);
    }
}
