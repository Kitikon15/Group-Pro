<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ใบสมัครอยู่ระหว่างการตรวจสอบ - มหาวิทยาลัยราชภัฏนครปฐม</title>
    
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
            background: linear-gradient(135deg, #fff9e6 0%, #fff0cc 100%);
            color: #333;
            line-height: 1.6;
        }

        .header {
            background: linear-gradient(135deg, #FFD700, #FF4500);
            color: #000;
            padding: 20px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 12px rgba(255, 69, 0, 0.3);
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
            box-shadow: 0 4px 8px rgba(255, 69, 0, 0.3);
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
            text-shadow: 3px 3px 5px rgba(255, 69, 0, 0.5);
            position: relative;
            padding-right: 50px;
            color: #000;
        }

        .admission-title::after {
            content: '🎓';
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
            background: #fff9e6;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(255, 69, 0, 0.15);
            padding: 25px;
            height: fit-content;
            transition: all 0.3s ease;
            border: 1px solid #ffd7a0;
        }

        .sidebar:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(255, 69, 0, 0.25);
        }

        .sidebar h2 {
            background: linear-gradient(135deg, #FFD700, #FF4500);
            color: #000;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.3em;
            box-shadow: 0 4px 10px rgba(255, 69, 0, 0.3);
            font-weight: 700;
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
            background: #fff;
            border-radius: 8px;
            text-decoration: none;
            color: #5a5a5a;
            font-weight: 600;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
            box-shadow: 0 2px 5px rgba(255, 69, 0, 0.1);
        }

        .menu-list li a:hover {
            background: linear-gradient(135deg, #fff0cc, #ffe6b3);
            border-left: 4px solid #FF4500;
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(255, 69, 0, 0.2);
        }

        .menu-list li a i {
            margin-right: 10px;
            color: #FF4500;
        }

        .menu-header {
            font-weight: 700;
            color: #000;
            padding: 15px 20px;
            background: #fff0cc;
            border-radius: 8px;
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 1px solid #ffd7a0;
        }

        .menu-header:hover {
            background: #ffe6b3;
        }

        .logout-btn {
            background: linear-gradient(135deg, #FFD700, #FF4500);
            color: #000;
            padding: 10px 20px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(255, 69, 0, 0.3);
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(255, 69, 0, 0.4);
            color: #000;
        }

        .back-btn {
            background: linear-gradient(135deg, #ffd700, #ff8c00);
            color: #000;
            padding: 12px 25px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: bold;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(255, 215, 0, 0.4);
            border: 2px solid rgba(255, 215, 0, 0.7);
            margin-bottom: 20px;
        }

        .back-btn:hover {
            background: linear-gradient(135deg, #ff8c00, #ffd700);
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(255, 215, 0, 0.6);
            color: #000;
        }

        .main-content {
            flex: 1;
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

        .status-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(255, 69, 0, 0.15);
            padding: 40px;
            margin-bottom: 40px;
            border: 1px solid #ffd7a0;
            text-align: center;
        }

        .status-icon {
            font-size: 5em;
            color: #FFD700;
            margin-bottom: 20px;
        }

        .status-title {
            font-size: 2em;
            color: #000;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .status-description {
            font-size: 1.2em;
            color: #5a5a5a;
            margin-bottom: 30px;
            line-height: 1.8;
        }

        .application-info {
            background: linear-gradient(135deg, #fff0cc, #ffe6b3);
            border-radius: 10px;
            padding: 20px;
            margin: 30px 0;
            text-align: left;
            border-left: 4px solid #FF4500;
        }

        .application-info h3 {
            color: #000;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .info-item {
            margin-bottom: 15px;
        }

        .info-label {
            font-weight: 600;
            color: #5a5a5a;
            margin-bottom: 5px;
        }

        .info-value {
            color: #000;
            font-weight: 500;
        }

        .status-indicator {
            display: inline-block;
            padding: 10px 25px;
            border-radius: 30px;
            font-weight: 700;
            font-size: 1.2em;
            margin: 20px 0;
        }

        .status-pending {
            background: linear-gradient(135deg, #fff8e1, #ffecb3);
            color: #ff8f00;
            border: 2px solid #ffd54f;
        }

        .status-approved {
            background: linear-gradient(135deg, #e8f5e9, #c8e6c9);
            color: #2e7d32;
            border: 2px solid #a5d6a7;
        }

        .status-rejected {
            background: linear-gradient(135deg, #ffebee, #ffcdd2);
            color: #c62828;
            border: 2px solid #ef9a9a;
        }

        .steps {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(255, 69, 0, 0.15);
            padding: 30px;
            border: 1px solid #ffd7a0;
            margin-top: 30px;
        }

        .steps h3 {
            color: #000;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
        }

        .step {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #ffd7a0;
        }

        .step:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .step-number {
            background: linear-gradient(135deg, #FFD700, #FF4500);
            color: #000;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            flex-shrink: 0;
        }

        .btn-view-status {
            background: linear-gradient(135deg, #FFD700, #FF4500);
            color: #000;
            border: none;
            padding: 16px 40px;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            box-shadow: 0 4px 10px rgba(255, 69, 0, 0.3);
            margin-top: 20px;
        }

        .btn-view-status:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(255, 69, 0, 0.4);
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
            
            .info-grid {
                grid-template-columns: 1fr;
            }
            
            .step {
                flex-direction: column;
                gap: 10px;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 0 15px;
            }
            
            .sidebar, .status-card, .page-header {
                padding: 20px;
            }
            
            .logo img {
                height: 50px;
                width: 50px;
            }
            
            .logo-text {
                font-size: 1.2em;
            }
            
            .status-title {
                font-size: 1.5em;
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
        @guest
            <a href="{{ route('admin.login') }}" class="logout-btn">
                <i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ
            </a>
        @endguest
    </div>

    <div class="container">
        <div class="sidebar">
            <h2>เมนูหลัก</h2>
            <ul class="menu-list">
                <li><a href="{{ route('admin.login') }}"><i class="fas fa-cog"></i> ระบบจัดการ</a></li>
                <li><a href="{{ route('faculty.program.quotas') }}"><i class="fas fa-graduation-cap"></i> สาขาและจำนวนที่รับสมัคร</a></li>
                <li><a href="#"><i class="fas fa-question-circle"></i> ตอบคำถาม</a></li>
                <li><a href="{{ route('application.process') }}"><i class="fas fa-list-ol"></i> ขั้นตอนการสมัคร</a></li>
                <li><a href="{{ route('application.status', ['id' => $application->id]) }}"><i class="fas fa-search"></i> ตรวจสอบสถานะใบสมัคร</a></li>
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
            <a href="{{ route('index') }}" class="back-btn">
                <i class="fas fa-arrow-left"></i> กลับไปหน้าหลัก
            </a>
            
            <div class="page-header">
                <h1><i class="fas fa-hourglass-half"></i> ใบสมัครอยู่ระหว่างการตรวจสอบ</h1>
                <p>ใบสมัครของคุณอยู่ระหว่างการตรวจสอบโดยเจ้าหน้าที่</p>
            </div>

            <div class="status-card">
                <div class="status-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                
                <h2 class="status-title">ใบสมัครของคุณอยู่ระหว่างการตรวจสอบ</h2>
                
                <p class="status-description">
                    ขอบคุณที่ส่งใบสมัครเข้าศึกษาในมหาวิทยาลัยราชภัฏนครปฐม<br>
                    ใบสมัครของคุณอยู่ระหว่างการตรวจสอบโดยเจ้าหน้าที่<br>
                    คุณสามารถตรวจสอบสถานะใบสมัครได้ตลอดเวลา
                </p>
                
                <div class="application-info">
                    <h3><i class="fas fa-info-circle"></i> ข้อมูลใบสมัคร</h3>
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-label">รหัสใบสมัคร</div>
                            <div class="info-value">#{{ $application->id }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">ชื่อ-นามสกุล</div>
                            <div class="info-value">{{ $application->title }} {{ $application->first_name }} {{ $application->last_name }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">คณะที่สมัคร</div>
                            <div class="info-value">{{ $application->faculty }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">สาขาวิชาที่สมัคร</div>
                            <div class="info-value">{{ $application->program }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">วันที่ส่งใบสมัคร</div>
                            <div class="info-value">{{ $application->created_at->format('d/m/Y H:i') }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">สถานะปัจจุบัน</div>
                            <div class="info-value">
                                @if($application->status === 'pending')
                                    <span class="status-indicator status-pending">
                                        <i class="fas fa-clock"></i> รอการตรวจสอบ
                                    </span>
                                @elseif($application->status === 'approved')
                                    <span class="status-indicator status-approved">
                                        <i class="fas fa-check-circle"></i> อนุมัติ
                                    </span>
                                @elseif($application->status === 'rejected')
                                    <span class="status-indicator status-rejected">
                                        <i class="fas fa-times-circle"></i> ไม่อนุมัติ
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                
                <a href="{{ route('application.status', ['id' => $application->id]) }}" class="btn-view-status">
                    <i class="fas fa-search"></i> ตรวจสอบสถานะใบสมัคร
                </a>
            </div>
            
            <div class="steps">
                <h3><i class="fas fa-list"></i> ขั้นตอนถัดไป</h3>
                <div class="step">
                    <div class="step-number">1</div>
                    <div>
                        <strong>ตรวจสอบข้อมูล</strong>
                        <p>เจ้าหน้าที่กำลังตรวจสอบข้อมูลที่คุณส่งมา</p>
                    </div>
                </div>
                <div class="step">
                    <div class="step-number">2</div>
                    <div>
                        <strong>ติดต่อกลับ</strong>
                        <p>เราจะติดต่อคุณผ่านอีเมลหรือโทรศัพท์เพื่อนัดหมายการสัมภาษณ์</p>
                    </div>
                </div>
                <div class="step">
                    <div class="step-number">3</div>
                    <div>
                        <strong>สัมภาษณ์</strong>
                        <p>เข้าร่วมสัมภาษณ์ตามวันและเวลาที่กำหนด</p>
                    </div>
                </div>
                <div class="step">
                    <div class="step-number">4</div>
                    <div>
                        <strong>ประกาศผล</strong>
                        <p>ประกาศผลการรับเข้าศึกษาผ่านเว็บไซต์และอีเมล</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>