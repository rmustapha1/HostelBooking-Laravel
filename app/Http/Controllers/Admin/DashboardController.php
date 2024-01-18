<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hostel;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Logic to get the totals for the dashboard
        $hostelsCount = Hostel::count();
        $roomsCount = Room::count();
        $bookingsCount = Booking::count();
        $paymentsCount = Payment::count();
        $studentsCount = User::where('role', 'Student')->count();
        $managersCount = User::where('role', 'Hostel Manager')->count();
        $revenue = Payment::sum('amount');

        $bookings= Booking::with(['user', 'room'])->get();
        $bookingData = $bookings->map(function($booking){
            $id = $booking->room->hostel_id;

            $hostel = Hostel::find($id);

            return[
                'id' => $booking->id,
                'date' => $booking->created_at,
                'name' => $booking->user->fname.' '.$booking->user->lname,
                'hostel' => $hostel->name,
                'room_no' => $booking->room->room_no,
                'price' => $booking->room->price_per_year,
                'status' => $booking->status,

            ];

        });


        // Display the admin dashboard
        return view('admin.dashboard', compact('hostelsCount', 'roomsCount', 'bookingsCount', 'paymentsCount', 'studentsCount', 'managersCount', 'revenue', 'bookingData'));
    }

    public function manageHostels()
{
    $hostels = Hostel::with(['manager', 'school', 'subscription'])->get();

    // If you want to customize the data format, you can use the map method
    $hostelData = $hostels->map(function ($hostel) {
        $subscriptionStartDate = null;
        $subscriptionEndDate = null;

        // Check if the subscription relationship exists and is not empty
        if ($hostel->subscription && $hostel->subscription->isNotEmpty()) {
            // Assuming subscription is a collection, loop through it
            foreach ($hostel->subscription as $subscription) {
                $subscriptionStartDate = $subscription->subscription_start_date;
                $subscriptionEndDate = $subscription->subscription_end_date;

                // You can break if you only need data from the first subscription
                break;
            }
        }
        return [
            'id' => $hostel->id,
            'name' => $hostel->name,
            'location' => $hostel->location,
            'school' => $hostel->school->name,
            'status' => $hostel->status,
            'capacity' => $hostel->no_of_rooms,
            'owner_name' => $hostel->manager->fname.' '. $hostel->manager->lname,
            'subscription_start_date' => $subscriptionStartDate, 
            'subscription_end_date' => $subscriptionEndDate,
            // Add other fields as needed
        ];
    });

    // Pass the $hostelData to the view
    return view('admin.hostels.index', ['hostelData' => $hostelData]);
}


    public function createHostel()
    {
        // Logic to display the form for creating a new hostel
        return view('admin.hostels.create');
    }

    public function storeHostel(Request $request)
    {
        // Logic to store a new hostel
        // Example: Hostel::create($request->all());
        return redirect()->route('admin.hostels.index')->with('success', 'Hostel created successfully!');
    }

    public function editHostel($id)
    {
        // Logic to display the form for editing a hostel
         $hostel = Hostel::find($id);
        return view('admin.hostels.edit', compact('hostel'));
    }

    public function updateHostel(Request $request, $id)
    {
        // Logic to update a hostel
        // Example: Hostel::find($id)->update($request->all());
        return redirect()->route('admin.hostels.index')->with('success', 'Hostel updated successfully!');
    }

    public function deleteHostel($id)
    {
        // Logic to delete a hostel
         Hostel::destroy($id);
        return redirect()->route('admin.hostels.index')->with('success', 'Hostel deleted successfully!');
    }


    // Users

    public function manageUsers()
    {
        $users = User::all();
    
        $userData = $users->map(function ($user) {
           
            return [
                'id' => $user->id,
                'name' => $user->fname.' '. $user->lname,
                'email' => $user->email,
                'phone' => $user->phone,
                'role' => $user->role,
                'profile' => $user->profile_photo_url,
                // Add other fields as needed
            ];
        });
    
        // Pass the $userData to the view
        return view('admin.users.index', ['userData' => $userData]);
    }

    public function createUser()
    {
        // Logic to display the form for creating a new user
        return view('admin.users.create');
    }

    public function storeUser(Request $request)
    {
        // Logic to store a new user
         User::create($request->all());
        return redirect()->route('admin.users.index')->with('success', 'User created successfully!');
    }

    public function editUser($id)
    {
        // Logic to display the form for editing a user
         $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        // Logic to update a user
        // Example: User::find($id)->update($request->all());
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully!');
    }

    public function deleteUser($id)
    {
        // Logic to delete a user
         Hostel::destroy($id);
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully!');
    }


    public function bookings(){
        $bookings= Booking::with(['user', 'room'])->get();
        $bookingData = $bookings->map(function($booking){
            $id = $booking->room->hostel_id;

            $hostel = Hostel::find($id);

            return[
                'id' => $booking->id,
                'date' => $booking->created_at,
                'name' => $booking->user->fname.' '.$booking->user->lname,
                'hostel' => $hostel->name,
                'room_no' => $booking->room->room_no,
                'check_in' => $booking->check_in_date,
                'check_out' => $booking->check_out_date,
                'price' => $booking->room->price_per_year,
                'status' => $booking->status,

            ];

        });
        return view('admin.bookings', ['bookingData' => $bookingData]);
    }

}