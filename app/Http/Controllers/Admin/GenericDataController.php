<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GenericDataController extends Controller
{
    public function index(Request $request)
    {
        // Get parameters from request
        $modelName = $request->get('model');
        $title = $request->get('title', 'จัดการข้อมูล');
        $icon = $request->get('icon', 'fas fa-database');
        
        // Convert model name to class
        $modelClass = 'App\\Models\\' . Str::studly($modelName);
        
        // Check if model exists
        if (!class_exists($modelClass)) {
            return redirect()->back()->with('error', 'ไม่พบโมเดลที่ระบุ');
        }
        
        // Get data
        $data = $modelClass::latest()->get();
        
        // Get columns from request or model
        $columns = $request->get('columns', []);
        
        // If no columns specified, try to get them from the model
        if (empty($columns)) {
            $modelInstance = new $modelClass();
            $fillable = $modelInstance->getFillable();
            
            // Create default columns based on fillable fields
            foreach ($fillable as $field) {
                $columns[] = [
                    'field' => $field,
                    'label' => $this->formatLabel($field),
                    'type' => $this->getFieldType($field)
                ];
            }
        }
        
        return view('admin.generic.data-manager', compact('data', 'title', 'icon', 'columns'));
    }
    
    public function create(Request $request)
    {
        $modelName = $request->get('model');
        $title = $request->get('title', 'เพิ่มข้อมูล');
        
        return view('admin.generic.data-form', [
            'modelName' => $modelName,
            'title' => $title,
            'mode' => 'create'
        ]);
    }
    
    public function store(Request $request)
    {
        $modelName = $request->get('model');
        $modelClass = 'App\\Models\\' . Str::studly($modelName);
        
        if (!class_exists($modelClass)) {
            return redirect()->back()->with('error', 'ไม่พบโมเดลที่ระบุ');
        }
        
        // Get validation rules from request or use default
        $rules = $request->get('rules', []);
        
        // Validate request
        $validatedData = $request->validate($rules);
        
        // Create record
        $modelClass::create($validatedData);
        
        return redirect()->route('admin.generic.data.index', [
            'model' => $modelName
        ])->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
    }
    
    public function edit(Request $request, $id)
    {
        $modelName = $request->get('model');
        $modelClass = 'App\\Models\\' . Str::studly($modelName);
        $title = $request->get('title', 'แก้ไขข้อมูล');
        
        if (!class_exists($modelClass)) {
            return redirect()->back()->with('error', 'ไม่พบโมเดลที่ระบุ');
        }
        
        $item = $modelClass::findOrFail($id);
        
        return view('admin.generic.data-form', [
            'modelName' => $modelName,
            'title' => $title,
            'mode' => 'edit',
            'item' => $item
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $modelName = $request->get('model');
        $modelClass = 'App\\Models\\' . Str::studly($modelName);
        
        if (!class_exists($modelClass)) {
            return redirect()->back()->with('error', 'ไม่พบโมเดลที่ระบุ');
        }
        
        $item = $modelClass::findOrFail($id);
        
        // Get validation rules from request or use default
        $rules = $request->get('rules', []);
        
        // Validate request
        $validatedData = $request->validate($rules);
        
        // Update record
        $item->update($validatedData);
        
        return redirect()->route('admin.generic.data.index', [
            'model' => $modelName
        ])->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
    }
    
    public function destroy(Request $request, $id)
    {
        $modelName = $request->get('model');
        $modelClass = 'App\\Models\\' . Str::studly($modelName);
        
        if (!class_exists($modelClass)) {
            return redirect()->back()->with('error', 'ไม่พบโมเดลที่ระบุ');
        }
        
        $item = $modelClass::findOrFail($id);
        $item->delete();
        
        return redirect()->route('admin.generic.data.index', [
            'model' => $modelName
        ])->with('success', 'ลบข้อมูลเรียบร้อยแล้ว');
    }
    
    private function formatLabel($field)
    {
        // Convert field name to readable label
        $label = str_replace(['_', '-'], ' ', $field);
        $label = ucwords($label);
        
        // Special cases
        $specialLabels = [
            'id' => 'ID',
            'title' => 'หัวข้อ',
            'name' => 'ชื่อ',
            'description' => 'คำอธิบาย',
            'content' => 'เนื้อหา',
            'image' => 'รูปภาพ',
            'status' => 'สถานะ',
            'created_at' => 'วันที่สร้าง',
            'updated_at' => 'วันที่อัปเดต',
            'publish_date' => 'วันที่เผยแพร่',
            'type' => 'ประเภท'
        ];
        
        return $specialLabels[$field] ?? $label;
    }
    
    private function getFieldType($field)
    {
        // Determine field type based on name
        $fieldTypes = [
            'image' => 'image',
            'content' => 'textarea',
            'description' => 'textarea',
            'status' => 'select',
            'publish_date' => 'date',
            'created_at' => 'date',
            'updated_at' => 'date'
        ];
        
        foreach ($fieldTypes as $key => $type) {
            if (strpos($field, $key) !== false) {
                return $type;
            }
        }
        
        return 'text';
    }
}