@extends('admin.layout')

@section('title', 'ดูรายละเอียดใบสมัคร')

@section('content')
<div class="page-title">
    <span>ดูรายละเอียดใบสมัคร</span>
    <div>
        <a href="{{ route('admin.applications.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> กลับ
        </a>
    </div>
</div>

<div class="content-card">
    <div class="card-header">
        <div class="card-title">รายละเอียดใบสมัคร</div>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="row">
        <div class="col-md-6">
            <h3>ข้อมูลส่วนตัว</h3>
            <table class="table-details">
                <tr>
                    <th>คำนำหน้าชื่อ:</th>
                    <td>{{ $application->title }}</td>
                </tr>
                <tr>
                    <th>ชื่อ:</th>
                    <td>{{ $application->first_name }}</td>
                </tr>
                <tr>
                    <th>นามสกุล:</th>
                    <td>{{ $application->last_name }}</td>
                </tr>
                <tr>
                    <th>เพศ:</th>
                    <td>{{ $application->gender }}</td>
                </tr>
                <tr>
                    <th>เลขบัตรประชาชน:</th>
                    <td>{{ $application->id_card }}</td>
                </tr>
                <tr>
                    <th>วัน/เดือน/ปี เกิด:</th>
                    <td>{{ $application->birth_date->format('d/m/Y') }}</td>
                </tr>
            </table>
        </div>
        
        <div class="col-md-6">
            <h3>ข้อมูลการติดต่อ</h3>
            <table class="table-details">
                <tr>
                    <th>ที่อยู่:</th>
                    <td>{{ $application->address }}</td>
                </tr>
                <tr>
                    <th>จังหวัด:</th>
                    <td>{{ $application->province }}</td>
                </tr>
                <tr>
                    <th>รหัสไปรษณีย์:</th>
                    <td>{{ $application->postal_code }}</td>
                </tr>
                <tr>
                    <th>เบอร์โทรศัพท์:</th>
                    <td>{{ $application->phone }}</td>
                </tr>
                <tr>
                    <th>อีเมล:</th>
                    <td>{{ $application->email }}</td>
                </tr>
            </table>
        </div>
    </div>
    
    <div class="row mt-4">
        <div class="col-md-6">
            <h3>ข้อมูลการศึกษา</h3>
            <table class="table-details">
                <tr>
                    <th>ระดับการศึกษา:</th>
                    <td>{{ $application->education_level }}</td>
                </tr>
                <tr>
                    <th>ชื่อสถานศึกษา:</th>
                    <td>{{ $application->school_name }}</td>
                </tr>
                <tr>
                    <th>เกรดเฉลี่ยสะสม:</th>
                    <td>{{ $application->gpa }}</td>
                </tr>
                <tr>
                    <th>ปีที่จบการศึกษา:</th>
                    <td>{{ $application->graduation_year }}</td>
                </tr>
            </table>
        </div>
        
        <div class="col-md-6">
            <h3>คณะและสาขาวิชาที่สนใจ</h3>
            <table class="table-details">
                <tr>
                    <th>คณะที่สนใจ:</th>
                    <td>{{ $application->faculty }}</td>
                </tr>
                <tr>
                    <th>สาขาวิชาที่สนใจ:</th>
                    <td>{{ $application->program }}</td>
                </tr>
                <tr>
                    <th>สถานะ:</th>
                    <td>
                        @if($application->status == 'pending')
                            <span class="status status-pending">รอการตรวจสอบ</span>
                        @elseif($application->status == 'approved')
                            <span class="status status-active">อนุมัติ</span>
                        @else
                            <span class="status status-danger">ไม่อนุมัติ</span>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>
    
    <div class="row mt-4">
        <div class="col-12">
            <h3>บันทึกของผู้ดูแลระบบ</h3>
            <div class="form-group">
                <form method="POST" action="{{ route('admin.applications.updateStatus', $application) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="status">สถานะ:</label>
                        <select name="status" id="status" class="form-control">
                            <option value="pending" {{ $application->status == 'pending' ? 'selected' : '' }}>รอการตรวจสอบ</option>
                            <option value="approved" {{ $application->status == 'approved' ? 'selected' : '' }}>อนุมัติ</option>
                            <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>ไม่อนุมัติ</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="admin_notes">บันทึกของผู้ดูแลระบบ:</label>
                        <textarea name="admin_notes" id="admin_notes" class="form-control" rows="3">{{ $application->admin_notes }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">อัปเดตสถานะ</button>
                </form>
            </div>
        </div>
    </div>
    
    <div class="mt-4">
        <a href="{{ route('admin.applications.edit', $application) }}" class="btn btn-primary">
            <i class="fas fa-edit"></i> แก้ไขใบสมัคร
        </a>
        <a href="{{ route('admin.applications.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> กลับไปยังรายการ
        </a>
    </div>
</div>
@endsection