<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FAQSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('faq')->insert([
            [
                'question' => 'What is the Travel Planner AI?',
                'answer' => 'The Travel Planner AI is an intelligent tool that assists in creating personalized travel plans based on user preferences.',
            ],
            [
                'question' => 'How do I use the Travel Planner AI to plan a trip?',
                'answer' => 'Simply enter your preferences and requirements, and the AI will generate a customized travel itinerary for you.',
            ]
        ]);
    }
}
