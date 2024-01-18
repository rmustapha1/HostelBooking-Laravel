
@extends('layouts.admin') 
@section('content')


<section class="content-wrapper">
   
    <div class="row mt-5">
    <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Booking List</p>
                    <div class="table-responsive">
                        <table id="bookingTable" class="table">
                        <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Student</th>
                                    <th>Hostel</th>
                                    <th>Room Number</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if($bookingData->isEmpty())
                                 <p>No recent bookings.</p>
                       @else
                       @foreach($bookingData as $booking)
                                <tr>
                                    <td>{{$booking['date']}}</td>
                                    <td>{{$booking['name']}}</td>
                                    <td>{{$booking['hostel']}}</td>
                                    <td>{{$booking['room_no']}}</td>
                                    <td>{{$booking['check_in']}}</td>
                                    <td>{{$booking['check_out']}}</td>
                                    <td>{{$booking['price']}}</td>
                                    <td>{{$booking['status']}}</td>
                        <td class="flex items-center justify-center space-x-2">
                            <div class="h-6 w-6 items-center rounded bg-gray-300">
                            <a href="{{ route('admin.bookings.edit', ['id' => $booking['id']]) }}" class="items-center text-center" title="Edit"><i class="mdi mdi-border-color text-blue-500 text-lg"></i></a>
                            </div>
                            <div class="h-6 w-6 items-center rounded bg-gray-300">
                            <a href="#" onclick="openEditHostelModal('{{ $booking['id'] }}')" class="items-center text-center" title="View"><i class="mdi mdi-eye text-lg text-gray-500 text-center"></i></a>
                            </div>
                            <div class="h-6 w-6 items-center rounded bg-gray-300">
                            <a href="{{ route('admin.bookings.destroy', ['id' => $booking['id']]) }}" class="items-center text-center" title="Delete" onclick="return confirm('Are you sure you want to delete this booking?')"><i class="mdi mdi-delete text-red-500 text-lg"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Hostel Modal -->
<div id="editHostelModal" class="fixed inset-0 overflow-y-auto hidden">
<div class="flex items-center justify-center min-h-1/2 pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Background overlay -->
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- Modal Content -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-middle bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full">
            <!-- Modal Header -->
            <div class="bg-blue-300 px-4 py-3 sm:px-6">
                <h3 class="text-lg font-medium leading-6 text-white">
                    Edit Hostel
                </h3>
            </div>

            <!-- Modal Body -->
            <div class="p-6">
                <!-- Add your form elements for editing booking details here -->
                <!-- For example, you might have input fields for name, location, capacity, etc. -->
                <<form>
                    <input type="text" name="name" value="vdvdv">
                </form>

                <!-- Save and Cancel Buttons -->
                <div class="mt-4 flex justify-end">
                    <button class="bg-blue-300 text-white py-2 px-4 rounded mr-2">Save Changes</button>
                    <button id="closeEditHostelModal" class="text-gray-600 hover:text-gray-800 py-2 px-4 rounded">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>

    </section>


@endsection

<!-- JavaScript to Handle Modal Toggle -->
<script>
    // Function to open the modal and load data
    function openEditHostelModal(hostelId) {
        // Fetch booking data based on hostelId (you might need an AJAX request here)
        // For simplicity, let's assume you have the booking data in a variable called hostelData

        // Update modal content with booking data (modify as needed)
        // document.getElementById('hostelNameInput').value = hostelData.name;
        // document.getElementById('hostelLocationInput').value = hostelData.location;
        // ...

        // Show the modal
        const editHostelModal = document.getElementById('editHostelModal');
        editHostelModal.classList.remove('hidden');
        editHostelModal.classList.add('flex');
    }

    // Function to close the modal
    function closeEditHostelModal() {
        const editHostelModal = document.getElementById('editHostelModal');
        editHostelModal.classList.add('hidden');
        editHostelModal.classList.remove('flex');
    }
</script>