<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends BaseDataController
{
    public function __construct()
    {
        $this->model = new News();
        $this->viewPath = 'news';
        $this->routePrefix = 'news';
        $this->pageTitle = 'จัดการข่าวสารและกิจกรรม';
        $this->columns = [
            ['field' => 'title', 'label' => 'หัวข้อ'],
            ['field' => 'type', 'label' => 'ประเภท'],
            ['field' => 'publish_date', 'label' => 'วันที่โพสต์'],
            ['field' => 'status', 'label' => 'สถานะ', 'type' => 'status'],
        ];
    }

    protected function getValidationRules()
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'type' => 'required|string',
            'publish_date' => 'required|date',
            'status' => 'required|string',
        ];
    }

    protected function getPageEntityName()
    {
        return 'ข่าวสาร';
    }

    protected function getIcon()
    {
        return 'fas fa-newspaper';
    }

    // Override index method to use existing view
    public function index()
    {
        $news = News::latest()->get();
        return view('admin.news.index', compact('news'));
    }
}