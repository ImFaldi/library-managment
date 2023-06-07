<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Borrow;

class BorrowSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Borrow::create([
            'user_id' => 1,
            'book_id' => 1,
            'borrow_date' => '2021-06-01',
            'return_date' => '2021-06-08',
            'status' => 'borrowed',
            'penalty' => '0'
        ]);

        Borrow::create([
            'user_id' => 1,
            'book_id' => 1,
            'borrow_date' => date('Y-m-d'),
            'return_date' => date('Y-m-d', strtotime('+7 day', strtotime(date('Y-m-d')))),
            'status' => 'borrowed',
            'penalty' => '0'
        ]);

        Borrow::create([
            'user_id' => 1,
            'book_id' => 1,
            'borrow_date' => date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d')))),
            'return_date' => date('Y-m-d', strtotime('+7 day', strtotime(date('Y-m-d')))),
            'status' => 'borrowed',
            'penalty' => '0'
        ]);

        Borrow::create([
            'user_id' => 1,
            'book_id' => 3,
            'borrow_date' => date('Y-m-d', strtotime('-2 day', strtotime(date('Y-m-d')))),
            'return_date' => date('Y-m-d', strtotime('+7 day', strtotime(date('Y-m-d')))),
            'status' => 'borrowed',
            'penalty' => '0'
        ]);
    }
}
