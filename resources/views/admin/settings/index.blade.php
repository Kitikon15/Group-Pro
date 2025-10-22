@extends('admin.layout')

@section('title', 'จัดการการตั้งค่า')

@section('content')
<div class="page-title">
    <span>จัดการการตั้งค่า</span>
    <div>
        <a href="{{ route('admin.settings.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> เพิ่มการตั้งค่า
        </a>
        <button class="btn btn-secondary btn-sm" onclick="location.reload()">
            <i class="fas fa-sync-alt"></i> รีเฟรช
        </button>
    </div>
</div>

<div class="content-card">
    <div class="card-header">
        <div class="card-title">รายการการตั้งค่า</div>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>ชื่อ</th>
                    <th>ค่า</th>
                    <th>ประเภท</th>
                    <th>การดำเนินการ</th>
                </tr>
            </thead>
            <tbody>
                @forelse($settings as $setting)
                <tr>
                    <td>{{ $setting->name }}</td>
                    <td>{{ $setting->value }}</td>
                    <td>{{ $setting->type }}</td>
                    <td>
                        <a href="{{ route('admin.settings.edit', $setting) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i> แก้ไข
                        </a>
                        <form action="{{ route('admin.settings.destroy', $setting) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('คุณแน่ใจหรือไม่ที่จะลบข้อมูลนี้?')">
                                <i class="fas fa-trash"></i> ลบ
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">ไม่พบข้อมูลการตั้งค่า</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection