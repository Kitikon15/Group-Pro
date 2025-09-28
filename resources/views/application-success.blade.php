<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครเรียนสำเร็จ - คณะวิทยาศาสตร์และเทคโนโลยี</title>
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
            min-height: 100vh;
            display: flex;
            flex-direction: column;
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
            height: 50px;
            width: 50px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid white;
            padding: 2px;
            background: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .logo-text {
            font-size: 18px;
            font-weight: 700;
        }

        .back-link {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 500;
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
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(139, 0, 0, 0.15);
            padding: 50px;
            text-align: center;
            max-width: 600px;
            width: 100%;
            position: relative;
            overflow: hidden;
            border: 1px solid #e8d8d8;
        }

        .success-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, #8B0000, #A9A9A9);
        }

        .check-icon {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #f0e0e0, #e0d0d0);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            color: #8B0000;
            font-size: 50px;
            border: 3px solid #d0c0c0;
        }

        h1 {
            font-size: 32px;
            color: #8B0000;
            margin-bottom: 20px;
        }

        p {
            color: #5a5a5a;
            font-size: 18px;
            margin-bottom: 30px;
            line-height: 1.8;
        }

        .info-box {
            background: linear-gradient(135deg, #f0e0e0, #e0d0d0);
            border-left: 4px solid #8B0000;
            padding: 20px;
            border-radius: 0 8px 8px 0;
            text-align: left;
            margin: 30px 0;
            box-shadow: 0 4px 10px rgba(139, 0, 0, 0.15);
        }

        .info-box h3 {
            color: #8B0000;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .steps {
            text-align: left;
            margin: 30px 0;
        }

        .steps h3 {
            color: #8B0000;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .step {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            align-items: flex-start;
        }

        .step-number {
            background: linear-gradient(135deg, #8B0000, #A0522D);
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            flex-shrink: 0;
            box-shadow: 0 2px 5px rgba(139, 0, 0, 0.3);
        }

        .btn-home {
            background: linear-gradient(135deg, #8B0000, #A0522D);
            color: white;
            border: none;
            padding: 16px 40px;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            box-shadow: 0 4px 10px rgba(139, 0, 0, 0.3);
        }

        .btn-home:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(139, 0, 0, 0.4);
        }

        .redirect-timer {
            margin-top: 20px;
            padding: 15px;
            background: linear-gradient(135deg, #f0e0e0, #e0d0d0);
            border: 1px solid #d0c0c0;
            border-radius: 8px;
            color: #8B0000;
            text-align: center;
        }

        .footer {
            text-align: center;
            padding: 30px;
            color: #7f8c8d;
            font-size: 14px;
            border-top: 1px solid #eee;
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
            <img src="https://via.placeholder.com/50x50/007bff/ffffff?text=SCI" alt="คณะวิทยาศาสตร์และเทคโนโลยี">
            <div class="logo-text">คณะวิทยาศาสตร์และเทคโนโลยี</div>
        </div>
        <a href="{{ url('/admission') }}" class="back-link">
            <i class="fas fa-arrow-left"></i> กลับไปหน้าหลัก
        </a>
    </div>

    <div class="container">
        <div class="success-card">
            <div class="check-icon">
                <i class="fas fa-check"></i>
            </div>
            
            <h1>สมัครเรียนสำเร็จ!</h1>
            
            <p>
                ขอบคุณที่สนใจเข้าศึกษาในหลักสูตรวิศวกรรมซอฟต์แวร์<br>
                คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏนครปฐม
            </p>
            
            <div class="info-box">
                <h3><i class="fas fa-info-circle"></i> ข้อมูลสำคัญ</h3>
                <p>ระบบได้รับใบสมัครของคุณเรียบร้อยแล้ว ทางคณะจะดำเนินการตรวจสอบข้อมูลและติดต่อกลับภายใน 3-5 วันทำการ</p>
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
            
            <div class="redirect-timer" id="redirectTimer">
                คุณจะถูกนำไปหน้าหลักโดยอัตโนมัติภายใน <span id="countdown">5</span> วินาที
            </div>
            
            <a href="{{ url('/admission') }}" class="btn-home">
                <i class="fas fa-home"></i> กลับไปหน้าหลักตอนนี้
            </a>
        </div>
    </div>
    
    <div class="footer">
        <p>© 2025 คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏนครปฐม</p>
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
                window.location.href = "{{ url('/admission') }}";
            }
        }, 1000);
    </script>
</body>
</html>