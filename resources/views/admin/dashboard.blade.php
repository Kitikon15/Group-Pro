<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แผงควบคุม Admin - คณะวิทยาศาสตร์และเทคโนโลยี</title>
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
            transition: all 0.3s ease;
        }

        .sidebar.collapsed {
            width: 60px;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            margin-bottom: 5px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
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

        .sidebar.collapsed .sidebar-menu a span {
            display: none;
        }

        .sidebar.collapsed .sidebar-menu a i {
            margin-right: 0;
            text-align: center;
            width: 100%;
        }

        .sidebar.collapsed .sidebar-menu a {
            justify-content: center;
            padding: 15px 10px;
        }

        .sidebar-toggle {
            background: #4a4a4a;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            width: 100%;
            text-align: center;
        }

        .main-content {
            flex: 1;
            padding: 30px;
        }

        .breadcrumb {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .breadcrumb a {
            color: #007bff;
            text-decoration: none;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        .breadcrumb .separator {
            color: #6c757d;
        }

        .page-title {
            font-size: 24px;
            margin-bottom: 20px;
            color: #8B0000;
            padding-bottom: 15px;
            border-bottom: 2px solid #e0d0d0;
            display: flex;
            justify-content: space-between;
            align-items: center;
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

        .status-danger {
            background: #ffebee;
            color: #c62828;
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
            
            .sidebar.collapsed {
                width: 100%;
            }
            
            .sidebar.collapsed .sidebar-menu a span {
                display: inline;
            }
            
            .sidebar.collapsed .sidebar-menu a i {
                margin-right: 10px;
                width: auto;
                text-align: left;
            }
            
            .sidebar.collapsed .sidebar-menu a {
                justify-content: flex-start;
                padding: 15px 20px;
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
        <div class="sidebar" id="sidebar">
            <button class="sidebar-toggle" onclick="toggleSidebar()">
                <i class="fas fa-bars"></i>
            </button>
            <ul class="sidebar-menu">
                <li><a href="{{ route('admin.dashboard') }}" class="active">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>แดชบอร์ด</span>
                </a></li>
                <li><a href="{{ route('admin.news.index') }}">
                    <i class="fas fa-newspaper"></i>
                    <span>ข่าวสารและกิจกรรม</span>
                </a></li>
                <li><a href="{{ route('admin.courses.index') }}">
                    <i class="fas fa-graduation-cap"></i>
                    <span>หลักสูตร</span>
                </a></li>
                <li><a href="{{ route('admin.personnels.index') }}">
                    <i class="fas fa-users"></i>
                    <span>บุคลากร</span>
                </a></li>
                <li><a href="{{ route('admin.applications.index') }}">
                    <i class="fas fa-file-alt"></i>
                    <span>ใบสมัคร</span>
                </a></li>
                <li><a href="{{ route('admin.admission.report') }}">
                    <i class="fas fa-chart-bar"></i>
                    <span>รายงานการรับสมัคร</span>
                </a></li>
            </ul>
        </div>

        <div class="main-content">
            <div class="breadcrumb">
                <a href="{{ route('admin.dashboard') }}">หน้าหลัก</a>
                <span class="separator">/</span>
                <span>แดชบอร์ด</span>
            </div>
            
            <div class="page-title">
                <span>แผงควบคุมระบบ</span>
                <div>
                    <button class="btn btn-secondary btn-sm" onclick="location.reload()">
                        <i class="fas fa-sync-alt"></i> รีเฟรช
                    </button>
                </div>
            </div>

            <div class="welcome-banner">
                <h2>ยินดีต้อนรับเข้าสู่ระบบจัดการเว็บไซต์</h2>
                <p>คุณ {{ Auth::user()->name }} คุณสามารถจัดการเนื้อหาเว็บไซต์ ข่าวสาร กิจกรรม และข้อมูลอื่นๆ ได้จากแผงควบคุมนี้</p>
            </div>

            <div class="stats-container">
                <div class="stat-card">
                    <div class="stat-icon">👥</div>
                    <div class="stat-info">
                        <h3>{{ \App\Models\User::count() }}</h3>
                        <p>จำนวนนักศึกษา</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">👨‍🏫</div>
                    <div class="stat-info">
                        <h3>{{ \App\Models\Personnel::count() }}</h3>
                        <p>จำนวนบุคลากร</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">📰</div>
                    <div class="stat-info">
                        <h3>{{ \App\Models\News::count() }}</h3>
                        <p>ข่าวสารและกิจกรรม</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">📋</div>
                    <div class="stat-info">
                        <h3>{{ \App\Models\Course::count() }}</h3>
                        <p>หลักสูตรทั้งหมด</p>
                    </div>
                </div>
            </div>

            <div class="stats-container">
                <div class="stat-card">
                    <div class="stat-icon">📝</div>
                    <div class="stat-info">
                        <h3>{{ \App\Models\Application::count() }}</h3>
                        <p>ใบสมัครทั้งหมด</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">⏳</div>
                    <div class="stat-info">
                        <h3>{{ \App\Models\Application::where('status', 'pending')->count() }}</h3>
                        <p>รอการตรวจสอบ</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">✅</div>
                    <div class="stat-info">
                        <h3>{{ \App\Models\Application::where('status', 'approved')->count() }}</h3>
                        <p>อนุมัติ</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">❌</div>
                    <div class="stat-info">
                        <h3>{{ \App\Models\Application::where('status', 'rejected')->count() }}</h3>
                        <p>ไม่อนุมัติ</p>
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
                        @foreach(\App\Models\News::latest()->limit(4)->get() as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->type }}</td>
                            <td>{{ $item->publish_date->format('d/m/Y') }}</td>
                            <td>
                                @if($item->status == 'เผยแพร่')
                                    <span class="status status-active">เผยแพร่</span>
                                @else
                                    <span class="status status-pending">ร่าง</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('collapsed');
        }
    </script>
</body>
</html>