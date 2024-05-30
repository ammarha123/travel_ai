<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trip;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

class MyPlanController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $trips = Trip::where('user_id', $user_id)->get();

        foreach ($trips as $trip) {
            $trip->image_url = $this->fetchImageForDestination($trip->destination);
        }

        return view('frontend.my-plan.index', ['trips' => $trips]);
    }
    
    public function fetchImageForDestination($destination)
    {
        $client = new Client();
        $apiKey = 'AIzaSyBARuBB969frhWxwEYAk17aIXxR2C7gZ7s';
        $url = "https://maps.googleapis.com/maps/api/place/findplacefromtext/json";
        $response = $client->get($url, [
            'query' => [
                'input' => $destination ,
                'inputtype' => 'textquery',
                'fields' => 'photos',
                'key' => $apiKey
            ]
        ]);

        $data = json_decode($response->getBody(), true);
        if (isset($data['candidates'][0]['photos'][0]['photo_reference'])) {
            $photoReference = $data['candidates'][0]['photos'][0]['photo_reference'];
            return $this->getPhotoUrl($photoReference, $apiKey);
        }

        return 'path/to/default/image.jpg';  // Return a default image if no photo is found
    }

    private function getPhotoUrl($photoReference, $apiKey)
    {
        return "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference={$photoReference}&key={$apiKey}";
    }
}
