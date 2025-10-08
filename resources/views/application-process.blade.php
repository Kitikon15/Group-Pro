<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ขั้นตอนการสมัคร - มหาวิทยาลัยราชภัฏนครปฐม</title>
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

        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .back-btn {
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

        .back-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(255, 69, 0, 0.4);
            color: #000;
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
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

        .process-steps {
            display: flex;
            flex-direction: column;
            gap: 25px;
            margin-bottom: 40px;
        }

        .step-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(255, 69, 0, 0.15);
            padding: 30px;
            border: 1px solid #ffd7a0;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .step-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(255, 69, 0, 0.25);
        }

        .step-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: linear-gradient(135deg, #FFD700, #FF4500);
        }

        .step-header {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .step-number {
            background: linear-gradient(135deg, #FFD700, #FF4500);
            color: #000;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.5em;
            box-shadow: 0 4px 10px rgba(255, 69, 0, 0.3);
        }

        .step-title {
            font-size: 1.5em;
            font-weight: 700;
            color: #000;
        }

        .step-description {
            font-size: 1.1em;
            margin-bottom: 20px;
            color: #5a5a5a;
            font-weight: 500;
        }

        .step-details {
            background: #fff9e6;
            border-radius: 10px;
            padding: 20px;
            border-left: 4px solid #FF4500;
        }

        .step-details h4 {
            color: #000;
            margin-bottom: 15px;
            font-size: 1.2em;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .step-details ul {
            list-style: none;
            padding-left: 0;
        }

        .step-details li {
            padding: 8px 0 8px 30px;
            position: relative;
            border-bottom: 1px solid #fff0cc;
            font-weight: 500;
        }

        .step-details li:last-child {
            border-bottom: none;
        }

        .step-details li::before {
            content: "✓";
            color: #FF4500;
            position: absolute;
            left: 0;
            font-weight: bold;
        }

        .important-note {
            background: linear-gradient(135deg, #fff0cc, #ffe6b3);
            border-left: 4px solid #FF4500;
            padding: 25px;
            border-radius: 0 10px 10px 0;
            margin: 30px 0;
            box-shadow: 0 4px 10px rgba(255, 69, 0, 0.15);
        }

        .important-note h3 {
            color: #000;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
        }

        .important-note p {
            font-weight: 500;
            line-height: 1.8;
        }

        .contact-info {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(255, 69, 0, 0.15);
            padding: 30px;
            border: 1px solid #ffd7a0;
            text-align: center;
        }

        .contact-info h3 {
            color: #000;
            margin-bottom: 20px;
            font-size: 1.5em;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-weight: 700;
        }

        .contact-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            background: #fff9e6;
            border-radius: 10px;
            font-weight: 500;
        }

        .contact-icon {
            background: linear-gradient(135deg, #FFD700, #FF4500);
            color: #000;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2em;
            box-shadow: 0 2px 5px rgba(255, 69, 0, 0.3);
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

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
            
            .logo {
                justify-content: center;
            }
            
            .step-header {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }
            
            .step-number {
                width: 60px;
                height: 60px;
                font-size: 2em;
            }
            
            .contact-details {
                grid-template-columns: 1fr;
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
                <small>ระบบข้อมูลขั้นตอนการสมัคร</small>
            </div>
        </div>
        <div class="user-info">
            <a href="{{ route('admission') }}" class="back-btn">
                <i class="fas fa-arrow-left"></i> กลับไปหน้าเมนู
            </a>
        </div>
    </div>

    <div class="container">
        <div class="page-header">
            <h1><i class="fas fa-list-ol"></i> ขั้นตอนการสมัครเข้าศึกษา</h1>
            <p>ข้อมูลเกี่ยวกับกระบวนการสมัครเข้าศึกษาในมหาวิทยาลัยราชภัฏนครปฐม</p>
        </div>

        <div class="important-note">
            <h3><i class="fas fa-exclamation-circle"></i> ข้อมูลสำคัญ</h3>
            <p>ข้อมูลที่แสดงในหน้านี้จัดทำขึ้นจากข้อมูลที่ได้รับมาจากมหาวิทยาลัยราชภัฏนครปฐม ผู้สมัครควรตรวจสอบข้อมูลล่าสุดจากเว็บไซต์ทางการของมหาวิทยาลัยก่อนดำเนินการสมัคร</p>
        </div>

        <div class="process-steps">
            @foreach($steps as $step)
            <div class="step-card">
                <div class="step-header">
                    <div class="step-number">{{ $step['number'] }}</div>
                    <h2 class="step-title">{{ $step['title'] }}</h2>
                </div>
                <p class="step-description">{{ $step['description'] }}</p>
                <div class="step-details">
                    <h4><i class="fas fa-info-circle"></i> รายละเอียดขั้นตอน</h4>
                    <ul>
                        @foreach($step['details'] as $detail)
                        <li>{{ $detail }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endforeach
        </div>

        <div class="contact-info">
            <h3><i class="fas fa-phone"></i> ติดต่อสอบถามข้อมูลเพิ่มเติม</h3>
            <p>หากคุณมีคำถามเพิ่มเติมเกี่ยวกับขั้นตอนการสมัคร สามารถติดต่อสอบถามได้ที่</p>
            
            <div class="contact-details">
                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div>
                        <strong>ที่อยู่:</strong><br>
                        มหาวิทยาลัยราชภัฏนครปฐม<br>
                        85 หมู่ 2 ถนนมาลัยแมน ตำบลพระปฐมเจดีย์ อำเภอเมือง จังหวัดนครปฐม 73000
                    </div>
                </div>
                
                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div>
                        <strong>โทรศัพท์:</strong><br>
                        0-3423-3274 ต่อ 2111
                    </div>
                </div>
                
                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <strong>อีเมล:</strong><br>
                        admission@npru.ac.th
                    </div>
                </div>
                
                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <div>
                        <strong>เว็บไซต์:</strong><br>
                        www.npru.ac.th
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>© 2025 มหาวิทยาลัยราชภัฏนครปฐม ระบบข้อมูลขั้นตอนการสมัคร</p>
        <p>โทรศัพท์: 0-3423-3274 ต่อ 2111 | อีเมล: admission@npru.ac.th</p>
    </div>
</body>
</html>