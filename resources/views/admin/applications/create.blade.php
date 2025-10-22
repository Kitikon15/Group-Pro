@extends('admin.layout')

@section('title', 'เพิ่มใบสมัคร')

@section('content')
<div class="page-title">
    <span>เพิ่มใบสมัคร</span>
    <div>
        <a href="{{ route('admin.applications.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> กลับ
        </a>
    </div>
</div>

<div class="content-card">
    <div class="card-header">
        <div class="card-title">ฟอร์มเพิ่มใบสมัคร</div>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <form method="POST" action="{{ route('admin.applications.store') }}">
        @csrf
        
        <div class="form-section">
            <h2><i class="fas fa-user"></i> ข้อมูลส่วนตัว</h2>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="title">คำนำหน้าชื่อ</label>
                    <select id="title" name="title" class="form-control" required>
                        <option value="">เลือกคำนำหน้า</option>
                        <option value="นาย">นาย</option>
                        <option value="นางสาว">นางสาว</option>
                        <option value="นาง">นาง</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="gender">เพศ</label>
                    <select id="gender" name="gender" class="form-control" required>
                        <option value="">เลือกเพศ</option>
                        <option value="ชาย">ชาย</option>
                        <option value="หญิง">หญิง</option>
                    </select>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="first_name">ชื่อ</label>
                    <input type="text" id="first_name" name="first_name" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="last_name">นามสกุล</label>
                    <input type="text" id="last_name" name="last_name" class="form-control" required>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="id_card">เลขบัตรประชาชน</label>
                    <input type="text" id="id_card" name="id_card" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="birth_date">วัน/เดือน/ปี เกิด</label>
                    <input type="date" id="birth_date" name="birth_date" class="form-control" required>
                </div>
            </div>
        </div>
        
        <div class="form-section">
            <h2><i class="fas fa-home"></i> ที่อยู่ตามทะเบียนบ้าน</h2>
            
            <div class="form-group">
                <label for="address">ที่อยู่</label>
                <textarea id="address" name="address" class="form-control" rows="3" required></textarea>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="province">จังหวัด</label>
                    <input type="text" id="province" name="province" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="postal_code">รหัสไปรษณีย์</label>
                    <input type="text" id="postal_code" name="postal_code" class="form-control" required>
                </div>
            </div>
        </div>
        
        <div class="form-section">
            <h2><i class="fas fa-phone"></i> ข้อมูลการติดต่อ</h2>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="phone">เบอร์โทรศัพท์</label>
                    <input type="tel" id="phone" name="phone" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="email">อีเมล</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
            </div>
        </div>
        
        <div class="form-section">
            <h2><i class="fas fa-graduation-cap"></i> ข้อมูลการศึกษา</h2>
            
            <div class="form-group">
                <label for="education_level">ระดับการศึกษา</label>
                <select id="education_level" name="education_level" class="form-control" required>
                    <option value="">เลือกระดับการศึกษา</option>
                    <option value="ม.6">มัธยมศึกษาตอนปลาย</option>
                    <option value="ปวช.">ประกาศนียบัตรวิชาชีพ</option>
                    <option value="ปวส.">ประกาศนียบัตรวิชาชีพชั้นสูง</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="school_name">ชื่อสถานศึกษา</label>
                <input type="text" id="school_name" name="school_name" class="form-control" required>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="gpa">เกรดเฉลี่ยสะสม</label>
                    <input type="number" id="gpa" name="gpa" class="form-control" step="0.01" min="0" max="4" required>
                </div>
                
                <div class="form-group">
                    <label for="graduation_year">ปีที่จบการศึกษา</label>
                    <input type="number" id="graduation_year" name="graduation_year" class="form-control" min="2000" max="2030" required>
                </div>
            </div>
        </div>
        
        <div class="form-section">
            <h2><i class="fas fa-university"></i> คณะและสาขาวิชาที่สนใจ</h2>
            
            <div class="form-group">
                <label for="faculty">คณะที่สนใจ</label>
                <select id="faculty" name="faculty" class="form-control" required>
                    <option value="">เลือกคณะที่สนใจ</option>
                    <option value="คณะวิทยาศาสตร์และเทคโนโลยี">คณะวิทยาศาสตร์และเทคโนโลยี</option>
                    <option value="คณะมนุษยศาสตร์และสังคมศาสตร์">คณะมนุษยศาสตร์และสังคมศาสตร์</option>
                    <option value="คณะครุศาสตร์">คณะครุศาสตร์</option>
                    <option value="คณะวิทยาการจัดการ">คณะวิทยาการจัดการ</option>
                    <option value="คณะศิลปกรรมศาสตร์">คณะศิลปกรรมศาสตร์</option>
                    <option value="คณะพยาบาลศาสตร์">คณะพยาบาลศาสตร์</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="program">สาขาวิชาที่สนใจ</label>
                <input type="text" id="program" name="program" class="form-control" required>
            </div>
        </div>
        
        <div class="form-section">
            <h2><i class="fas fa-check-circle"></i> สถานะใบสมัคร</h2>
            
            <div class="form-group">
                <label for="status">สถานะ</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="pending">รอการตรวจสอบ</option>
                    <option value="approved">อนุมัติ</option>
                    <option value="rejected">ไม่อนุมัติ</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="admin_notes">บันทึกของผู้ดูแลระบบ</label>
                <textarea id="admin_notes" name="admin_notes" class="form-control" rows="3"></textarea>
            </div>
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> บันทึกใบสมัคร
            </button>
            <a href="{{ route('admin.applications.index') }}" class="btn btn-secondary">
                <i class="fas fa-times"></i> ยกเลิก
            </a>
        </div>
    </form>
</div>
@endsection