<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สาขาและจำนวนที่รับสมัคร - มหาวิทยาลัยราชภัฏนครปฐม</title>
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

        .faculty-section {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(255, 69, 0, 0.15);
            padding: 25px;
            margin-bottom: 30px;
            border: 1px solid #ffd7a0;
            transition: all 0.3s ease;
        }

        .faculty-section:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(255, 69, 0, 0.25);
        }

        .faculty-header {
            background: linear-gradient(135deg, #FFD700, #FF4500);
            color: #000;
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .program-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .program-table th {
            background: #fff0cc;
            padding: 12px 15px;
            text-align: left;
            border-bottom: 2px solid #ffd7a0;
            font-weight: 700;
        }

        .program-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #ffd7a0;
        }

        .program-table tr:nth-child(even) {
            background: #fff9e6;
        }

        .program-table tr:hover {
            background: #fff0cc;
        }

        .quota-bar-container {
            width: 100%;
            background: #f0f0f0;
            border-radius: 10px;
            height: 20px;
            overflow: hidden;
        }

        .quota-bar {
            height: 100%;
            border-radius: 10px;
            transition: width 0.5s ease;
        }

        .quota-low {
            background: linear-gradient(90deg, #4CAF50, #8BC34A);
        }

        .quota-medium {
            background: linear-gradient(90deg, #FFC107, #FF9800);
        }

        .quota-high {
            background: linear-gradient(90deg, #FF5722, #F44336);
        }

        .quota-text {
            font-weight: 600;
            text-align: center;
        }

        .summary-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .summary-card {
            background: #fff;
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(255, 69, 0, 0.15);
            border: 1px solid #ffd7a0;
            transition: all 0.3s ease;
        }

        .summary-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(255, 69, 0, 0.25);
        }

        .summary-card h3 {
            color: #000;
            margin-bottom: 15px;
            font-size: 1.2em;
        }

        .summary-card .number {
            font-size: 2.5em;
            font-weight: 700;
            color: #FF4500;
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
            
            .program-table {
                font-size: 0.9em;
            }
            
            .program-table th,
            .program-table td {
                padding: 8px 10px;
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
                <small>ระบบข้อมูลสาขาและจำนวนที่รับสมัคร</small>
            </div>
        </div>
        <div class="user-info">
            <a href="{{ url('/') }}" class="back-btn">
                <i class="fas fa-arrow-left"></i> กลับไปหน้าหลัก
            </a>
        </div>
    </div>

    <div class="container">
        <div class="page-header">
            <h1><i class="fas fa-graduation-cap"></i> สาขาและจำนวนที่รับสมัคร</h1>
            <p>ข้อมูลจำนวนที่นั่งและจำนวนผู้สมัครในแต่ละสาขา</p>
        </div>

        <div class="summary-cards">
            <div class="summary-card">
                <h3>จำนวนคณะทั้งหมด</h3>
                <div class="number">{{ count($facultyPrograms) }}</div>
            </div>
            <div class="summary-card">
                <h3>จำนวนสาขาวิชาทั้งหมด</h3>
                <div class="number">
                    @php
                        $totalPrograms = 0;
                        foreach($facultyPrograms as $faculty) {
                            $totalPrograms += count($faculty['programs']);
                        }
                        echo $totalPrograms;
                    @endphp
                </div>
            </div>
            <div class="summary-card">
                <h3>จำนวนที่นั่งทั้งหมด</h3>
                <div class="number">
                    @php
                        $totalQuota = 0;
                        foreach($facultyPrograms as $faculty) {
                            foreach($faculty['programs'] as $program) {
                                $totalQuota += $program['quota'];
                            }
                        }
                        echo $totalQuota;
                    @endphp
                </div>
            </div>
            <div class="summary-card">
                <h3>จำนวนผู้สมัครทั้งหมด</h3>
                <div class="number">
                    @php
                        $totalRegistered = 0;
                        foreach($facultyPrograms as $faculty) {
                            foreach($faculty['programs'] as $program) {
                                $totalRegistered += $program['registered'];
                            }
                        }
                        echo $totalRegistered;
                    @endphp
                </div>
            </div>
        </div>

        @foreach($facultyPrograms as $faculty)
        <div class="faculty-section">
            <div class="faculty-header">
                <i class="fas fa-university"></i>
                <h2>{{ $faculty['faculty'] }}</h2>
            </div>
            
            <table class="program-table">
                <thead>
                    <tr>
                        <th>สาขาวิชา</th>
                        <th>จำนวนที่รับ</th>
                        <th>จำนวนผู้สมัคร</th>
                        <th>สถานะการสมัคร</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($faculty['programs'] as $program)
                    <tr>
                        <td>{{ $program['name'] }}</td>
                        <td>{{ $program['quota'] }}</td>
                        <td>{{ $program['registered'] }}</td>
                        <td>
                            <div style="display: flex; flex-direction: column; gap: 8px;">
                                <div class="quota-bar-container">
                                    @php
                                        $percentage = ($program['registered'] / $program['quota']) * 100;
                                        $barClass = 'quota-low';
                                        if ($percentage >= 80) {
                                            $barClass = 'quota-high';
                                        } elseif ($percentage >= 50) {
                                            $barClass = 'quota-medium';
                                        }
                                        $width = min($percentage, 100);
                                    @endphp
                                    <div class="quota-bar <?php echo e($barClass); ?>" style="width: <?php echo e($width); ?>%"></div>
                                </div>
                                <div class="quota-text">
                                    {{ number_format($percentage, 1) }}% ของจำนวนที่รับ
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endforeach
    </div>

    <div class="footer">
        <p>© 2025 มหาวิทยาลัยราชภัฏนครปฐม ระบบข้อมูลสาขาและจำนวนที่รับสมัคร</p>
        <p>โทรศัพท์: 0-3423-3274 ต่อ 2111 | อีเมล: admission@npru.ac.th</p>
    </div>
</body>
</html>