<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class HelpController extends Controller
{
    public function index(){
        return view('frontend.help.index');
    }

    public function storeMessage(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'messageTitle' => 'required|string|max:255',
            'messageDescription' => 'required|string',
            'email' => 'required|email',
        ]);

        // Create a new Message instance and store it in the database
        $message = new Message();
        $message->title = $validatedData['messageTitle'];
        $message->description = $validatedData['messageDescription'];
        $message->email = $validatedData['email'];
        $message->save();

        // Redirect back with a success message (or handle the response as needed)
        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}
