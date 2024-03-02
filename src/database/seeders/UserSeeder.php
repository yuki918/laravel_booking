<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([[
            'name' => 'test01',
            'email' => 'test01@test.com',
            'password' => Hash::make('password123'),
        ], [
            'name' => 'test02',
            'email' => 'test02@test.com',
            'password' => Hash::make('password123'),
        ], [
            'name' => 'test03',
            'email' => 'test03@test.com',
            'password' => Hash::make('password123'),
        ]]);
    }
}
