<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;

class InboxController extends Controller
{
    public function index()
    {
        $messages = Message::orderBy('created_at', 'desc')->get(); // Get all messages ordered by creation time
        return view('admin.inbox.index', compact('messages')); // Assuming the view is located at resources/views/admin/inbox.blade.php
    }

    public function show($id)
    {
        $message = Message::findOrFail($id);

        // Optionally update the message status to read
        if ($message->status === 0) {
            $message->update(['status' => 1]);
        }

        return view('admin.inbox.show', compact('message'));
    }
}
