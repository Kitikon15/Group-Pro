<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครเรียน - คณะวิทยาศาสตร์และเทคโนโลยี</title>
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
            max-width: 800px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .page-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .page-header h1 {
            font-size: 32px;
            color: #8B0000;
            margin-bottom: 15px;
        }

        .page-header p {
            color: #5a5a5a;
            font-size: 18px;
            max-width: 600px;
            margin: 0 auto;
        }

        .application-form {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(139, 0, 0, 0.15);
            padding: 40px;
            margin-bottom: 40px;
            border: 1px solid #e8d8d8;
        }

        .form-section {
            margin-bottom: 30px;
        }

        .form-section h2 {
            font-size: 22px;
            color: #8B0000;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #e0d0d0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #5a5a5a;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 14px;
            border: 2px solid #d0c0c0;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: #fafafa;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #8B0000;
            outline: none;
            box-shadow: 0 0 0 3px rgba(139, 0, 0, 0.2);
            background: #fff;
        }

        .form-row {
            display: flex;
            gap: 20px;
        }

        .form-row .form-group {
            flex: 1;
        }

        .btn-submit {
            background: linear-gradient(135deg, #8B0000, #A0522D);
            color: white;
            border: none;
            padding: 16px 30px;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            box-shadow: 0 4px 10px rgba(139, 0, 0, 0.3);
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(139, 0, 0, 0.4);
        }

        .info-box {
            background: linear-gradient(135deg, #f0e0e0, #e0d0d0);
            border-left: 4px solid #8B0000;
            padding: 20px;
            border-radius: 0 8px 8px 0;
            margin-bottom: 30px;
            box-shadow: 0 4px 10px rgba(139, 0, 0, 0.15);
        }

        .info-box h3 {
            color: #8B0000;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .requirements {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(139, 0, 0, 0.15);
            padding: 30px;
            border: 1px solid #e8d8d8;
        }

        .requirements ul {
            list-style: none;
            padding-left: 0;
        }

        .requirements li {
            padding: 10px 0 10px 30px;
            position: relative;
            border-bottom: 1px solid #f0e0e0;
        }

        .requirements li:last-child {
            border-bottom: none;
        }

        .requirements li:before {
            content: "✓";
            color: #8B0000;
            position: absolute;
            left: 0;
            font-weight: bold;
        }

        .footer {
            text-align: center;
            padding: 30px;
            color: #7f8c8d;
            font-size: 0.9em;
            margin-top: 40px;
            border-top: 1px solid #e0d0d0;
            background: #f5f5f5;
        }

        @media (max-width: 768px) {
            .form-row {
                flex-direction: column;
                gap: 0;
            }
            
            .header {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
            
            .logo {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="https://sc.npru.ac.th/sc_major/assets/images/app/logo.jpg" alt="คณะวิทยาศาสตร์และเทคโนโลยี">
            <div class="logo-text">คณะวิทยาศาสตร์และเทคโนโลยี<br>มหาวิทยาลัยราชภัฏนครปฐม</div>
        </div>
        <a href="{{ url('/') }}" class="back-link">
            <i class="fas fa-arrow-left"></i> กลับไปหน้าหลัก
        </a>
    </div>

    <div class="container">
        <div class="page-header">
            <h1><i class="fas fa-user-plus"></i> แบบฟอร์มสมัครเรียน</h1>
            <p>กรุณากรอกข้อมูลด้านล่างเพื่อสมัครเข้าเรียนในคณะวิทยาศาสตร์และเทคโนโลยี</p>
        </div>

        <div class="info-box">
            <h3><i class="fas fa-info-circle"></i> ข้อมูลสำคัญ</h3>
            <p>กรุณาตรวจสอบความถูกต้องของข้อมูลก่อนส่งแบบฟอร์ม ข้อมูลที่กรอกจะถูกใช้ในการพิจารณาการรับสมัคร</p>
        </div>

        <form class="application-form" method="POST" action="{{ route('application.submit') }}">
            @csrf
            <div class="form-section">
                <h2><i class="fas fa-user"></i> ข้อมูลส่วนตัว</h2>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="title">คำนำหน้าชื่อ</label>
                        <select id="title" name="title" required>
                            <option value="">เลือกคำนำหน้า</option>
                            <option value="นาย">นาย</option>
                            <option value="นางสาว">นางสาว</option>
                            <option value="นาง">นาง</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="gender">เพศ</label>
                        <select id="gender" name="gender" required>
                            <option value="">เลือกเพศ</option>
                            <option value="ชาย">ชาย</option>
                            <option value="หญิง">หญิง</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="first_name">ชื่อ</label>
                        <input type="text" id="first_name" name="first_name" placeholder="กรุณากรอกชื่อ" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="last_name">นามสกุล</label>
                        <input type="text" id="last_name" name="last_name" placeholder="กรุณากรอกนามสกุล" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="id_card">เลขบัตรประชาชน</label>
                        <input type="text" id="id_card" name="id_card" placeholder="กรุณากรอกเลขบัตรประชาชน 13 หลัก" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="birth_date">วัน/เดือน/ปี เกิด</label>
                        <input type="date" id="birth_date" name="birth_date" required>
                    </div>
                </div>
            </div>
            
            <div class="form-section">
                <h2><i class="fas fa-home"></i> ที่อยู่ตามทะเบียนบ้าน</h2>
                
                <div class="form-group">
                    <label for="address">ที่อยู่</label>
                    <textarea id="address" name="address" rows="3" placeholder="กรุณากรอกที่อยู่ตามทะเบียนบ้าน" required></textarea>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="province">จังหวัด</label>
                        <input type="text" id="province" name="province" placeholder="กรุณากรอกจังหวัด" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="postal_code">รหัสไปรษณีย์</label>
                        <input type="text" id="postal_code" name="postal_code" placeholder="กรุณากรอกรหัสไปรษณีย์" required>
                    </div>
                </div>
            </div>
            
            <div class="form-section">
                <h2><i class="fas fa-phone"></i> ข้อมูลการติดต่อ</h2>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="phone">เบอร์โทรศัพท์</label>
                        <input type="tel" id="phone" name="phone" placeholder="กรุณากรอกเบอร์โทรศัพท์" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">อีเมล</label>
                        <input type="email" id="email" name="email" placeholder="กรุณากรอกอีเมล" required>
                    </div>
                </div>
            </div>
            
            <div class="form-section">
                <h2><i class="fas fa-graduation-cap"></i> ข้อมูลการศึกษา</h2>
                
                <div class="form-group">
                    <label for="education_level">ระดับการศึกษา</label>
                    <select id="education_level" name="education_level" required>
                        <option value="">เลือกระดับการศึกษา</option>
                        <option value="ม.6">มัธยมศึกษาตอนปลาย</option>
                        <option value="ปวช.">ประกาศนียบัตรวิชาชีพ</option>
                        <option value="ปวส.">ประกาศนียบัตรวิชาชีพชั้นสูง</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="school_name">ชื่อสถานศึกษา</label>
                    <input type="text" id="school_name" name="school_name" placeholder="กรุณากรอกชื่อสถานศึกษา" required>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="gpa">เกรดเฉลี่ยสะสม</label>
                        <input type="number" id="gpa" name="gpa" step="0.01" min="0" max="4" placeholder="เช่น 3.50" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="graduation_year">ปีที่จบการศึกษา</label>
                        <input type="number" id="graduation_year" name="graduation_year" min="2000" max="2030" placeholder="เช่น 2024" required>
                    </div>
                </div>
            </div>
            
            <button type="submit" class="btn-submit">
                <a i class="fas fa-paper-plane"></.i> ส่งแบบฟอร์มสมัคร
            </button>
        </form>
        
        <div class="requirements">
            <h2><i class="fas fa-list"></i> เอกสารที่ต้องใช้ในการสมัคร</h2>
            <ul>
                <li>สำเนาบัตรประชาชน 1 ฉบับ</li>
                <li>สำเนาทะเบียนบ้าน 1 ฉบับ</li>
                <li>รูปถ่ายหน้าตรง ขนาด 1 นิ้ว 2 ใบ</li>
                <li>ใบรับรองผลการศึกษา (ปพ.1 หรือ ปพ.7)</li>
                <li>ใบแสดงผลการเรียน (ปพ.7)</li>
                <li>สำเนาเกียรติบัตร (ถ้ามี)</li>
            </ul>
        </div>
    </div>
    
    <div class="footer">
        <p>© 2025 คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏนครปฐม</p>
        <p>โทรศัพท์: 0-3423-3274 ต่อ 2111 | อีเมล: sci.npru@gmail.com</p>
    </div>
</body>
</html>