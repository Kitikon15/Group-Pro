<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครเรียน - มหาวิทยาลัยราชภัฏนครปฐม</title>
    
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

        .application-form {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(255, 69, 0, 0.15);
            padding: 40px;
            margin-bottom: 40px;
            border: 1px solid #ffd7a0;
        }

        .form-section {
            margin-bottom: 30px;
        }

        .form-section h2 {
            font-size: 1.8em;
            color: #000;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #ffd7a0;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #5a5a5a;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 14px;
            border: 2px solid #ffd7a0;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: #fff9e6;
            font-weight: 500;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #FF4500;
            outline: none;
            box-shadow: 0 0 0 3px rgba(255, 69, 0, 0.2);
            background: #fff;
        }

        .form-row {
            display: flex;
            gap: 20px;
        }

        .form-row .form-group {
            flex: 1;
        }

        .btn-submit {
            background: linear-gradient(135deg, #FFD700, #FF4500);
            color: #000;
            border: none;
            padding: 16px 30px;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            box-shadow: 0 4px 10px rgba(255, 69, 0, 0.3);
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(255, 69, 0, 0.4);
        }

        .info-box {
            background: linear-gradient(135deg, #fff0cc, #ffe6b3);
            border-left: 4px solid #FF4500;
            padding: 20px;
            border-radius: 0 8px 8px 0;
            margin-bottom: 30px;
            box-shadow: 0 4px 10px rgba(255, 69, 0, 0.15);
        }

        .info-box h3 {
            color: #000;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
        }

        .requirements {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(255, 69, 0, 0.15);
            padding: 30px;
            border: 1px solid #ffd7a0;
        }

        .requirements ul {
            list-style: none;
            padding-left: 0;
        }

        .requirements li {
            padding: 10px 0 10px 30px;
            position: relative;
            border-bottom: 1px solid #fff0cc;
            font-weight: 500;
        }

        .requirements li:last-child {
            border-bottom: none;
        }

        .requirements li:before {
            content: "✓";
            color: #FF4500;
            position: absolute;
            left: 0;
            font-weight: bold;
        }

        .footer {
            text-align: center;
            padding: 30px;
            color: #000;
            font-size: 0.9em;
            margin-top: 40px;
            border-top: 1px solid #ffd7a0;
            background: #fff9e6;
            font-weight: 600;
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
            
            .form-row {
                flex-direction: column;
                gap: 0;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 0 15px;
            }
            
            .sidebar, .application-form, .page-header {
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
        @guest
            @if(!session('has_applied'))
                <a href="{{ route('admin.login') }}" class="logout-btn">
                    <i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ
                </a>
            @else
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form-alt').submit();" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i> ออกจากระบบ
                </a>
                <form id="logout-form-alt" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endif
        @endguest
    </div>

    <div class="container">
        <div class="sidebar">
            <h2>เมนูหลัก</h2>
            <ul class="menu-list">
                <!-- Only show registration menu if user hasn't applied yet -->
                @if(!session('has_applied'))
                    <li><a href="{{ route('application') }}" class="active"><i class="fas fa-user-plus"></i> ลงทะเบียนเข้าระบบ</a></li>
                @endif
                <li><a href="{{ route('admin.login') }}"><i class="fas fa-cog"></i> ระบบจัดการ</a></li>
                <!-- Add link to admission report for admins -->
                @auth
                <li><a href="{{ route('admin.admission.report') }}"><i class="fas fa-chart-bar"></i> รายงานการรับสมัคร</a></li>
                @endauth
                <li><a href="{{ route('faculty.program.quotas') }}"><i class="fas fa-graduation-cap"></i> สาขาและจำนวนที่รับสมัคร</a></li>
                <li><a href="#"><i class="fas fa-question-circle"></i> ตอบคำถาม</a></li>
                <li><a href="{{ route('application.process') }}"><i class="fas fa-list-ol"></i> ขั้นตอนการสมัคร</a></li>
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
            
            <!-- Show success message if exists -->
            @if(session('success'))
                <div class="info-box" style="background: linear-gradient(135deg, #d4edda, #c3e6cb); border-left: 4px solid #28a745;">
                    <h3><i class="fas fa-check-circle"></i> สมัครเรียนสำเร็จ!</h3>
                    <p>{{ session('success') }}</p>
                </div>
            @endif
            
            <!-- Only show application form if user hasn't applied yet -->
            @if(!session('has_applied'))
                <div class="page-header">
                    <h1><i class="fas fa-user-plus"></i> แบบฟอร์มสมัครเรียน</h1>
                    <p>กรุณากรอกข้อมูลด้านล่างเพื่อสมัครเข้าเรียนในมหาวิทยาลัยราชภัฏนครปฐม</p>
                </div>

                <div class="info-box">
                    <h3><i class="fas fa-info-circle"></i> ข้อมูลสำคัญ</h3>
                    <p>กรุณาตรวจสอบความถูกต้องของข้อมูลก่อนส่งแบบฟอร์ม ข้อมูลที่กรอกจะถูกใช้ในการพิจารณาการรับสมัคร</p>
                </div>

                <form class="application-form" method="POST" action="{{ route('application.submit') }}">
                    @csrf
                    <div class="form-section">
                        <h2><i class="fas fa-user"></i> ข้อมูลส่วนตัว</h2>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="title">คำนำหน้าชื่อ</label>
                                <select id="title" name="title" required>
                                    <option value="">เลือกคำนำหน้า</option>
                                    <option value="นาย">นาย</option>
                                    <option value="นางสาว">นางสาว</option>
                                    <option value="นาง">นาง</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="gender">เพศ</label>
                                <select id="gender" name="gender" required>
                                    <option value="">เลือกเพศ</option>
                                    <option value="ชาย">ชาย</option>
                                    <option value="หญิง">หญิง</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="first_name">ชื่อ</label>
                                <input type="text" id="first_name" name="first_name" placeholder="กรุณากรอกชื่อ" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="last_name">นามสกุล</label>
                                <input type="text" id="last_name" name="last_name" placeholder="กรุณากรอกนามสกุล" required>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="id_card">เลขบัตรประชาชน</label>
                                <input type="text" id="id_card" name="id_card" placeholder="กรุณากรอกเลขบัตรประชาชน 13 หลัก" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="birth_date">วัน/เดือน/ปี เกิด</label>
                                <input type="date" id="birth_date" name="birth_date" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-section">
                        <h2><i class="fas fa-home"></i> ที่อยู่ตามทะเบียนบ้าน</h2>
                        
                        <div class="form-group">
                            <label for="address">ที่อยู่</label>
                            <textarea id="address" name="address" rows="3" placeholder="กรุณากรอกที่อยู่ตามทะเบียนบ้าน" required></textarea>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="province">จังหวัด</label>
                                <input type="text" id="province" name="province" placeholder="กรุณากรอกจังหวัด" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="postal_code">รหัสไปรษณีย์</label>
                                <input type="text" id="postal_code" name="postal_code" placeholder="กรุณากรอกรหัสไปรษณีย์" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-section">
                        <h2><i class="fas fa-phone"></i> ข้อมูลการติดต่อ</h2>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="phone">เบอร์โทรศัพท์</label>
                                <input type="tel" id="phone" name="phone" placeholder="กรุณากรอกเบอร์โทรศัพท์" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="email">อีเมล</label>
                                <input type="email" id="email" name="email" placeholder="กรุณากรอกอีเมล" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-section">
                        <h2><i class="fas fa-graduation-cap"></i> ข้อมูลการศึกษา</h2>
                        
                        <div class="form-group">
                            <label for="education_level">ระดับการศึกษา</label>
                            <select id="education_level" name="education_level" required>
                                <option value="">เลือกระดับการศึกษา</option>
                                <option value="ม.6">มัธยมศึกษาตอนปลาย</option>
                                <option value="ปวช.">ประกาศนียบัตรวิชาชีพ</option>
                                <option value="ปวส.">ประกาศนียบัตรวิชาชีพชั้นสูง</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="school_name">ชื่อสถานศึกษา</label>
                            <input type="text" id="school_name" name="school_name" placeholder="กรุณากรอกชื่อสถานศึกษา" required>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="gpa">เกรดเฉลี่ยสะสม</label>
                                <input type="number" id="gpa" name="gpa" step="0.01" min="0" max="4" placeholder="เช่น 3.50" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="graduation_year">ปีที่จบการศึกษา</label>
                                <input type="number" id="graduation_year" name="graduation_year" min="2000" max="2030" placeholder="เช่น 2024" required>
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-paper-plane"></i> ส่งแบบฟอร์มสมัคร
                    </button>
                </form>
                
                <div class="requirements">
                    <h2><i class="fas fa-list"></i> เอกสารที่ต้องใช้ในการสมัคร</h2>
                    <ul>
                        <li>สำเนาบัตรประชาชน 1 ฉบับ</li>
                        <li>สำเนาทะเบียนบ้าน 1 ฉบับ</li>
                        <li>รูปถ่ายหน้าตรง ขนาด 1 นิ้ว 2 ใบ</li>
                        <li>ใบรับรองผลการศึกษา (ปพ.1 หรือ ปพ.7)</li>
                        <li>ใบแสดงผลการเรียน (ปพ.7)</li>
                        <li>สำเนาเกียรติบัตร (ถ้ามี)</li>
                    </ul>
                </div>
                
                <!-- Faculty and Program Information Section -->
                <div class="requirements" style="margin-top: 30px;">
                    <h2><i class="fas fa-university"></i> คณะและสาขาวิชาที่เปิดรับสมัคร</h2>
                    <p>มหาวิทยาลัยราชภัฏนครปฐมมีหลายคณะและสาขาวิชาให้เลือกเรียน ดังนี้:</p>
                    
                    <div style="margin-top: 20px;">
                        <h3 style="color: #000; border-bottom: 1px solid #ffd7a0; padding-bottom: 10px; margin-bottom: 15px;">
                            <i class="fas fa-graduation-cap"></i> คณะวิทยาศาสตร์และเทคโนโลยี
                        </h3>
                        <ul>
                            <li>สาขาวิชาวิศวกรรมซอฟต์แวร์ (Software Engineering)</li>
                            <li>สาขาวิชาวิทยาการคอมพิวเตอร์ (Computer Science)</li>
                            <li>สาขาวิชาเทคโนโลยีสารสนเทศ (Information Technology)</li>
                            <li>สาขาวิชาวิทยาศาสตร์สิ่งแวดล้อม (Environmental Science)</li>
                            <li>สาขาวิชาฟิสิกส์ (Physics)</li>
                            <li>สาขาวิชาเคมี (Chemistry)</li>
                            <li>สาขาวิชาชีววิทยา (Biology)</li>
                            <li>สาขาวิชาคณิตศาสตร์ (Mathematics)</li>
                        </ul>
                    </div>
                    
                    <div style="margin-top: 20px;">
                        <h3 style="color: #000; border-bottom: 1px solid #ffd7a0; padding-bottom: 10px; margin-bottom: 15px;">
                            <i class="fas fa-book"></i> คณะมนุษยศาสตร์และสังคมศาสตร์
                        </h3>
                        <ul>
                            <li>สาขาวิชาภาษาไทย (Thai Language)</li>
                            <li>สาขาวิชาภาษาอังกฤษ (English Language)</li>
                            <li>สาขาวิชาภาษาจีน (Chinese Language)</li>
                            <li>สาขาวิชาประวัติศาสตร์ (History)</li>
                            <li>สาขาวิชาภูมิศาสตร์ (Geography)</li>
                            <li>สาขาวิชารัฐศาสตร์การปกครอง (Political Science and Public Administration)</li>
                            <li>สาขาวิชาสังคมวิทยา (Sociology)</li>
                            <li>สาขาวิชาจิตวิทยา (Psychology)</li>
                        </ul>
                    </div>
                    
                    <div style="margin-top: 20px;">
                        <h3 style="color: #000; border-bottom: 1px solid #ffd7a0; padding-bottom: 10px; margin-bottom: 15px;">
                            <i class="fas fa-chalkboard-teacher"></i> คณะครุศาสตร์
                        </h3>
                        <ul>
                            <li>สาขาวิชาการสอนภาษาอังกฤษ (English Teaching)</li>
                            <li>สาขาวิชาการสอนคณิตศาสตร์ (Mathematics Teaching)</li>
                            <li>สาขาวิชาการสอนวิทยาศาสตร์ (Science Teaching)</li>
                            <li>สาขาวิชาการสอนสังคมศึกษา (Social Studies Teaching)</li>
                            <li>สาขาวิชาการสอนภาษาไทย (Thai Language Teaching)</li>
                        </ul>
                    </div>
                    
                    <div style="margin-top: 20px;">
                        <h3 style="color: #000; border-bottom: 1px solid #ffd7a0; padding-bottom: 10px; margin-bottom: 15px;">
                            <i class="fas fa-business-time"></i> คณะวิทยาการจัดการ
                        </h3>
                        <ul>
                            <li>สาขาวิชาการจัดการ (Management)</li>
                            <li>สาขาวิชาการตลาด (Marketing)</li>
                            <li>สาขาวิชาบัญชี (Accounting)</li>
                            <li>สาขาวิชาการเงิน (Finance)</li>
                            <li>สาขาวิชาคอมพิวเตอร์ธุรกิจ (Business Computer)</li>
                        </ul>
                    </div>
                    
                    <div style="margin-top: 20px;">
                        <h3 style="color: #000; border-bottom: 1px solid #ffd7a0; padding-bottom: 10px; margin-bottom: 15px;">
                            <i class="fas fa-palette"></i> คณะศิลปกรรมศาสตร์
                        </h3>
                        <ul>
                            <li>สาขาวิชาศิลปกรรม (Fine Arts)</li>
                            <li>สาขาวิชาการออกแบบ (Design)</li>
                            <li>สาขาวิชาดนตรี (Music)</li>
                            <li>สาขาวิชาการแสดง (Performing Arts)</li>
                        </ul>
                    </div>
                    
                    <div style="margin-top: 20px;">
                        <h3 style="color: #000; border-bottom: 1px solid #ffd7a0; padding-bottom: 10px; margin-bottom: 15px;">
                            <i class="fas fa-heartbeat"></i> คณะพยาบาลศาสตร์
                        </h3>
                        <ul>
                            <li>สาขาวิชาพยาบาลศาสตร์ (Nursing Science)</li>
                        </ul>
                    </div>
                </div>
            @else
                <!-- Show message after successful application -->
                <div class="page-header">
                    <h1><i class="fas fa-check-circle"></i> สมัครเรียนสำเร็จ!</h1>
                    <p>ขอบคุณที่สมัครเข้าเรียนในมหาวิทยาลัยราชภัฏนครปฐม</p>
                </div>
                
                <div class="info-box" style="background: linear-gradient(135deg, #d4edda, #c3e6cb); border-left: 4px solid #28a745;">
                    <h3><i class="fas fa-info-circle"></i> ข้อมูลสำคัญ</h3>
                    <p>ระบบได้รับใบสมัครของคุณเรียบร้อยแล้ว ทางมหาวิทยาลัยจะดำเนินการตรวจสอบข้อมูลและติดต่อกลับภายใน 3-5 วันทำการ</p>
                </div>
                
                <!-- Display submitted application data -->
                <div class="requirements" style="margin-top: 30px;">
                    <h2><i class="fas fa-file-alt"></i> ข้อมูลการสมัครของคุณ</h2>
                    
                    @php
                        $applicationData = session('application_data', []);
                    @endphp
                    
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; margin-top: 20px;">
                        <div>
                            <h3 style="color: #000; border-bottom: 1px solid #ffd7a0; padding-bottom: 10px; margin-bottom: 15px;">
                                <i class="fas fa-user"></i> ข้อมูลส่วนตัว
                            </h3>
                            <p><strong>ชื่อ-นามสกุล:</strong> {{ $applicationData['title'] ?? '' }} {{ $applicationData['first_name'] ?? '' }} {{ $applicationData['last_name'] ?? '' }}</p>
                            <p><strong>เพศ:</strong> {{ $applicationData['gender'] ?? '' }}</p>
                            <p><strong>เลขบัตรประชาชน:</strong> {{ $applicationData['id_card'] ?? '' }}</p>
                            <p><strong>วันเกิด:</strong> {{ $applicationData['birth_date'] ?? '' }}</p>
                        </div>
                        
                        <div>
                            <h3 style="color: #000; border-bottom: 1px solid #ffd7a0; padding-bottom: 10px; margin-bottom: 15px;">
                                <i class="fas fa-home"></i> ที่อยู่
                            </h3>
                            <p><strong>ที่อยู่:</strong> {{ $applicationData['address'] ?? '' }}</p>
                            <p><strong>จังหวัด:</strong> {{ $applicationData['province'] ?? '' }}</p>
                            <p><strong>รหัสไปรษณีย์:</strong> {{ $applicationData['postal_code'] ?? '' }}</p>
                        </div>
                        
                        <div>
                            <h3 style="color: #000; border-bottom: 1px solid #ffd7a0; padding-bottom: 10px; margin-bottom: 15px;">
                                <i class="fas fa-phone"></i> ข้อมูลการติดต่อ
                            </h3>
                            <p><strong>เบอร์โทรศัพท์:</strong> {{ $applicationData['phone'] ?? '' }}</p>
                            <p><strong>อีเมล:</strong> {{ $applicationData['email'] ?? '' }}</p>
                        </div>
                        
                        <div>
                            <h3 style="color: #000; border-bottom: 1px solid #ffd7a0; padding-bottom: 10px; margin-bottom: 15px;">
                                <i class="fas fa-graduation-cap"></i> ข้อมูลการศึกษา
                            </h3>
                            <p><strong>ระดับการศึกษา:</strong> {{ $applicationData['education_level'] ?? '' }}</p>
                            <p><strong>ชื่อสถานศึกษา:</strong> {{ $applicationData['school_name'] ?? '' }}</p>
                            <p><strong>เกรดเฉลี่ย:</strong> {{ $applicationData['gpa'] ?? '' }}</p>
                            <p><strong>ปีที่จบ:</strong> {{ $applicationData['graduation_year'] ?? '' }}</p>
                        </div>
                        
                        <div>
                            <h3 style="color: #000; border-bottom: 1px solid #ffd7a0; padding-bottom: 10px; margin-bottom: 15px;">
                                <i class="fas fa-university"></i> คณะและสาขาวิชา
                            </h3>
                            <p><strong>คณะที่สนใจ:</strong> {{ $applicationData['faculty'] ?? '' }}</p>
                            <p><strong>สาขาวิชาที่สนใจ:</strong> {{ $applicationData['program'] ?? '' }}</p>
                        </div>
                    </div>
                    
                    <!-- Edit button -->
                    <div style="text-align: center; margin-top: 30px;">
                        <a href="{{ route('application.edit') }}" class="btn-submit" style="text-decoration: none; display: inline-block; background: linear-gradient(135deg, #6c757d, #495057); margin-right: 15px;">
                            <i class="fas fa-edit"></i> แก้ไขข้อมูล
                        </a>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form-bottom').submit();" class="btn-submit" style="text-decoration: none; display: inline-block;">
                            <i class="fas fa-sign-out-alt"></i> ออกจากระบบ
                        </a>
                    </div>
                </div>
                
                <div class="steps">
                    <h3><i class="fas fa-list"></i> ขั้นตอนถัดไป</h3>
                    <div class="step">
                        <div class="step-number">1</div>
                        <div>
                            <strong>ตรวจสอบข้อมูล</strong>
                            <p>เจ้าหน้าที่จะตรวจสอบข้อมูลที่คุณส่งมา</p>
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
                
                <!-- Add logout button after successful registration -->
                <div style="text-align: center; margin-top: 30px; display: none;">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form-bottom').submit();" class="btn-submit" style="text-decoration: none; display: inline-block;">
                        <i class="fas fa-sign-out-alt"></i> ออกจากระบบ
                    </a>
                    <form id="logout-form-bottom" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            @endif
        </div>
    </div>

    <div class="footer">
        <p>© 2025 มหาวิทยาลัยราชภัฏนครปฐม คณะวิทยาศาสตร์และเทคโนโลยี</p>
        <p>โทรศัพท์: 0-3423-3274 ต่อ 2111 | อีเมล: sci.npru@gmail.com</p>
    </div>

</body>
</html>