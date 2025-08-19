@extends('layouts.app')

@section('title', 'Register')
@section('bg-style', "background-image: url('/images/NEW-WEB-APP-BG.jpg');")
@section('content')
<div class="flex items-center justify-center min-h-screen px-4">
    <div class="w-full max-w-4xl bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-center text-red-700 mb-6">Register</h2>

        {{-- Error Message --}}
        @if(session('error'))
            <div class="mb-4 p-3 text-sm text-red-700 bg-red-100 border border-red-400 rounded">
                {{ session('error') }}
            </div>
        @endif

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="mb-4 p-3 text-sm text-red-700 bg-red-100 border border-red-400 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @csrf

            <!-- First Column -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                <input type="text" name="first_name" value="{{ old('first_name') }}" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-700">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Middle Name</label>
                <input type="text" name="middle_name" value="{{ old('middle_name') }}" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-700">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                <input type="text" name="last_name" value="{{ old('last_name') }}" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-700">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                <input type="text" name="address" value="{{ old('address') }}" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-700">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Contact Number</label>
                <input type="text" name="contact_number" value="{{ old('contact_number') }}" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-700">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-700">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                <input type="text" name="username" value="{{ old('username') }}" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-700">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-700">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                <input type="password" name="password_confirmation" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-700">
            </div>

            <!-- Full Width Button -->
            <div class="md:col-span-2">
                <button type="submit" class="w-full bg-red-700 text-white py-2 rounded hover:bg-red-800 transition">
                    Register
                </button>
                <div class="text-center text-sm mt-4">
                    Already have an account? <a href="{{ route('login') }}" class="text-red-700 hover:underline">Login here</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
