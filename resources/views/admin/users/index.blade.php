
@extends('layouts.admin') 
@section('content')


<section class="content-wrapper">
    <div class="container-fluid">
        <a href="{{route('admin.users.create')}}" class="btn btn-info"><i class="mdi mdi-plus"></i>
            {{__('Add User')}}</a>
    </div>
    <div class="row mt-5">
    <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">User List</p>
                    <div class="table-responsive">
                        <table id="userTable" class="table">
                            <thead>
                                <tr>
                                <th>RN</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Profile</th>
                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if($userData->isEmpty())
        <p>No users available.</p>
    @else
    @foreach($userData as $user)
                    <tr>
                        <td>{{ $user['id'] }}</td>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ $user['phone'] }}</td>
                        <td>{{ $user['role'] }}</td>
                        @if($user['profile'] == null)
                        <td>N/A</td>
                        @else

                        <td>{{ $user['profile'] }}</td>
                        @endif
                        <td class="flex items-center justify-center space-x-2">
                            <div class="h-6 w-6 items-center rounded bg-gray-300">
                            <a href="{{ route('admin.users.edit', ['id' => $user['id']]) }}" class="items-center text-center" title="Edit"><i class="mdi mdi-border-color text-blue-500 text-lg"></i></a>
                            </div>
                            <div class="h-6 w-6 items-center rounded bg-gray-300">
                            <a href="#" onclick="openEditUserModal('{{ $user['id'] }}')" class="items-center text-center" title="View"><i class="mdi mdi-eye text-lg text-gray-500 text-center"></i></a>
                            </div>
                            <div class="h-6 w-6 items-center rounded bg-gray-300">
                            <a href="{{ route('admin.users.destroy', ['id' => $user['id']]) }}" class="items-center text-center" title="Delete" onclick="return confirm('Are you sure you want to delete this user?')"><i class="mdi mdi-delete text-red-500 text-lg"></i></a>
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

    <!-- Edit user Modal -->
<div id="editUserModal" class="fixed inset-0 overflow-y-auto hidden">
<div class="flex items-center justify-center pt-4 px-4 pb-20 text-center sm:block sm:p-0">
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
                    Edit user
                </h3>
            </div>

            <!-- Modal Body -->
            <div class="p-6">
                <!-- Add your form elements for editing user details here -->
                <!-- For example, you might have input fields for name, location, capacity, etc. -->
                <<form>
                    <input type="text" name="name" value="vdvdv">
                </form>

                <!-- Save and Cancel Buttons -->
                <div class="mt-4 flex justify-end">
                    <button class="bg-blue-300 text-white py-2 px-4 rounded mr-2">Save Changes</button>
                    <button id="closeEditUserModal" class="text-gray-600 hover:text-gray-800 py-2 px-4 rounded">Cancel</button>
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
    function openEditUserModal(userId) {
        // Fetch user data based on hostelId (you might need an AJAX request here)
        // For simplicity, let's assume you have the user data in a variable called hostelData

        // Update modal content with user data (modify as needed)
        // document.getElementById('hostelNameInput').value = hostelData.name;
        // document.getElementById('hostelLocationInput').value = hostelData.location;
        // ...

        // Show the modal
        const editUserModal = document.getElementById('editUserModal');
        editUserModal.classList.remove('hidden');
        editUserModal.classList.add('flex');
    }

    // Function to close the modal
    function closeEditUserModal() {
        const editUserModal = document.getElementById('editUserModal');
        editUserModal.classList.add('hidden');
        editUserModal.classList.remove('flex');
    }
</script>