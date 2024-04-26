<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class DiscoverController extends Controller
{
    public function index(){
        $cities = City::all();
        return view('frontend.discover.index', ['cities' => $cities]);
    }
    public function showDetails($slang)
    {
        $city = City::where('slang', $slang)->firstOrFail();
        return view('frontend.discover.details', compact('city'));
    }
}
