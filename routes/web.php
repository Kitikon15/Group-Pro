<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\PersonnelController;
use App\Http\Controllers\Admin\SettingController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

Route::get('/', function (\Illuminate\Http\Request $request) {
    // Check if user is already logged in as admin
    if (Auth::check()) {
        return redirect()->route('admin.dashboard');
    }
    
    return view('index');
});

Route::get('/welcome', function (\Illuminate\Http\Request $request) {
    // Check if user is already logged in as admin
    if (Auth::check()) {
        return redirect()->route('admin.dashboard');
    }
    
    return view('welcome');
});

// Admission route
Route::get('/admission', function () {
    // Check if user has already applied
    $hasApplied = session('has_applied', false);
    return view('admission', ['hasApplied' => $hasApplied]);
})->name('admission');

// Post-registration route
Route::get('/post-registration', function () {
    // Set session to indicate user has applied
    session(['has_applied' => true]);
    // Redirect to admission page
    return redirect()->route('admission');
})->name('post.registration');

// Application routes
Route::get('/application', function () {
    return view('application');
})->name('application');

Route::post('/application', function (\Illuminate\Http\Request $request) {
    // This is a placeholder for actual application processing logic
    // In a real application, you would save the data to database here
    
    // For demo purposes, create an admin user from the application data
    $userData = [
        'name' => $request->input('first_name', 'Admin User') . ' ' . $request->input('last_name', ''),
        'email' => $request->input('email', 'admin@example.com'),
        'password' => Hash::make('password123'), // Default password for demo
    ];
    
    // Check if user already exists
    $user = User::where('email', $userData['email'])->first();
    if (!$user) {
        $user = User::create($userData);
    }
    
    // Log in the user
    Auth::login($user);
    
    // Set session to indicate user has applied
    session(['has_applied' => true]);
    
    // Redirect to application success page
    return redirect()->route('application.success');
})->name('application.submit');

Route::get('/application/success', function () {
    return view('application-success');
})->name('application.success');

Route::get('/application/success/simple', function () {
    return view('application-success-simple');
})->name('application.success.simple');

// Admin authentication routes
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard')->middleware('admin');

// Admin resource routes
Route::middleware(['admin'])->group(function () {
    Route::resource('admin/news', NewsController::class)->names([
        'index' => 'admin.news.index',
        'create' => 'admin.news.create',
        'store' => 'admin.news.store',
        'show' => 'admin.news.show',
        'edit' => 'admin.news.edit',
        'update' => 'admin.news.update',
        'destroy' => 'admin.news.destroy',
    ]);
    
    Route::resource('admin/courses', CourseController::class)->names([
        'index' => 'admin.courses.index',
        'create' => 'admin.courses.create',
        'store' => 'admin.courses.store',
        'show' => 'admin.courses.show',
        'edit' => 'admin.courses.edit',
        'update' => 'admin.courses.update',
        'destroy' => 'admin.courses.destroy',
    ]);
    
    Route::resource('admin/personnels', PersonnelController::class)->names([
        'index' => 'admin.personnels.index',
        'create' => 'admin.personnels.create',
        'store' => 'admin.personnels.store',
        'show' => 'admin.personnels.show',
        'edit' => 'admin.personnels.edit',
        'update' => 'admin.personnels.update',
        'destroy' => 'admin.personnels.destroy',
    ]);
    
    Route::resource('admin/settings', SettingController::class)->names([
        'index' => 'admin.settings.index',
        'create' => 'admin.settings.create',
        'store' => 'admin.settings.store',
        'show' => 'admin.settings.show',
        'edit' => 'admin.settings.edit',
        'update' => 'admin.settings.update',
        'destroy' => 'admin.settings.destroy',
    ]);
    
    // Custom pages routes
    Route::get('/admin/custom/add', function () {
        return view('admin.custom.add-data');
    })->name('admin.custom.add');
    
    Route::get('/admin/custom/list', function () {
        return view('admin.custom.list-data');
    })->name('admin.custom.list');
});

// Clear application status (for testing)
Route::get('/clear-application', function () {
    session()->forget('has_applied');
    return redirect()->route('admission');
})->name('clear.application');

// Add home route
Route::get('/home', function () {
    return view('home');
})->name('home');
