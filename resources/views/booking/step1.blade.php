@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 mt-20 items-center justify-center">
    <!-- Steps UI -->
    <div class="flex items-center justify-center space-x-1 my-5">

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


    <div class="container mx-auto px-4">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full lg:w-4/12 px-4">
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
                            {{ $normalizedRating }}.0
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
            <div class="w-full lg:w-8/12 px-4">
                <!-- Sign in to book your details or register to manage your booking on the go! -->
                <div class="border-gray-300 border-2 rounded-sm p-4 mb-3">
                    <h2 class="text-2xl font-medium text-gray-800">Continue to book with your details.</h2>
                    <form id="form2" class="mt-4 grid grid-cols-2 gap-4">
                        @csrf
                        <!-- First name -->
                        <div>
                            <label for="first_name" class="text-gray-600 font-medium">First name</label>
                            <input type="text" id="first_name" name="first_name" placeholder="Enter your first name" value="{{$user->fname}}" class="w-full bg-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <!-- Last name -->
                        <div>
                            <label for="last_name" class="text-gray-600 font-medium">Last name</label>
                            <input type="text" id="last_name" name="last_name" placeholder="Enter your last name" value="{{$user->lname}}" class="w-full bg-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <!-- Email address -->
                        <div>
                            <label for="email" class="text-gray-600 font-medium">Email address</label>
                            <input type="email" id="email" name="email" placeholder="Enter your email address" value="{{$user->email}}" class="w-full bg-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <!-- Country/region -->
                        <div>
                            <label for="school" class="text-gray-600 font-medium">Your school/campus</label>
                            <input type="email" id="school" name="school" placeholder="Enter your school name" value="{{$hostel->school->name}}" class="w-full bg-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                    </form>
                </div>

                <!-- Final Step -->
                <div class="border-gray-300 border-2 rounded-sm p-4 mb-4">
                    <h2 class="text-lg font-medium text-gray-800">Contact Details</h2>
                    <form id="form2" class="mt-4 grid grid-cols-2 gap-4">
                        @csrf
                        <!-- Telephone number -->
                        <div>
                            <label for="phone" class="text-gray-600 font-medium">Telephone number</label>
                            <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" class="w-full bg-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <!-- Email preferences -->
                        <div>
                            <label for="email_preferences" class="text-gray-600 font-medium">Email preferences</label>
                            <select id="email_preferences" name="email_preferences" class="w-full bg-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option value="all">Send me all emails</option>
                                <option value="important">Send me only important emails</option>
                                <option value="none">Do not send me any emails</option>
                            </select>
                        </div>

                    </form>
                </div>
                <!-- Confirm button -->
                <div class="pt-5 ml-auto">
                    <a type="submit" id="submit-button" class="bg-blue-500 text-white px-4 py-3 rounded-lg hover:bg-blue-600">Next:
                        Final Details <i class="bi bi-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    @endsection