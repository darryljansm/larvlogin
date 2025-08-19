@extends('layouts.admin')

@section('title', 'Users')

@section('content')

    @section('breadcrumbs')
        <nav class="text-sm text-gray-600" aria-label="Breadcrumb">
            <ol class="list-reset flex space-x-2">
                <li><a href="#" class="text-red-600 hover:underline">Home</a></li>
                <li>/</li>
                <li class="text-gray-500">Encoding</li>
                <li>/</li>
                <li class="text-gray-500">Occupancy Permit</li>
            </ol>
        </nav>
    @endsection

    <div class="overflow-x-auto">
        {{-- Success Message --}}
        @if(session('success'))
            <div class="mb-4 rounded-lg bg-green-100 border border-green-400 text-green-700 px-4 py-3">
                {{ session('success') }}
            </div>
        @endif

        {{-- @livewire('business-permit-table') --}}


    </div>

@endsection

@push('powergrid')
    @vite('resources/js/powergrid-init.js')
@endpush

