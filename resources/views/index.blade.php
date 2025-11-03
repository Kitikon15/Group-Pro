@extends('layouts.app')

@section('title', 'หน้าแรก - มหาวิทยาลัยราชภัฏนครปฐม')

@section('content')
<div class="hero">
    <h1>{{ editable_content('homepage_hero_title', 'ยินดีต้อนรับสู่มหาวิทยาลัยราชภัฏนครปฐม') }}</h1>
    <p>{{ editable_content('homepage_hero_subtitle', 'สถาบันอุดมศึกษาที่มีคุณภาพและสร้างสรรค์นวัตกรรมเพื่ออนาคต') }}</p>
    <a href="{{ route('application') }}" class="btn-primary">
        <i class="fas fa-user-plus"></i> สมัครเรียนเลย
    </a>
</div>

<div class="container">
    <h2 class="section-title">ข่าวสารและกิจกรรม</h2>
    <div class="news-grid">
        @foreach($news as $item)
        <div class="news-card">
            @if($item->image)
                <img src="{{ $item->image }}" alt="{{ $item->title }}" class="news-img">
            @else
                <img src="https://images.unsplash.com/photo-1588681664899-f142ff2dc9b1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="{{ $item->title }}" class="news-img">
            @endif
            <div class="news-content">
                <div class="news-date">
                    <i class="far fa-calendar"></i> {{ $item->publish_date->format('d M Y') }}
                </div>
                <h3 class="news-title">{{ $item->title }}</h3>
                <p class="news-excerpt">{{ \Illuminate\Support\Str::limit(strip_tags($item->content), 100) }}</p>
                <a href="{{ route('news.show', $item) }}" class="read-more">
                    อ่านเพิ่มเติม <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="container">
    <h2 class="section-title">ทำไมต้องเลือกเรา?</h2>
    <div class="features">
        <div class="feature-card">
            <div class="feature-icon">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <h3 class="feature-title">{{ editable_content('feature_1_title', 'หลักสูตรที่ทันสมัย') }}</h3>
            <p class="feature-desc">{{ editable_content('feature_1_description', 'หลักสูตรที่ออกแบบโดยผู้เชี่ยวชาญและปรับปรุงให้สอดคล้องกับความต้องการของตลาดแรงงาน') }}</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <h3 class="feature-title">{{ editable_content('feature_2_title', 'คณาจารย์ที่มีคุณภาพ') }}</h3>
            <p class="feature-desc">{{ editable_content('feature_2_description', 'ทีมงานคณาจารย์ที่มีความเชี่ยวชาญในสาขาและมีประสบการณ์ในการสอน') }}</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">
                <i class="fas fa-flask"></i>
            </div>
            <h3 class="feature-title">{{ editable_content('feature_3_title', 'สิ่งอำนวยความสะดวกครบครัน') }}</h3>
            <p class="feature-desc">{{ editable_content('feature_3_description', 'ห้องปฏิบัติการ ห้องสมุด และสิ่งอำนวยความสะดวกอื่นๆ ที่ทันสมัยสำหรับการเรียนรู้') }}</p>
        </div>
    </div>
</div>

<div class="cta-section">
    <h2>{{ editable_content('cta_title', 'พร้อมแล้วหรือยังที่จะเป็นส่วนหนึ่งของพวกเรา?') }}</h2>
    <p>{{ editable_content('cta_subtitle', 'เข้าร่วมกับเราและเปิดโอกาสให้อนาคตของคุณเปลี่ยนแปลงไป') }}</p>
    <a href="{{ route('application') }}" class="btn-primary">
        <i class="fas fa-rocket"></i> เริ่มต้นการสมัครเลย
    </a>
</div>

<div class="footer">
    <div class="footer-content">
        <div class="footer-section">
            <h3>ติดต่อเรา</h3>
            <p><i class="fas fa-map-marker-alt"></i> {{ editable_content('contact_address', 'มหาวิทยาลัยราชภัฏนครปฐม ตำบลพระปฐมเจดีย์ อำเภอเมือง จังหวัดนครปฐม 73000') }}</p>
            <p><i class="fas fa-phone"></i> {{ editable_content('contact_phone', 'โทรศัพท์: 0-3423-3274 ต่อ 2111') }}</p>
            <p><i class="fas fa-envelope"></i> {{ editable_content('contact_email', 'อีเมล: sci.npru@gmail.com') }}</p>
        </div>
        <div class="footer-section">
            <h3>ลิงก์ด่วน</h3>
            <a href="{{ route('index') }}">หน้าแรก</a>
            <a href="{{ route('courses') }}">หลักสูตร</a>
            <a href="{{ route('personnels') }}">บุคลากร</a>
            <a href="{{ route('news') }}">ข่าวสาร</a>
            <a href="{{ route('application.process') }}">กระบวนการสมัคร</a>
        </div>
        <div class="footer-section">
            <h3>โซเชียลมีเดีย</h3>
            <a href="#"><i class="fab fa-facebook"></i> Facebook</a>
            <a href="#"><i class="fab fa-twitter"></i> Twitter</a>
            <a href="#"><i class="fab fa-instagram"></i> Instagram</a>
            <a href="#"><i class="fab fa-youtube"></i> YouTube</a>
        </div>
    </div>
    <div class="copyright">
        <p>&copy; {{ date('Y') }} {{ editable_content('copyright_text', 'มหาวิทยาลัยราชภัฏนครปฐม คณะวิทยาศาสตร์และเทคโนโลยี') }}. สงวนลิขสิทธิ์.</p>
    </div>
</div>

@if(isset($editMode) && $editMode)
<script>
    // Add JavaScript for frontend editing
    document.addEventListener('DOMContentLoaded', function() {
        // Add click handlers for editable content
        const editableElements = document.querySelectorAll('.editable-content');
        
        editableElements.forEach(element => {
            element.addEventListener('click', function() {
                const key = this.dataset.key;
                const currentValue = this.textContent.trim();
                const type = this.dataset.type;
                
                // Create an input field for editing
                const input = document.createElement('input');
                input.type = type === 'textarea' ? 'textarea' : 'text';
                input.value = currentValue;
                input.style.width = '100%';
                input.style.padding = '10px';
                input.style.border = '2px solid #8B0000';
                input.style.borderRadius = '5px';
                input.style.fontSize = '16px';
                
                // Replace content with input
                this.innerHTML = '';
                this.appendChild(input);
                input.focus();
                
                // Handle saving on blur or enter key
                const saveContent = () => {
                    const newValue = input.value;
                    
                    // Send update to server
                    fetch('{{ route("admin.frontend.content.update") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            key: key,
                            value: newValue
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Update the display
                            this.innerHTML = newValue + '<div class="edit-overlay"><i class="fas fa-edit"></i></div>';
                        } else {
                            alert('เกิดข้อผิดพลาดในการบันทึกข้อมูล');
                            this.innerHTML = currentValue + '<div class="edit-overlay"><i class="fas fa-edit"></i></div>';
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('เกิดข้อผิดพลาดในการบันทึกข้อมูล');
                        this.innerHTML = currentValue + '<div class="edit-overlay"><i class="fas fa-edit"></i></div>';
                    });
                };
                
                input.addEventListener('blur', saveContent);
                input.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter') {
                        saveContent();
                    }
                });
            });
        });
    });
</script>
@endif

@endsection

@section('styles')
<style>
    .hero {
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');
        background-size: cover;
        background-position: center;
        color: white;
        text-align: center;
        padding: 100px 20px;
        margin-bottom: 40px;
    }

    .hero h1 {
        font-size: 48px;
        margin-bottom: 20px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .hero p {
        font-size: 24px;
        max-width: 800px;
        margin: 0 auto 30px;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.6);
    }

    .btn-primary {
        background: linear-gradient(135deg, #FFD700, #FF4500);
        color: #000;
        border: none;
        padding: 15px 30px;
        border-radius: 30px;
        font-size: 18px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
        box-shadow: 0 4px 15px rgba(255, 69, 0, 0.4);
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(255, 69, 0, 0.6);
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .section-title {
        text-align: center;
        font-size: 36px;
        color: #000;
        margin-bottom: 40px;
        position: relative;
    }

    .section-title:after {
        content: '';
        display: block;
        width: 100px;
        height: 4px;
        background: linear-gradient(135deg, #FFD700, #FF4500);
        margin: 10px auto;
        border-radius: 2px;
    }

    .news-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 30px;
        margin-bottom: 60px;
    }

    .news-card {
        background: #fff;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(255, 69, 0, 0.15);
        transition: all 0.3s ease;
        border: 1px solid #ffd7a0;
    }

    .news-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(255, 69, 0, 0.25);
    }

    .news-img {
        height: 200px;
        width: 100%;
        object-fit: cover;
    }

    .news-content {
        padding: 25px;
    }

    .news-date {
        color: #FF4500;
        font-weight: 600;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .news-title {
        font-size: 22px;
        margin-bottom: 15px;
        color: #000;
    }

    .news-excerpt {
        color: #5a5a5a;
        margin-bottom: 20px;
        line-height: 1.7;
    }

    .read-more {
        color: #FF4500;
        text-decoration: none;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 5px;
        transition: all 0.3s ease;
    }

    .read-more:hover {
        gap: 10px;
    }

    .features {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        margin-bottom: 60px;
    }

    .feature-card {
        background: #fff;
        border-radius: 15px;
        padding: 30px;
        text-align: center;
        box-shadow: 0 10px 30px rgba(255, 69, 0, 0.15);
        transition: all 0.3s ease;
        border: 1px solid #ffd7a0;
    }

    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(255, 69, 0, 0.25);
    }

    .feature-icon {
        font-size: 48px;
        color: #FF4500;
        margin-bottom: 20px;
    }

    .feature-title {
        font-size: 24px;
        margin-bottom: 15px;
        color: #000;
    }

    .feature-desc {
        color: #5a5a5a;
        line-height: 1.7;
    }

    .cta-section {
        background: linear-gradient(135deg, #FFD700, #FF4500);
        color: #000;
        text-align: center;
        padding: 80px 20px;
        border-radius: 15px;
        margin-bottom: 60px;
        box-shadow: 0 10px 30px rgba(255, 69, 0, 0.3);
    }

    .cta-section h2 {
        font-size: 42px;
        margin-bottom: 20px;
    }

    .cta-section p {
        font-size: 20px;
        max-width: 800px;
        margin: 0 auto 30px;
    }

    .footer {
        background: #333;
        color: #fff;
        padding: 50px 20px 20px;
        text-align: center;
    }

    .footer-content {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 40px;
        max-width: 1200px;
        margin: 0 auto 40px;
        text-align: left;
    }

    .footer-section h3 {
        font-size: 22px;
        margin-bottom: 20px;
        color: #FFD700;
    }

    .footer-section p, .footer-section a {
        color: #ccc;
        line-height: 1.8;
        text-decoration: none;
        display: block;
        margin-bottom: 10px;
    }

    .footer-section a:hover {
        color: #FFD700;
    }

    .copyright {
        border-top: 1px solid #555;
        padding-top: 20px;
        color: #999;
    }

    @media (max-width: 768px) {
        .hero h1 {
            font-size: 36px;
        }
        
        .hero p {
            font-size: 18px;
        }
    }
</style>
@endsection