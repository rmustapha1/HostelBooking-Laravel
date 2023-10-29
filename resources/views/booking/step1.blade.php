@extends('layouts.app')

@section('content')
<div id="booking" class="container px-2 py-8 mt-20 items-center justify-center">
    <!-- Steps UI -->
    <div class="flex items-center justify-center space-x-1 my-5 sm:overflow-x-hidden">

        <div class="flex items-center justify-center space-x-1">
            <div class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center text-white text-2xl font-bold">
                <svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M9.707 18.707l10-10a1 1 0 0 0-1.414-1.414l-9.293 9.293l-3.293-3.293a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.414 0z" />
                </svg>
            </div>
            <p class="text-gray-800 text-sm font-bold">Your Selection</p>
            <div class="h-0.5 bg-gray-700 w-60 border-r-3 border-gray-400">
            </div>
        </div>
        <div class="flex items-center justify-center space-x-1">
            <div class="w-12 h-12 rounded-full bg-gray-200 border-2 border-blue-500 flex items-center justify-center text-gray-600 text-2xl font-bold">
                2</div>
            <p class="text-gray-800 text-sm font-bold">Reserve Room</p>
            <div class="h-0.5 bg-gray-700 w-60 border-r-3 border-gray-400">
            </div>
            <div class="flex items-center justify-center space-x-1">
                <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 text-2xl font-bold">
                    3</div>
                <p class="text-gray-800 text-sm font-bold">Make Payment</p>
            </div>

        </div>

    </div>

    <div class="container px-2">
        <div class="row -mx-4">
            <div class="w-full col-lg-4 px-2">
                <div class="bg-white rounded-lg border-gray-300 border-2 p-4 mb-2">
                    <h2 class="text-sm font-bold mb-2">{{ $hostel->name }}</h2>
                    <p class="text-gray-700 text-sm mb-2"><i class="bi bi-geo-alt pr-2"></i>{{ $hostel->location }}</p>
                    <div class="star-rating">
                        @for ($i = 1; $i <= 5; $i++) @if ($normalizedRating>= $i)
                            <i class="bi bi-star-fill text-yellow-500"></i>
                            @elseif ($normalizedRating > ($i - 1))
                            <i class="bi bi-star-half text-yellow-500"></i>
                            @else
                            <i class="bi bi-star text-yellow-500"></i>
                            @endif
                            @endfor
                            {{ $normalizedRating }}
                    </div>

                    @php
                    $rowCount = count($hostel->reviews);
                    @endphp
                    <span class="text-gray-700 mb-2">{{ $rowCount }} reviews</span>
                </div>
                <div class="bg-white rounded-lg border-gray-300 border-2 p-4 mb-2">
                    <h2 class="text-sm font-bold mb-2">Room Details</h2>
                    <p class="text-gray-700 font-semibold mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Sed euismod,
                        diam
                        eget varius ultricies, elit elit bibendum sapien, vel bibendum sapien elit euismod elit.</p>
                </div>
                <div class="bg-white rounded-lg border-gray-300 border-2 p-4 mb-2">
                    <h2 class="text-sm font-bold mb-2">Booking Details</h2>
                    <p class="text-gray-700 mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod,
                        diam
                        eget varius ultricies, elit elit bibendum sapien, vel bibendum sapien elit euismod elit.</p>
                </div>
            </div>
            <div class="w-full col-lg-8 px-2">
                <!-- Sign in to book your details or register to manage your booking on the go! -->
                <form id="booking-form" method="post" action="{{route('booking.saveBooking')}}">
                    @csrf
                    <div class="border-gray-300 border-2 rounded-sm p-4 mb-3">
                        <h2 class="text-2xl font-medium text-gray-800">Continue to book with your details.</h2>
                        <div class="mt-4 row">

                            <!-- First name -->
                            <div class="col-md-6 mb-3">
                                <label for="first_name" class="text-gray-600 font-medium">First name</label>
                                <input type="text" id="first_name" name="fname" placeholder="Enter your first name" value="{{$user->fname}}" class="w-full bg-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            </div>
                            <!-- Last name -->
                            <div class="col-md-6 mb-3">
                                <label for="last_name" class="text-gray-600 font-medium">Last name</label>
                                <input type="text" id="last_name" name="lname" placeholder="Enter your last name" value="{{$user->lname}}" class="w-full bg-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            </div>
                            <!-- Email address -->
                            <div class="col-md-6 mb-3">
                                <label for="email" class="text-gray-600 font-medium">Email address</label>
                                <input type="email" id="email" name="email" placeholder="Enter your email address" value="{{$user->email}}" class="w-full bg-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            </div>
                            <!-- Country/region -->
                            <div class="col-md-6 mb-3">
                                <label for="school" class="text-gray-600 font-medium">Your school/campus</label>
                                <input type="text" id="school" name="school" placeholder="Enter your school name" value="{{$hostel->school->name}}" class="w-full bg-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            </div>
                            <input type="hidden" name="room_id" value="{{$room->id}}">
                            <input type="hidden" name="hostel_id" value="{{$hostel->id}}">
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                        </div>
                    </div>

                    <!-- Final Step -->
                    <div class="border-gray-300 border-2 rounded-sm p-4 mb-4">
                        <h2 class="text-lg font-medium text-gray-800">Contact Details</h2>
                        <div class="mt-4 row">

                            <!-- Telephone number -->
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="text-gray-600 font-medium">Telephone number</label>
                                <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" value="{{$user->phone}}" class="w-full bg-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            </div>
                            <!-- Email preferences -->
                            <div class="col-md-6 mb-3">
                                <label for="email_preferences" class="text-gray-600 font-medium">Email
                                    preferences</label>
                                <select id="email_preferences" name="email_preferences" class="w-full bg-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                    <option value="all">Send me all emails</option>
                                    <option value="important">Send me only important emails</option>
                                    <option value="none">Do not send me any emails</option>
                                </select>
                            </div>

                        </div>
                    </div>

                    <!-- Check-In-Date & Check-Out-Date -->
                    <div class="border-gray-300 border-2 rounded-sm p-4 mb-4">
                        <h2 class="text-lg font-medium text-gray-800">Check-In & Check-Out Date</h2>
                        <div class="mt-4 row">
                            <!-- Check-In-Date -->
                            <div class="col-md-6 mb-3">
                                <label for="check_in_date" class="text-gray-600 font-medium">Check-In-Date</label>
                                <input type="date" id="check_in_date" name="check_in_date" placeholder="Enter your check-in date" class="w-full bg-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            </div>
                            <!-- Check-Out-Date -->
                            <div class="col-md-6 mb-3">
                                <label for="check_out_date" class="text-gray-600 font-medium">Check-Out-Date</label>
                                <input type="date" id="check_out_date" name="check_out_date" placeholder="Enter your check-out date" class="w-full bg-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            </div>

                        </div>


                    </div>
                    <!-- Confirm button -->
                    <div class="pt-5 float-right">
                        <button type="submit" id="submit-button" class="bg-blue-500 text-white px-4 py-3 rounded-lg hover:bg-blue-600">
                            <span id="submit-text">Next: Payment <i class="bi bi-chevron-right"></i></span>
                            <img id="submit-loader" src="{{asset('images/loader.gif')}}" alt="Loading..." style="display:none;">
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection

    @push('scripts')
    <script>
        // Get references to the button, submit-loader, and submit-text elements
        var button = document.getElementById("submit-button");
        var submitLoader = document.getElementById("submit-loader");
        var submitText = document.getElementById("submit-text");

        // Add a click event listener to the button
        button.addEventListener("click", function() {
            // Disable the button to prevent multiple clicks
            button.disabled = true;

            // Show the loader and hide the text
            submitLoader.style.display = "block";
            submitText.style.display = "none";

            // Simulate a delay for demonstration (you can replace this with your actual form submission logic)
            setTimeout(function() {
                // Re-enable the button
                button.disabled = false;

                // Hide the loader and show the text
                submitLoader.style.display = "none";
                submitText.style.display = "block";
            }, 3000); // Simulating a 3-second delay; replace with your actual logic
        });
    </script>
    @endpush