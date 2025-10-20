<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ - มหาวิทยาลัยราชภัฏนครปฐม</title>
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

        .login-container {
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

        .login-container::before {
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

        .btn-login {
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

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(255, 69, 0, 0.4);
            background: linear-gradient(135deg, #FF4500, #FFD700);
        }

        .btn-login:active {
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

        .credentials-info {
            background: linear-gradient(135deg, #fff0cc, #ffe6b3);
            border-left: 4px solid #FF4500;
            padding: 15px;
            border-radius: 0 8px 8px 0;
            margin: 20px 0;
            text-align: left;
            font-size: 14px;
        }

        .credentials-info h3 {
            color: #000;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
        }

        .credentials-info p {
            margin: 5px 0;
            color: #5a5a5a;
            font-weight: 500;
        }

        .credentials-info .highlight {
            background: #FF4500;
            color: white;
            padding: 2px 6px;
            border-radius: 4px;
            font-weight: 600;
        }

        @media (max-width: 480px) {
            .login-container {
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
    <div class="login-container">
        <div class="logo">
            <img src="https://sc.npru.ac.th/sc_major/assets/images/app/logo.jpg" alt="มหาวิทยาลัยราชภัฏนครปฐม">
        </div>
        <h1>เข้าสู่ระบบ</h1>
        <p class="subtitle">มหาวิทยาลัยราชภัฏนครปฐม</p>
        
        @if ($errors->any())
            <div class="error-message">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif
        
        <form method="POST" action="{{ route('login.submit') }}">
            @csrf
            <div class="form-group">
                <label for="email">อีเมล</label>
                <input type="email" id="email" name="email" placeholder="กรุณากรอกอีเมล" value="{{ old('email') }}" required>
            </div>
            <button type="submit" class="btn-login">เข้าสู่ระบบ</button>
        </form>
        
        <div class="credentials-info">
            <h3><i class="fas fa-info-circle"></i> ข้อมูลสำหรับเข้าสู่ระบบ</h3>
            <p>กรุณากรอกอีเมลที่ใช้สมัครเรียนไว้ เพื่อเข้าสู่ระบบ</p>
            <p>หากยังไม่มีบัญชี ระบบจะสร้างให้โดยอัตโนมัติเมื่อคุณเข้าสู่ระบบ</p>
        </div>
        
        <a href="{{ route('index') }}" class="back-link">← กลับไปหน้าหลัก</a>
        
        <div class="footer">
            <p>© 2025 มหาวิทยาลัยราชภัฏนครปฐม</p>
        </div>
    </div>
</body>
</html>