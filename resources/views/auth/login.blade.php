@extends('layouts.app')

@section('title', 'Login')
@section('bg-style', "background-image: url('/images/NEW-WEB-APP-BG.jpg');")

@section('content')
<div class="min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md bg-white p-8 rounded-xl shadow-md border border-gray-200">
        <h2 class="text-2xl font-bold text-center text-red-700 mb-6">Login</h2>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="mb-4 p-3 text-sm text-green-700 bg-green-100 border border-green-400 rounded">
                {{ session('success') }}
            </div>
        @endif

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

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Username -->
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input id="username" name="username" type="text" required autofocus
                       class="mt-1 w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-1 focus:ring-red-700 focus:border-red-700">
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" name="password" type="password" required
                       class="mt-1 w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-1 focus:ring-red-700 focus:border-red-700">
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between mb-4">
                <label class="flex items-center text-sm text-gray-600">
                    <input type="checkbox" name="remember" class="mr-2">
                    Remember Me
                </label>
                {{-- <a href="{{ route('password.request') }}" class="text-sm text-red-700 hover:underline">
                    Forgot Password?
                </a> --}}
            </div>

            <!-- Submit Button -->
            <div class="mb-4">
                <button type="submit"
                        class="w-full bg-red-700 hover:bg-red-800 text-white py-2 px-4 rounded-lg transition">
                    Login
                </button>
            </div>
        </form>

        <p class="text-center text-sm text-gray-600">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-red-700 hover:underline">Register here</a>
        </p>
    </div>
</div>
@endsection
