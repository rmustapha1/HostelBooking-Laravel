@extends('layouts.app')

@section('content')
<div class="container mx-auto">
<div class="bg-white rounded-lg shadow-sm mx-auto mt-20">
    <div class="header mx-auto  mt-20 text-center">
        <h1 class="text-3xl font-bold text-center text-gray-900">Complaints Form</h1>
    </div>
    <form method="post" action="{{route('complaint.send')}}" class="max-w-lg mx-auto mt-10">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
            <input type="text" id="name" name="name" required class="appearance-none border p-3 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
            <input type="email" id="email" name="email" required class="p-3 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="phone" class="block text-gray-700 font-bold mb-2">Manager's Phone:</label>
            <input type="tel" id="phone" name="phone" required class="p-3 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="complaint" class="block text-gray-700 font-bold mb-2">Complaint:</label>
            <textarea id="complaint" name="complaint" required class="p-3 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
        </div>

        <div class="flex items-center justify-between">
            <input type="submit" value="Submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        </div>
    </form>
    </div>
</div>
@endsection