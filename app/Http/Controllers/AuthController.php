<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('error', 'Invalid username or password.');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'first_name'      => 'required|string|max:255',
            'middle_name'     => 'nullable|string|max:255',
            'last_name'       => 'required|string|max:255',
            'address'         => 'required|string|max:255',
            'contact_number'  => 'required|string|max:20',
            'email'           => 'required|string|email|max:255|unique:users',
            'username'        => 'required|string|max:255|unique:users',
            'password'        => 'required|string|min:8|confirmed',
        ]);

        $user = User::create(array_merge($validated, [
            'contact_no' => $validated['contact_number'],
            'password'   => Hash::make($validated['password']),
            'created_by' => 0, // 0 = self-registered
        ]));

        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
