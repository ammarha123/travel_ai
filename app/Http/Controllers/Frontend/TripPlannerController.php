<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trip;
use GeminiAPI\Laravel\Facades\Gemini;

class TripPlannerController extends Controller
{
    public function index(){
        return view('frontend.trip-planner.index');
    }

    public function store(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'destination' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'catering_budget' => 'nullable|numeric',
            'accommodation_budget' => 'nullable|numeric',
            'travel_style' => 'required|string|in:family,single,best',
        ]);

        $destination = $request->get('destination');
        $travelStyle = $request->get('travel_style');

           // Generate activity suggestions using Gemini Pro
        $activityPrompt = "Suggest interesting activities for a $travelStyle trip to $destination.";
        $activityResult = Gemini::geminiPro()->generateContent($activityPrompt);
        $activitySuggestions = $activityResult->text();

        // Create a new trip record
        Trip::create($validatedData);

        // Redirect or return response
        return redirect()->route('trip-planner.result')->with('success', 'Trip planned successfully!');
    }

    public function result(){
        return view('frontend.trip-planner.result');
    }

}
