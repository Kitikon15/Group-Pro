@extends('layouts.app')

@section('content')
<div class="container">
    <div class="breadcrumb">
        <a href="{{ route('home') }}">หน้าหลัก</a>
        <span class="separator">/</span>
        <span>หลักสูตรทั้งหมด</span>
    </div>

    <div class="page-header">
        <h1><i class="fas fa-graduation-cap"></i> หลักสูตรที่เปิดรับสมัคร</h1>
        <p>รายละเอียดเกี่ยวกับหลักสูตรและการรับสมัครของมหาวิทยาลัยราชภัฏนครปฐม</p>
    </div>

    <div class="summary-cards">
        <div class="summary-card">
            <h3>จำนวนหลักสูตรทั้งหมด</h3>
            <div class="number">{{ $courses->count() }}</div>
        </div>
        <div class="summary-card">
            <h3>ปริญญาตรี</h3>
            <div class="number">
                {{ $courses->where('degree_type', 'ปริญญาตรี')->count() }}
            </div>
        </div>
        <div class="summary-card">
            <h3>ปริญญาโท</h3>
            <div class="number">
                {{ $courses->where('degree_type', 'ปริญญาโท')->count() }}
            </div>
        </div>
        <div class="summary-card">
            <h3>เปิดรับสมัคร</h3>
            <div class="number">
                {{ $courses->where('status', 'เปิดรับ')->count() }}
            </div>
        </div>
    </div>

    <div class="content-card">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-list"></i> รายชื่อหลักสูตร</h3>
        </div>
        
        @if($courses->count() > 0)
            <div class="courses-grid">
                @foreach($courses as $course)
                <div class="course-card">
                    <div class="course-header">
                        <h4>{{ $course->name }}</h4>
                        <span class="degree-type">{{ $course->degree_type }}</span>
                    </div>
                    <div class="course-details">
                        <p class="course-description">{{ Str::limit($course->description, 150) }}</p>
                        <div class="course-meta">
                            <div class="meta-item">
                                <i class="fas fa-clock"></i>
                                <span>ระยะเวลา: {{ $course->duration }} ปี</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-user-graduate"></i>
                                <span>สถานะ: 
                                    @if($course->status == 'เปิดรับ')
                                        <span class="status-active">{{ $course->status }}</span>
                                    @else
                                        <span class="status-pending">{{ $course->status }}</span>
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="course-actions">
                            <a href="{{ route('courses.show', $course) }}" class="btn btn-primary">
                                <i class="fas fa-info-circle"></i> ดูรายละเอียด
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="no-data">
                <i class="fas fa-info-circle"></i>
                <p>ยังไม่มีข้อมูลหลักสูตร</p>
            </div>
        @endif
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

    .page-header {
        background: #fff9e6;
        border-radius: 15px;
        padding: 25px;
        margin-bottom: 30px;
        box-shadow: 0 10px 30px rgba(255, 69, 0, 0.15);
        text-align: center;
        transition: all 0.3s ease;
        border: 1px solid #ffd7a0;
    }

    .page-header:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(255, 69, 0, 0.25);
    }

    .page-header h1 {
        color: #000;
        font-size: 2em;
        margin-bottom: 15px;
        position: relative;
        display: inline-block;
        font-weight: 700;
    }

    .page-header h1::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(135deg, #FFD700, #FF4500);
        border-radius: 2px;
    }

    .summary-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .summary-card {
        background: #fff;
        border-radius: 15px;
        padding: 25px;
        text-align: center;
        box-shadow: 0 10px 30px rgba(255, 69, 0, 0.15);
        border: 1px solid #ffd7a0;
        transition: all 0.3s ease;
    }

    .summary-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(255, 69, 0, 0.25);
    }

    .summary-card h3 {
        color: #000;
        margin-bottom: 15px;
        font-size: 1.2em;
    }

    .summary-card .number {
        font-size: 2.5em;
        font-weight: 700;
        color: #FF4500;
    }

    .content-card {
        background: white;
        border-radius: 10px;
        padding: 25px;
        box-shadow: 0 4px 10px rgba(139, 0, 0, 0.15);
        margin-bottom: 30px;
        border: 1px solid #e8d8d8;
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 1px solid #e0d0d0;
    }

    .card-title {
        font-size: 20px;
        color: #8B0000;
    }

    .courses-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 25px;
    }

    .course-card {
        background: #fff9e6;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(255, 69, 0, 0.1);
        border: 1px solid #ffd7a0;
        transition: all 0.3s ease;
    }

    .course-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(255, 69, 0, 0.2);
    }

    .course-header {
        background: linear-gradient(135deg, #FFD700, #FF4500);
        color: #000;
        padding: 20px;
        position: relative;
    }

    .course-header h4 {
        margin: 0 0 10px 0;
        font-size: 1.3em;
        font-weight: 700;
    }

    .degree-type {
        background: rgba(0, 0, 0, 0.2);
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 0.8em;
        font-weight: 600;
    }

    .course-details {
        padding: 20px;
    }

    .course-description {
        color: #5a5a5a;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .course-meta {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-bottom: 20px;
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 0.9em;
    }

    .meta-item i {
        color: #FF4500;
        width: 20px;
        text-align: center;
    }

    .course-actions {
        text-align: center;
        padding-top: 15px;
        border-top: 1px solid #ffd7a0;
    }

    .btn {
        padding: 10px 15px;
        border-radius: 5px;
        border: none;
        cursor: pointer;
        font-weight: 500;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
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

    .status-active {
        background: #e8f5e9;
        color: #2e7d32;
        padding: 3px 8px;
        border-radius: 20px;
        font-size: 0.8em;
        font-weight: 500;
    }

    .status-pending {
        background: #fff8e1;
        color: #f57f17;
        padding: 3px 8px;
        border-radius: 20px;
        font-size: 0.8em;
        font-weight: 500;
    }

    .no-data {
        text-align: center;
        padding: 40px 20px;
        color: #6c757d;
    }

    .no-data i {
        font-size: 3em;
        margin-bottom: 20px;
        color: #ffd7a0;
    }

    @media (max-width: 768px) {
        .courses-grid {
            grid-template-columns: 1fr;
        }
        
        .summary-cards {
            grid-template-columns: 1fr 1fr;
        }
        
        .page-header h1 {
            font-size: 1.5em;
        }
    }

    @media (max-width: 480px) {
        .summary-cards {
            grid-template-columns: 1fr;
        }
        
        .course-meta {
            flex-direction: column;
            gap: 8px;
        }
    }
</style>
@endsection