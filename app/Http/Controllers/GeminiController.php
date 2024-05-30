<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GeminiAPI\Laravel\Facades\Gemini;

class GeminiController extends Controller
{
    public function test(Request $request)
    {
        $prompt = $request->get('prompt', 'Set plan trip to indonesia 3 days, just list the destination recommended without description'); 

        $result = Gemini::generateText($prompt);

        return view('frontend.test', compact('result', 'prompt'));
    }
}
