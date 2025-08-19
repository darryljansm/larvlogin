@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

    @section('breadcrumbs')
        <nav class="text-sm text-gray-600" aria-label="Breadcrumb">
            <ol class="list-reset flex space-x-2">
                <li><a href="#" class="text-red-600 hover:underline">Home</a></li>
                <li>/</li>
                <li class="text-gray-500">Dashboard</li>
            </ol>
        </nav>
    @endsection

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
        <!-- Sample Card 1 -->
        <div class="bg-white shadow rounded-lg p-5">
            <h2 class="text-lg font-semibold text-gray-700 mb-2">Total Users</h2>
            <p class="text-2xl font-bold text-red-600">1,245</p>
        </div>

        <!-- Sample Card 2 -->
        <div class="bg-white shadow rounded-lg p-5">
            <h2 class="text-lg font-semibold text-gray-700 mb-2">New Orders</h2>
            <p class="text-2xl font-bold text-red-600">82</p>
        </div>

        <!-- Sample Card 3 -->
        <div class="bg-white shadow rounded-lg p-5">
            <h2 class="text-lg font-semibold text-gray-700 mb-2">System Alerts</h2>
            <p class="text-2xl font-bold text-red-600">5</p>
        </div>
    </div>

@endsection
