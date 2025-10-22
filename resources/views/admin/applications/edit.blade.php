@extends('admin.layout')

@section('title', 'แก้ไขใบสมัคร')

@section('content')
<div class="page-title">
    <span>แก้ไขใบสมัคร</span>
    <div>
        <a href="{{ route('admin.applications.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> กลับ
        </a>
    </div>
</div>

<div class="content-card">
    <div class="card-header">
        <div class="card-title">ฟอร์มแก้ไขใบสมัคร</div>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <form method="POST" action="{{ route('admin.applications.update', $application) }}">
        @csrf
        @method('PUT')
        
        <div class="form-section">
            <h2><i class="fas fa-user"></i> ข้อมูลส่วนตัว</h2>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="title">คำนำหน้าชื่อ</label>
                    <select id="title" name="title" class="form-control" required>
                        <option value="">เลือกคำนำหน้า</option>
                        <option value="นาย" {{ $application->title == 'นาย' ? 'selected' : '' }}>นาย</option>
                        <option value="นางสาว" {{ $application->title == 'นางสาว' ? 'selected' : '' }}>นางสาว</option>
                        <option value="นาง" {{ $application->title == 'นาง' ? 'selected' : '' }}>นาง</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="gender">เพศ</label>
                    <select id="gender" name="gender" class="form-control" required>
                        <option value="">เลือกเพศ</option>
                        <option value="ชาย" {{ $application->gender == 'ชาย' ? 'selected' : '' }}>ชาย</option>
                        <option value="หญิง" {{ $application->gender == 'หญิง' ? 'selected' : '' }}>หญิง</option>
                    </select>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="first_name">ชื่อ</label>
                    <input type="text" id="first_name" name="first_name" class="form-control" value="{{ $application->first_name }}" required>
                </div>
                
                <div class="form-group">
                    <label for="last_name">นามสกุล</label>
                    <input type="text" id="last_name" name="last_name" class="form-control" value="{{ $application->last_name }}" required>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="id_card">เลขบัตรประชาชน</label>
                    <input type="text" id="id_card" name="id_card" class="form-control" value="{{ $application->id_card }}" required>
                </div>
                
                <div class="form-group">
                    <label for="birth_date">วัน/เดือน/ปี เกิด</label>
                    <input type="date" id="birth_date" name="birth_date" class="form-control" value="{{ $application->birth_date->format('Y-m-d') }}" required>
                </div>
            </div>
        </div>
        
        <div class="form-section">
            <h2><i class="fas fa-home"></i> ที่อยู่ตามทะเบียนบ้าน</h2>
            
            <div class="form-group">
                <label for="address">ที่อยู่</label>
                <textarea id="address" name="address" class="form-control" rows="3" required>{{ $application->address }}</textarea>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="province">จังหวัด</label>
                    <input type="text" id="province" name="province" class="form-control" value="{{ $application->province }}" required>
                </div>
                
                <div class="form-group">
                    <label for="postal_code">รหัสไปรษณีย์</label>
                    <input type="text" id="postal_code" name="postal_code" class="form-control" value="{{ $application->postal_code }}" required>
                </div>
            </div>
        </div>
        
        <div class="form-section">
            <h2><i class="fas fa-phone"></i> ข้อมูลการติดต่อ</h2>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="phone">เบอร์โทรศัพท์</label>
                    <input type="tel" id="phone" name="phone" class="form-control" value="{{ $application->phone }}" required>
                </div>
                
                <div class="form-group">
                    <label for="email">อีเมล</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ $application->email }}" required>
                </div>
            </div>
        </div>
        
        <div class="form-section">
            <h2><i class="fas fa-graduation-cap"></i> ข้อมูลการศึกษา</h2>
            
            <div class="form-group">
                <label for="education_level">ระดับการศึกษา</label>
                <select id="education_level" name="education_level" class="form-control" required>
                    <option value="">เลือกระดับการศึกษา</option>
                    <option value="ม.6" {{ $application->education_level == 'ม.6' ? 'selected' : '' }}>มัธยมศึกษาตอนปลาย</option>
                    <option value="ปวช." {{ $application->education_level == 'ปวช.' ? 'selected' : '' }}>ประกาศนียบัตรวิชาชีพ</option>
                    <option value="ปวส." {{ $application->education_level == 'ปวส.' ? 'selected' : '' }}>ประกาศนียบัตรวิชาชีพชั้นสูง</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="school_name">ชื่อสถานศึกษา</label>
                <input type="text" id="school_name" name="school_name" class="form-control" value="{{ $application->school_name }}" required>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="gpa">เกรดเฉลี่ยสะสม</label>
                    <input type="number" id="gpa" name="gpa" class="form-control" step="0.01" min="0" max="4" value="{{ $application->gpa }}" required>
                </div>
                
                <div class="form-group">
                    <label for="graduation_year">ปีที่จบการศึกษา</label>
                    <input type="number" id="graduation_year" name="graduation_year" class="form-control" min="2000" max="2030" value="{{ $application->graduation_year }}" required>
                </div>
            </div>
        </div>
        
        <div class="form-section">
            <h2><i class="fas fa-university"></i> คณะและสาขาวิชาที่สนใจ</h2>
            
            <div class="form-group">
                <label for="faculty">คณะที่สนใจ</label>
                <select id="faculty" name="faculty" class="form-control" required>
                    <option value="">เลือกคณะที่สนใจ</option>
                    <option value="คณะวิทยาศาสตร์และเทคโนโลยี" {{ $application->faculty == 'คณะวิทยาศาสตร์และเทคโนโลยี' ? 'selected' : '' }}>คณะวิทยาศาสตร์และเทคโนโลยี</option>
                    <option value="คณะมนุษยศาสตร์และสังคมศาสตร์" {{ $application->faculty == 'คณะมนุษยศาสตร์และสังคมศาสตร์' ? 'selected' : '' }}>คณะมนุษยศาสตร์และสังคมศาสตร์</option>
                    <option value="คณะครุศาสตร์" {{ $application->faculty == 'คณะครุศาสตร์' ? 'selected' : '' }}>คณะครุศาสตร์</option>
                    <option value="คณะวิทยาการจัดการ" {{ $application->faculty == 'คณะวิทยาการจัดการ' ? 'selected' : '' }}>คณะวิทยาการจัดการ</option>
                    <option value="คณะศิลปกรรมศาสตร์" {{ $application->faculty == 'คณะศิลปกรรมศาสตร์' ? 'selected' : '' }}>คณะศิลปกรรมศาสตร์</option>
                    <option value="คณะพยาบาลศาสตร์" {{ $application->faculty == 'คณะพยาบาลศาสตร์' ? 'selected' : '' }}>คณะพยาบาลศาสตร์</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="program">สาขาวิชาที่สนใจ</label>
                <input type="text" id="program" name="program" class="form-control" value="{{ $application->program }}" required>
            </div>
        </div>
        
        <div class="form-section">
            <h2><i class="fas fa-check-circle"></i> สถานะใบสมัคร</h2>
            
            <div class="form-group">
                <label for="status">สถานะ</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="pending" {{ $application->status == 'pending' ? 'selected' : '' }}>รอการตรวจสอบ</option>
                    <option value="approved" {{ $application->status == 'approved' ? 'selected' : '' }}>อนุมัติ</option>
                    <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>ไม่อนุมัติ</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="admin_notes">บันทึกของผู้ดูแลระบบ</label>
                <textarea id="admin_notes" name="admin_notes" class="form-control" rows="3">{{ $application->admin_notes }}</textarea>
            </div>
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> บันทึกการเปลี่ยนแปลง
            </button>
            <a href="{{ route('admin.applications.index') }}" class="btn btn-secondary">
                <i class="fas fa-times"></i> ยกเลิก
            </a>
        </div>
    </form>
</div>
@endsection