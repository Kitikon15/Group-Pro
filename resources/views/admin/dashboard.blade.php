<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แผงควบคุม Admin - คณะวิทยาศาสตร์และเทคโนโลยี</title>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Sarabun', sans-serif;
        }

        body {
            background-color: #f8f5f5;
            color: #333;
        }

        .header {
            background: linear-gradient(135deg, #8B0000, #A9A9A9);
            color: white;
            padding: 20px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(139, 0, 0, 0.3);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid white;
            padding: 2px;
            background: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }

        .logo-text {
            font-size: 20px;
            font-weight: 600;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #8B0000;
            font-weight: bold;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }

        .logout-btn {
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.5);
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }

        .container {
            display: flex;
            min-height: calc(100vh - 80px);
        }

        .sidebar {
            width: 250px;
            background: #5a5a5a;
            color: white;
            padding: 20px 0;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            margin-bottom: 5px;
        }

        .sidebar-menu a {
            display: block;
            color: #f0f0f0;
            text-decoration: none;
            padding: 15px 20px;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }

        .sidebar-menu a:hover, .sidebar-menu a.active {
            background: #6a6a6a;
            border-left: 4px solid #8B0000;
        }

        .main-content {
            flex: 1;
            padding: 30px;
        }

        .page-title {
            font-size: 24px;
            margin-bottom: 20px;
            color: #8B0000;
            padding-bottom: 15px;
            border-bottom: 2px solid #e0d0d0;
        }

        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(139, 0, 0, 0.15);
            display: flex;
            align-items: center;
            gap: 15px;
            border-left: 4px solid #8B0000;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #e8d8d8;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(139, 0, 0, 0.25);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            background: #f0e0e0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #8B0000;
            font-size: 24px;
        }

        .stat-info h3 {
            font-size: 24px;
            margin-bottom: 5px;
            color: #5a5a5a;
        }

        .stat-info p {
            color: #7f8c8d;
            font-size: 14px;
        }

        .content-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 4px 10px rgba(139, 0, 0, 0.15);
            margin-bottom: 30px;
            border: 1px solid #e8d8d8;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e0d0d0;
        }

        .card-title {
            font-size: 20px;
            color: #8B0000;
        }

        .btn {
            padding: 10px 15px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary {
            background: linear-gradient(135deg, #8B0000, #A0522D);
            color: white;
            box-shadow: 0 4px 10px rgba(139, 0, 0, 0.3);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #A0522D, #8B0000);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(139, 0, 0, 0.4);
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background: #5a6268;
            transform: translateY(-2px);
        }

        .btn-sm {
            padding: 5px 10px;
            font-size: 14px;
        }

        .btn-danger {
            background: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background: #c82333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e0d0d0;
        }

        th {
            background: #f8f0f0;
            font-weight: 600;
            color: #8B0000;
        }

        tr:hover {
            background: #f8f0f0;
        }

        .status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }

        .status-active {
            background: #e8f5e9;
            color: #2e7d32;
        }

        .status-pending {
            background: #fff8e1;
            color: #f57f17;
        }

        .welcome-banner {
            background: linear-gradient(135deg, #f0e0e0, #e0d0d0);
            color: #8B0000;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 4px 15px rgba(139, 0, 0, 0.15);
            border: 1px solid #d0c0c0;
        }

        .welcome-banner h2 {
            margin-bottom: 10px;
            font-size: 24px;
        }

        .welcome-banner p {
            opacity: 0.9;
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
            color: #5a5a5a;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #d0c0c0;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-control:focus {
            border-color: #8B0000;
            outline: none;
            box-shadow: 0 0 0 2px rgba(139, 0, 0, 0.2);
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
            }
            
            .stats-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="https://sc.npru.ac.th/sc_major/assets/images/app/logo.jpg" alt="คณะวิทยาศาสตร์และเทคโนโลยี">
            <div class="logo-text">คณะวิทยาศาสตร์และเทคโนโลยี</div>
        </div>
        <div class="user-info">
            <div class="user-avatar">
                {{ substr(Auth::user()->name, 0, 1) }}
            </div>
            <div>
                {{ Auth::user()->name }}<br>
                <small>ผู้ดูแลระบบ</small>
            </div>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="logout-btn">ออกจากระบบ</a>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>

    <div class="container">
        <div class="sidebar">
            <ul class="sidebar-menu">
                <li><a href="{{ route('admin.dashboard') }}" class="active">แดชบอร์ด</a></li>
                <li><a href="{{ route('admin.news.index') }}">ข่าวสารและกิจกรรม</a></li>
                <li><a href="{{ route('admin.courses.index') }}">หลักสูตร</a></li>
                <li><a href="{{ route('admin.personnels.index') }}">บุคลากร</a></li>
            </ul>
        </div>

        <div class="main-content">
            <h1 class="page-title">แผงควบคุมระบบ</h1>

            <div class="welcome-banner">
                <h2>ยินดีต้อนรับเข้าสู่ระบบจัดการเว็บไซต์</h2>
                <p>คุณ {{ Auth::user()->name }} คุณสามารถจัดการเนื้อหาเว็บไซต์ ข่าวสาร กิจกรรม และข้อมูลอื่นๆ ได้จากแผงควบคุมนี้</p>
            </div>

            <div class="stats-container">
                <div class="stat-card">
                    <div class="stat-icon">👥</div>
                    <div class="stat-info">
                        <h3>1,248</h3>
                        <p>จำนวนนักศึกษา</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">👨‍🏫</div>
                    <div class="stat-info">
                        <h3>42</h3>
                        <p>จำนวนบุคลากร</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">📰</div>
                    <div class="stat-info">
                        <h3>126</h3>
                        <p>ข่าวสารและกิจกรรม</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">📋</div>
                    <div class="stat-info">
                        <h3>8</h3>
                        <p>หลักสูตรทั้งหมด</p>
                    </div>
                </div>
            </div>

            <div class="content-card">
                <div class="card-header">
                    <div class="card-title">ข่าวสารและกิจกรรมล่าสุด</div>
                    <a href="{{ route('admin.news.create') }}" class="btn btn-primary">เพิ่มข้อมูลและแก้ไข</a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>หัวข้อ</th>
                            <th>ประเภท</th>
                            <th>วันที่โพสต์</th>
                            <th>สถานะ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>โครงการอบรมเชิงปฏิบัติการด้านการเขียนโปรแกรม</td>
                            <td>กิจกรรมนักศึกษา</td>
                            <td>15 ก.ย. 2568</td>
                            <td><span class="status status-active">เผยแพร่</span></td>
                        </tr>
                        <tr>
                            <td>ประกาศรับสมัครนักศึกษาปริญญาตรี ปีการศึกษา 2569</td>
                            <td>ประกาศ</td>
                            <td>10 ก.ย. 2568</td>
                            <td><span class="status status-active">เผยแพร่</span></td>
                        </tr>
                        <tr>
                            <td>สัมมนาหัวข้อ "เทคโนโลยีในศตวรรษที่ 21"</td>
                            <td>กิจกรรม</td>
                            <td>5 ก.ย. 2568</td>
                            <td><span class="status status-pending">ร่าง</span></td>
                        </tr>
                        <tr>
                            <td>ตารางสอบกลางภาคเรียนที่ 1/2568</td>
                            <td>ประกาศ</td>
                            <td>1 ก.ย. 2568</td>
                            <td><span class="status status-active">เผยแพร่</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>