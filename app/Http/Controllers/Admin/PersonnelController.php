<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Personnel;
use Illuminate\Http\Request;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personnels = Personnel::latest()->get();
        return view('admin.personnels.index', compact('personnels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.personnels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'image_url' => 'nullable|url',
            'status' => 'required|string',
        ]);

        Personnel::create($request->all());

        return redirect()->route('admin.personnels.index')
                         ->with('success', 'เพิ่มบุคลากรเรียบร้อยแล้ว');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $personnel = Personnel::findOrFail($id);
        return view('admin.personnels.show', compact('personnel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $personnel = Personnel::findOrFail($id);
        return view('admin.personnels.edit', compact('personnel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'image_url' => 'nullable|url',
            'status' => 'required|string',
        ]);

        $personnel = Personnel::findOrFail($id);
        $personnel->update($request->all());

        return redirect()->route('admin.personnels.index')
                         ->with('success', 'อัปเดตบุคลากรเรียบร้อยแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $personnel = Personnel::findOrFail($id);
        $personnel->delete();

        return redirect()->route('admin.personnels.index')
                         ->with('success', 'ลบบุคลากรเรียบร้อยแล้ว');
    }
}