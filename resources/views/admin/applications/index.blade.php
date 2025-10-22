@extends('admin.layout')

@section('title', 'จัดการใบสมัคร')

@section('content')
<div class="page-title">
    <span>จัดการใบสมัคร</span>
    <div>
        <button class="btn btn-secondary btn-sm" onclick="location.reload()">
            <i class="fas fa-sync-alt"></i> รีเฟรช
        </button>
    </div>
</div>

<div class="content-card">
    <div class="card-header">
        <div class="card-title">รายการใบสมัคร</div>
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
                    <th>คณะ/สาขาวิชา</th>
                    <th>วันที่สมัคร</th>
                    <th>สถานะ</th>
                    <th>การดำเนินการ</th>
                </tr>
            </thead>
            <tbody>
                @forelse($applications as $application)
                <tr>
                    <td>{{ $application->first_name }} {{ $application->last_name }}</td>
                    <td>{{ $application->faculty }} / {{ $application->program }}</td>
                    <td>{{ $application->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        @if($application->status == 'pending')
                            <span class="status status-pending">รอการตรวจสอบ</span>
                        @elseif($application->status == 'approved')
                            <span class="status status-active">อนุมัติ</span>
                        @else
                            <span class="status status-danger">ไม่อนุมัติ</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.applications.show', $application) }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-eye"></i> ดูรายละเอียด
                        </a>
                        <a href="{{ route('admin.applications.edit', $application) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i> แก้ไข
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">ไม่พบข้อมูลใบสมัคร</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection