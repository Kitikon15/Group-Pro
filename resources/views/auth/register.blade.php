<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลงทะเบียน - มหาวิทยาลัยราชภัฏนครปฐม</title>
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
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #333;
        }

        .register-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(255, 69, 0, 0.3);
            width: 100%;
            max-width: 450px;
            padding: 40px;
            text-align: center;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 215, 0, 0.3);
            position: relative;
            overflow: hidden;
        }

        .register-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, #FFD700, #FF4500);
        }

        .logo {
            margin-bottom: 30px;
        }

        .logo img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #FF4500;
            padding: 5px;
            background: white;
            margin: 0 auto;
            box-shadow: 0 4px 8px rgba(255, 69, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .logo img:hover {
            transform: scale(1.05);
        }

        h1 {
            color: #000;
            margin-bottom: 10px;
            font-size: 28px;
            font-weight: 700;
        }

        .subtitle {
            color: #5a5a5a;
            margin-bottom: 30px;
            font-size: 16px;
            font-weight: 500;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #5a5a5a;
        }

        input {
            width: 100%;
            padding: 15px;
            border: 2px solid #ffd7a0;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s;
            background: #fff9e6;
            font-weight: 500;
        }

        input:focus {
            border-color: #FF4500;
            outline: none;
            box-shadow: 0 0 0 3px rgba(255, 69, 0, 0.2);
            background: #fff;
        }

        .btn-register {
            background: linear-gradient(135deg, #FFD700, #FF4500);
            color: #000;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
            box-shadow: 0 4px 10px rgba(255, 69, 0, 0.3);
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(255, 69, 0, 0.4);
            background: linear-gradient(135deg, #FF4500, #FFD700);
        }

        .btn-register:active {
            transform: translateY(0);
        }

        .back-link {
            display: block;
            margin-top: 20px;
            color: #FF4500;
            text-decoration: none;
            font-weight: 700;
            transition: color 0.3s;
        }

        .back-link:hover {
            color: #FF8C00;
            text-decoration: underline;
        }

        .footer {
            margin-top: 30px;
            color: #5a5a5a;
            font-size: 14px;
            font-weight: 600;
        }

        .error-message {
            background: #ffe6e6;
            color: #cc0000;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid #ffcccc;
            text-align: left;
            font-weight: 500;
        }
        
        .password-requirements {
            background: #fff0cc;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
            text-align: left;
            font-size: 14px;
        }
        
        .password-requirements h3 {
            color: #000;
            margin-bottom: 10px;
            font-weight: 600;
        }
        
        .password-requirements ul {
            padding-left: 20px;
            margin: 0;
        }
        
        .password-requirements li {
            margin-bottom: 5px;
            color: #5a5a5a;
        }

        @media (max-width: 480px) {
            .register-container {
                padding: 30px 20px;
                margin: 0 15px;
            }
            
            h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="logo">
            <img src="https://sc.npru.ac.th/sc_major/assets/images/app/logo.jpg" alt="มหาวิทยาลัยราชภัฏนครปฐม">
        </div>
        <h1>ลงทะเบียนผู้ใช้งาน</h1>
        <p class="subtitle">มหาวิทยาลัยราชภัฏนครปฐม</p>
        
        @if ($errors->any())
            <div class="error-message">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif
        
        @if (session('success'))
            <div class="error-message" style="background: #e6ffe6; color: #006600; border-color: #ccffcc;">
                {{ session('success') }}
            </div>
        @endif
        
        <form method="POST" action="{{ route('register.submit') }}">
            @csrf
            <div class="form-group">
                <label for="name">ชื่อ</label>
                <input type="text" id="name" name="name" placeholder="กรุณากรอกชื่อ" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <label for="email">อีเมล</label>
                <input type="email" id="email" name="email" placeholder="กรุณากรอกอีเมล" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
                <label for="password">รหัสผ่าน</label>
                <input type="password" id="password" name="password" placeholder="กรุณากรอกรหัสผ่าน" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">ยืนยันรหัสผ่าน</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="ยืนยันรหัสผ่าน" required>
            </div>
            <button type="submit" class="btn-register">ลงทะเบียน</button>
        </form>
        
        <div class="password-requirements">
            <h3><i class="fas fa-lock"></i> ข้อกำหนดสำหรับรหัสผ่าน</h3>
            <ul>
                <li>ต้องมีอย่างน้อย 8 ตัวอักษร</li>
                <li>ต้องมีอักขระพิเศษอย่างน้อย 1 ตัว (!@#$%^&*(),.?":{}|&lt;&gt;)</li>
                <li>ต้องตรงกับยืนยันรหัสผ่าน</li>
            </ul>
        </div>
        
        <a href="{{ route('login') }}" class="back-link">← ไปยังหน้าเข้าสู่ระบบ</a>
        
        <div class="footer">
            <p>© 2025 มหาวิทยาลัยราชภัฏนครปฐม</p>
        </div>
    </div>
</body>
</html>