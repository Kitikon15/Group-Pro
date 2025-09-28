@extends('admin.layout')

@section('content')
<div class="content-card">
    <div class="card-header">
        <div class="card-title">จัดการบุคลากร</div>
        <a href="{{ route('admin.personnels.create') }}" class="btn btn-primary">เพิ่มข้อมูลและแก้ไข</a>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <table>
        <thead>
            <tr>
                <th>ชื่อ-นามสกุล</th>
                <th>ตำแหน่ง</th>
                <th>อีเมล</th>
                <th>สถานะ</th>
                <th>การจัดการ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($personnels as $personnel)
            <tr>
                <td>{{ $personnel->name }}</td>
                <td>{{ $personnel->position }}</td>
                <td>{{ $personnel->email ?? '-' }}</td>
                <td>
                    @if($personnel->status == 'ทำงาน')
                        <span class="status status-active">{{ $personnel->status }}</span>
                    @else
                        <span class="status status-pending">{{ $personnel->status }}</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.personnels.edit', $personnel->id) }}" class="btn btn-sm btn-primary">แก้ไข</a>
                    <form action="{{ route('admin.personnels.destroy', $personnel->id) }}" method="POST" style="display: inline;">
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