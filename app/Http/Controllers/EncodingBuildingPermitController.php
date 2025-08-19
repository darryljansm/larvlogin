<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EncodingBuildingPermit;

class EncodingBuildingPermitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.encoding.building-permit.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.encoding.building-permit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form inputs
        $validated = $request->validate([
            'application_number' => 'required|string|max:255', // |unique:building_permits,application_number
            'application_date'   => 'required|date',
            'date_issued'        => 'required|date',
            'location'           => 'required|string|max:255',
            'use_or_coc'         => 'required|string|max:255',
            'estimated_cost'     => 'required|numeric|min:0',
            'or_number'          => 'required|string|max:255',
            'building_permit_number' => 'required|string|max:255', // |unique:building_permits,building_permit_number
            'applicant_name'     => 'required|string|max:255',
            'project_title'      => 'required|string|max:255',
            'area'               => 'required|string|max:255',
            'building_permit_fee'=> 'required|numeric|min:0',
        ]);

        // Store data in DB
        EncodingBuildingPermit::create($validated);

        // Redirect back with success message
        return redirect()
            ->route('admin.building-permit.index')
            ->with('success', 'Building Permit record has been added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
