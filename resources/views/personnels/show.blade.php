@extends('layouts.app')

@section('content')
<div class="container">
    <div class="breadcrumb">
        <a href="{{ route('home') }}">หน้าหลัก</a>
        <span class="separator">/</span>
        <a href="{{ route('personnels.index') }}">บุคลากร</a>
        <span class="separator">/</span>
        <span>{{ $personnel->name }}</span>
    </div>

    <div class="personnel-detail-header">
        <div class="personnel-image-large">
            @if($personnel->image_url)
                <img src="{{ $personnel->image_url }}" alt="{{ $personnel->name }}">
            @else
                <div class="placeholder-image">
                    <i class="fas fa-user"></i>
                </div>
            @endif
        </div>
        <div class="personnel-basic-info">
            <h1>{{ $personnel->name }}</h1>
            <p class="position">{{ $personnel->position }}</p>
            <div class="contact-info">
                @if($personnel->email)
                    <p><i class="fas fa-envelope"></i> {{ $personnel->email }}</p>
                @endif
                @if($personnel->phone)
                    <p><i class="fas fa-phone"></i> {{ $personnel->phone }}</p>
                @endif
            </div>
            <div class="status-badge 
                {{ $personnel->status == 'ทำงาน' ? 'status-active' : 'status-pending' }}">
                {{ $personnel->status }}
            </div>
        </div>
    </div>

    <div class="personnel-content">
        <div class="personnel-main-content">
            <div class="content-section">
                <h2><i class="fas fa-info-circle"></i> ข้อมูลส่วนตัว</h2>
                <div class="content-body">
                    @if($personnel->bio)
                        <p>{{ $personnel->bio }}</p>
                    @else
                        <p>ยังไม่มีข้อมูลชีวประวัติ</p>
                    @endif
                </div>
            </div>

            <div class="content-section">
                <h2><i class="fas fa-graduation-cap"></i> ประวัติการศึกษา</h2>
                <div class="content-body">
                    <ul class="education-list">
                        <li>ปริญญาเอก วิศวกรรมคอมพิวเตอร์ จุฬาลงกรณ์มหาวิทยาลัย</li>
                        <li>ปริญญาโท วิทยาการคอมพิวเตอร์ มหาวิทยาลัยธรรมศาสตร์</li>
                        <li>ปริญญาตรี วิทยาศาสตร์คอมพิวเตอร์ มหาวิทยาลัยเกษตรศาสตร์</li>
                    </ul>
                </div>
            </div>

            <div class="content-section">
                <h2><i class="fas fa-briefcase"></i> ประสบการณ์การทำงาน</h2>
                <div class="content-body">
                    <div class="experience-timeline">
                        <div class="timeline-item">
                            <div class="timeline-date">2560 - ปัจจุบัน</div>
                            <div class="timeline-content">
                                <h4>ศาสตราจารย์ มหาวิทยาลัยราชภัฏนครปฐม</h4>
                                <p>สอนวิชา การวิเคราะห์และออกแบบระบบ, วิศวกรรมซอฟต์แวร์</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-date">2555 - 2560</div>
                            <div class="timeline-content">
                                <h4>ผู้ช่วยศาสตราจารย์ มหาวิทยาลัยเกษตรศาสตร์</h4>
                                <p>สอนวิชา โครงสร้างข้อมูล, ฐานข้อมูล</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="personnel-sidebar">
            <div class="sidebar-card">
                <h3><i class="fas fa-book"></i> ผลงานวิชาการ</h3>
                <div class="achievements-list">
                    <div class="achievement-item">
                        <h4>การพัฒนาระบบฐานข้อมูลสำหรับมหาวิทยาลัย</h4>
                        <p class="achievement-meta">วารสารวิชาการคอมพิวเตอร์ ปี 2565</p>
                    </div>
                    <div class="achievement-item">
                        <h4>การใช้ปัญญาประดิษฐ์ในระบบการศึกษา</h4>
                        <p class="achievement-meta">การประชุมวิชาการระดับชาติ ปี 2563</p>
                    </div>
                    <div class="achievement-item">
                        <h4>การวิเคราะห์ข้อมูลขนาดใหญ่ด้วย Machine Learning</h4>
                        <p class="achievement-meta">วารสารเทคโนโลยีสารสนเทศ ปี 2561</p>
                    </div>
                </div>
            </div>

            <div class="sidebar-card">
                <h3><i class="fas fa-chalkboard-teacher"></i> วิชาที่สอน</h3>
                <div class="courses-list">
                    <div class="course-item">
                        <h4>การวิเคราะห์และออกแบบระบบ</h4>
                        <p>ระดับ: ปริญญาตรี</p>
                    </div>
                    <div class="course-item">
                        <h4>วิศวกรรมซอฟต์แวร์</h4>
                        <p>ระดับ: ปริญญาตรี</p>
                    </div>
                    <div class="course-item">
                        <h4>โครงสร้างข้อมูลและขั้นตอนวิธี</h4>
                        <p>ระดับ: ปริญญาโท</p>
                    </div>
                </div>
            </div>

            <div class="sidebar-card">
                <h3><i class="fas fa-users"></i> นักศึกษาที่ปรึกษา</h3>
                <div class="students-list">
                    <div class="student-item">
                        <p>นายสมชาย ใจดี</p>
                        <p class="student-project">ระบบจัดการข้อมูลนักศึกษา</p>
                    </div>
                    <div class="student-item">
                        <p>นางสาวสุนิสา รักเรียน</p>
                        <p class="student-project">แอปพลิเคชันมือถือสำหรับนักศึกษา</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .breadcrumb {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
        font-size: 14px;
    }

    .breadcrumb a {
        color: #007bff;
        text-decoration: none;
    }

    .breadcrumb a:hover {
        text-decoration: underline;
    }

    .breadcrumb .separator {
        color: #6c757d;
    }

    .personnel-detail-header {
        background: linear-gradient(135deg, #fff9e6, #fff0cc);
        border-radius: 15px;
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: 0 10px 30px rgba(255, 69, 0, 0.15);
        border: 1px solid #ffd7a0;
        display: flex;
        gap: 30px;
    }

    .personnel-image-large {
        width: 200px;
        height: 200px;
        border-radius: 10px;
        overflow: hidden;
        flex-shrink: 0;
    }

    .personnel-image-large img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .placeholder-image {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #FFD700, #FF4500);
        color: white;
    }

    .placeholder-image i {
        font-size: 5em;
    }

    .personnel-basic-info {
        flex-grow: 1;
    }

    .personnel-basic-info h1 {
        color: #000;
        font-size: 2em;
        margin-bottom: 10px;
        font-weight: 700;
    }

    .position {
        color: #8B0000;
        font-size: 1.2em;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .contact-info p {
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 1.1em;
    }

    .contact-info i {
        color: #FF4500;
        width: 20px;
        text-align: center;
    }

    .status-badge {
        display: inline-block;
        padding: 8px 15px;
        border-radius: 20px;
        font-weight: 600;
        margin-top: 20px;
    }

    .status-badge.status-active {
        background: linear-gradient(135deg, #4CAF50, #8BC34A);
        color: #fff;
    }

    .status-badge.status-pending {
        background: linear-gradient(135deg, #FFC107, #FF9800);
        color: #fff;
    }

    .personnel-content {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 30px;
    }

    .personnel-main-content {
        background: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(255, 69, 0, 0.15);
        border: 1px solid #ffd7a0;
    }

    .content-section {
        margin-bottom: 30px;
    }

    .content-section:last-child {
        margin-bottom: 0;
    }

    .content-section h2 {
        color: #8B0000;
        font-size: 1.5em;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #ffd7a0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .content-body {
        line-height: 1.8;
        color: #5a5a5a;
    }

    .content-body p {
        margin-bottom: 15px;
    }

    .education-list {
        list-style: none;
        padding: 0;
    }

    .education-list li {
        padding: 15px 0 15px 30px;
        position: relative;
        border-bottom: 1px solid #fff0cc;
    }

    .education-list li:last-child {
        border-bottom: none;
    }

    .education-list li:before {
        content: "🎓";
        position: absolute;
        left: 0;
        font-size: 1.2em;
    }

    .experience-timeline {
        position: relative;
        padding-left: 30px;
    }

    .experience-timeline:before {
        content: "";
        position: absolute;
        left: 15px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: #FF4500;
    }

    .timeline-item {
        position: relative;
        margin-bottom: 30px;
    }

    .timeline-item:last-child {
        margin-bottom: 0;
    }

    .timeline-item:before {
        content: "";
        position: absolute;
        left: -36px;
        top: 5px;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: #FF4500;
        border: 3px solid #fff;
        box-shadow: 0 0 0 2px #FF4500;
    }

    .timeline-date {
        color: #8B0000;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .timeline-content h4 {
        color: #000;
        margin-bottom: 10px;
        font-size: 1.1em;
    }

    .timeline-content p {
        color: #5a5a5a;
        margin: 0;
        line-height: 1.5;
    }

    .personnel-sidebar {
        display: flex;
        flex-direction: column;
        gap: 25px;
    }

    .sidebar-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 10px 30px rgba(255, 69, 0, 0.15);
        border: 1px solid #ffd7a0;
    }

    .sidebar-card h3 {
        color: #8B0000;
        font-size: 1.3em;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #ffd7a0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .achievements-list, .courses-list, .students-list {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .achievement-item, .course-item, .student-item {
        padding: 15px;
        background: #fff9e6;
        border-radius: 10px;
        border: 1px solid #ffd7a0;
    }

    .achievement-item h4, .course-item h4 {
        color: #000;
        margin-bottom: 8px;
        font-size: 1em;
    }

    .achievement-meta, .course-item p, .student-project {
        color: #5a5a5a;
        font-size: 0.9em;
        margin: 0;
        line-height: 1.4;
    }

    .student-item p:first-child {
        color: #000;
        font-weight: 600;
        margin-bottom: 5px;
    }

    @media (max-width: 992px) {
        .personnel-detail-header {
            flex-direction: column;
            text-align: center;
        }
        
        .personnel-image-large {
            width: 150px;
            height: 150px;
            margin: 0 auto;
        }
        
        .personnel-content {
            grid-template-columns: 1fr;
        }
        
        .personnel-sidebar {
            flex-direction: row;
            flex-wrap: wrap;
        }
        
        .sidebar-card {
            flex: 1;
            min-width: 250px;
        }
    }

    @media (max-width: 768px) {
        .personnel-detail-header h1 {
            font-size: 1.5em;
        }
        
        .position {
            font-size: 1.1em;
        }
        
        .sidebar-card {
            min-width: 100%;
        }
    }
</style>
@endsection