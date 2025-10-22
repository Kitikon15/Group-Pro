<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สถานะใบสมัคร - มหาวิทยาลัยราชภัฏนครปฐม</title>
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
            min-height: 100vh;
            display: flex;
            flex-direction: column;
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
            height: 50px;
            width: 50px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #fff;
            padding: 2px;
            background: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .logo-text {
            font-size: 18px;
            font-weight: 700;
        }

        .back-link {
            color: #000;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 700;
            transition: opacity 0.3s ease;
        }

        .back-link:hover {
            opacity: 0.8;
        }

        .container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .status-card {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(255, 69, 0, 0.15);
            padding: 50px;
            max-width: 800px;
            width: 100%;
            position: relative;
            overflow: hidden;
            border: 1px solid #ffd7a0;
        }

        .status-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, #FFD700, #FF4500);
        }

        .status-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .status-header h1 {
            font-size: 32px;
            color: #000;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .application-id {
            background: linear-gradient(135deg, #fff0cc, #ffe6b3);
            display: inline-block;
            padding: 8px 20px;
            border-radius: 20px;
            font-weight: 700;
            color: #FF4500;
            margin-bottom: 20px;
        }

        .status-indicator {
            display: inline-block;
            padding: 10px 25px;
            border-radius: 30px;
            font-weight: 700;
            font-size: 18px;
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

        .info-section {
            margin-bottom: 30px;
        }

        .info-section h2 {
            color: #000;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #ffd7a0;
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

        .notes-section {
            background: linear-gradient(135deg, #fff0cc, #ffe6b3);
            border-left: 4px solid #FF4500;
            padding: 20px;
            border-radius: 0 8px 8px 0;
            margin: 30px 0;
        }

        .notes-section h3 {
            color: #000;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
        }

        .notes-content {
            color: #5a5a5a;
            line-height: 1.8;
        }

        .steps {
            margin: 40px 0;
        }

        .steps h2 {
            color: #000;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #ffd7a0;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
        }

        .step {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            align-items: flex-start;
        }

        .step-number {
            background: linear-gradient(135deg, #FFD700, #FF4500);
            color: #000;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            flex-shrink: 0;
            box-shadow: 0 2px 5px rgba(255, 69, 0, 0.3);
        }

        .btn-home {
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
            text-align: center;
            width: 100%;
            margin-top: 20px;
        }

        .btn-home:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(255, 69, 0, 0.4);
        }

        .footer {
            text-align: center;
            padding: 30px;
            color: #000;
            font-size: 14px;
            border-top: 1px solid #ffd7a0;
            background: #fff9e6;
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .status-card {
                padding: 30px 20px;
            }
            
            .status-header h1 {
                font-size: 26px;
            }
            
            .info-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="https://sc.npru.ac.th/sc_major/assets/images/app/logo.jpg" alt="มหาวิทยาลัยราชภัฏนครปฐม">
            <div class="logo-text">มหาวิทยาลัยราชภัฏนครปฐม</div>
        </div>
        <a href="{{ route('admission') }}" class="back-link">
            <i class="fas fa-arrow-left"></i> กลับไปหน้าสมัครเรียน
        </a>
    </div>

    <div class="container">
        <div class="status-card">
            <div class="status-header">
                <h1>สถานะใบสมัครของคุณ</h1>
                <div class="application-id">
                    <i class="fas fa-file-alt"></i> รหัสใบสมัคร: {{ $application->id }}
                </div>
                
                @if($application->status === 'pending')
                    <div class="status-indicator status-pending">
                        <i class="fas fa-clock"></i> รอการอนุมัติจากแอดมิน
                    </div>
                    <p>ใบสมัครของคุณอยู่ในระหว่างการตรวจสอบโดยเจ้าหน้าที่ โปรดรอการติดต่อกลับ</p>
                @elseif($application->status === 'approved')
                    <div class="status-indicator status-approved">
                        <i class="fas fa-check-circle"></i> ได้รับการอนุมัติ
                    </div>
                    <p>ขอแสดงความยินดี! ใบสมัครของคุณได้รับการอนุมัติแล้ว</p>
                @elseif($application->status === 'rejected')
                    <div class="status-indicator status-rejected">
                        <i class="fas fa-times-circle"></i> ไม่ผ่านการอนุมัติ
                    </div>
                    <p>ขออภัย ใบสมัครของคุณไม่ผ่านการอนุมัติ</p>
                @endif
            </div>
            
            <div class="info-section">
                <h2><i class="fas fa-user"></i> ข้อมูลส่วนตัว</h2>
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">ชื่อ-นามสกุล</div>
                        <div class="info-value">{{ $application->title }} {{ $application->first_name }} {{ $application->last_name }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">เลขบัตรประชาชน</div>
                        <div class="info-value">{{ $application->id_card }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">วันเกิด</div>
                        <div class="info-value">{{ $application->birth_date->format('d/m/Y') }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">เพศ</div>
                        <div class="info-value">{{ $application->gender }}</div>
                    </div>
                </div>
            </div>
            
            <div class="info-section">
                <h2><i class="fas fa-home"></i> ข้อมูลที่อยู่</h2>
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">ที่อยู่</div>
                        <div class="info-value">{{ $application->address }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">จังหวัด</div>
                        <div class="info-value">{{ $application->province }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">รหัสไปรษณีย์</div>
                        <div class="info-value">{{ $application->postal_code }}</div>
                    </div>
                </div>
            </div>
            
            <div class="info-section">
                <h2><i class="fas fa-phone"></i> ข้อมูลการติดต่อ</h2>
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">โทรศัพท์</div>
                        <div class="info-value">{{ $application->phone }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">อีเมล</div>
                        <div class="info-value">{{ $application->email }}</div>
                    </div>
                </div>
            </div>
            
            <div class="info-section">
                <h2><i class="fas fa-graduation-cap"></i> ข้อมูลการศึกษา</h2>
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">ระดับการศึกษา</div>
                        <div class="info-value">{{ $application->education_level }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">โรงเรียน/สถาบัน</div>
                        <div class="info-value">{{ $application->school_name }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">เกรดเฉลี่ย</div>
                        <div class="info-value">{{ $application->gpa }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">ปีที่จบการศึกษา</div>
                        <div class="info-value">{{ $application->graduation_year }}</div>
                    </div>
                </div>
            </div>
            
            <div class="info-section">
                <h2><i class="fas fa-book"></i> ข้อมูลการสมัคร</h2>
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">คณะที่สมัคร</div>
                        <div class="info-value">{{ $application->faculty }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">หลักสูตรที่สมัคร</div>
                        <div class="info-value">{{ $application->program }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">วันที่สมัคร</div>
                        <div class="info-value">{{ $application->created_at->format('d/m/Y H:i') }}</div>
                    </div>
                </div>
            </div>
            
            @if($application->admin_notes)
            <div class="notes-section">
                <h3><i class="fas fa-sticky-note"></i> บันทึกจากเจ้าหน้าที่</h3>
                <div class="notes-content">
                    {{ $application->admin_notes }}
                </div>
            </div>
            @endif
            
            <div class="steps">
                <h2><i class="fas fa-list"></i> ขั้นตอนถัดไป</h2>
                @if($application->status === 'pending')
                    <div class="step">
                        <div class="step-number">1</div>
                        <div>
                            <strong>ตรวจสอบข้อมูล</strong>
                            <p>เจ้าหน้าที่กำลังตรวจสอบข้อมูลที่คุณส่งมา (สถานะปัจจุบัน: รอการอนุมัติ)</p>
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
                @elseif($application->status === 'approved')
                    <div class="step">
                        <div class="step-number"><i class="fas fa-check"></i></div>
                        <div>
                            <strong style="color: #2e7d32;">ตรวจสอบข้อมูล - ผ่านการอนุมัติ</strong>
                            <p>ข้อมูลของคุณได้รับการตรวจสอบและอนุมัติแล้ว</p>
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
                @elseif($application->status === 'rejected')
                    <div class="step">
                        <div class="step-number"><i class="fas fa-times"></i></div>
                        <div>
                            <strong style="color: #c62828;">ตรวจสอบข้อมูล - ไม่ผ่านการอนุมัติ</strong>
                            <p>ขออภัย ใบสมัครของคุณไม่ผ่านการอนุมัติ</p>
                            @if($application->admin_notes)
                            <p><strong>เหตุผล:</strong> {{ $application->admin_notes }}</p>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
            
            <a href="{{ route('application.process') }}" class="btn-home" style="margin-bottom: 15px;">
                <i class="fas fa-info-circle"></i> ข้อมูลทั่วไป
            </a>
            
        </div>
    </div>
    
    <div class="footer">
        <p>© 2025 มหาวิทยาลัยราชภัฏนครปฐม คณะวิทยาศาสตร์และเทคโนโลยี</p>
        <p>โทรศัพท์: 0-3423-3274 ต่อ 2111 | อีเมล: sci.npru@gmail.com</p>
    </div>
</body>
</html>