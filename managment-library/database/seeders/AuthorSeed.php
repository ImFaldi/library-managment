<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Author::create([
            'name' => 'J. K. Rowling',
            'email' => 'row@gmail.com',
            'phone' => '081234567890',
        ]);
    }
}
