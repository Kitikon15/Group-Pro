<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::all();
        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|string|unique:settings',
            'name' => 'required|string|max:255',
            'value' => 'nullable|string',
            'type' => 'required|string|in:string,text,boolean,integer',
            'description' => 'nullable|string',
        ]);

        Setting::create($request->all());

        return redirect()->route('admin.settings.index')
                         ->with('success', 'เพิ่มการตั้งค่าเรียบร้อยแล้ว');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $setting = Setting::findOrFail($id);
        return view('admin.settings.show', compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $setting = Setting::findOrFail($id);
        return view('admin.settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $setting = Setting::findOrFail($id);
        
        $request->validate([
            'key' => 'required|string|unique:settings,key,' . $setting->id,
            'name' => 'required|string|max:255',
            'value' => 'nullable|string',
            'type' => 'required|string|in:string,text,boolean,integer',
            'description' => 'nullable|string',
        ]);

        $setting->update($request->all());

        return redirect()->route('admin.settings.index')
                         ->with('success', 'อัปเดตการตั้งค่าเรียบร้อยแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $setting = Setting::findOrFail($id);
        $setting->delete();

        return redirect()->route('admin.settings.index')
                         ->with('success', 'ลบการตั้งค่าเรียบร้อยแล้ว');
    }
}