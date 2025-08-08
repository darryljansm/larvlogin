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

    <div class="">
        @livewire('users-table')
    </div>

@endsection

@push('powergrid')
    @vite('resources/js/powergrid-init.js')
@endpush

