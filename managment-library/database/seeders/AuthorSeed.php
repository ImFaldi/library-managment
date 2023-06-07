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

        Author::create([
            'name' => 'J. R. R. Tolkien',
            'email' => 'Tol@gmail.com',
            'phone' => '081251567890',
        ]);

        Author::create([
            'name' => 'J. P. Rowling',
            'email' => 'lin@gmail.com',
            'phone' => '082234567890',
        ]);

        Author::create([
            'name' => 'R. R. Martin',
            'email' => 'Mar@gmail.com',
            'phone' => '083234567890',
        ]);
    }
}
