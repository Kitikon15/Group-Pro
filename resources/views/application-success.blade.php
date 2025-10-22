<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครเรียนสำเร็จ - มหาวิทยาลัยราชภัฏนครปฐม</title>
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

        .success-card {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(255, 69, 0, 0.15);
            padding: 50px;
            text-align: center;
            max-width: 600px;
            width: 100%;
            position: relative;
            overflow: hidden;
            border: 1px solid #ffd7a0;
        }

        .success-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, #FFD700, #FF4500);
        }

        .check-icon {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #fff0cc, #ffe6b3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            color: #FF4500;
            font-size: 50px;
            border: 3px solid #ffd7a0;
        }

        h1 {
            font-size: 32px;
            color: #000;
            margin-bottom: 20px;
            font-weight: 700;
        }

        p {
            color: #5a5a5a;
            font-size: 18px;
            margin-bottom: 30px;
            line-height: 1.8;
            font-weight: 500;
        }

        .info-box {
            background: linear-gradient(135deg, #fff0cc, #ffe6b3);
            border-left: 4px solid #FF4500;
            padding: 20px;
            border-radius: 0 8px 8px 0;
            text-align: left;
            margin: 30px 0;
            box-shadow: 0 4px 10px rgba(255, 69, 0, 0.15);
        }

        .info-box h3 {
            color: #000;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
        }

        .steps {
            text-align: left;
            margin: 30px 0;
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
        }

        .btn-home:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(255, 69, 0, 0.4);
        }

        .redirect-timer {
            margin-top: 20px;
            padding: 15px;
            background: linear-gradient(135deg, #fff0cc, #ffe6b3);
            border: 1px solid #ffd7a0;
            border-radius: 8px;
            color: #FF4500;
            text-align: center;
            font-weight: 700;
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
            .success-card {
                padding: 30px 20px;
            }
            
            h1 {
                font-size: 26px;
            }
            
            p {
                font-size: 16px;
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
        <a href="{{ url('/admission') }}" class="back-link">
            <i class="fas fa-arrow-left"></i> กลับไปหน้าสมัครเรียน
        </a>
    </div>

    <div class="container">
        <div class="success-card">
            <div class="check-icon">
                <i class="fas fa-check"></i>
            </div>
            
            <h1>สมัครเรียนสำเร็จ!</h1>
            
            <p>
                ขอบคุณที่สนใจเข้าศึกษาในมหาวิทยาลัยราชภัฏนครปฐม<br>
                ใบสมัครของคุณอยู่ในสถานะ <strong style="color: #FF4500;">รอการอนุมัติจากแอดมิน</strong>
            </p>
            
            <div class="info-box">
                <h3><i class="fas fa-info-circle"></i> ข้อมูลสำคัญ</h3>
                <p>ระบบได้รับใบสมัครของคุณเรียบร้อยแล้ว ขณะนี้ใบสมัครของคุณอยู่ในสถานะ "รอการอนุมัติ" เจ้าหน้าที่จะดำเนินการตรวจสอบข้อมูลและติดต่อกลับภายใน 3-5 วันทำการ</p>
            </div>
            
            <div class="steps">
                <h3><i class="fas fa-list"></i> ขั้นตอนถัดไป</h3>
                <div class="step">
                    <div class="step-number">1</div>
                    <div>
                        <strong>ตรวจสอบข้อมูล</strong>
                        <p>เจ้าหน้าที่จะตรวจสอบข้อมูลที่คุณส่งมา (สถานะปัจจุบัน: รอการอนุมัติ)</p>
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
            
            <div class="redirect-timer" id="redirectTimer">
                คุณจะถูกนำไปหน้าสมัครเรียนโดยอัตโนมัติภายใน <span id="countdown">5</span> วินาที
            </div>
            
            <a href="{{ route('admission') }}" class="btn-home">
                <i class="fas fa-user-check"></i> ตรวจสอบสถานะใบสมัคร
            </a>
        </div>
    </div>
    
    <div class="footer">
        <p>© 2025 มหาวิทยาลัยราชภัฏนครปฐม คณะวิทยาศาสตร์และเทคโนโลยี</p>
        <p>โทรศัพท์: 0-3423-3274 ต่อ 2111 | อีเมล: sci.npru@gmail.com</p>
    </div>

    <script>
        // Redirect to admission page after 5 seconds
        let countdown = 5;
        const countdownElement = document.getElementById('countdown');
        
        const redirectTimer = setInterval(function() {
            countdown--;
            countdownElement.textContent = countdown;
            
            if (countdown <= 0) {
                clearInterval(redirectTimer);
                window.location.href = "{{ route('admission') }}";
            }
        }, 1000);
    </script>
</body>
</html>