<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Hostel;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;

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

    // Handle Step 1 Form Submission (Save User Details, Room Selection and Create a New Booking)
    public function saveStep1(Request $request)
    {
        // First Logic: Update user details if changed
        $user = auth()->user(); // Assuming you are using authentication
        $user->update($request->only(['fname', 'lname', 'email', 'phone']));

        // Second Logic: Check if the user has an existing booking with "Reserved" or "Completed" status
        $existingBooking = Booking::where('user_id', $user->id)
            ->whereIn('status', ['Reserved', 'Completed'])
            ->first();

        if ($existingBooking) {
            $message = "You already have an existing booking with status: " . $existingBooking->status;
            return redirect()->route('booking.step1', ['room_id' => $request->room_id, 'hostel_id' => $request->hostel_id])->with('error', $message);
        }

        // Third Logic: Check room availability and create a booking
        $room = Room::find($request->room_id);

        if ($room && ($room->available_slots !== 0 && $room->available_slots !== null)) {
            // Insert into the bookings table
            $booking = new Booking();
            $booking->user_id = $user->id;
            $booking->room_id = $request->room_id;
            $booking->check_in_date = $request->check_in_date;
            $booking->check_out_date = $request->check_out_date;
            $booking->status = "Reserved"; // You can set the initial status here
            $booking->save();

            // Deduct from available_slots
            $room->decrement('available_slots');

            // Schedule a task to cancel the booking after 24 hours
            $this->cancelBookingAfter24Hours($booking);

            // Pass user and booking details to payment view
            $message = "Your booking has been created successfully";
            return view('booking.step2', compact('user', 'booking', 'message'));
        } else {
            $message = "The room is not available";
            return redirect()->route('hostels.show', ['hostel' => $request->hostel_id])->with('error', $message);
        }
    }



    // Display Step 2: Payment Information Form
    public function step2()
    {
        return view('booking.step2');
    }

    // Handle Step 2 Form Submission (Save Payment Information)
    public function saveStep2(Request $request)
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