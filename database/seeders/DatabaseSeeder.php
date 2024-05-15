<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\FAQ;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       // Call your seeders here
       $this->call([
        CitySeeder::class,
        FAQSeeder::class,
    ]);
    }
}
