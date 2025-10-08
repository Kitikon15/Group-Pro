<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>ข่าวประชาสัมพันธ์ - มหาวิทยาลัยราชภัฏนครปฐม</title>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Sarabun', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #fff9e6 0%, #fff0cc 100%);
            color: #333;
            line-height: 1.6;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background: linear-gradient(135deg, #FFD700, #FF4500);
            color: #000;
            box-shadow: 0 4px 12px rgba(255, 69, 0, 0.3);
            position: sticky;
            top: 0;
            z-index: 1000;
            border-radius: 0 0 10px 10px;
        }

        .logo-title {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo img {
            height: 40px;
            width: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #fff;
            padding: 2px;
            background: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .title {
            font-size: 1.3em;
            font-weight: 700;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            color: #000;
        }

        .right-section {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .font-size-controls {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9em;
        }

        .font-size-controls span {
            font-size: 1.2em;
            cursor: pointer;
            padding: 5px 8px;
            border-radius: 4px;
            transition: all 0.3s ease;
            color: #000;
            background: rgba(255, 255, 255, 0.5);
            font-weight: 700;
        }

        .font-size-controls span:hover {
            background: rgba(255, 255, 255, 0.7);
            transform: scale(1.1);
        }

        .lang-flag {
            font-size: 1.2em;
            padding: 8px 12px;
            background: linear-gradient(135deg, #FFD700, #FF4500);
            color: #000;
            border-radius: 6px;
            font-weight: bold;
            box-shadow: 0 2px 5px rgba(255, 69, 0, 0.3);
        }

        .apply-btn {
            background: linear-gradient(135deg, #FFD700, #FF4500);
            color: #000;
            padding: 12px 24px;
            border: none;
            border-radius: 25px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(255, 69, 0, 0.3);
            text-decoration: none;
            display: inline-block;
        }

        .apply-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(255, 69, 0, 0.4);
        }

        .content-wrapper {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .section {
            max-width: 1400px;
            margin: 60px auto;
            padding: 0 20px;
            text-align: center;
        }

        .section h2 {
            font-size: 2.5em;
            margin-bottom: 40px;
            color: #000;
            position: relative;
            display: inline-block;
            font-weight: 700;
        }

        .section h2:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 5px;
            background: linear-gradient(135deg, #FFD700, #FF4500);
            border-radius: 2px;
        }

        .news-section {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(255, 69, 0, 0.15);
            padding: 30px;
            transition: all 0.3s ease;
            border: 1px solid #ffd7a0;
            margin-bottom: 40px;
        }

        .news-section:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(255, 69, 0, 0.25);
        }

        .news-item {
            margin-bottom: 30px;
            padding: 25px;
            border-radius: 15px;
            background: #fff9e6;
            transition: all 0.3s ease;
            border-left: 5px solid #FF4500;
            border: 1px solid #ffd7a0;
        }

        .news-item:hover {
            background: #fff0cc;
            transform: translateX(10px);
            box-shadow: 0 5px 15px rgba(255, 69, 0, 0.2);
        }

        .news-item h3 {
            color: #000;
            font-size: 1.5em;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
        }

        .news-item h3 i {
            color: #FF4500;
        }

        .news-banner-placeholder {
            width: 100%;
            height: 250px;
            border-radius: 10px;
            margin: 15px 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            text-align: center;
            padding: 20px;
            box-sizing: border-box;
            box-shadow: 0 5px 15px rgba(255, 69, 0, 0.1);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #000;
            text-shadow: 1px 1px 3px rgba(255, 255, 255, 0.8);
            border: 3px solid #ffd7a0;
        }

        .news-banner-1 {
            background-image: url('https://news.npru.ac.th/userfiles/ACADEMIC/%E0%B8%AA%E0%B8%A1%E0%B8%B1%E0%B8%84%E0%B8%A3%2069/ban%2069%20%E0%B8%AA%E0%B8%A1%E0%B8%B1%E0%B8%84%E0%B8%A3%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99%201.png');
        }

        .news-banner-2 {
            background-image: url('https://news.npru.ac.th/userfiles/ACADEMIC/%E0%B8%AA%E0%B8%A1%E0%B8%B1%E0%B8%84%E0%B8%A3%2069/ban%2069%20%E0%B8%AA%E0%B8%A1%E0%B8%B1%E0%B8%84%E0%B8%A3%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99%20%282%29.png');
        }

        .news-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px dashed #ffd7a0;
        }

        .news-author {
            font-size: 1em;
            color: #555;
            font-weight: 600;
        }

        .news-date {
            font-size: 1em;
            color: #FF4500;
            font-weight: 700;
        }

        .read-more {
            background: linear-gradient(135deg, #FFD700, #FF4500);
            color: #000;
            padding: 10px 25px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 700;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(255, 69, 0, 0.3);
            display: inline-block;
        }

        .read-more:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(255, 69, 0, 0.4);
        }

        footer {
            background: linear-gradient(135deg, #FFD700, #FF4500);
            color: #000;
            padding: 30px;
            margin-top: 60px;
            text-align: center;
            font-weight: 700;
        }

        footer a {
            color: #000;
            text-decoration: none;
            font-weight: 700;
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                gap: 15px;
                padding: 15px;
            }

            .right-section {
                flex-wrap: wrap;
                justify-content: center;
            }

            .section h2 {
                font-size: 2em;
            }
        }

        .university-logo {
            width: 100px;
            height: 100px;
            margin-bottom: 25px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid white;
            padding: 5px;
            background: white;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="logo-title">
            <div class="logo">
                <img src="https://sc.npru.ac.th/sc_major/assets/images/app/logo.jpg" alt="SCI NPRU">
            </div>
            <div class="title">มหาวิทยาลัยราชภัฏนครปฐม</div>
        </div>
        <div class="right-section">
            <div class="font-size-controls">
                ขนาดอักษร: <span onclick="adjustFontSize('small')">ก</span>
                <span onclick="adjustFontSize('medium')">ก</span>
                <span onclick="adjustFontSize('large')">ก</span>
            </div>
            <div class="lang-flag">
                <img src="https://sc.npru.ac.th/sc_major/assets/images/langs/tha.png" alt="Thai Flag" style="height: 18px;">
            </div>
            <a href="{{ route('application') }}" class="apply-btn">
                <i class="fas fa-user-plus"></i> สมัครเรียน
            </a>
        </div>
    </div>

    <div class="content-wrapper">
        <!-- Show success message if exists -->
        @if(session('success'))
            <div style="max-width: 1200px; margin: 20px auto; padding: 0 20px;">
                <div style="background: linear-gradient(135deg, #d4edda, #c3e6cb); border-left: 4px solid #28a745; padding: 20px; border-radius: 0 8px 8px 0; box-shadow: 0 4px 10px rgba(40, 167, 69, 0.15); color: #155724; font-weight: 600;">
                    <h3 style="margin: 0 0 10px 0; display: flex; align-items: center; gap: 10px;">
                        <i class="fas fa-check-circle"></i> สมัครเรียนสำเร็จ!
                    </h3>
                    <p style="margin: 0;">{{ session('success') }}</p>
                </div>
            </div>
        @endif
        
        <div class="section">
            <h2><i class="fas fa-newspaper"></i> ข่าวประชาสัมพันธ์</h2>
            
            <div class="news-section">
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
                
                <div class="news-item">
                    <h3><i class="fas fa-bullhorn"></i> ประกาศรับสมัครนักศึกษาใหม่ ปีการศึกษา 2569 รอบที่ 2</h3>
                    <div class="news-banner-placeholder" style="background-color: #ffd700; color: #000;">
                        รับสมัครนักศึกษาใหม่ ปีการศึกษา 2569 รอบที่ 2
                    </div>
                    <div class="news-details">
                        <div class="news-author">ประกาศโดย: งานรับเข้าศึกษา</div>
                        <div class="news-date">วันที่ประกาศ: 15 สิงหาคม 2568</div>
                        <a href="#" class="read-more">อ่านเพิ่มเติม</a>
                    </div>
                </div>
            </div>
            
            <!-- Faculty and Program Information Section -->
            <div class="news-section" style="margin-top: 30px;">
                <h2><i class="fas fa-university"></i> คณะและสาขาวิชาที่เปิดรับสมัคร</h2>
                <p>มหาวิทยาลัยราชภัฏนครปฐมมีหลายคณะและสาขาวิชาให้เลือกเรียน ดังนี้:</p>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; margin-top: 20px;">
                    <div class="news-item" style="margin-bottom: 0;">
                        <h3 style="color: #000; border-bottom: 1px solid #ffd7a0; padding-bottom: 10px; margin-bottom: 15px;">
                            <i class="fas fa-graduation-cap"></i> คณะวิทยาศาสตร์และเทคโนโลยี
                        </h3>
                        <ul style="text-align: left; padding-left: 20px;">
                            <li>สาขาวิชาวิศวกรรมซอฟต์แวร์</li>
                            <li>สาขาวิชาวิทยาการคอมพิวเตอร์</li>
                            <li>สาขาวิชาเทคโนโลยีสารสนเทศ</li>
                            <li>สาขาวิชาวิทยาศาสตร์สิ่งแวดล้อม</li>
                            <li>สาขาวิชาฟิสิกส์</li>
                            <li>สาขาวิชาเคมี</li>
                            <li>สาขาวิชาชีววิทยา</li>
                            <li>สาขาวิชาคณิตศาสตร์</li>
                        </ul>
                    </div>
                    
                    <div class="news-item" style="margin-bottom: 0;">
                        <h3 style="color: #000; border-bottom: 1px solid #ffd7a0; padding-bottom: 10px; margin-bottom: 15px;">
                            <i class="fas fa-book"></i> คณะมนุษยศาสตร์และสังคมศาสตร์
                        </h3>
                        <ul style="text-align: left; padding-left: 20px;">
                            <li>สาขาวิชาภาษาไทย</li>
                            <li>สาขาวิชาภาษาอังกฤษ</li>
                            <li>สาขาวิชาภาษาจีน</li>
                            <li>สาขาวิชาประวัติศาสตร์</li>
                            <li>สาขาวิชาภูมิศาสตร์</li>
                            <li>สาขาวิชารัฐศาสตร์การปกครอง</li>
                            <li>สาขาวิชาสังคมวิทยา</li>
                            <li>สาขาวิชาจิตวิทยา</li>
                        </ul>
                    </div>
                    
                    <div class="news-item" style="margin-bottom: 0;">
                        <h3 style="color: #000; border-bottom: 1px solid #ffd7a0; padding-bottom: 10px; margin-bottom: 15px;">
                            <i class="fas fa-chalkboard-teacher"></i> คณะครุศาสตร์
                        </h3>
                        <ul style="text-align: left; padding-left: 20px;">
                            <li>สาขาวิชาการสอนภาษาอังกฤษ</li>
                            <li>สาขาวิชาการสอนคณิตศาสตร์</li>
                            <li>สาขาวิชาการสอนวิทยาศาสตร์</li>
                            <li>สาขาวิชาการสอนสังคมศึกษา</li>
                            <li>สาขาวิชาการสอนภาษาไทย</li>
                        </ul>
                    </div>
                    
                    <div class="news-item" style="margin-bottom: 0;">
                        <h3 style="color: #000; border-bottom: 1px solid #ffd7a0; padding-bottom: 10px; margin-bottom: 15px;">
                            <i class="fas fa-business-time"></i> คณะวิทยาการจัดการ
                        </h3>
                        <ul style="text-align: left; padding-left: 20px;">
                            <li>สาขาวิชาการจัดการ</li>
                            <li>สาขาวิชาการตลาด</li>
                            <li>สาขาวิชาบัญชี</li>
                            <li>สาขาวิชาการเงิน</li>
                            <li>สาขาวิชาคอมพิวเตอร์ธุรกิจ</li>
                        </ul>
                    </div>
                    
                    <div class="news-item" style="margin-bottom: 0;">
                        <h3 style="color: #000; border-bottom: 1px solid #ffd7a0; padding-bottom: 10px; margin-bottom: 15px;">
                            <i class="fas fa-palette"></i> คณะศิลปกรรมศาสตร์
                        </h3>
                        <ul style="text-align: left; padding-left: 20px;">
                            <li>สาขาวิชาศิลปกรรม</li>
                            <li>สาขาวิชาการออกแบบ</li>
                            <li>สาขาวิชาดนตรี</li>
                            <li>สาขาวิชาการแสดง</li>
                        </ul>
                    </div>
                    
                    <div class="news-item" style="margin-bottom: 0;">
                        <h3 style="color: #000; border-bottom: 1px solid #ffd7a0; padding-bottom: 10px; margin-bottom: 15px;">
                            <i class="fas fa-heartbeat"></i> คณะพยาบาลศาสตร์
                        </h3>
                        <ul style="text-align: left; padding-left: 20px;">
                            <li>สาขาวิชาพยาบาลศาสตร์</li>
                        </ul>
                    </div>
                </div>
                
                <div style="text-align: center; margin-top: 30px;">
                    <a href="{{ route('application') }}" class="apply-btn" style="text-decoration: none; display: inline-block; padding: 15px 30px;">
                        <i class="fas fa-user-plus"></i> สมัครเรียนทันที
                    </a>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>© 2025 มหาวิทยาลัยราชภัฏนครปฐม คณะวิทยาศาสตร์และเทคโนโลยี</p>
        <p>โทรศัพท์: 0-3423-3274 ต่อ 2111 | อีเมล: sci.npru@gmail.com</p>
        <p><a href="{{ route('index') }}">หน้าหลัก</a> | <a href="{{ route('admin.login') }}">เข้าสู่ระบบ Admin</a> | <a href="{{ route('application') }}">สมัครเรียน</a></p>
    </footer>

    <script>
        function adjustFontSize(size) {
            const body = document.body;
            
            switch (size) {
                case 'small':
                    body.style.fontSize = '14px';
                    break;
                case 'medium':
                    body.style.fontSize = '16px';
                    break;
                case 'large':
                    body.style.fontSize = '18px';
                    break;
            }
        }

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>

</html>
