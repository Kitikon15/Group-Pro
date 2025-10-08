@extends('layouts.app')

@section('content')
<div class="container">
    <div class="breadcrumb">
        <a href="{{ route('home') }}">หน้าหลัก</a>
        <span class="separator">/</span>
        <a href="{{ route('courses.index') }}">หลักสูตรทั้งหมด</a>
        <span class="separator">/</span>
        <span>{{ $course->name }}</span>
    </div>

    <div class="course-detail-header">
        <h1><i class="fas fa-graduation-cap"></i> {{ $course->name }}</h1>
        <div class="course-meta-tags">
            <span class="meta-tag degree">{{ $course->degree_type }}</span>
            <span class="meta-tag duration">{{ $course->duration }} ปี</span>
            <span class="meta-tag status 
                {{ $course->status == 'เปิดรับ' ? 'status-active' : 'status-pending' }}">
                {{ $course->status }}
            </span>
        </div>
    </div>

    <div class="course-content">
        <div class="course-main-content">
            <div class="content-section">
                <h2><i class="fas fa-info-circle"></i> รายละเอียดหลักสูตร</h2>
                <div class="content-body">
                    <p>{{ $course->description }}</p>
                </div>
            </div>

            <div class="content-section">
                <h2><i class="fas fa-briefcase"></i> อาชีพที่สามารถทำได้หลังสำเร็จการศึกษา</h2>
                <div class="content-body">
                    <ul class="career-list">
                        <li>นักวิเคราะห์ระบบ</li>
                        <li>โปรแกรมเมอร์</li>
                        <li>ผู้ดูแลระบบเครือข่าย</li>
                        <li>นักพัฒนาเว็บแอปพลิเคชัน</li>
                        <li>นักวิจัยด้านเทคโนโลยี</li>
                        <li>ผู้ประกอบการด้านไอที</li>
                        <li>อาจารย์มหาวิทยาลัย</li>
                    </ul>
                </div>
            </div>

            <div class="content-section">
                <h2><i class="fas fa-flask"></i> ห้องปฏิบัติการและสิ่งอำนวยความสะดวก</h2>
                <div class="content-body">
                    <div class="facilities-grid">
                        <div class="facility-card">
                            <div class="facility-icon">
                                <i class="fas fa-desktop"></i>
                            </div>
                            <h3>ห้องปฏิบัติการคอมพิวเตอร์</h3>
                            <p>อุปกรณ์คอมพิวเตอร์ทันสมัย พร้อมซอฟต์แวร์สำหรับการพัฒนา</p>
                        </div>
                        <div class="facility-card">
                            <div class="facility-icon">
                                <i class="fas fa-network-wired"></i>
                            </div>
                            <h3>ห้องปฏิบัติการเครือข่าย</h3>
                            <p>อุปกรณ์เครือข่ายสำหรับการทดลองและการเรียนรู้</p>
                        </div>
                        <div class="facility-card">
                            <div class="facility-icon">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <h3>ห้องพัฒนาแอปพลิเคชันมือถือ</h3>
                            <p>อุปกรณ์มือถือหลากหลายรุ่นสำหรับการทดสอบ</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="course-sidebar">
            <div class="sidebar-card">
                <h3><i class="fas fa-chalkboard-teacher"></i> อาจารย์ผู้สอน</h3>
                <div class="instructor-list">
                    <div class="instructor-item">
                        <div class="instructor-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="instructor-info">
                            <h4>ดร.สมชาย ใจดี</h4>
                            <p>ตำแหน่ง: ผู้ช่วยศาสตราจารย์</p>
                        </div>
                    </div>
                    <div class="instructor-item">
                        <div class="instructor-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="instructor-info">
                            <h4>ผศ.สุนิสา รักเรียน</h4>
                            <p>ตำแหน่ง: รองศาสตราจารย์</p>
                        </div>
                    </div>
                    <div class="instructor-item">
                        <div class="instructor-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="instructor-info">
                            <h4>รศ.วินัย พรหมมา</h4>
                            <p>ตำแหน่ง: ศาสตราจารย์</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="sidebar-card">
                <h3><i class="fas fa-calendar-alt"></i> กำหนดการรับสมัคร</h3>
                <div class="admission-info">
                    <p><strong>เปิดรับสมัคร:</strong> 1 มีนาคม 2568</p>
                    <p><strong>ปิดรับสมัคร:</strong> 30 เมษายน 2568</p>
                    <p><strong>ประกาศผล:</strong> 15 พฤษภาคม 2568</p>
                </div>
                <div class="action-buttons">
                    <a href="{{ route('admission') }}" class="btn btn-primary btn-block">
                        <i class="fas fa-user-plus"></i> สมัครเรียน
                    </a>
                </div>
            </div>

            <div class="sidebar-card">
                <h3><i class="fas fa-video"></i> วิดีโอแนะนำหลักสูตร</h3>
                <div class="video-placeholder">
                    <div class="video-icon">
                        <i class="fas fa-play-circle"></i>
                    </div>
                    <p>วิดีโอแนะนำหลักสูตร<br>วิศวกรรมซอฟต์แวร์</p>
                    <button class="btn btn-secondary btn-block">
                        <i class="fas fa-play"></i> ดูวิดีโอ
                    </button>
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

    .course-detail-header {
        background: linear-gradient(135deg, #fff9e6, #fff0cc);
        border-radius: 15px;
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: 0 10px 30px rgba(255, 69, 0, 0.15);
        border: 1px solid #ffd7a0;
    }

    .course-detail-header h1 {
        color: #000;
        font-size: 2em;
        margin-bottom: 15px;
        font-weight: 700;
    }

    .course-meta-tags {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }

    .meta-tag {
        background: linear-gradient(135deg, #FFD700, #FF4500);
        color: #000;
        padding: 8px 15px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.9em;
    }

    .meta-tag.status-active {
        background: linear-gradient(135deg, #4CAF50, #8BC34A);
        color: #fff;
    }

    .meta-tag.status-pending {
        background: linear-gradient(135deg, #FFC107, #FF9800);
        color: #fff;
    }

    .course-content {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 30px;
    }

    .course-main-content {
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

    .career-list {
        list-style: none;
        padding: 0;
    }

    .career-list li {
        padding: 10px 0 10px 30px;
        position: relative;
        border-bottom: 1px solid #fff0cc;
    }

    .career-list li:last-child {
        border-bottom: none;
    }

    .career-list li:before {
        content: "✓";
        color: #FF4500;
        position: absolute;
        left: 0;
        font-weight: bold;
    }

    .facilities-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
    }

    .facility-card {
        background: #fff9e6;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        border: 1px solid #ffd7a0;
        transition: all 0.3s ease;
    }

    .facility-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(255, 69, 0, 0.2);
    }

    .facility-icon {
        font-size: 2em;
        color: #FF4500;
        margin-bottom: 15px;
    }

    .facility-card h3 {
        color: #000;
        margin-bottom: 10px;
        font-size: 1.1em;
    }

    .facility-card p {
        color: #5a5a5a;
        font-size: 0.9em;
        line-height: 1.5;
    }

    .course-sidebar {
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

    .instructor-list {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .instructor-item {
        display: flex;
        gap: 15px;
        padding: 15px;
        background: #fff9e6;
        border-radius: 10px;
        border: 1px solid #ffd7a0;
    }

    .instructor-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: linear-gradient(135deg, #FFD700, #FF4500);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 1.2em;
    }

    .instructor-info h4 {
        color: #000;
        margin-bottom: 5px;
        font-size: 1em;
    }

    .instructor-info p {
        color: #5a5a5a;
        font-size: 0.9em;
        margin: 0;
    }

    .admission-info p {
        margin-bottom: 10px;
        padding: 8px 0;
        border-bottom: 1px solid #fff0cc;
    }

    .admission-info p:last-child {
        border-bottom: none;
    }

    .admission-info strong {
        color: #8B0000;
    }

    .action-buttons {
        margin-top: 20px;
    }

    .btn {
        padding: 12px 20px;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
        text-align: center;
    }

    .btn-block {
        display: block;
        width: 100%;
    }

    .btn-primary {
        background: linear-gradient(135deg, #8B0000, #A0522D);
        color: white;
        box-shadow: 0 4px 10px rgba(139, 0, 0, 0.3);
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #A0522D, #8B0000);
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(139, 0, 0, 0.4);
    }

    .btn-secondary {
        background: linear-gradient(135deg, #6c757d, #495057);
        color: white;
    }

    .btn-secondary:hover {
        background: linear-gradient(135deg, #495057, #6c757d);
        transform: translateY(-2px);
    }

    .video-placeholder {
        text-align: center;
        padding: 20px;
        background: #fff9e6;
        border-radius: 10px;
        border: 1px solid #ffd7a0;
    }

    .video-icon {
        font-size: 3em;
        color: #FF4500;
        margin-bottom: 15px;
    }

    .video-placeholder p {
        color: #5a5a5a;
        margin-bottom: 20px;
        line-height: 1.5;
    }

    @media (max-width: 992px) {
        .course-content {
            grid-template-columns: 1fr;
        }
        
        .course-sidebar {
            flex-direction: row;
            flex-wrap: wrap;
        }
        
        .sidebar-card {
            flex: 1;
            min-width: 250px;
        }
    }

    @media (max-width: 768px) {
        .course-detail-header h1 {
            font-size: 1.5em;
        }
        
        .course-meta-tags {
            justify-content: center;
        }
        
        .facilities-grid {
            grid-template-columns: 1fr;
        }
        
        .sidebar-card {
            min-width: 100%;
        }
    }
</style>
@endsection