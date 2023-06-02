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
            'status' => 'borrowed',
            'borrow_date' => '2021-06-01',
            'return_date' => '2021-06-08'
        ]);
    }
}
