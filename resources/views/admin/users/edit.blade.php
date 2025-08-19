@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')

    @section('breadcrumbs')
        <nav class="text-sm text-gray-600" aria-label="Breadcrumb">
            <ol class="list-reset flex space-x-2">
                <li><a href="#" class="text-red-600 hover:underline">Home</a></li>
                <li>/</li>
                <li><a href="{{ route('admin.users.index') }}" class="text-red-600 hover:underline">Users</a></li>
                <li>/</li>
                <li class="text-gray-500">Edit User</li>
            </ol>
        </nav>
    @endsection

    <div class="bg-white shadow rounded-lg p-6">
        {{-- Success Message --}}
        @if(session('success'))
            <div class="mb-4 rounded-lg bg-green-100 border border-green-400 text-green-700 px-4 py-3">
                {{ session('success') }}
            </div>
        @endif

        {{-- Error Messages --}}
        @if ($errors->any())
            <div class="mb-4 rounded-lg bg-red-100 border border-red-400 text-red-700 px-4 py-3">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="editForm" action="{{ route('admin.users.update', $user->id) }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @csrf
            @method('PUT')

            {{-- Personal Information --}}
            <div>
                <h2 class="text-lg font-semibold mb-4">Personal Information</h2>

                <div class="mb-4">
                    <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input type="text" id="first_name" name="first_name"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-500"
                        value="{{ old('first_name', $user->first_name) }}" required>
                </div>

                <div class="mb-4">
                    <label for="middle_name" class="block text-sm font-medium text-gray-700">Middle Name</label>
                    <input type="text" id="middle_name" name="middle_name"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-500"
                        value="{{ old('middle_name', $user->middle_name) }}">
                </div>

                <div class="mb-4">
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input type="text" id="last_name" name="last_name"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-500"
                        value="{{ old('last_name', $user->last_name) }}" required>
                </div>

                <div class="mb-4">
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <input type="text" id="address" name="address"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-500"
                        value="{{ old('address', $user->address) }}">
                </div>

                <div class="mb-4">
                    <label for="contact_no" class="block text-sm font-medium text-gray-700">Contact Number</label>
                    <input type="text" id="contact_no" name="contact_no"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-500"
                        value="{{ old('contact_no', $user->contact_no) }}">
                </div>
            </div>

            {{-- Account Information --}}
            <div>
                <h2 class="text-lg font-semibold mb-4">Account Information</h2>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-500"
                        value="{{ old('email', $user->email) }}" required>
                </div>

                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" id="username" name="username"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-500"
                        value="{{ old('username', $user->username) }}">
                </div>

                <div class="mb-4">
                    <label for="user_type" class="block text-sm font-medium text-gray-700">User Type</label>
                    <select id="user_type" name="user_type"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-500">
                        <option value="admin" {{ old('user_type', $user->user_type) === 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="user" {{ old('user_type', $user->user_type) === 'user' ? 'selected' : '' }}>User</option>
                    </select>
                </div>

            </div>

            {{-- Submit Button --}}
            <div class="md:col-span-2 flex justify-end">
                <button type="submit"
                    class="px-5 py-2 bg-red-700 text-white rounded hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-500">
                    Update User
                </button>
            </div>
        </form>

    </div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('editForm');
        const initialData = new FormData(form);

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            const currentData = new FormData(form);
            let changed = false;

            for (let [key, value] of currentData.entries()) {
                if (value !== initialData.get(key)) {
                    changed = true;
                    break;
                }
            }

            if (!changed) {
                Swal.fire({
                    icon: 'error',
                    title: 'No changes detected',
                    text: 'Please modify something before updating.',
                });
                return;
            }

            Swal.fire({
                title: 'Confirm Update',
                text: "Are you sure you want to update this user?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Yes, update it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });

    });
</script>
@endsection
