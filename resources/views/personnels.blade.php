@extends('layouts.app')

@section('content')
<div class="container">
    <div class="breadcrumb">
        <a href="{{ route('home') }}">หน้าหลัก</a>
        <span class="separator">/</span>
        <span>บุคลากร</span>
    </div>

    <div class="page-header">
        <h1><i class="fas fa-users"></i> บุคลากรของมหาวิทยาลัย</h1>
        <p>รายชื่ออาจารย์และบุคลากรของมหาวิทยาลัยราชภัฏนครปฐม</p>
    </div>

    <div class="summary-cards">
        <div class="summary-card">
            <h3>จำนวนบุคลากรทั้งหมด</h3>
            <div class="number">{{ $personnels->count() }}</div>
        </div>
        <div class="summary-card">
            <h3>อาจารย์</h3>
            <div class="number">
                {{ $personnels->where('status', 'ทำงาน')->count() }}
            </div>
        </div>
        <div class="summary-card">
            <h3>รองศาสตราจารย์</h3>
            <div class="number">
                {{ $personnels->where('position', 'LIKE', '%รองศาสตราจารย์%')->count() }}
            </div>
        </div>
        <div class="summary-card">
            <h3>ผู้ช่วยศาสตราจารย์</h3>
            <div class="number">
                {{ $personnels->where('position', 'LIKE', '%ผู้ช่วยศาสตราจารย์%')->count() }}
            </div>
        </div>
    </div>

    <div class="content-card">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-list"></i> รายชื่อบุคลากร</h3>
        </div>
        
        @if($personnels->count() > 0)
            <div class="personnels-grid">
                @foreach($personnels as $personnel)
                <div class="personnel-card">
                    <div class="personnel-image">
                        @if($personnel->image_url)
                            <img src="{{ $personnel->image_url }}" alt="{{ $personnel->name }}">
                        @else
                            <div class="placeholder-image">
                                <i class="fas fa-user"></i>
                            </div>
                        @endif
                    </div>
                    <div class="personnel-info">
                        <h4>{{ $personnel->name }}</h4>
                        <p class="position">{{ $personnel->position }}</p>
                        @if($personnel->email)
                            <p class="contact"><i class="fas fa-envelope"></i> {{ $personnel->email }}</p>
                        @endif
                        @if($personnel->phone)
                            <p class="contact"><i class="fas fa-phone"></i> {{ $personnel->phone }}</p>
                        @endif
                        <div class="personnel-actions">
                            <a href="{{ route('personnels.show', $personnel->id) }}" class="btn btn-primary">
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
                <p>ยังไม่มีข้อมูลบุคลากร</p>
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

    .personnels-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 25px;
    }

    .personnel-card {
        background: #fff9e6;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(255, 69, 0, 0.1);
        border: 1px solid #ffd7a0;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
    }

    .personnel-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(255, 69, 0, 0.2);
    }

    .personnel-image {
        height: 200px;
        background: linear-gradient(135deg, #FFD700, #FF4500);
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .personnel-image img {
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
        font-size: 4em;
    }

    .personnel-info {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .personnel-info h4 {
        color: #000;
        margin-bottom: 10px;
        font-size: 1.2em;
        font-weight: 700;
    }

    .position {
        color: #8B0000;
        font-weight: 600;
        margin-bottom: 15px;
        font-size: 0.9em;
    }

    .contact {
        color: #5a5a5a;
        margin-bottom: 8px;
        font-size: 0.9em;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .contact i {
        color: #FF4500;
        width: 16px;
        text-align: center;
    }

    .personnel-actions {
        margin-top: auto;
        padding-top: 15px;
        text-align: center;
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
        .personnels-grid {
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
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
        
        .personnel-info h4 {
            font-size: 1.1em;
        }
    }
</style>
@endsection