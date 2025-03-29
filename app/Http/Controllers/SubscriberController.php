<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SubscriberController extends Controller
{
    public function submitEmail(Request $request)
    {
        // Log the request data for debugging
        Log::info('Form submitted:', $request->all());

        // Dump request data (for debugging)
        // 
  //      dd($request->all());

        // Validate the email input
        $request->validate([
            'email' => 'required|email|unique:subscribers,email'
        ]);
            $token=str::random(65);
            Log::info('Generated token:', ['token' => $token]);     
        // Save the email to the database
        $subscriber = Subscriber::create([
            'email' => $request->email,
            'token' => $token 
        ]);
            // Log the saved subscriber data
        Log::info('Subscriber saved:', $subscriber->toArray());

        // Return back with success message
        return back()->with('success', 'Email submitted successfully!');
    }

    // Fetch all subscribers (for testing)
    public function getSubscribers()
    {
        $subscribers = Subscriber::all();
        
        // Dump subscriber data for debugging
        // dd($subscribers);

        return response()->json($subscribers);
    }
}
