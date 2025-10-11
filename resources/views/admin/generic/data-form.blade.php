@extends('admin.layout')

@section('content')
<div class="content-card">
    <div class="card-header">
        <div class="card-title">
            <i class="fas fa-edit"></i>
            {{ $title ?? 'จัดการข้อมูล' }}
        </div>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif
    
    @if(session('error'))
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-triangle"></i> {{ session('error') }}
        </div>
    @endif
    
    <form method="POST" action="{{ $mode === 'create' ? route('admin.generic.data.store') : route('admin.generic.data.update', $item->id ?? 0) }}" enctype="multipart/form-data">
        @csrf
        @if($mode === 'edit')
            @method('PUT')
        @endif
        
        <input type="hidden" name="model" value="{{ $modelName }}">
        
        <div class="form-group">
            <label for="title">หัวข้อ</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $item->title ?? '') }}" required>
        </div>
        
        <div class="form-group">
            <label for="content">เนื้อหา</label>
            <textarea name="content" id="content" class="form-control" rows="6">{{ old('content', $item->content ?? '') }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="type">ประเภท</label>
            <select name="type" id="type" class="form-control">
                <option value="">เลือกประเภท</option>
                <option value="news" {{ (old('type', $item->type ?? '') == 'news') ? 'selected' : '' }}>ข่าวสาร</option>
                <option value="activity" {{ (old('type', $item->type ?? '') == 'activity') ? 'selected' : '' }}>กิจกรรม</option>
                <option value="announcement" {{ (old('type', $item->type ?? '') == 'announcement') ? 'selected' : '' }}>ประกาศ</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="status">สถานะ</label>
            <select name="status" id="status" class="form-control">
                <option value="">เลือกสถานะ</option>
                <option value="published" {{ (old('status', $item->status ?? '') == 'published') ? 'selected' : '' }}>เผยแพร่</option>
                <option value="draft" {{ (old('status', $item->status ?? '') == 'draft') ? 'selected' : '' }}>ร่าง</option>
                <option value="archived" {{ (old('status', $item->status ?? '') == 'archived') ? 'selected' : '' }}>เก็บถาวร</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="publish_date">วันที่เผยแพร่</label>
            <input type="date" name="publish_date" id="publish_date" class="form-control" value="{{ old('publish_date', $item->publish_date ?? '') }}">
        </div>
        
        <div class="form-group">
            <label for="image">รูปภาพ</label>
            <input type="file" name="image" id="image" class="form-control">
            @if(isset($item) && $item->image)
                <div class="mt-2">
                    <img src="{{ asset($item->image) }}" alt="Current Image" style="max-width: 200px; max-height: 200px;">
                </div>
            @endif
        </div>
        
        <div class="form-group" style="margin-top: 20px; display: flex; gap: 10px;">
            <a href="{{ route('admin.generic.data.index', ['model' => $modelName]) }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> กลับ
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> บันทึก
            </button>
        </div>
    </form>
</div>
@endsection