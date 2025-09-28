<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>มหาวิทยาลัยราชภัฏนครปฐม | Admission</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Sarabun', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f8f5f5 0%, #f0e6e6 100%);
            color: #333;
            line-height: 1.6;
        }

        .header {
            background: linear-gradient(135deg, #8B0000, #A9A9A9);
            color: white;
            padding: 20px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 12px rgba(139, 0, 0, 0.3);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo img {
            height: 60px;
            width: 60px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #fff;
            padding: 3px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(139, 0, 0, 0.3);
        }

        .logo-text {
            font-size: 1.4em;
            font-weight: 700;
        }

        .logo-text small {
            display: block;
            font-size: 0.7em;
            font-weight: 400;
            opacity: 0.9;
        }

        .admission-title {
            text-align: right;
            font-size: 2.5em;
            font-weight: 800;
            text-shadow: 3px 3px 5px rgba(139, 0, 0, 0.5);
            position: relative;
            padding-right: 50px;
        }

        .admission-title::after {
            content: '🦋';
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            font-size: 2em;
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
            display: flex;
            gap: 30px;
        }

        .sidebar {
            width: 300px;
            background: #f5f5f5;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(139, 0, 0, 0.15);
            padding: 25px;
            height: fit-content;
            transition: all 0.3s ease;
            border: 1px solid #e0d0d0;
        }

        .sidebar:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(139, 0, 0, 0.25);
        }

        .sidebar h2 {
            background: linear-gradient(135deg, #8B0000, #A9A9A9);
            color: white;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.3em;
            box-shadow: 0 4px 10px rgba(139, 0, 0, 0.3);
        }

        .menu-list {
            list-style: none;
        }

        .menu-list li {
            margin-bottom: 12px;
        }

        .menu-list li a {
            display: block;
            padding: 15px 20px;
            background: #fafafa;
            border-radius: 8px;
            text-decoration: none;
            color: #5a5a5a;
            font-weight: 500;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
            box-shadow: 0 2px 5px rgba(139, 0, 0, 0.1);
        }

        .menu-list li a:hover {
            background: linear-gradient(135deg, #f0e0e0, #e0d0d0);
            border-left: 4px solid #8B0000;
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(139, 0, 0, 0.2);
        }

        .menu-list li a i {
            margin-right: 10px;
            color: #8B0000;
        }

        .menu-header {
            font-weight: 700;
            color: #8B0000;
            padding: 15px 20px;
            background: #f0e0e0;
            border-radius: 8px;
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 1px solid #e0d0d0;
        }

        .menu-header:hover {
            background: #e0d0d0;
        }

        .logout-btn {
            background: linear-gradient(135deg, #8B0000, #A0522D);
            color: white;
            padding: 10px 20px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(139, 0, 0, 0.3);
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(139, 0, 0, 0.4);
            color: white;
        }

        .back-btn {
            background: linear-gradient(135deg, #f7b731, #f5a623);
            color: #333;
            padding: 12px 25px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: bold;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(247, 183, 49, 0.4);
            border: 2px solid rgba(247, 183, 49, 0.7);
            margin-bottom: 20px;
        }

        .back-btn:hover {
            background: linear-gradient(135deg, #f5a623, #f7b731);
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(247, 183, 49, 0.6);
            color: #000;
        }

        .main-content {
            flex: 1;
        }

        .page-header {
            background: #f5f5f5;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(139, 0, 0, 0.15);
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid #e0d0d0;
        }

        .page-header:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(139, 0, 0, 0.25);
        }

        .page-header h1 {
            color: #8B0000;
            font-size: 2em;
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }

        .page-header h1::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(135deg, #8B0000, #A9A9A9);
            border-radius: 2px;
        }

        .news-section {
            background: #f5f5f5;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(139, 0, 0, 0.15);
            transition: all 0.3s ease;
            border: 1px solid #e0d0d0;
        }

        .news-section:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(139, 0, 0, 0.25);
        }

        .news-section h2 {
            color: #8B0000;
            font-size: 1.8em;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #e0d0d0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .news-item {
            margin-bottom: 30px;
            padding: 20px;
            border-radius: 10px;
            background: #fafafa;
            transition: all 0.3s ease;
            border-left: 4px solid #8B0000;
            border: 1px solid #e8d8d8;
        }

        .news-item:hover {
            background: #f8f0f0;
            transform: translateX(10px);
            box-shadow: 0 5px 15px rgba(139, 0, 0, 0.2);
        }

        .news-item h3 {
            color: #5a5a5a;
            font-size: 1.3em;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .news-item h3 i {
            color: #8B0000;
        }

        .news-banner-placeholder {
            width: 100%;
            height: 200px; /* กำหนดความสูงให้คงที่ */
            border-radius: 10px;
            margin: 15px 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            text-align: center;
            padding: 20px;
            box-sizing: border-box;
            box-shadow: 0 5px 15px rgba(139, 0, 0, 0.1);
            /* ส่วนสำคัญ: ตั้งค่า background-image และการจัดขนาด */
            background-size: cover; /* ทำให้รูปภาพครอบคลุมพื้นที่ทั้งหมด */
            background-position: center; /* จัดตำแหน่งรูปภาพให้อยู่ตรงกลาง */
            background-repeat: no-repeat; /* ไม่ให้รูปภาพซ้ำ */
            color: white; /* ข้อความบนแบนเนอร์เป็นสีขาว */
            text-shadow: 1px 1px 3px rgba(0,0,0,0.5); /* เพิ่มเงาให้ข้อความอ่านง่ายขึ้น */
        }

        /* กำหนดรูปภาพพื้นหลังสำหรับแต่ละแบนเนอร์โดยตรงใน CSS */
        .news-banner-1 {
            background-image: url('https://news.npru.ac.th/userfiles/ACADEMIC/%E0%B8%AA%E0%B8%A1%E0%B8%B1%E0%B8%84%E0%B8%A3%2069/ban%2069%20%E0%B8%AA%E0%B8%A1%E0%B8%B1%E0%B8%84%E0%B8%A3%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99%201.png');
            border: 2px solid #d0b0b0;
        }

        .news-banner-2 {
            background-image: url('https://news.npru.ac.th/userfiles/ACADEMIC/%E0%B8%AA%E0%B8%A1%E0%B8%B1%E0%B8%84%E0%B8%A3%2069/ban%2069%20%E0%B8%AA%E0%B8%A1%E0%B8%B1%E0%B8%84%E0%B8%A3%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99%20%282%29.png');
            border: 2px solid #c8b8b8;
        }

        .news-banner-3 {
            background-image: url('https://news.npru.ac.th/userfiles/ACADEMIC/%E0%B8%AA%E0%B8%A1%E0%B8%B1%E0%B8%84%E0%B8%A3%2069/ban%2069%20%E0%B8%AA%E0%B8%A1%E0%B8%B1%E0%B8%84%E0%B8%A3%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99%20%282%29.png'); /* ใช้รูปเดียวกับ banner-2 ถ้าไม่มีรูปที่ 3 ที่แตกต่าง */
            border: 2px solid #c0b0b0;
        }

        .news-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px dashed #d0c0c0;
        }

        .news-author {
            font-size: 0.9em;
            color: #666;
        }

        .news-date {
            font-size: 0.9em;
            color: #8B0000;
            font-weight: 500;
        }

        .read-more {
            background: linear-gradient(135deg, #8B0000, #A0522D);
            color: white;
            padding: 8px 20px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(139, 0, 0, 0.3);
        }

        .read-more:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(139, 0, 0, 0.4);
        }

        .footer {
            text-align: center;
            padding: 30px;
            color: #7f8c8d;
            font-size: 0.9em;
            margin-top: 40px;
            border-top: 1px solid #e0d0d0;
            background: #f5f5f5;
        }

        @media (max-width: 992px) {
            .container {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
            }
            
            .admission-title {
                font-size: 2em;
            }
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                text-align: center;
                gap: 20px;
            }
            
            .logo {
                justify-content: center;
            }
            
            .admission-title {
                text-align: center;
                padding-right: 0;
                font-size: 1.8em;
            }
            
            .admission-title::after {
                display: none;
            }
            
            .news-details {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 0 15px;
            }
            
            .sidebar, .news-section, .page-header {
                padding: 20px;
            }
            
            .logo img {
                height: 50px;
                width: 50px;
            }
            
            .logo-text {
                font-size: 1.2em;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="https://sc.npru.ac.th/sc_major/assets/images/app/logo.jpg" alt="โลโก้ NPRU">
            <div class="logo-text">
                มหาวิทยาลัยราชภัฏนครปฐม
                <small>Nakhon Pathom Rajabhat University</small>
            </div>
        </div>
        @auth
            <div class="user-info">
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i> ออกจากระบบ
                </a>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        @endauth
    </div>

    <div class="container">
        <div class="sidebar">
            <h2>เมนูหลัก</h2>
            <ul class="menu-list">
                @guest
                    <li><a href="{{ route('application') }}"><i class="fas fa-user-plus"></i> ลงทะเบียนเข้าระบบ</a></li>
                @endguest
                <li><a href="{{ route('admin.login') }}"><i class="fas fa-cog"></i> ระบบจัดการ</a></li>
                <li><a href="#"><i class="fas fa-graduation-cap"></i> สาขาและจำนวนที่รับสมัคร</a></li>
                <li><a href="#"><i class="fas fa-question-circle"></i> ตอบคำถาม</a></li>
                <li><a href="#"><i class="fas fa-chart-bar"></i> รายงานการรับสมัคร</a></li>
                <li><a href="#"><i class="fas fa-list-ol"></i> ขั้นตอนการสมัคร</a></li>
            </ul>

            <div class="menu-header">
                <span>ไม่ต้องการ TCAS »»</span>
            </div>
            <div class="menu-header">
                <span>คลิกอ่านรายละเอียดเพิ่มเติม »»</span>
            </div>
        </div>

        <div class="main-content">
            <!-- Back button added here -->
            <a href="{{ url('/') }}" class="back-btn">
                <i class="fas fa-arrow-left"></i> กลับไปหน้าหลัก
            </a>
            
            <div class="page-header">
                <h1>ข่าวประชาสัมพันธ์</h1>
                <p>ติดตามข่าวสารและกิจกรรมล่าสุดจากมหาวิทยาลัยราชภัฏนครปฐม</p>
            </div>

            <div class="news-section">
                <h2><i class="fas fa-newspaper"></i> ข่าวสารและกิจกรรม</h2>
                
                <div class="news-item">
                    <h3><i class="fas fa-bullhorn"></i> รับสมัครนักศึกษาระดับปริญญาตรี ภาคปกติ ปีการศึกษา 2569 (รอบที่ 1)(ด่วนที่สุด)</h3>
                    <div class="news-banner-placeholder news-banner-1">
                    </div>
                    <div class="news-details">
                        <div class="news-author">ประกาศโดย: academic.npru</div>
                        <div class="news-date">วันที่ประกาศ: 5 สิงหาคม 2568</div>
                        <a href="#" class="read-more">อ่านเพิ่มเติม</a>
                    </div>
                </div>
                
                <div class="news-item">
                    <h3><i class="fas fa-bullhorn"></i> รับสมัครนักศึกษาระดับปริญญาตรี ภาคกศ.พป. ปีการศึกษา 2569 (รอบที่ 1)</h3>
                    <div class="news-banner-placeholder news-banner-2">
                    </div>
                    <div class="news-details">
                        <div class="news-author">ประกาศโดย: academic.npru</div>
                        <div class="news-date">วันที่ประกาศ: 5 สิงหาคม 2568</div>
                        <a href="#" class="read-more">อ่านเพิ่มเติม</a>
                    </div>
                </div>
            
            </div>
        </div>
    </div>

    <div class="footer">
        <p>© 2025 มหาวิทยาลัยราชภัฏนครปฐม คณะวิทยาศาสตร์และเทคโนโลยี</p>
        <p>โทรศัพท์: 0-3423-3274 ต่อ 2111 | อีเมล: sci.npru@gmail.com</p>
    </div>

</body>
</html>