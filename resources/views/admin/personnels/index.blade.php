@extends('admin.layout')

@section('title', 'จัดการบุคลากร')

@section('content')
<div class="page-title">
    <span>จัดการบุคลากร</span>
    <div>
        <a href="{{ route('admin.personnels.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> เพิ่มบุคลากร
        </a>
        <button class="btn btn-secondary btn-sm" onclick="location.reload()">
            <i class="fas fa-sync-alt"></i> รีเฟรช
        </button>
    </div>
</div>

<div class="content-card">
    <div class="card-header">
        <div class="card-title">รายการบุคลากร</div>
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
                    <th>ชื่อ-นามสกุล</th>
                    <th>ตำแหน่ง</th>
                    <th>อีเมล</th>
                    <th>สถานะ</th>
                    <th>การดำเนินการ</th>
                </tr>
            </thead>
            <tbody>
                @forelse($personnels as $personnel)
                <tr>
                    <td>{{ $personnel->name }}</td>
                    <td>{{ $personnel->position }}</td>
                    <td>{{ $personnel->email }}</td>
                    <td>
                        @if($personnel->status == 'ทำงาน')
                            <span class="status status-active">ทำงาน</span>
                        @else
                            <span class="status status-pending">ลาออก</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.personnels.edit', $personnel) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i> แก้ไข
                        </a>
                        <form action="{{ route('admin.personnels.destroy', $personnel) }}" method="POST" style="display: inline-block;">
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
                    <td colspan="5" class="text-center">ไม่พบข้อมูลบุคลากร</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection