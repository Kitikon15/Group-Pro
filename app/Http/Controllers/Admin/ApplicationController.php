<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of applications.
     */
    public function index()
    {
        $applications = Application::latest()->get();
        return view('admin.applications.index', compact('applications'));
    }

    /**
     * Show the form for creating a new application.
     */
    public function create()
    {
        return view('admin.applications.create');
    }

    /**
     * Store a newly created application in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'id_card' => 'required|string|max:13',
            'birth_date' => 'required|date',
            'address' => 'required|string',
            'province' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'education_level' => 'required|string|max:255',
            'school_name' => 'required|string|max:255',
            'gpa' => 'required|numeric|min:0|max:4',
            'graduation_year' => 'required|integer',
            'faculty' => 'required|string|max:255',
            'program' => 'required|string|max:255',
            'status' => 'required|string|in:pending,approved,rejected',
            'admin_notes' => 'nullable|string',
        ]);

        Application::create($validatedData);

        return redirect()->route('admin.applications.index')
                         ->with('success', 'เพิ่มใบสมัครเรียบร้อยแล้ว');
    }

    /**
     * Display the specified application.
     */
    public function show(Application $application)
    {
        return view('admin.applications.show', compact('application'));
    }

    /**
     * Show the form for editing the specified application.
     */
    public function edit(Application $application)
    {
        return view('admin.applications.edit', compact('application'));
    }

    /**
     * Update the specified application in storage.
     */
    public function update(Request $request, Application $application)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'id_card' => 'required|string|max:13',
            'birth_date' => 'required|date',
            'address' => 'required|string',
            'province' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'education_level' => 'required|string|max:255',
            'school_name' => 'required|string|max:255',
            'gpa' => 'required|numeric|min:0|max:4',
            'graduation_year' => 'required|integer',
            'faculty' => 'required|string|max:255',
            'program' => 'required|string|max:255',
            'status' => 'required|string|in:pending,approved,rejected',
            'admin_notes' => 'nullable|string',
        ]);

        $application->update($validatedData);

        return redirect()->route('admin.applications.index')
                         ->with('success', 'อัปเดตใบสมัครเรียบร้อยแล้ว');
    }

    /**
     * Remove the specified application from storage.
     */
    public function destroy(Application $application)
    {
        $application->delete();

        return redirect()->route('admin.applications.index')
                         ->with('success', 'ลบใบสมัครเรียบร้อยแล้ว');
    }

    /**
     * Update the status of an application.
     */
    public function updateStatus(Request $request, Application $application)
    {
        $validatedData = $request->validate([
            'status' => 'required|string|in:pending,approved,rejected',
            'admin_notes' => 'nullable|string',
        ]);

        $application->update($validatedData);

        return redirect()->route('admin.applications.index')
                         ->with('success', 'อัปเดตสถานะใบสมัครเรียบร้อยแล้ว');
    }
}