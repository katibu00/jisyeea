<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;


class SmsController extends Controller
{


    public function sendSms(Request $request)
    {
        $collectionId = $request->input('collectionId');
    
        // Fetch the collection along with its users
        $collection = Collection::with('users')->findOrFail($collectionId);
    
        // Fetch all users in the collection with their raw phone numbers
        $usersWithRawPhoneNumbers = $collection->users()->select('phone')->get();
    
        // Preprocess and format the phone numbers
        $phoneNumbers = [];
        foreach ($usersWithRawPhoneNumbers as $user) {
            $rawPhoneNumber = $user->phone;
    
            // Remove spaces from the phone number
            $formattedPhoneNumber = str_replace(' ', '', $rawPhoneNumber);
    
            // If the number has 11 digits and starts with 0, remove the 0 and add 234
            if (strlen($formattedPhoneNumber) === 11 && Str::startsWith($formattedPhoneNumber, '0')) {
                $formattedPhoneNumber = '234' . substr($formattedPhoneNumber, 1);
            }
    
            // Add the formatted number to the array
            $phoneNumbers[] = $formattedPhoneNumber;
        }
    
        // Prepare the message payload for SendChamp API
        $messagePayload = [
            'to' => $phoneNumbers,
            'message' => $request->message,
            'sender_name' => 'YEEA',
            'route' => 'non_dnd'
        ];

    
        // Make a POST request to SendChamp API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer sendchamp_live_$2y$10$JGPQK7/fRlP1AMmOC8RsMOCt9EjhX4s1ntIqj7jCq5S9xN6k3DjsW',
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->post('https://api.sendchamp.com/api/v1/sms/send', $messagePayload);
    
        // Handle the response
        if ($response->successful()) {
            // SMS sent successfully
            return response()->json(['message' => 'SMS sent successfully']);
        } else {
            // Error in sending SMS
            return response()->json(['error' => 'Failed to send SMS'], 500);
        }
    }
    
    
}
