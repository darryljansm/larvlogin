@extends('layouts.admin')

@section('title', 'Create Building Permit')

@section('content')

    @section('breadcrumbs')
        <nav class="text-sm text-gray-600" aria-label="Breadcrumb">
            <ol class="list-reset flex space-x-2">
                <li><a href="#" class="text-red-600 hover:underline">Home</a></li>
                <li>/</li>
                <li class="text-gray-500">Encoding</li>
                <li>/</li>
                <li><a href="{{ route('admin.building-permit.index') }}" class="text-red-600 hover:underline">Buiding Permit</a></li>
                <li>/</li>
                <li class="text-gray-500">Add New</li>
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

        <form action="{{ route('admin.building-permit.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @csrf

            <div>

                <div class="mb-4">
                    <label for="application_number" class="block font-medium text-gray-700">Application Number</label>
                    <input type="text" id="application_number" name="application_number"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-500" value="{{ old('application_number') }}" required>
                </div>

                <div class="mb-4">
                    <label for="application_date" class="block font-medium text-gray-700">Application Date</label>
                    <input type="text" id="application_date" name="application_date"
                        class="datepicker mt-1 block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-500" value="{{ old('application_date') }}" required>
                </div>

                <div class="mb-4">
                    <label for="date_issued" class="block font-medium text-gray-700">Date Issued</label>
                    <input type="text" id="date_issued" name="date_issued"
                        class="datepicker mt-1 block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-500" value="{{ old('date_issued') }}" required>
                </div>

                <div class="mb-4">
                    <label for="location" class="block font-medium text-gray-700">Location</label>
                    <input type="text" id="location" name="location"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-500" value="{{ old('location') }}" required>
                </div>

                <div class="mb-4">
                    <label for="use_or_coc" class="block font-medium text-gray-700">Use or Character of Occupancy</label>
                    <input type="text" id="use_or_coc" name="use_or_coc"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-500" value="{{ old('use_or_coc') }}" required>
                </div>

                <div class="mb-4">
                    <label for="estimated_cost" class="block font-medium text-gray-700">Estimated Cost</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">₱</span>
                        <input type="number" step="0.01" min="0" id="estimated_cost" name="estimated_cost"
                            class="mt-1 block w-full pl-7 px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-500"
                            value="{{ old('estimated_cost') }}" required>
                    </div>
                </div>


            </div>


            <div>
                <div class="mb-4">
                    <label for="or_number" class="block font-medium text-gray-700">O.R. Number</label>
                    <input type="text" id="or_number" name="or_number"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-500" value="{{ old('or_number') }}" required>
                </div>

                <div class="mb-4">
                    <label for="building_permit_number" class="block font-medium text-gray-700">Building Permit Number</label>
                    <input type="text" id="building_permit_number" name="building_permit_number"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-500" value="{{ old('building_permit_number') }}" required>
                </div>

                <div class="mb-4">
                    <label for="applicant_name" class="block font-medium text-gray-700">Applicant Name</label>
                    <input type="text" id="applicant_name" name="applicant_name"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-500" value="{{ old('applicant_name') }}" required>
                </div>

                <div class="mb-4">
                    <label for="project_title" class="block font-medium text-gray-700">Project Title</label>
                    <input type="text" id="project_title" name="project_title"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-500" value="{{ old('project_title') }}" required>
                </div>

                <div class="mb-4">
                    <label for="area" class="block font-medium text-gray-700">Area</label>
                    <input type="text" id="area" name="area"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-500" value="{{ old('area') }}" required>
                </div>

                <div class="mb-4">
                    <label for="building_permit_fee" class="block font-medium text-gray-700">Building Permit Fee</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">₱</span>
                        <input type="number" step="0.01" min="0" id="building_permit_fee" name="building_permit_fee"
                            class="mt-1 block w-full pl-7 px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-500"
                            value="{{ old('building_permit_fee') }}" required>
                    </div>
                </div>
            </div>

            {{-- Submit Button --}}
            <div class="md:col-span-2 flex justify-end">
                <button type="submit"
                    class="px-5 py-2 bg-red-700 text-white rounded hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-500">
                    Add Record
                </button>
            </div>
        </form>


    </div>

@endsection

@push('powergrid')
    @vite('resources/js/powergrid-init.js')
@endpush

