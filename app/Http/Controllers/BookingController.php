<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Hostel;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;

class BookingController extends Controller
{
    // Display Step 1: User Details Form
    public function step1($room_id, $hostel_id)
    {
        $room = Room::find($room_id);
        $hostel = Hostel::find($hostel_id);
        $user = Auth::user(); // If you are using authentication
        $hostelId = $hostel_id; // Replace with the actual hostel ID
        $averageRating = Review::where('hostel_id', $hostelId)->avg('rating');
        $normalizedRating = ($averageRating / 10) * 5; // Assuming original ratings are in the range 0-10



        if (!$room || !$hostel) {
            // Handle the case where the room is not found
            return redirect()->route('home');
        }

        return view('booking.step1', compact('room', 'hostel', 'user', 'normalizedRating'));
    }

    // Handle Step 1 Form Submission (Save User Details)
    public function saveStep1(Request $request)
    {
        // Add your validation and database operations for Step 1 here
        // Example: Booking::create($request->all());

        // Redirect to the next step or to a "success" page
        return redirect()->route('booking.step2');
    }

    // Display Step 2: Room Selection Form
    public function step2()
    {
        return view('booking.step2');
    }

    // Handle Step 2 Form Submission (Save Room Selection)
    public function saveStep2(Request $request)
    {
        // Add your validation and database operations for Step 2 here

        // Redirect to the next step or to a "success" page
        return redirect()->route('booking.step3');
    }

    // Display Step 3: Payment Information Form
    public function step3()
    {
        return view('booking.step3');
    }

    // Handle Step 3 Form Submission (Save Payment Information)
    public function saveStep3(Request $request)
    {
        // Add your validation and database operations for Step 3 here

        // Redirect to a "success" page or any other desired destination
        return redirect()->route('booking.success');
    }

    // Display a "Booking Success" Page
    public function success()
    {
        return view('booking.success');
    }
}
