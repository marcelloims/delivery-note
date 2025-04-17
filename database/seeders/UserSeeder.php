<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'name'      => "Boss",
            'username'  => "admin",
            'telephone' => "14045",
            'address'   => "Denpasar Bali",
            'password'  => bcrypt('password')
        ];

        User::insert($data);
    }
}
