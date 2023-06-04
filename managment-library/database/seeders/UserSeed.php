<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
            'phone' => '081234567890'
        ]);

        User::create([
            'name' => 'resepsionis',
            'email' => 'res@gmail.com',
            'password' => bcrypt('resepsionis'),
            'role' => 'resepsionis',
            'phone' => '081134567890'
        ]);

        User::create([
            'name' => 'BookMember',
            'email' => 'member@gmail.com',
            'password' => bcrypt('member'),
            'role' => 'member',
            'phone' => '081134567890'
        ]);
    }
}
