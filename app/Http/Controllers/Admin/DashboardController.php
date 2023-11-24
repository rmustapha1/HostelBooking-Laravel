<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Display the admin dashboard
        return view('admin.dashboard');
    }

    public function manageHostels()
    {
        // Logic to display a list of hostels
        // Example: $hostels = Hostel::all();
        return view('admin.hostels.index');
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
        // Example: $hostel = Hostel::find($id);
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
        // Example: Hostel::destroy($id);
        return redirect()->route('admin.hostels.index')->with('success', 'Hostel deleted successfully!');
    }
}
