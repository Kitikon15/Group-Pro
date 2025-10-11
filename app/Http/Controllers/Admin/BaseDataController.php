<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BaseDataController extends Controller
{
    protected $model;
    protected $viewPath;
    protected $routePrefix;
    protected $pageTitle;
    protected $columns;

    public function index()
    {
        $data = $this->model::latest()->get();
        
        return view('admin.generic.data-manager', [
            'data' => $data,
            'title' => $this->pageTitle,
            'columns' => $this->columns,
            'icon' => $this->getIcon()
        ]);
    }

    public function create()
    {
        return view("admin.{$this->viewPath}.create");
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate($this->getValidationRules());
        
        $this->model::create($validatedData);

        return redirect()->route("admin.{$this->routePrefix}.index")
                         ->with('success', "เพิ่ม{$this->getPageEntityName()}เรียบร้อยแล้ว");
    }

    public function show($id)
    {
        $item = $this->model::findOrFail($id);
        return view("admin.{$this->viewPath}.show", compact('item'));
    }

    public function edit($id)
    {
        $item = $this->model::findOrFail($id);
        return view("admin.{$this->viewPath}.edit", compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = $this->model::findOrFail($id);
        
        $validatedData = $request->validate($this->getValidationRules());
        
        $item->update($validatedData);

        return redirect()->route("admin.{$this->routePrefix}.index")
                         ->with('success', "อัปเดต{$this->getPageEntityName()}เรียบร้อยแล้ว");
    }

    public function destroy($id)
    {
        $item = $this->model::findOrFail($id);
        $item->delete();

        return redirect()->route("admin.{$this->routePrefix}.index")
                         ->with('success', "ลบ{$this->getPageEntityName()}เรียบร้อยแล้ว");
    }

    protected function getValidationRules()
    {
        // This should be overridden in child classes
        return [];
    }

    protected function getPageEntityName()
    {
        // This should be overridden in child classes
        return 'ข้อมูล';
    }

    protected function getIcon()
    {
        // This should be overridden in child classes or use default
        return 'fas fa-database';
    }
}