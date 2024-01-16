@extends('layouts.app')

@section('content')

<div class="container hostel mt-20">
    <div class="page-header">
        <h1 class="page-title">Hostels</h1>
    </div>
    <p class="page-content mb-3 mt-3 text-muted">Click and start booking process.</p>

    <form action="{{ route('hostels.index') }}" method="GET">
        <div class="row mb-3">
            <div class="col-md-4 mb-3">
                <select name="school"
                    class="form-select w-full bg-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">All Schools</option>
                    @foreach ($schools as $school)
                    <option value="{{ $school->id }}" {{ $school->id == $selectedSchool ? 'selected' : '' }}>
                        {{ $school->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <select name="price_range"
                    class="form-select w-full bg-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">All Price Ranges</option>
                    <option value="0-1000" {{ $selectedPriceRange == '0-1000' ? 'selected' : '' }}>0 - 1000</option>
                    <option value="1001-2000" {{ $selectedPriceRange == '1001-2000' ? 'selected' : '' }}>1001 - 2000
                    </option>
                    <option value="2001-3000" {{ $selectedPriceRange == '2001-3000' ? 'selected' : '' }}>2001 -
                        3000</option>
                    <option value="3001-4000" {{ $selectedPriceRange == '3001-4000' ? 'selected' : '' }}>3001 -
                        4000</option>
                    <option value="4001-5000" {{ $selectedPriceRange == '4001-5000' ? 'selected' : '' }}>4001 -
                        5000</option>
                    <option value="5001-6000" {{ $selectedPriceRange == '5001-6000' ? 'selected' : '' }}>5001 -
                        6000</option>
                    <option value="6001-7000" {{ $selectedPriceRange == '6001-7000' ? 'selected' : '' }}>6001 -
                        7000</option>
                    <option value="7001-8000" {{ $selectedPriceRange == '7001-8000' ? 'selected' : '' }}>7001 -
                        8000</option>
                    <option value="8001-9000" {{ $selectedPriceRange == '8001-9000' ? 'selected' : '' }}>8001 -
                        9000</option>
                    <option value="9001-10000" {{ $selectedPriceRange == '9001-10000' ? 'selected' : '' }}>9001 -
                        10000</option>
                    <option value="10001-50000" {{ $selectedPriceRange == '10001-50000' ? 'selected' : '' }}>10001 -
                        50000</option>
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-3 rounded-lg hover:bg-blue-600">Filter</button>
            </div>
        </div>
    </form>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
        @foreach ($filteredHostels as $hostel)
        <a href="{{ route('hostels.show', $hostel->id) }}">
  <div class="cursor-pointer rounded-xl bg-white p-3 shadow-lg hover:shadow-xl">
	<div class="relative flex items-end overflow-hidden rounded-xl">
	  <img src="https://thumbnails.production.thenounproject.com/gA9eZOvsBYSHrMumgrslmRGoBto=/fit-in/1000x1000/photos.production.thenounproject.com/photos/BCBA88B6-5B41-4B50-A786-E60CAA0ECDA3.jpg" alt="wallpaper" />

	  <div class="absolute bottom-3 left-3 inline-flex items-center rounded-lg bg-white p-2 shadow-md">
		<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
		  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
		</svg>
                   @php
                    $rating = number_format($ratings[$hostel->id], 1);
                    @endphp
		              <span class="ml-1 text-sm text-slate-400">
                             {{$rating}}
						</span>
	  </div>
	</div>

	<div class="mt-1 p-2">
	  <h2 class="text-slate-700">{{$hostel->name}}</h2>
	  <p class="mt-1 text-sm text-slate-400">{{$hostel->location}}</p>

	  <div class="mt-3 flex items-end justify-between">
		<p>
		  <span class="text-lg font-bold text-orange-500">&#8373;{{$hostel->price_range}}+</span>
		  <span class="text-sm text-slate-400">/year</span>
		</p>

		<div class="group inline-flex rounded-xl bg-orange-100 p-2 hover:bg-orange-200">
		  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-orange-400 group-hover:text-orange-500" viewBox="0 0 20 20" fill="currentColor">
			<path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z" />
		  </svg>
		</div>
	  </div>
	</div>
  </div>
  </a>
        @endforeach
    </div>
</div>
</section>
@endsection