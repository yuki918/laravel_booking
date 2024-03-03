<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Event::factory(100)->create();
        $this->call([
            UserSeeder::class,
            OwnerSeeder::class,
            AdminSeeder::class,
        ]);
    }
}
