@extends('layouts.app')

@section('content')
<div class="container">
    <div class="breadcrumb">
        <a href="{{ route('home') }}">หน้าหลัก</a>
        <span class="separator">/</span>
        <span>ข่าวสารและกิจกรรม</span>
    </div>

    <div class="page-header">
        <h1><i class="fas fa-newspaper"></i> ข่าวสารและกิจกรรม</h1>
        <p>ข่าวสารล่าสุดและกิจกรรมของมหาวิทยาลัยราชภัฏนครปฐม</p>
    </div>

    <div class="content-card">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-list"></i> รายการข่าวสารและกิจกรรม</h3>
        </div>
        
        @if($news->count() > 0)
            <div class="news-list">
                @foreach($news as $item)
                <div class="news-item">
                    <div class="news-date">
                        <div class="date-day">{{ \Carbon\Carbon::parse($item->publish_date)->format('d') }}</div>
                        <div class="date-month">{{ \Carbon\Carbon::parse($item->publish_date)->format('M') }}</div>
                        <div class="date-year">{{ \Carbon\Carbon::parse($item->publish_date)->format('Y') }}</div>
                    </div>
                    <div class="news-content">
                        <div class="news-meta">
                            <span class="news-type 
                                {{ $item->type == 'ข่าวสาร' ? 'type-news' : 
                                   ($item->type == 'กิจกรรม' ? 'type-activity' : 'type-announcement') }}">
                                {{ $item->type }}
                            </span>
                            <span class="news-status 
                                {{ $item->status == 'เผยแพร่' ? 'status-published' : 'status-draft' }}">
                                {{ $item->status }}
                            </span>
                        </div>
                        <h3>{{ $item->title }}</h3>
                        <p>{{ Str::limit(strip_tags($item->content), 200) }}</p>
                        <div class="news-actions">
                            <a href="{{ route('news.show', $item->id) }}" class="btn btn-primary">
                                <i class="fas fa-eye"></i> อ่านเพิ่มเติม
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="no-data">
                <i class="fas fa-info-circle"></i>
                <p>ยังไม่มีข่าวสารหรือกิจกรรม</p>
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

    .news-list {
        display: flex;
        flex-direction: column;
        gap: 25px;
    }

    .news-item {
        display: flex;
        gap: 20px;
        padding: 25px;
        background: #fff9e6;
        border-radius: 12px;
        border: 1px solid #ffd7a0;
        transition: all 0.3s ease;
    }

    .news-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(255, 69, 0, 0.2);
    }

    .news-date {
        background: linear-gradient(135deg, #FFD700, #FF4500);
        color: #000;
        border-radius: 8px;
        padding: 15px;
        text-align: center;
        min-width: 80px;
        flex-shrink: 0;
    }

    .date-day {
        font-size: 2em;
        font-weight: 700;
        line-height: 1;
    }

    .date-month {
        font-size: 0.9em;
        font-weight: 600;
        text-transform: uppercase;
    }

    .date-year {
        font-size: 0.8em;
        opacity: 0.9;
    }

    .news-content {
        flex-grow: 1;
    }

    .news-meta {
        display: flex;
        gap: 10px;
        margin-bottom: 10px;
    }

    .news-type {
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 0.8em;
        font-weight: 600;
    }

    .type-news {
        background: linear-gradient(135deg, #007bff, #0056b3);
        color: white;
    }

    .type-activity {
        background: linear-gradient(135deg, #28a745, #1e7e34);
        color: white;
    }

    .type-announcement {
        background: linear-gradient(135deg, #ffc107, #e0a800);
        color: #000;
    }

    .news-status {
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 0.8em;
        font-weight: 600;
    }

    .status-published {
        background: #e8f5e9;
        color: #2e7d32;
    }

    .status-draft {
        background: #fff8e1;
        color: #f57f17;
    }

    .news-content h3 {
        color: #000;
        margin-bottom: 15px;
        font-size: 1.3em;
        font-weight: 700;
    }

    .news-content p {
        color: #5a5a5a;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .news-actions {
        text-align: right;
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
        .news-item {
            flex-direction: column;
        }
        
        .news-date {
            width: 80px;
            margin: 0 auto;
        }
        
        .page-header h1 {
            font-size: 1.5em;
        }
        
        .news-content h3 {
            font-size: 1.2em;
        }
    }

    @media (max-width: 480px) {
        .news-meta {
            flex-direction: column;
            gap: 5px;
        }
        
        .news-actions {
            text-align: center;
        }
    }
</style>
@endsection