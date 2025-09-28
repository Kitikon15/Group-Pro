@extends('admin.layout')

@section('content')
<div class="content-card">
    <div class="card-header">
        <div class="card-title">จัดการหลักสูตร</div>
        <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">เพิ่มข้อมูลและแก้ไข</a>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <table>
        <thead>
            <tr>
                <th>ชื่อหลักสูตร</th>
                <th>ระดับการศึกษา</th>
                <th>ระยะเวลา</th>
                <th>สถานะ</th>
                <th>การจัดการ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
            <tr>
                <td>{{ $course->name }}</td>
                <td>{{ $course->degree_type }}</td>
                <td>{{ $course->duration }} ปี</td>
                <td>
                    @if($course->status == 'เปิดรับ')
                        <span class="status status-active">{{ $course->status }}</span>
                    @else
                        <span class="status status-pending">{{ $course->status }}</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-sm btn-primary">แก้ไข</a>
                    <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('คุณแน่ใจหรือไม่?')">ลบ</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection