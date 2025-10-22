<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class FrontendContentController extends Controller
{
    /**
     * Update content from frontend editor
     */
    public function updateContent(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'key' => 'required|string',
            'value' => 'required|string',
        ]);
        
        // Find or create the setting
        $setting = Setting::updateOrCreate(
            ['key' => $validatedData['key']],
            ['value' => $validatedData['value'], 'name' => $validatedData['key'], 'type' => 'content']
        );
        
        // Return success response
        return response()->json([
            'success' => true,
            'message' => 'บันทึกเนื้อหาเรียบร้อยแล้ว',
            'value' => $setting->value
        ]);
    }
}