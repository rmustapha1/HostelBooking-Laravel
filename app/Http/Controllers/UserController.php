<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Logic for displaying a list of users
    public function index()
    {
        $users = User::all(); // Assuming you have a User model

        return view('users.index', compact('users'));
    }

    // Logic for displaying a user creation form
    public function create()
    {
        return view('users.create');
    }

    // Logic for storing a new user
    public function store(Request $request)
    {
        // Validate user input
        $validatedData = $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|max:15',
            'password' => 'required|string|min:6',
        ]);

        // Create a new user
        User::create($validatedData);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    // Logic for displaying a specific user
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    // Logic for displaying an edit form for a user
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Logic for updating a user
    public function update(Request $request, User $user)
    {
        // Validate user input
        $validatedData = $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required|string|max:15',
        ]);

        // Update the user
        $user->update($validatedData);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    // Logic for deleting a user
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
