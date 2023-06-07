<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Category::create([
            'title' => 'Fantasy',
        ]);

        Category::create([
            'title' => 'Adventure',
        ]);

        Category::create([
            'title' => 'Romance',
        ]);

        Category::create([
            'title' => 'Mystery',
        ]);

        Category::create([
            'title' => 'Horror',
        ]);

        Category::create([
            'title' => 'Thriller',
        ]);

        Category::create([
            'title' => 'Children',
        ]);

        Category::create([
            'title' => 'Poetry',
        ]);
    }
}
