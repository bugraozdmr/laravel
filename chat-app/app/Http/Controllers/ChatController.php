<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Reverb\Pulse\Livewire\Messages;

class ChatController extends Controller
{
    public function index()
    {
        // Get the authenticated user
        $authenticatedUserId = Auth::id();

        // Fetch all users excluding the authenticated one
        $users = User::where('id', '!=', $authenticatedUserId)->get();

        return view('dashboard', compact('users'));
    }

    public function fetchMessages(Request $request)
    {
        $request->validate([
            'contact_id' => 'required|integer|exists:users,id',
        ]);

        $contact = User::find($request->contact_id);
        $messages = Message::where(function($query) use ($request) {
            $query->where('form_id', Auth::user()->id)
                  ->where('to_id', $request->contact_id);
        })->orWhere(function($query) use ($request) {
            $query->where('form_id', $request->contact_id)
                  ->where('to_id', Auth::user()->id);
        })->get();
        

        return response()->json([
            'contact' => $contact,
            'messages' => $messages
        ]);
    }

    public function sendMessage(Request $request) {
        $validated = $request->validate([
            'contact_id' => 'required|exists:users,id',
            'message' => 'required|string|max:1000',
        ]);
    
        $message = new Message();
        $message->form_id = Auth::id();
        $message->to_id = $validated['contact_id'];
        $message->message = $validated['message'];
        $message->save();
    
        return response()->json([
            'success' => true,
            'message_id' => $message->id,
            'message' => $message->message,
            'timestamp' => $message->created_at->toDateTimeString()
        ]);
    }    
}
