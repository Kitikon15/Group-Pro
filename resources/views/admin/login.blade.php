<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ Admin - คณะวิทยาศาสตร์และเทคโนโลยี</title>
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
            box-shadow: 0 10px 30px rgba(139, 0, 0, 0.3);
            width: 100%;
            max-width: 450px;
            padding: 40px;
            text-align: center;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
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
            background: linear-gradient(90deg, #8B0000, #A9A9A9);
        }

        .logo {
            margin-bottom: 30px;
        }

        .logo img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #8B0000;
            padding: 5px;
            background: white;
            margin: 0 auto;
            box-shadow: 0 4px 8px rgba(139, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .logo img:hover {
            transform: scale(1.05);
        }

        h1 {
            color: #8B0000;
            margin-bottom: 10px;
            font-size: 28px;
            font-weight: 700;
        }

        .subtitle {
            color: #7f8c8d;
            margin-bottom: 30px;
            font-size: 16px;
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
            border: 2px solid #d0c0c0;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s;
            background: #fafafa;
        }

        input:focus {
            border-color: #8B0000;
            outline: none;
            box-shadow: 0 0 0 3px rgba(139, 0, 0, 0.2);
            background: #fff;
        }

        .btn-login {
            background: linear-gradient(135deg, #8B0000, #A0522D);
            color: white;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
            box-shadow: 0 4px 10px rgba(139, 0, 0, 0.3);
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(139, 0, 0, 0.4);
            background: linear-gradient(135deg, #A0522D, #8B0000);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .back-link {
            display: block;
            margin-top: 20px;
            color: #8B0000;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }

        .back-link:hover {
            color: #A0522D;
            text-decoration: underline;
        }

        .footer {
            margin-top: 30px;
            color: #7f8c8d;
            font-size: 14px;
        }

        .error-message {
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid #f5c6cb;
            text-align: left;
        }

        .credentials-info {
            background: linear-gradient(135deg, #f0e0e0, #e0d0d0);
            border-left: 4px solid #8B0000;
            padding: 15px;
            border-radius: 0 8px 8px 0;
            margin: 20px 0;
            text-align: left;
            font-size: 14px;
        }

        .credentials-info h3 {
            color: #8B0000;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .credentials-info p {
            margin: 5px 0;
            color: #5a5a5a;
        }

        .credentials-info .highlight {
            background: #8B0000;
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
            <img src="https://sc.npru.ac.th/sc_major/assets/images/app/logo.jpg" alt="คณะวิทยาศาสตร์และเทคโนโลยี">
        </div>
        <h1>เข้าสู่ระบบ Admin</h1>
        <p class="subtitle">คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏนครปฐม</p>
        
        @if ($errors->any())
            <div class="error-message">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif
        
        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            <div class="form-group">
                <label for="username">อีเมล</label>
                <input type="text" id="username" name="username" placeholder="กรุณากรอกอีเมล" value="{{ old('username', 'kitikon@gmail.com') }}" required>
            </div>
            <div class="form-group">
                <label for="password">รหัสผ่าน</label>
                <input type="password" id="password" name="password" placeholder="กรุณากรอกรหัสผ่าน" required>
            </div>
            <button type="submit" class="btn-login">เข้าสู่ระบบ</button>
        </form>
        
        <a href="{{ url('/admission') }}" class="back-link">← กลับไปหน้าหลัก</a>
        
        <div class="footer">
            <p>© 2025 คณะวิทยาศาสตร์และเทคโนโลยี NPRU</p>
        </div>
    </div>
</body>
</html>