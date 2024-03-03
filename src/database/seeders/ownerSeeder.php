<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ownerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('owners')->insert([[
            'name' => 'owner01',
            'email' => 'owner01@test.com',
            'password' => Hash::make('password123'),
        ], [
            'name' => 'owner02',
            'email' => 'owner02@test.com',
            'password' => Hash::make('password123'),
        ], [
            'name' => 'owner03',
            'email' => 'owner03@test.com',
            'password' => Hash::make('password123'),
        ]]);
    }
}
