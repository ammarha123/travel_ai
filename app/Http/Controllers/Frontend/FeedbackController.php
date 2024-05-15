<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    // Store feedback
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'feedback' => 'required|string|max:1000'
        ]);

        Feedback::create($request->all());

        return redirect()->back()->with('success', 'Thank you for your feedback!');
    }
}
