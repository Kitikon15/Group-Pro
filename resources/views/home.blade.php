<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>คณะวิทยาศาสตร์และเทคโนโลยี - สาขาวิชา</title>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
        }

        /* ส่วนหัวของหน้า (Header) */
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            background: linear-gradient(135deg, #8B0000, #A0522D);
            color: white;
            box-shadow: 0 4px 15px rgba(139, 0, 0, 0.4);
            border-radius: 0 0 15px 15px;
        }

        .logo-text {
            display: flex;
            align-items: center;
            font-size: 1.5em;
            font-weight: bold;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .navbar a {
            text-decoration: none;
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: 500;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.1);
            margin: 0 5px;
        }

        .navbar a:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .navbar .register-btn {
            background: linear-gradient(135deg, #2E8B57, #3CB371);
            color: white;
            padding: 10px 20px;
            margin-left: 15px;
            border-radius: 25px;
            box-shadow: 0 4px 12px rgba(46, 139, 87, 0.4);
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .navbar .register-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(46, 139, 87, 0.6);
            background: linear-gradient(135deg, #3CB371, #2E8B57);
        }

        /* ส่วนแสดงรายชื่อสาขาวิชา (Main Content Grid) */
        .major-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 25px;
            padding: 50px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .major-item {
            flex-basis: calc(33.333% - 25px);
            max-width: 380px;
            height: 220px;
            background: linear-gradient(135deg, #6A5ACD, #7B68EE);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-size: 1.3em;
            font-weight: bold;
            text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.5);
            border-radius: 15px;
            overflow: hidden;
            position: relative;
            cursor: pointer;
            transition: all 0.4s ease;
            border: 3px solid #FFFFFF;
            box-shadow: 0 8px 25px rgba(106, 90, 205, 0.4);
        }

        .major-item:hover {
            transform: scale(1.05) translateY(-10px);
            box-shadow: 0 15px 35px rgba(106, 90, 205, 0.6);
            background: linear-gradient(135deg, #7B68EE, #9370DB);
        }

        /* สไตล์สำหรับพื้นหลังของแต่ละช่อง (แทนที่ด้วยรูปภาพจริง) */
        .major-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            filter: brightness(70%);
            z-index: 1;
        }

        .major-item span {
            position: relative;
            z-index: 2;
            padding: 20px;
            line-height: 1.5;
            background: rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            backdrop-filter: blur(5px);
        }

        /* การกำหนดภาพพื้นหลัง (จำลองจากภาพที่ให้มา) */
        /* แถวที่ 1 */
        .major-item:nth-child(1) { background: linear-gradient(135deg, #DC143C, #FF6347); }
        .major-item:nth-child(1):hover { background: linear-gradient(135deg, #FF6347, #FF4500); }
        .major-item:nth-child(1)::before { background-image: url('path/to/image_physics.jpg'); }
        
        .major-item:nth-child(2) { background: linear-gradient(135deg, #4169E1, #1E90FF); }
        .major-item:nth-child(2):hover { background: linear-gradient(135deg, #1E90FF, #00BFFF); }
        .major-item:nth-child(2)::before { background-image: url('path/to/image_datascience.jpg'); }
        
        .major-item:nth-child(3) { background: linear-gradient(135deg, #32CD32, #228B22); }
        .major-item:nth-child(3):hover { background: linear-gradient(135deg, #228B22, #006400); }
        .major-item:nth-child(3)::before { background-image: url('path/to/image_compsci.jpg'); }

        /* แถวที่ 2 */
        .major-item:nth-child(4) { background: linear-gradient(135deg, #FFD700, #FFA500); }
        .major-item:nth-child(4):hover { background: linear-gradient(135deg, #FFA500, #FF8C00); }
        .major-item:nth-child(4)::before { background-image: url('path/to/image_gensci.jpg'); }
        
        .major-item:nth-child(5) { background: linear-gradient(135deg, #8B008B, #9932CC); }
        .major-item:nth-child(5):hover { background: linear-gradient(135deg, #9932CC, #BA55D3); }
        .major-item:nth-child(5)::before { background-image: url('path/to/image_softwareeng.jpg'); } 
        
        .major-item:nth-child(6) { background: linear-gradient(135deg, #A52A2A, #D2691E); }
        .major-item:nth-child(6):hover { background: linear-gradient(135deg, #D2691E, #CD853F); }
        .major-item:nth-child(6)::before { background-image: url('path/to/image_civileng.jpg'); }

        /* แถวที่ 3 */
        .major-item:nth-child(7) { background: linear-gradient(135deg, #2F4F4F, #556B2F); }
        .major-item:nth-child(7):hover { background: linear-gradient(135deg, #556B2F, #6B8E23); }
        .major-item:nth-child(7)::before { background-image: url('path/to/image_electeng.jpg'); }
        
        .major-item:nth-child(8) { background: linear-gradient(135deg, #FF69B4, #FF1493); }
        .major-item:nth-child(8):hover { background: linear-gradient(135deg, #FF1493, #DB7093); }
        .major-item:nth-child(8)::before { background-image: url('path/to/image_publichealth.jpg'); }
        
        .major-item:nth-child(9) { background: linear-gradient(135deg, #008080, #20B2AA); }
        .major-item:nth-child(9):hover { background: linear-gradient(135deg, #20B2AA, #48D1CC); }
        .major-item:nth-child(9)::before { background-image: url('path/to/image_ohs.jpg'); }

        /* ปรับให้รองรับหน้าจอขนาดเล็ก (Responsive) */
        @media (max-width: 900px) {
            .major-item {
                flex-basis: calc(50% - 25px);
            }
        }
        @media (max-width: 600px) {
            .major-item {
                flex-basis: 100%;
                height: 180px;
            }
            .header {
                flex-direction: column;
                align-items: flex-start;
            }
            .navbar {
                margin-top: 15px;
                width: 100%;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
            }
            .navbar a {
                margin: 5px;
            }
        }
    </style>
</head>
<body>

    <header class="header">
        <div class="logo-text">
            คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏนครปฐม
        </div>
        <nav class="navbar">
            <a href="{{ url('/admission') }}">หน้าหลัก</a>
            <a href="{{ url('/application') }}">สมัครเรียน</a>
            <a href="{{ url('/admin/login') }}" class="register-btn">เข้าสู่ระบบ</a>
        </nav>
    </header>

    <div class="major-grid">
        <a href="{{ url('/home') }}" class="major-item"><span>สาขาวิชาฟิสิกส์</span></a>
        <a href="{{ url('/home') }}" class="major-item"><span>สาขาวิชาวิทยาการข้อมูล</span></a>
        <a href="{{ url('/home') }}" class="major-item"><span>สาขาวิชาวิทยาการคอมพิวเตอร์</span></a>

        <a href="{{ url('/home') }}" class="major-item"><span>สาขาวิชาวิทยาศาสตร์ทั่วไป</span></a>
        <a href="{{ url('/') }}" class="major-item" style="background-image: url('https://sc.npru.ac.th/sc_major/assets/images/major_cover/1693382011_2c0ee9d91d20a0202d5f.jpg'); background-size: cover; background-position: center;">
            <span>สาขาวิชาวิศวกรรมซอฟต์แวร์</span>
        </a>
        <a href="{{ url('/home') }}" class="major-item"><span>สาขาวิชาวิศวกรรมโยธา</span></a>

        <a href="{{ url('/home') }}" class="major-item"><span>สาขาวิชาวิศวกรรมไฟฟ้า</span></a>
        <a href="{{ url('/home') }}" class="major-item"><span>สาขาวิชาสาธารณสุขศาสตร์</span></a>
        <a href="{{ url('/home') }}" class="major-item"><span>สาขาวิชาอาชีวอนามัยและความปลอดภัย</span></a>
    </div>

</body>
</html>