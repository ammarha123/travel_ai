<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GeminiAPI\Laravel\Facades\Gemini;

class GeminiController extends Controller
{
    public function test(Request $request)
    {
        $prompt = $request->get('prompt', 'Set plan trip to indonesia 3 days'); 

        $result = Gemini::generateText($prompt);

        return view('frontend.trip-planner.result', compact('result', 'prompt'));
    }
}
