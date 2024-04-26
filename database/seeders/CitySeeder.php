<?php

use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    public function run()
    {
        City::insert([
            [
                'name' => 'Bali',
                'image' => 'bali.jpg', // Update with actual image path
                'description' => 'Discover the beauty of Bali with its stunning beaches and rich cultural heritage.',
                'slang' => 'bali'
                
            ],
            [
                'name' => 'New York',
                'image' => 'new-york.jpg', // Update with actual image path
                'description' => 'Experience the vibrant atmosphere of New York City, the city that never sleeps.',
                'slang' => 'new-york'
            ],
            [
                'name' => 'Kuala Lumpur',
                'image' => 'kuala-lumpur.jpg', // Update with actual image path
                'description' => 'Explore the modern marvels and diverse culture of Kuala Lumpur.',
                'slang' => 'kuala-lumpur'
            ],
            [
                'name' => 'New Delhi',
                'image' => 'new-delhi.jpg', // Update with actual image path
                'description' => 'Immerse yourself in the history and bustling streets of New Delhi.',
                'slang' => 'new-delhi'
            ],
            [
                'name' => 'Madrid',
                'image' => 'madrid.jpg', // Update with actual image path
                'description' => 'Discover the vibrant art and culinary scene of Madrid, Spain.',
                'slang' => 'madrid'
            ],
        ]);
    }
}

