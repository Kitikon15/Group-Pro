@extends('admin.layout')

@section('title', 'จัดการหลักสูตร')

@section('content')
<div class="page-title">
    <span>จัดการหลักสูตร</span>
    <div>
        <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> เพิ่มหลักสูตร
        </a>
        <button class="btn btn-secondary btn-sm" onclick="location.reload()">
            <i class="fas fa-sync-alt"></i> รีเฟรช
        </button>
    </div>
</div>

<div class="content-card">
    <div class="card-header">
        <div class="card-title">รายการหลักสูตร</div>
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
                    <th>ชื่อหลักสูตร</th>
                    <th>ระดับการศึกษา</th>
                    <th>ระยะเวลา</th>
                    <th>สถานะ</th>
                    <th>การดำเนินการ</th>
                </tr>
            </thead>
            <tbody>
                @forelse($courses as $course)
                <tr>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->degree_type }}</td>
                    <td>{{ $course->duration }} ปี</td>
                    <td>
                        @if($course->status == 'เปิดรับ')
                            <span class="status status-active">เปิดรับ</span>
                        @else
                            <span class="status status-pending">ปิดรับ</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i> แก้ไข
                        </a>
                        <form action="{{ route('admin.courses.destroy', $course) }}" method="POST" style="display: inline-block;">
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
                    <td colspan="5" class="text-center">ไม่พบข้อมูลหลักสูตร</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection