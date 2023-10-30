<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Hostel;
use App\Models\Room;

use GuzzleHttp\Client;

class ComplaintController extends Controller
{
    //
    public function index()
    {
        $user_id = Auth::user()->id;

        $booking = Booking::where('user_id', $user_id)
            ->where('status', 'Confirmed')
            ->first(); // Use 'get' if you expect multiple records or 'first' if you expect a single record
        $room = Room::where('id', $booking->room_id)->first();
        $hostel = Hostel::where('id', $room->hostel_id)->first();

        $manager_phone =

        if ($booking) {
            return view('complaint', compact('booking', 'room', 'hostel'));
        } else {
            return redirect()->route('home')->with('error', 'You have not booked a room yet.');
        }


        return view('complaint');
    }

    public function sendComplaint(Request $request)
    {
        // Validate the form input, e.g., student's phone number and complaint message
        $request->validate([
            'phone' => 'required|regex:/^\d{10}$/',
            'complaint' => 'required',
        ]);

        $phone = $request->input('phone');
        $complaint = $request->input('complaint');

        // Send the SMS via MNotify API
        $client = new Client();

        $response = $client->post('https://mnotify.com/api/smsapi', [
            'form_params' => [
                'key' => 'YOUR_API_KEY', // Replace with your MNotify API key
                'to' => $phone,
                'msg' => $complaint,
            ],
        ]);

        // Process the response (e.g., check for success) and provide feedback to the user

        return redirect()->route('complaint.index')->with('success', 'Complaint sent successfully.');
    }
}