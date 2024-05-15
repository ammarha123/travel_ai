<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\City;

class FrontendController extends Controller
{
    public function index(){
        // Retrieve all feedback to be displayed on the homepage
        $cities = City::all();
        $feedbacks = Feedback::all();
        return view('frontend.index', compact('feedbacks', 'cities'));
    }
}
