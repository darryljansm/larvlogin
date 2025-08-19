<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EncodingBuildingPermitController;
use App\Http\Middleware\NoCache;

// Public homepage
Route::get('/', fn () => view('welcome'));

// Guest-only routes (for users not logged in)
Route::middleware('guest')->group(function () {
    // Login
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

    // Register
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
});

// Authenticated-only routes (for logged in users)
Route::middleware(['auth', NoCache::class])->group(function () {
    // Dashboard
    Route::get('/dashboard', fn () => view('admin.dashboard'))->name('dashboard');

    // Users management
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('users', UserController::class);
    });
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('building-permit', EncodingBuildingPermitController::class);
    });
});
