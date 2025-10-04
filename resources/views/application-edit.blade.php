<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลการสมัคร - มหาวิทยาลัยราชภัฏนครปฐม</title>
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

        .back-link {
            color: #000;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 700;
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
            color: #000;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .page-header p {
            color: #5a5a5a;
            font-size: 18px;
            max-width: 600px;
            margin: 0 auto;
            font-weight: 500;
        }

        .application-form {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(255, 69, 0, 0.15);
            padding: 40px;
            margin-bottom: 40px;
            border: 1px solid #ffd7a0;
        }

        .form-section {
            margin-bottom: 30px;
        }

        .form-section h2 {
            font-size: 22px;
            color: #000;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #ffd7a0;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
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
            border: 2px solid #ffd7a0;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: #fff9e6;
            font-weight: 500;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #FF4500;
            outline: none;
            box-shadow: 0 0 0 3px rgba(255, 69, 0, 0.2);
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
            background: linear-gradient(135deg, #FFD700, #FF4500);
            color: #000;
            border: none;
            padding: 16px 30px;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            box-shadow: 0 4px 10px rgba(255, 69, 0, 0.3);
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(255, 69, 0, 0.4);
        }

        .info-box {
            background: linear-gradient(135deg, #fff0cc, #ffe6b3);
            border-left: 4px solid #FF4500;
            padding: 20px;
            border-radius: 0 8px 8px 0;
            margin-bottom: 30px;
            box-shadow: 0 4px 10px rgba(255, 69, 0, 0.15);
        }

        .info-box h3 {
            color: #000;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
        }

        .requirements {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(255, 69, 0, 0.15);
            padding: 30px;
            border: 1px solid #ffd7a0;
        }

        .requirements ul {
            list-style: none;
            padding-left: 0;
        }

        .requirements li {
            padding: 10px 0 10px 30px;
            position: relative;
            border-bottom: 1px solid #fff0cc;
            font-weight: 500;
        }

        .requirements li:last-child {
            border-bottom: none;
        }

        .requirements li:before {
            content: "✓";
            color: #FF4500;
            position: absolute;
            left: 0;
            font-weight: bold;
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
            <div class="logo-text">มหาวิทยาลัยราชภัฏนครปฐม</div>
        </div>
        <a href="{{ url('/admission') }}" class="back-link">
            <i class="fas fa-arrow-left"></i> กลับไปหน้าสมัครเรียน
        </a>
    </div>

    <div class="container">
        <div class="page-header">
            <h1><i class="fas fa-user-edit"></i> แก้ไขข้อมูลการสมัคร</h1>
            <p>กรุณาแก้ไขข้อมูลด้านล่างเพื่ออัปเดตข้อมูลการสมัครของคุณ</p>
        </div>

        <div class="info-box">
            <h3><i class="fas fa-info-circle"></i> ข้อมูลสำคัญ</h3>
            <p>กรุณาตรวจสอบความถูกต้องของข้อมูลก่อนส่งแบบฟอร์ม ข้อมูลที่กรอกจะถูกใช้ในการพิจารณาการรับสมัคร</p>
        </div>

        <form class="application-form" method="POST" action="{{ route('application.update') }}">
            @csrf
            @method('PUT')
            <div class="form-section">
                <h2><i class="fas fa-user"></i> ข้อมูลส่วนตัว</h2>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="title">คำนำหน้าชื่อ</label>
                        <select id="title" name="title" required>
                            <option value="">เลือกคำนำหน้า</option>
                            <option value="นาย" {{ (isset($applicationData['title']) && $applicationData['title'] == 'นาย') ? 'selected' : '' }}>นาย</option>
                            <option value="นางสาว" {{ (isset($applicationData['title']) && $applicationData['title'] == 'นางสาว') ? 'selected' : '' }}>นางสาว</option>
                            <option value="นาง" {{ (isset($applicationData['title']) && $applicationData['title'] == 'นาง') ? 'selected' : '' }}>นาง</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="gender">เพศ</label>
                        <select id="gender" name="gender" required>
                            <option value="">เลือกเพศ</option>
                            <option value="ชาย" {{ (isset($applicationData['gender']) && $applicationData['gender'] == 'ชาย') ? 'selected' : '' }}>ชาย</option>
                            <option value="หญิง" {{ (isset($applicationData['gender']) && $applicationData['gender'] == 'หญิง') ? 'selected' : '' }}>หญิง</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="first_name">ชื่อ</label>
                        <input type="text" id="first_name" name="first_name" placeholder="กรุณากรอกชื่อ" value="{{ $applicationData['first_name'] ?? '' }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="last_name">นามสกุล</label>
                        <input type="text" id="last_name" name="last_name" placeholder="กรุณากรอกนามสกุล" value="{{ $applicationData['last_name'] ?? '' }}" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="id_card">เลขบัตรประชาชน</label>
                        <input type="text" id="id_card" name="id_card" placeholder="กรุณากรอกเลขบัตรประชาชน 13 หลัก" value="{{ $applicationData['id_card'] ?? '' }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="birth_date">วัน/เดือน/ปี เกิด</label>
                        <input type="date" id="birth_date" name="birth_date" value="{{ $applicationData['birth_date'] ?? '' }}" required>
                    </div>
                </div>
            </div>
            
            <div class="form-section">
                <h2><i class="fas fa-home"></i> ที่อยู่ตามทะเบียนบ้าน</h2>
                
                <div class="form-group">
                    <label for="address">ที่อยู่</label>
                    <textarea id="address" name="address" rows="3" placeholder="กรุณากรอกที่อยู่ตามทะเบียนบ้าน" required>{{ $applicationData['address'] ?? '' }}</textarea>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="province">จังหวัด</label>
                        <input type="text" id="province" name="province" placeholder="กรุณากรอกจังหวัด" value="{{ $applicationData['province'] ?? '' }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="postal_code">รหัสไปรษณีย์</label>
                        <input type="text" id="postal_code" name="postal_code" placeholder="กรุณากรอกรหัสไปรษณีย์" value="{{ $applicationData['postal_code'] ?? '' }}" required>
                    </div>
                </div>
            </div>
            
            <div class="form-section">
                <h2><i class="fas fa-phone"></i> ข้อมูลการติดต่อ</h2>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="phone">เบอร์โทรศัพท์</label>
                        <input type="tel" id="phone" name="phone" placeholder="กรุณากรอกเบอร์โทรศัพท์" value="{{ $applicationData['phone'] ?? '' }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">อีเมล</label>
                        <input type="email" id="email" name="email" placeholder="กรุณากรอกอีเมล" value="{{ $applicationData['email'] ?? '' }}" required>
                    </div>
                </div>
            </div>
            
            <div class="form-section">
                <h2><i class="fas fa-graduation-cap"></i> ข้อมูลการศึกษา</h2>
                
                <div class="form-group">
                    <label for="education_level">ระดับการศึกษา</label>
                    <select id="education_level" name="education_level" required>
                        <option value="">เลือกระดับการศึกษา</option>
                        <option value="ม.6" {{ (isset($applicationData['education_level']) && $applicationData['education_level'] == 'ม.6') ? 'selected' : '' }}>มัธยมศึกษาตอนปลาย</option>
                        <option value="ปวช." {{ (isset($applicationData['education_level']) && $applicationData['education_level'] == 'ปวช.') ? 'selected' : '' }}>ประกาศนียบัตรวิชาชีพ</option>
                        <option value="ปวส." {{ (isset($applicationData['education_level']) && $applicationData['education_level'] == 'ปวส.') ? 'selected' : '' }}>ประกาศนียบัตรวิชาชีพชั้นสูง</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="school_name">ชื่อสถานศึกษา</label>
                    <input type="text" id="school_name" name="school_name" placeholder="กรุณากรอกชื่อสถานศึกษา" value="{{ $applicationData['school_name'] ?? '' }}" required>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="gpa">เกรดเฉลี่ยสะสม</label>
                        <input type="number" id="gpa" name="gpa" step="0.01" min="0" max="4" placeholder="เช่น 3.50" value="{{ $applicationData['gpa'] ?? '' }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="graduation_year">ปีที่จบการศึกษา</label>
                        <input type="number" id="graduation_year" name="graduation_year" min="2000" max="2030" placeholder="เช่น 2024" value="{{ $applicationData['graduation_year'] ?? '' }}" required>
                    </div>
                </div>
            </div>
            
            <!-- Faculty and Program Selection Section -->
            <div class="form-section">
                <h2><i class="fas fa-university"></i> คณะและสาขาวิชาที่สนใจ</h2>
                
                <div class="form-group">
                    <label for="faculty">คณะที่สนใจ</label>
                    <select id="faculty" name="faculty" required>
                        <option value="">เลือกคณะที่สนใจ</option>
                        <option value="คณะวิทยาศาสตร์และเทคโนโลยี" {{ (isset($applicationData['faculty']) && $applicationData['faculty'] == 'คณะวิทยาศาสตร์และเทคโนโลยี') ? 'selected' : '' }}>คณะวิทยาศาสตร์และเทคโนโลยี</option>
                        <option value="คณะมนุษยศาสตร์และสังคมศาสตร์" {{ (isset($applicationData['faculty']) && $applicationData['faculty'] == 'คณะมนุษยศาสตร์และสังคมศาสตร์') ? 'selected' : '' }}>คณะมนุษยศาสตร์และสังคมศาสตร์</option>
                        <option value="คณะครุศาสตร์" {{ (isset($applicationData['faculty']) && $applicationData['faculty'] == 'คณะครุศาสตร์') ? 'selected' : '' }}>คณะครุศาสตร์</option>
                        <option value="คณะวิทยาการจัดการ" {{ (isset($applicationData['faculty']) && $applicationData['faculty'] == 'คณะวิทยาการจัดการ') ? 'selected' : '' }}>คณะวิทยาการจัดการ</option>
                        <option value="คณะศิลปกรรมศาสตร์" {{ (isset($applicationData['faculty']) && $applicationData['faculty'] == 'คณะศิลปกรรมศาสตร์') ? 'selected' : '' }}>คณะศิลปกรรมศาสตร์</option>
                        <option value="คณะพยาบาลศาสตร์" {{ (isset($applicationData['faculty']) && $applicationData['faculty'] == 'คณะพยาบาลศาสตร์') ? 'selected' : '' }}>คณะพยาบาลศาสตร์</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="program">สาขาวิชาที่สนใจ</label>
                    <select id="program" name="program" required>
                        <option value="">เลือกคณะก่อนเพื่อดูสาขาวิชา</option>
                    </select>
                </div>
            </div>
            
            <button type="submit" class="btn-submit">
                <i class="fas fa-save"></i> บันทึกการเปลี่ยนแปลง
            </button>
        </form>
    </div>
    
    <div class="footer">
        <p>© 2025 มหาวิทยาลัยราชภัฏนครปฐม คณะวิทยาศาสตร์และเทคโนโลยี</p>
        <p>โทรศัพท์: 0-3423-3274 ต่อ 2111 | อีเมล: sci.npru@gmail.com</p>
    </div>
    
    <script>
        // Faculty and program data
        const facultyPrograms = {
            "คณะวิทยาศาสตร์และเทคโนโลยี": [
                "วิศวกรรมซอฟต์แวร์",
                "วิทยาการคอมพิวเตอร์",
                "เทคโนโลยีสารสนเทศ",
                "วิทยาศาสตร์สิ่งแวดล้อม",
                "ฟิสิกส์",
                "เคมี",
                "ชีววิทยา",
                "คณิตศาสตร์"
            ],
            "คณะมนุษยศาสตร์และสังคมศาสตร์": [
                "ภาษาไทย",
                "ภาษาอังกฤษ",
                "ภาษาจีน",
                "ประวัติศาสตร์",
                "ภูมิศาสตร์",
                "รัฐศาสตร์การปกครอง",
                "สังคมวิทยา",
                "จิตวิทยา"
            ],
            "คณะครุศาสตร์": [
                "การสอนภาษาอังกฤษ",
                "การสอนคณิตศาสตร์",
                "การสอนวิทยาศาสตร์",
                "การสอนสังคมศึกษา",
                "การสอนภาษาไทย"
            ],
            "คณะวิทยาการจัดการ": [
                "การจัดการ",
                "การตลาด",
                "บัญชี",
                "การเงิน",
                "คอมพิวเตอร์ธุรกิจ"
            ],
            "คณะศิลปกรรมศาสตร์": [
                "ศิลปกรรม",
                "การออกแบบ",
                "ดนตรี",
                "การแสดง"
            ],
            "คณะพยาบาลศาสตร์": [
                "พยาบาลศาสตร์"
            ]
        };
        
        // Function to update program options based on faculty selection
        function updateProgramOptions() {
            const facultySelect = document.getElementById('faculty');
            const programSelect = document.getElementById('program');
            const selectedFaculty = facultySelect.value;
            
            // Clear existing options
            programSelect.innerHTML = '';
            
            if (selectedFaculty && facultyPrograms[selectedFaculty]) {
                // Add default option
                const defaultOption = document.createElement('option');
                defaultOption.value = '';
                defaultOption.textContent = 'เลือกสาขาวิชา';
                programSelect.appendChild(defaultOption);
                
                // Add program options
                facultyPrograms[selectedFaculty].forEach(program => {
                    const option = document.createElement('option');
                    option.value = program;
                    option.textContent = program;
                    
                    // Check if this should be selected
                    if (typeof applicationData !== 'undefined' && applicationData.program === program) {
                        option.selected = true;
                    }
                    
                    programSelect.appendChild(option);
                });
            } else {
                // Add default option when no faculty selected
                const defaultOption = document.createElement('option');
                defaultOption.value = '';
                defaultOption.textContent = 'เลือกคณะก่อนเพื่อดูสาขาวิชา';
                programSelect.appendChild(defaultOption);
            }
        }
        
        // Add event listener to faculty select
        document.getElementById('faculty').addEventListener('change', updateProgramOptions);
        
        // Initialize program options if faculty is pre-selected (for edit forms)
        document.addEventListener('DOMContentLoaded', function() {
            updateProgramOptions();
        });
    </script>
</body>
</html>