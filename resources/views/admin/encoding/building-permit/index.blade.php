@extends('layouts.admin')

@section('title', 'Building Permits')

@section('content')

    @section('breadcrumbs')
        <nav class="text-sm text-gray-600" aria-label="Breadcrumb">
            <ol class="list-reset flex space-x-2">
                <li><a href="#" class="text-red-600 hover:underline">Home</a></li>
                <li>/</li>
                <li class="text-gray-500">Encoding</li>
                <li>/</li>
                <li class="text-gray-500">Buiding Permit</li>
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

        <div class="mb-4 mt-2 text-end">
            <a href="{{ route('admin.building-permit.create') }}" class="inline-block px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                <span class="fa fa-plus"></span> Add New
            </a>
        </div>

        @livewire('building-permits-table')



    </div>

@endsection

@push('powergrid')
    @vite('resources/js/powergrid-init.js')
@endpush

