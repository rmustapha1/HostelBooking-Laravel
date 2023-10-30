<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Hostel;
use App\Models\Room;
use App\Notifications\PaymentNotification;

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

        $payNotif = new PaymentNotification();
        $message = $complaint;
        $payNotif->toMNotify($phone, $message);

        return redirect()->route('complaint.index')->with('success', 'Complaint sent successfully.');
    }
}
