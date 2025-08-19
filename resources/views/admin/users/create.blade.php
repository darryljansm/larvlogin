@extends('layouts.admin')

@section('title', 'Add New User')

@section('content')

    @section('breadcrumbs')
        <nav class="text-sm text-gray-600" aria-label="Breadcrumb">
            <ol class="list-reset flex space-x-2">
                <li><a href="#" class="text-red-600 hover:underline">Home</a></li>
                <li>/</li>
                <li><a href="{{ route('admin.users.index') }}" class="text-red-600 hover:underline">Users</a></li>
                <li>/</li>
                <li class="text-gray-500">Add New User</li>
            </ol>
        </nav>
    @endsection

    <div class="">
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
        <form action="{{ route('admin.users.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @csrf

            {{-- Personal Information --}}
            <div>
                <h2 class="text-lg font-semibold mb-4">Personal Information</h2>

                <div class="mb-4">
                    <label for="first_name" class="block font-medium text-gray-700">First Name</label>
                    <input type="text" id="first_name" name="first_name"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-500" value="{{ old('first_name') }}" required>
                </div>

                <div class="mb-4">
                    <label for="middle_name" class="block font-medium text-gray-700">Middle Name</label>
                    <input type="text" id="middle_name" name="middle_name"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-500" value="{{ old('middle_name') }}">
                </div>

                <div class="mb-4">
                    <label for="last_name" class="block font-medium text-gray-700">Last Name</label>
                    <input type="text" id="last_name" name="last_name"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-500" value="{{ old('last_name') }}" required>
                </div>

                <div class="mb-4">
                    <label for="address" class="block font-medium text-gray-700">Address</label>
                    <input type="text" id="address" name="address"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-500" value="{{ old('address') }}">
                </div>

                <div class="mb-4">
                    <label for="contact_no" class="block font-medium text-gray-700">Contact Number</label>
                    <input type="text" id="contact_no" name="contact_no"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-500" value="{{ old('contact_no') }}">
                </div>
            </div>

            {{-- Account Information --}}
            <div>
                <h2 class="text-lg font-semibold mb-4">Account Information</h2>

                <div class="mb-4">
                    <label for="email" class="block font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-500" value="{{ old('email') }}" required>
                </div>

                <div class="mb-4">
                    <label for="username" class="block font-medium text-gray-700">Username</label>
                    <input type="text" id="username" name="username"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-500" value="{{ old('username') }}">
                </div>

                <div class="mb-4">
                    <label for="password" class="block font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-500">
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block font-medium text-gray-700">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-500">
                </div>

                <div class="mb-4">
                    <label for="user_type" class="block font-medium text-gray-700">User Type</label>
                    <select id="user_type" name="user_type"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-500">
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>

            </div>

            {{-- Submit Button --}}
            <div class="md:col-span-2 flex justify-end">
                <button type="submit"
                    class="px-5 py-2 bg-red-700 text-white rounded hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-500">
                    Create User
                </button>
            </div>
        </form>

    </div>

@endsection
