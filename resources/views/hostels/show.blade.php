@extends('layouts.app')

@section('content')

<div class="bg-white">
    <div class="pt-6 mt-20">
        <nav aria-label="Breadcrumb">
            <ol role="list" class="mx-auto flex max-w-2xl items-center space-x-2 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                <li>
                    <div class="flex items-center">
                        <a href="#" class="mr-2 text-sm font-medium text-gray-900">Hostels</a>
                        <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true"
                            class="h-5 w-4 text-gray-300">
                            <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                        </svg>
                    </div>
                </li>

                <li class="text-sm">
                    <a href="#" aria-current="page"
                        class="font-medium text-gray-500 hover:text-gray-600">{{ $hostel->name }}</a>
                </li>
            </ol>
        </nav>

        <!-- Featured Image -->
        <div class="mx-auto px-3 py-3">
            <div class="sm:overflow-hidden rounded-lg sm:rounded-lg">
                <img src="https://thumbnails.production.thenounproject.com/gA9eZOvsBYSHrMumgrslmRGoBto=/fit-in/1000x1000/photos.production.thenounproject.com/photos/BCBA88B6-5B41-4B50-A786-E60CAA0ECDA3.jpg" alt="{{$hostel->name}}"
                    class="h-full w-full object-cover object-center">
            </div>
        </div>

        <!-- Product info -->
        <div
            class="mx-auto max-w-2xl px-4 pb-16 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">
            <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">{{$hostel->name}}</h1>
            </div>

            <!-- Options -->
            <div class="mt-4 lg:row-span-3 lg:mt-0">
                <h2 class="sr-only">Hostel information</h2>
                <p class="text-3xl tracking-tight text-gray-900">&#8373;{{$hostel->price_range}}</p>

                <!-- Reviews -->
                <div class="mt-6">
                    <h3 class="sr-only">Reviews</h3>
                    <div class="flex items-center">
                        @php
                        $rating = number_format($rating, 1);
                        $reviews = $hostel->reviews->count();
                        @endphp
                        <div class="flex flex-center star-rating">
                            @for ($i = 1; $i <= 5; $i++) @if ($rating>= $i)
                                <i class="bi bi-star-fill text-blue-600"></i>
                                @elseif ($rating > ($i - 1))
                                <i class="bi bi-star-half text-blue-600"></i>
                                @else
                                <i class="bi bi-star text-blue-600"></i>
                                @endif
                                @endfor
                        </div>
                        <a href="#" class="ml-3 text-sm font-medium text-blue-600 hover:text-blue-500">{{$reviews}}
                            review/s</a>
                    </div>
                </div>

                <form class="mt-10">
                    <div class="mt-10">
                        <div class="flex items-center justify-between">
                            <h3 class="text-sm font-medium text-gray-900">Facilities</h3>
                        </div>

                        <fieldset class="mt-4">
                            <div class="grid grid-cols-4 gap-4 sm:grid-cols-8 lg:grid-cols-4">
                                <!-- Active: "ring-2 ring-blue-500" -->
                                <label
                                    class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer  bg-white text-gray-600 shadow-sm">
                                    <i class="fas fa-building fa-lg"></i>

                                    <span class="pointer-events-none absolute -inset-px rounded-md"
                                        aria-hidden="true"></span>
                                </label>
                                <!-- Active: "ring-2 ring-blue-500" -->
                                <label
                                    class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-gray-600 shadow-sm">
                                    <i class="fas fa-bed fa-lg"></i></i>

                                    <span class="pointer-events-none absolute -inset-px rounded-md"
                                        aria-hidden="true"></span>
                                </label>
                                <!-- Active: "ring-2 ring-blue-500" -->
                                <label
                                    class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-gray-600 shadow-sm">
                                    <i class="fas fa-shower fa-lg"></i>

                                    <span class="pointer-events-none absolute -inset-px rounded-md"
                                        aria-hidden="true"></span>
                                </label>
                                <!-- Active: "ring-2 ring-blue-500" -->
                                <label
                                    class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-gray-600 shadow-sm">
                                    <i class="fas fa-toilet fa-lg"></i>

                                    <span class="pointer-events-none absolute -inset-px rounded-md"
                                        aria-hidden="true"></span>
                                </label>
                                <!-- Active: "ring-2 ring-blue-500" -->
                                <label
                                    class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-gray-600 shadow-sm">
                                    <i class="fas fa-faucet fa-lg"></i>

                                    <span class="pointer-events-none absolute -inset-px rounded-md"
                                        aria-hidden="true"></span>
                                </label>
                                <!-- Active: "ring-2 ring-blue-500" -->
                                <label
                                    class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-gray-600 shadow-sm">
                                    <i class="fas fa-eye fa-lg"></i>

                                    <span class="pointer-events-none absolute -inset-px rounded-md"
                                        aria-hidden="true"></span>
                                </label>
                            </div>
                        </fieldset>
                    </div>


                    <a href="#reserve"
                        class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-blue-600 px-8 py-3 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Reserve
                        a Room</a>
                </form>
            </div>

            <div class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pb-16 lg:pr-8 lg:pt-6">
                <!-- Description and details -->
                <div>
                    <h3 class="sr-only">Description</h3>

                    <div class="space-y-6">
                        <p class="text-base text-gray-900">{{$hostel->description}}</p>
                    </div>
                </div>

                <div class="mt-10">
                    <h3 class="text-base font-semibold leading-7 text-blue-300">Highlights</h3>

                    <div class="mt-4">
                        <ul role="list" class="list-disc space-y-2 pl-4 text-sm">
                            <li class="text-gray-400"><span class="text-gray-600">Lorem ipsum dolor sit</span></li>
                            <li class="text-gray-400"><span class="text-gray-600">Lorem ipsum dolor sit</span></li>
                            <li class="text-gray-400"><span class="text-gray-600">Lorem ipsum dolor sit</span>
                            </li>
                            <li class="text-gray-400"><span class="text-gray-600">Lorem ipsum dolor sit</span></li>
                        </ul>
                    </div>
                </div>

                <div class="mt-10">
                    <h2 class="text-base font-semibold leading-7 text-blue-300">Details</h2>

                    <div class="mt-4 space-y-6">
                        <p class="text-sm text-gray-600">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                            Libero et nihil exercitationem laudantium aspernatur deserunt dignissimos inventore iste
                            reprehenderit neque voluptas tempore rem, minima quam quibusdam error sit corporis
                            explicabo.</p>
                    </div>
                </div>
                <!-- Gallery -->
                <div class="mt-10">
                    <h2 class="text-base font-semibold leading-7 text-blue-300">Image Gallery</h2>
                    <div class="flex flex-wrap -mx-2">
                        @if ($hostel->images->isNotEmpty())
                        @foreach ($hostel->images as $image)
                        <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 px-2 mb-4">
                            <img src="{{ $image }}" alt="{{ $hostel->name }}" class="w-full h-auto">
                        </div>
                        @endforeach
                        @else
                        <div class="w-full px-2 mb-4">
                            <p>No images available for {{ $hostel->name }}</p>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Reviews -->
                <div class="mt-10">
                    <h2 class="text-base font-semibold leading-7 text-blue-300">Reviews</h2>
                    @if ($hostel->reviews)
                    @foreach ($hostel->reviews as $review)
                    <div class="mb-4">
                        <div class="flex items-center mb-2">
                            <svg class="w-6 h-6 text-yellow-500 fill-current mr-2" viewBox="0 0 20 20">
                                <path
                                    d="M10 1l2.928 6.472 6.472.928-4.944 4.808 1.166 6.785L10 16.347l-6.622 3.118 1.166-6.785L.6 8.4l6.472-.928L10 1z" />
                            </svg>
                            @php
                            $date = date_create($review->created_at);
                            $avgrating = is_null($review->rating) ? 0 : ($review->rating / 10) * 5;
                            $rating = number_format($avgrating, 1);
                            @endphp
                            <span class="text-lg font-semibold">{{$rating}}</span>
                        </div>
                        <p class="text-gray-700 text-lg mb-2">{{ $review->comment }}</p>
                        <div class="flex items-center">
                            @if ($review->user)
                            @if ($review->user->profile_photo_url == null)
                            <img src="{{ asset('images/profile.png') }}" alt="{{ $review->user->fname }}"
                                class="w-10 h-10 rounded-full mr-2">
                            @endif
                            <img src="{{ $review->user->profile_photo_url }}" alt="{{ $review->user->fname }}"
                                class="w-10 h-10 rounded-full mr-2">
                            <p class="text-sm text-gray-600">{{ $review->user->fname }}</p>
                            <p class="text-sm text-gray-600"><i class="bi bi-clock"></i> {{ $date }}</p>
                            @endif
                        </div>
                    </div>
                    @endforeach
                    @else
                    <p>No reviews available for this hostel.</p>
                    @endif


                </div>
            </div>
        </div>
        <div id="reserve" class="mx-auto container">
            <h2 class="text-base font-semibold leading-7 text-blue-300">Available Rooms</h2>
            <div class="overflow-x-auto overflow-y-auto max-w-full max-h-screen p-4">
            <table class="table-auto min-w-full table-stripe table-primary border-separate border border-blue-800">
                <thead class="bg-blue-500 text-white">
                    <tr>
                        <th class="border border-blue-600 px-4 py-2">Room Number</th>
                        <th class="border-blue-600 px-4 py-2">Room Type</th>
                        <th class="border-blue-600 px-4 py-2">Price per year</th>
                        <th class="border-blue-600 px-4 py-2">Number of Slots</th>
                        <th class="border-blue-600 px-4 py-2">Available of Slots</th>
                        <th class="border-blue-600 px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hostel->rooms as $room)
                    <tr>
                        <td class="border px-4 py-4">{{ $room->room_no }}</td>
                        <td class="border px-4 py-4">{{ $room->room_type }}</td>
                        <td class="border px-4 py-4">{{ $room->price_per_year }}</td>
                        <td class="border px-4 py-4">{{ $room->total_slots }}</td>
                        <td class="border px-4 py-4">{{ $room->available_slots }}</td>
                        <td class="border px-4 py-6">
                            <a href="{{ route('booking.step1', ['room_id' => $room->id]) }}"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">I'll
                                Reserve</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('.toast').toast('show');
});
</script>
@endpush