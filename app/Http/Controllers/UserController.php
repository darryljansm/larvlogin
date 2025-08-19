<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // No need to pass $users here
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'        => 'required|string|max:100',
            'middle_name'       => 'nullable|string|max:100',
            'last_name'         => 'required|string|max:100',
            'address'           => 'nullable|string|max:500',
            'contact_no'        => 'nullable|string|max:50',
            'username'          => 'required|string|max:30|unique:users',
            'email'             => 'required|email|max:255|unique:users',
            'password'          => 'required|string|min:8|confirmed',
            'user_type'         => 'required|string|in:admin,user',
        ]);

        User::create([
            'first_name'      => $request->first_name,
            'middle_name'     => $request->middle_name,
            'last_name'       => $request->last_name,
            'address'         => $request->address,
            'contact_no'      => $request->contact_no,
            'username'        => $request->username,
            'email'           => $request->email,
            'password'        => Hash::make($request->password), // Hashing here
            'user_type'       => $request->user_type,
        ]);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name'  => 'required|string|max:100',
            'middle_name' => 'nullable|string|max:100',
            'last_name'   => 'required|string|max:100',
            'address'     => 'nullable|string|max:500',
            'contact_no'  => 'nullable|string|max:50',
            'username'    => 'required|string|max:30|unique:users,username,' . $user->id,
            'email'       => 'required|email|max:255|unique:users,email,' . $user->id,
            'user_type'   => 'required|string|in:admin,user',
        ]);

        $user->update([
            'first_name'  => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name'   => $request->last_name,
            'address'     => $request->address,
            'contact_no'  => $request->contact_no,
            'username'    => $request->username,
            'email'       => $request->email,
            'user_type'   => $request->user_type,
        ]);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User updated successfully.');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->deleted_by = auth()->id();
        $user->save();

        $user->delete(); // soft delete
    }
}
