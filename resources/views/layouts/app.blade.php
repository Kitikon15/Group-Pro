<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'มหาวิทยาลัยราชภัฏนครปฐม')</title>
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

        .nav-menu {
            display: flex;
            gap: 20px;
        }

        .nav-menu a {
            color: #000;
            text-decoration: none;
            font-weight: 600;
            padding: 8px 15px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .nav-menu a:hover {
            background: rgba(0, 0, 0, 0.1);
        }

        .admin-bar {
            background: #8B0000;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .admin-bar a {
            color: white;
            text-decoration: none;
            font-weight: 600;
        }

        .editable-content {
            position: relative;
            display: inline-block;
        }

        .edit-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(139, 0, 0, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            cursor: pointer;
        }

        .editable-content:hover .edit-overlay {
            opacity: 1;
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                gap: 15px;
            }
            
            .nav-menu {
                flex-wrap: wrap;
                justify-content: center;
            }
        }
    </style>
    @yield('styles')
</head>
<body>
    @if(isset($editMode) && $editMode)
    <div class="admin-bar">
        <div>โหมดแก้ไขเนื้อหา</div>
        <a href="{{ route('admin.dashboard') }}">กลับไปที่แผงควบคุม</a>
    </div>
    @endif

    <div class="header">
        <div class="logo">
            <img src="https://sc.npru.ac.th/sc_major/assets/images/app/logo.jpg" alt="คณะวิทยาศาสตร์และเทคโนโลยี">
            <div class="logo-text">มหาวิทยาลัยราชภัฏนครปฐม</div>
        </div>
        <div class="nav-menu">
            <a href="{{ route('index') }}">หน้าแรก</a>
            <a href="{{ route('courses') }}">หลักสูตร</a>
            <a href="{{ route('personnels') }}">บุคลากร</a>
            <a href="{{ route('news') }}">ข่าวสาร</a>
            <a href="{{ route('application.process') }}">กระบวนการสมัคร</a>
        </div>
    </div>

    <main>
        @yield('content')
    </main>

    @yield('scripts')
</body>
</html>