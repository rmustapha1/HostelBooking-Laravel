<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hostel;
use App\Models\School;
use App\Models\Review;

class HostelController extends Controller
{
    // Logic for displaying a list of hostels
    public function index(Request $request)
    {
        $schools = School::all();
        $selectedSchool = $request->input('school');
        $selectedPriceRange = $request->input('price');

        $hostels = Hostel::where('status', 'Active');


        if ($selectedSchool) {
            $hostels->where('school_id', $selectedSchool);
        }

        if ($selectedPriceRange) {
            $priceRange = explode('-', $selectedPriceRange);
            $hostels->whereHas('rooms', function ($query) use ($priceRange) {
                $query->where('price_per_year', '>=', $priceRange[0])->where('price_per_year', '<=', $priceRange[1]);
            });
        }

        $filteredHostels = $hostels->get();
        $message = null;

        // Calculate and normalize ratings for each hostel and store them in an array
        $ratings = [];
        foreach ($filteredHostels as $hostel) {
            $averageRating = Review::where('hostel_id', $hostel->id)->avg('rating');
            $rating = is_null($averageRating) ? 0 : ($averageRating / 10) * 5;
            $ratings[$hostel->id] = $rating;
        }

        if ($filteredHostels->isEmpty()) {
            $message = 'No hostels found matching your criteria.';
        }

        return view('hostels.index', compact('filteredHostels', 'schools', 'selectedSchool', 'selectedPriceRange', 'message', 'ratings'));
    }

    // Logic for displaying a hostel creation form
    public function create()
    {
        return view('hostels.create');
    }

    // Logic for storing a new hostel
    public function store(Request $request)
    {
        // Validate input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Create a new hostel
        Hostel::create($validatedData);

        return redirect()->route('hostels.index')->with('success', 'Hostel created successfully.');
    }

    // Logic for displaying a specific hostel
    public function show(Hostel $hostel)
    {
        $averageRating = Review::where('hostel_id', $hostel->id)->avg('rating');
        $rating = is_null($averageRating) ? 0 : ($averageRating / 10) * 5;

        return view('hostels.show', compact('hostel', 'rating'));
    }

    // Logic for displaying an edit form for a hostel
    public function edit(Hostel $hostel)
    {
        return view('hostels.edit', compact('hostel'));
    }

    // Logic for updating a hostel
    public function update(Request $request, Hostel $hostel)
    {
        // Validate input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Update the hostel
        $hostel->update($validatedData);

        return redirect()->route('hostels.index')->with('success', 'Hostel updated successfully.');
    }

    // Logic for deleting a hostel
    public function destroy(Hostel $hostel)
    {
        $hostel->delete();

        return redirect()->route('hostels.index')->with('success', 'Hostel deleted successfully.');
    }
}
