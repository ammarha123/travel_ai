<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ActivitiesRecommendation;
use App\Models\HotelsRecommended;
use App\Models\PromptMessage;
use App\Models\RestaurantsRecommended;
use Illuminate\Http\Request;
use App\Models\Trip;
use Carbon\Carbon;
use GeminiAPI\Laravel\Facades\Gemini;
use Illuminate\Support\Str;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth; 

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
        $startDate = Carbon::parse($request->get('start_date'));
        $endDate = Carbon::parse($request->get('end_date'));
        $travelStyle = $request->get('travel_style');
        $tripDuration = $endDate->diffInDays($startDate) + 1; // +1 to include both start and end dates

        // Generate activity suggestions using Gemini
        $activityPrompt = "Suggest interesting activities for a $travelStyle trip to $destination, for $tripDuration days. format: ***day*** **(location)** *details* give atleast 3 location a day in each location. example ***Day 1*** * **Surabaya Zoo** *Visit over 2000 animals from all over the world. * Encounter rare species like the Sumatran tiger, Komodo dragon, and orangutan. **Ciputra World** * Enjoy thrilling water slides and attractions suitable for all ages. ***Day 2*** and so on";
        $activityResult = Gemini::generateText($activityPrompt);
        $activitySuggestions = $activityResult; // Assume this is a structured string or adjust accordingly

        // Assuming activitySuggestions is a string, let's format it to an array by days for better display
        $activitiesArray = $this->parseActivities($activitySuggestions, $destination);

        $hotels = $this->fetchHotelsNearby($destination, $startDate, $endDate);
        $restaurants = $this->fetchRestaurantsNearby($destination);

        // Create a new trip record with all details including trip duration
        Trip::create(array_merge($validatedData, [
            'user_id' => Auth::id(),  // Save the current user's ID
            'trip_duration' => $tripDuration,
            'activity_suggestions' => $activitySuggestions,
        ]));

        $prompt = PromptMessage::create([
            'user_id' => Auth::id(),
            'message' => $activityPrompt,
        ]);

         // Store activities recommendations
        foreach ($activitiesArray as $day => $activities) {
            foreach ($activities as $activity) {
                ActivitiesRecommendation::create([
                    'prompt_id' => $prompt->id,
                    'day' => $day,
                    'activity' => $activity,
                ]);
            }
        }

        // Store hotels recommendations
        foreach ($hotels as $hotel) {
            HotelsRecommended::create([
                'prompt_id' => $prompt->id,
                'name' => $hotel['name'],
                'details' => json_encode($hotel),
            ]);
        }

        // Store restaurants recommendations
        foreach ($restaurants as $restaurant) {
            RestaurantsRecommended::create([
                'prompt_id' => $prompt->id,
                'name' => $restaurant['name'],
                'details' => json_encode($restaurant),
            ]);
        }

        // Redirect or return response
        return redirect()->route('trip-planner.result')->with([
            'prompt' => $activityPrompt,
            'result' => $activityResult,
            'destination' => $destination,
            'travelStyle' => $travelStyle,
            'tripDuration' => $tripDuration,
            'structuredActivities' => $activitiesArray,
            'hotels' => $hotels,
            'restaurants' => $restaurants,
        ]);
    }
    public function result()
    {
        return view('frontend.trip-planner.result', [
            'prompt' => session()->get('prompt'),  // Securely retrieving the variable from the session
            'result' => session()->get('result'),
            'destination' => session()->get('destination'),
            'travelStyle' => session()->get('travelStyle'),
            'tripDuration' => session()->get('tripDuration'),
            'structuredActivities' => session()->get('structuredActivities'),
            'hotels' => session()->get('hotels'),
            'restaurants' => session()->get('restaurants')
        ]);
    }
    
    private function parseActivities($activitySuggestions, $destination)
    {
        $activitiesArray = [];
        $currentDay = '';
    
        foreach (explode("\n", $activitySuggestions) as $line) {
            $line = trim($line);
    
            // Match day headers like "***Day 1***"
            if (preg_match('/\*{3}Day (\d+)\*{3}/', $line, $matches)) {
                $currentDay = 'Day ' . $matches[1];  // Simplifies to "Day 1", "Day 2", etc.
                $activitiesArray[$currentDay] = [];  // Prepare to collect activities under this day
            } elseif (!empty($currentDay)) {
                // Process each activity line under the current day
                $formattedLine = $this->formatActivityLine($line, $destination);
                if (!empty($formattedLine)) {  // Only add if the line is not empty after formatting
                    $activitiesArray[$currentDay][] = $formattedLine;
                }
            }
        }
        return $activitiesArray;
    }
    


private function getPlaceAddress($placeName, $fallback = null)
{
    $client = new Client();
    $apiKey = 'AIzaSyBARuBB969frhWxwEYAk17aIXxR2C7gZ7s';
    $url = "https://maps.googleapis.com/maps/api/place/findplacefromtext/json";
    $queryInput = $placeName ?: $fallback;
    $response = $client->request('GET', $url, [
        'query' => [
            'input' => $queryInput,
            'inputtype' => 'textquery',
            'fields' => 'formatted_address,name',
            'key' => $apiKey
        ]
    ]);

    $data = json_decode($response->getBody()->getContents(), true);
    if (!empty($data['candidates'])) {
        return $data['candidates'][0]['formatted_address']; // Return the first address found
    }
    return 'Address not found'; // Default message if no address is found
}

private function formatActivityLine($line, $destination)
{
    // Check if the line matches the format **(location name)**
    if (preg_match('/\*\*(.+?)\*\*/', $line, $matches)) {
        $placeName = $matches[1];
        error_log("Attempting to fetch address for: " . $placeName);  // Log the place being processed

        // Fetch the address based on the place name
        $address = $this->getPlaceAddress($placeName, $destination);
        error_log("Fetched address: " . $address);  // Log the fetched address

        // Replace the pattern with the bold place name and append the fetched address
        $line = preg_replace('/\*\*(.+?)\*\*/', '<b>$1</b>: ' . ($address ? "Address: " . $address : 'Address not found'), $line);
    }

    // Replace leading '*' used as bullets with '-'
    $line = preg_replace('/^\*+ /', '- ', $line);
    $line = str_replace('*', '', $line);  // Remove any remaining stray asterisks

    return $line;
}

private function fetchHotelsNearby($destination, $startDate, $endDate)
{
    $client = new Client();
    $apiKey = 'AIzaSyBARuBB969frhWxwEYAk17aIXxR2C7gZ7s';
    $url = "https://maps.googleapis.com/maps/api/place/textsearch/json";

    $response = $client->get($url, [
        'query' => [
            'query' => "hotels in $destination",
            'type' => 'lodging',
            'key' => $apiKey,
            'fields' => 'name,rating,formatted_address,photos'
        ]
    ]);

    $data = json_decode($response->getBody(), true);
    $hotels = [];
    $count = 0; // Initialize a counter
    if (!empty($data['results'])) {
        foreach ($data['results'] as $hotel) {
            if ($count >= 8) break; // Stop adding hotels once 5 have been added
            $photoReference = $hotel['photos'][0]['photo_reference'] ?? null;
            $photoUrl = $photoReference ? "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=$photoReference&key=$apiKey" : null;

            $encodedHotelName = urlencode($hotel['name']);
            $bookingUrl = "https://www.booking.com/searchresults.html?ss={$encodedHotelName}&checkin={$startDate->format('Y-m-d')}&checkout={$endDate->format('Y-m-d')}";

            $hotels[] = [
                'name' => $hotel['name'],
                'address' => $hotel['formatted_address'],
                'rating' => $hotel['rating'] ?? 'No rating',
                'photo_url' => $photoUrl,
                'booking_url' => $bookingUrl // Dynamic booking link with dates
            ];
            $count++;
        }
    }

    return $hotels;
}


private function fetchRestaurantsNearby($destination)
{
    $client = new Client();
    $apiKey = 'AIzaSyBARuBB969frhWxwEYAk17aIXxR2C7gZ7s';
    $url = "https://maps.googleapis.com/maps/api/place/textsearch/json";

    $response = $client->get($url, [
        'query' => [
            'query' => "restaurants in $destination",
            'type' => 'restaurant',
            'key' => $apiKey,
            'fields' => 'name,formatted_address,rating,photos,opening_hours'
        ]
    ]);

    $data = json_decode($response->getBody(), true);
    $restaurants = [];
    $count = 0; // Initialize a counter
    if (!empty($data['results'])) {
        foreach ($data['results'] as $restaurant) {
            if ($count >= 8) break; // Stop adding restaurants once 5 have been added
            $photoReference = $restaurant['photos'][0]['photo_reference'] ?? null;
            $photoUrl = $photoReference ? "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=$photoReference&key=$apiKey" : null;

            $restaurants[] = [
                'name' => $restaurant['name'],
                'address' => $restaurant['formatted_address'],
                'rating' => $restaurant['rating'] ?? 'No rating',
                'photo_url' => $photoUrl,
                'detail_url' => "https://www.google.com/maps/place/?q=place_id:" . $restaurant['place_id']
            ];
            $count++;
        }
    }

    return $restaurants;
}

}
