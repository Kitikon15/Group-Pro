<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลงทะเบียนสำเร็จ - มหาวิทยาลัยราชภัฏนครปฐม</title>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* =================================
           CSS Styles
           ================================= */
        
        /* การรีเซ็ตค่าพื้นฐาน */
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

        /* ส่วนหัวด้านบน (Header) */
        .header-bar {
            background: linear-gradient(135deg, #8B0000, #A9A9A9);
            color: white;
            border-top: 5px solid #8B0000;
            padding: 10px 20px;
            box-shadow: 0 4px 12px rgba(139, 0, 0, 0.3);
        }

        .header-container {
            display: flex;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .logo-placeholder {
            width: 70px;
            height: 70px;
            background: white;
            border: 2px solid #8B0000;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: #8B0000;
            font-size: 0.8em;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }

        .title-section {
            flex-grow: 1;
            line-height: 1.2;
        }

        .title-section h1 {
            color: white;
            font-size: 1.5em;
            margin: 0;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
        }

        .title-section p {
            color: #f0f0f0;
            font-size: 1em;
            margin: 0;
        }

        .admission-text {
            text-align: right;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            position: relative;
        }

        .admission-h1 {
            font-size: 3em;
            font-weight: bold;
            color: white;
            text-shadow: 2px 2px 3px rgba(0,0,0,0.5);
            padding-right: 40px;
        }
        
        .admission-text::after {
            content: '🦋';
            position: absolute;
            right: 0;
            top: 0;
            font-size: 3em;
            color: #f0e0e0;
        }

        .language-select {
            font-size: 0.9em;
            color: #f0f0f0;
            margin-top: 5px;
            cursor: pointer;
        }

        .flag-icon-placeholder {
            display: inline-block;
            width: 20px;
            height: 15px;
            background: linear-gradient(to right, #8B0000 33%, #A9A9A9 33%, #A9A9A9 66%, white 66%);
            border: 1px solid white;
            vertical-align: middle;
            margin-right: 5px;
        }

        .header-divider {
            border: 0;
            height: 3px;
            background: linear-gradient(90deg, #8B0000, #A9A9A9);
            margin: 10px 0 0 0;
        }

        /* การจัดวางเนื้อหาหลักแบบ 2 คอลัมน์ (ใช้ Flexbox) */
        .main-content-layout {
            display: flex;
            max-width: 1200px;
            margin: 20px auto;
            background: white;
            border: 1px solid #e8d8d8;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(139, 0, 0, 0.15);
        }

        /* เมนูหลักด้านซ้าย (Sidebar) */
        .sidebar-menu {
            width: 250px;
            background: #f5f5f5;
            border-right: 1px solid #e0d0d0;
            padding: 15px 0;
            border-radius: 10px 0 0 10px;
        }

        .sidebar-menu h2 {
            background: linear-gradient(135deg, #8B0000, #A9A9A9);
            color: white;
            font-size: 1.1em;
            padding: 15px;
            margin: 0;
            text-align: center;
            border-radius: 8px 0 0 0;
            box-shadow: 0 2px 5px rgba(139, 0, 0, 0.3);
        }

        .menu-list {
            list-style: none;
            padding: 0;
            margin: 15px 0;
        }

        .menu-list li a {
            display: block;
            padding: 15px 20px;
            text-decoration: none;
            color: #5a5a5a;
            border-bottom: 1px solid #e0d0d0;
            background: #fafafa;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .menu-list li:first-child a {
            border-top: 1px solid #e0d0d0;
        }
        
        .menu-list li a:hover {
            background: linear-gradient(135deg, #f0e0e0, #e0d0d0);
            border-left: 4px solid #8B0000;
            transform: translateX(5px);
            box-shadow: 0 2px 5px rgba(139, 0, 0, 0.1);
        }

        /* สไตล์สำหรับเมนู TCAS ที่มีลูกศร */
        .menu-tcas-header {
            font-weight: bold;
            color: #8B0000;
            padding: 15px 20px;
            display: block;
            border-bottom: 1px solid #e0d0d0;
            border-top: 1px solid #e0d0d0;
            margin-top: 15px;
            background: #f0e0e0;
            cursor: default;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .menu-tcas-header:hover {
            background: #e0d0d0;
        }
        
        .menu-tcas-header::after {
            content: '»';
            float: right;
            font-weight: bold;
            color: #8B0000;
        }

        /* เนื้อหาหลักด้านขวา (Main Content) */
        .main-content {
            flex-grow: 1;
            padding: 25px;
        }

        .main-content h2 {
            color: #8B0000;
            font-size: 1.8em;
            border-bottom: 2px solid #e0d0d0;
            padding-bottom: 10px;
            margin-top: 0;
            margin-bottom: 25px;
            position: relative;
        }

        .main-content h2::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 80px;
            height: 2px;
            background: linear-gradient(135deg, #8B0000, #A9A9A9);
        }

        /* รูปแบบของรายการข่าว */
        .news-item {
            margin-bottom: 25px;
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
            height: 200px;
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
        }

        .news-banner-1 {
            background: linear-gradient(135deg, #f0d0d0, #e0c0c0);
            color: #8B0000;
            border: 2px solid #d0b0b0;
        }

        .news-banner-2 {
            background: linear-gradient(135deg, #e8d8d8, #d8c8c8);
            color: #8B0000;
            border: 2px solid #c8b8b8;
        }

        .news-banner-3 {
            background: linear-gradient(135deg, #e0d0d0, #d0c0c0);
            color: #8B0000;
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

        .success-message {
            background: linear-gradient(135deg, #f0e0e0, #e0d0d0);
            border-left: 4px solid #8B0000;
            padding: 25px;
            border-radius: 0 10px 10px 0;
            margin-bottom: 30px;
            box-shadow: 0 4px 10px rgba(139, 0, 0, 0.15);
        }

        .success-message h3 {
            color: #8B0000;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .success-message p {
            color: #5a5a5a;
            line-height: 1.8;
        }

        .btn-home {
            background: linear-gradient(135deg, #8B0000, #A0522D);
            color: white;
            padding: 12px 30px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
            margin-top: 20px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(139, 0, 0, 0.3);
        }

        .btn-home:hover {
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
            border-radius: 0 0 10px 10px;
        }

        @media (max-width: 992px) {
            .main-content-layout {
                flex-direction: column;
            }
            
            .sidebar-menu {
                width: 100%;
                border-radius: 10px 10px 0 0;
                border-right: none;
                border-bottom: 1px solid #e0d0d0;
            }
            
            .sidebar-menu h2 {
                border-radius: 10px 10px 0 0;
            }
        }

        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
                text-align: center;
                gap: 20px;
            }
            
            .logo-placeholder {
                margin-right: 0;
            }
            
            .admission-text {
                align-items: center;
            }
            
            .admission-h1 {
                padding-right: 40px;
            }
            
            .news-details {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        @media (max-width: 480px) {
            .main-content-layout {
                margin: 10px;
            }
            
            .sidebar-menu, .main-content {
                padding: 15px;
            }
            
            .logo-placeholder {
                width: 50px;
                height: 50px;
                font-size: 0.6em;
            }
            
            .title-section h1 {
                font-size: 1.2em;
            }
        }
    </style>
</head>
<body>
    <div class="header-bar">
        <div class="header-container">
            <div class="logo-placeholder">
                NPRU
            </div>
            <div class="title-section">
                <h1>มหาวิทยาลัยราชภัฏนครปฐม</h1>
                <p>Nakhon Pathom Rajabhat University</p>
            </div>
            <div class="admission-text">
                <h1 class="admission-h1">สมัครเรียน</h1>
                <div class="language-select">
                    <span class="flag-icon-placeholder"></span>
                    ไทย (TH) | English (EN)
                </div>
            </div>
        </div>
        <hr class="header-divider">
    </div>

    <div class="main-content-layout">
        <div class="sidebar-menu">
            <h2>เมนูหลัก</h2>
            <ul class="menu-list">
                <li><a href="{{ route('application') }}">ลงทะเบียนเข้าระบบ</a></li>
                <li><a href="{{ route('admin.login') }}">ระบบจัดการ</a></li>
                <li><a href="#">สาขาและจำนวนที่รับสมัคร</a></li>
                <li><a href="#">ตอบคำถาม</a></li>
                <li><a href="#">รายงานการรับสมัคร</a></li>
                <li><a href="#">ขั้นตอนการสมัคร</a></li>
            </ul>

            <div class="menu-tcas-header">
                ไม่ต้องการ TCAS »»
            </div>
            <div class="menu-tcas-header">
                คลิกอ่านรายละเอียดเพิ่มเติม »»
            </div>
        </div>

        <div class="main-content">
            <h2>ลงทะเบียนสำเร็จ</h2>
            
            <div class="success-message">
                <h3>🎉 ยินดีต้อนรับสู่ระบบลงทะเบียนของมหาวิทยาลัยราชภัฏนครปฐม</h3>
                <p>
                    ขอบคุณที่ลงทะเบียนกับเรา คุณได้ทำการลงทะเบียนเรียบร้อยแล้ว<br>
                    โปรดตรวจสอบอีเมลของคุณเพื่อดูข้อมูลการลงทะเบียนและขั้นตอนถัดไป
                </p>
                <p>
                    หากคุณมีคำถามใด ๆ โปรดอย่าลังเลที่จะติดต่อทีมสนับสนุนของเรา
                </p>
            </div>

            <div class="news-item">
                <h3><i class="fas fa-bullhorn"></i> ข่าวสารล่าสุดเกี่ยวกับการสมัคร</h3>
                <div class="news-banner-placeholder news-banner-1">
                    แบนเนอร์: ขั้นตอนถัดไปหลังการลงทะเบียน <br> (กรุณาตรวจสอบอีเมลของคุณ)
                </div>
                <div class="news-details">
                    <div class="news-author">ประกาศโดย: ฝ่ายรับสมัครบุคคลเข้าศึกษา</div>
                    <div class="news-date">วันที่ประกาศ: {{ date('j F Y') }}</div>
                    <a href="#" class="read-more">อ่านเพิ่มเติม</a>
                </div>
            </div>

            <a href="{{ url('/') }}" class="btn-home">กลับไปหน้าหลัก</a>
        </div>
    </div>

    <div class="footer">
        <p>© 2025 มหาวิทยาลัยราชภัฏนครปฐม คณะวิทยาศาสตร์และเทคโนโลยี</p>
        <p>โทรศัพท์: 0-3423-3274 ต่อ 2111 | อีเมล: sci.npru@gmail.com</p>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</body>
</html>