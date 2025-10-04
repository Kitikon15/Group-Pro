<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายงานการรับสมัคร - มหาวิทยาลัยราชภัฏนครปฐม</title>
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

        .logout-btn {
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

        .logout-btn:hover {
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

        .report-filters {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(255, 69, 0, 0.15);
            padding: 25px;
            margin-bottom: 30px;
            border: 1px solid #ffd7a0;
        }

        .filter-row {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .filter-group {
            flex: 1;
            min-width: 200px;
        }

        .filter-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #5a5a5a;
        }

        .filter-group select,
        .filter-group input {
            width: 100%;
            padding: 12px;
            border: 2px solid #ffd7a0;
            border-radius: 8px;
            font-size: 16px;
            background: #fff9e6;
        }

        .filter-buttons {
            display: flex;
            gap: 15px;
            justify-content: flex-end;
        }

        .btn {
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, #FFD700, #FF4500);
            color: #000;
            box-shadow: 0 4px 10px rgba(255, 69, 0, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(255, 69, 0, 0.4);
        }

        .btn-secondary {
            background: linear-gradient(135deg, #6c757d, #495057);
            color: #fff;
            box-shadow: 0 4px 10px rgba(108, 117, 125, 0.3);
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(108, 117, 125, 0.4);
        }

        .report-summary {
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

        .report-table {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(255, 69, 0, 0.15);
            overflow: hidden;
            border: 1px solid #ffd7a0;
            margin-bottom: 30px;
        }

        .table-header {
            background: linear-gradient(135deg, #FFD700, #FF4500);
            color: #000;
            padding: 15px 20px;
            font-weight: 700;
        }

        .table-content {
            max-height: 500px;
            overflow-y: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 15px 20px;
            text-align: left;
            border-bottom: 1px solid #ffd7a0;
        }

        th {
            background: #fff0cc;
            font-weight: 700;
            position: sticky;
            top: 0;
        }

        tr:nth-child(even) {
            background: #fff9e6;
        }

        tr:hover {
            background: #fff0cc;
        }

        .status-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.85em;
            font-weight: 600;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
        }

        .status-approved {
            background: #d4edda;
            color: #155724;
        }

        .status-rejected {
            background: #f8d7da;
            color: #721c24;
        }

        .pagination {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 30px;
        }

        .pagination a {
            padding: 10px 15px;
            background: #fff;
            border-radius: 8px;
            text-decoration: none;
            color: #5a5a5a;
            font-weight: 600;
            border: 1px solid #ffd7a0;
        }

        .pagination a.active {
            background: linear-gradient(135deg, #FFD700, #FF4500);
            color: #000;
        }

        .pagination a:hover {
            background: #fff0cc;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 20px;
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
            .filter-row {
                flex-direction: column;
                gap: 15px;
            }
            
            .filter-buttons {
                flex-direction: column;
            }
            
            .filter-buttons .btn {
                width: 100%;
            }
            
            th, td {
                padding: 10px;
                font-size: 0.9em;
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
                <small>ระบบรายงานการรับสมัคร</small>
            </div>
        </div>
        <div class="user-info">
            <a href="{{ url('/admission') }}" class="logout-btn">
                <i class="fas fa-arrow-left"></i> กลับไปหน้าสมัครเรียน
            </a>
        </div>
    </div>

    <div class="container">
        <a href="{{ url('/admission') }}" class="back-link">
            <i class="fas fa-arrow-left"></i> กลับไปหน้าสมัครเรียน
        </a>
        
        <div class="page-header">
            <h1><i class="fas fa-chart-bar"></i> รายงานการรับสมัคร</h1>
            <p>ดูและวิเคราะห์ข้อมูลการสมัครเข้าศึกษาในมหาวิทยาลัย</p>
        </div>

        <div class="report-filters">
            <h3><i class="fas fa-filter"></i> ตัวกรองข้อมูล</h3>
            <div class="filter-row">
                <div class="filter-group">
                    <label for="faculty">คณะ</label>
                    <select id="faculty">
                        <option value="">ทุกคณะ</option>
                        <option value="คณะวิทยาศาสตร์และเทคโนโลยี">คณะวิทยาศาสตร์และเทคโนโลยี</option>
                        <option value="คณะมนุษยศาสตร์และสังคมศาสตร์">คณะมนุษยศาสตร์และสังคมศาสตร์</option>
                        <option value="คณะครุศาสตร์">คณะครุศาสตร์</option>
                        <option value="คณะวิทยาการจัดการ">คณะวิทยาการจัดการ</option>
                        <option value="คณะศิลปกรรมศาสตร์">คณะศิลปกรรมศาสตร์</option>
                        <option value="คณะพยาบาลศาสตร์">คณะพยาบาลศาสตร์</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label for="program">สาขาวิชา</label>
                    <select id="program">
                        <option value="">ทุกสาขาวิชา</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label for="status">สถานะ</label>
                    <select id="status">
                        <option value="">ทุกสถานะ</option>
                        <option value="pending">รอการตรวจสอบ</option>
                        <option value="approved">อนุมัติ</option>
                        <option value="rejected">ปฏิเสธ</option>
                    </select>
                </div>
            </div>
            <div class="filter-row">
                <div class="filter-group">
                    <label for="date-from">ตั้งแต่วันที่</label>
                    <input type="date" id="date-from">
                </div>
                <div class="filter-group">
                    <label for="date-to">ถึงวันที่</label>
                    <input type="date" id="date-to">
                </div>
            </div>
            <div class="filter-buttons">
                <button class="btn btn-secondary"><i class="fas fa-redo"></i> รีเซ็ต</button>
                <button class="btn btn-primary"><i class="fas fa-search"></i> ค้นหา</button>
            </div>
        </div>

        <div class="report-summary">
            <div class="summary-card">
                <h3>จำนวนผู้สมัครทั้งหมด</h3>
                <div class="number">1,248</div>
            </div>
            <div class="summary-card">
                <h3>รอการตรวจสอบ</h3>
                <div class="number">312</div>
            </div>
            <div class="summary-card">
                <h3>อนุมัติ</h3>
                <div class="number">856</div>
            </div>
            <div class="summary-card">
                <h3>ปฏิเสธ</h3>
                <div class="number">80</div>
            </div>
        </div>

        <div class="report-table">
            <div class="table-header">
                <h3><i class="fas fa-list"></i> รายชื่อผู้สมัคร</h3>
            </div>
            <div class="table-content">
                <table>
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th>คณะ/สาขาวิชา</th>
                            <th>วันที่สมัคร</th>
                            <th>สถานะ</th>
                            <th>รายละเอียด</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>นาย สมชาย ใจดี</td>
                            <td>คณะวิทยาศาสตร์และเทคโนโลยี / วิศวกรรมซอฟต์แวร์</td>
                            <td>15/08/2568</td>
                            <td><span class="status-badge status-approved">อนุมัติ</span></td>
                            <td>
                                <a href="#" style="color: #007bff;" onclick="showApplicantDetail(1); return false;"><i class="fas fa-eye"></i> ดู</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>นางสาว สุนิสา รักเรียน</td>
                            <td>คณะมนุษยศาสตร์และสังคมศาสตร์ / ภาษาอังกฤษ</td>
                            <td>16/08/2568</td>
                            <td><span class="status-badge status-pending">รอการตรวจสอบ</span></td>
                            <td>
                                <a href="#" style="color: #007bff;" onclick="showApplicantDetail(2); return false;"><i class="fas fa-eye"></i> ดู</a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>นาย วินัย พรหมมา</td>
                            <td>คณะวิทยาการจัดการ / การตลาด</td>
                            <td>16/08/2568</td>
                            <td><span class="status-badge status-approved">อนุมัติ</span></td>
                            <td>
                                <a href="#" style="color: #007bff;" onclick="showApplicantDetail(3); return false;"><i class="fas fa-eye"></i> ดู</a>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>นางสาว จิตรา แสงสว่าง</td>
                            <td>คณะพยาบาลศาสตร์ / พยาบาลศาสตร์</td>
                            <td>17/08/2568</td>
                            <td><span class="status-badge status-rejected">ปฏิเสธ</span></td>
                            <td>
                                <a href="#" style="color: #007bff;" onclick="showApplicantDetail(4); return false;"><i class="fas fa-eye"></i> ดู</a>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>นาย ธนากร ศรีสุข</td>
                            <td>คณะครุศาสตร์ / การสอนคณิตศาสตร์</td>
                            <td>17/08/2568</td>
                            <td><span class="status-badge status-pending">รอการตรวจสอบ</span></td>
                            <td>
                                <a href="#" style="color: #007bff;" onclick="showApplicantDetail(5); return false;"><i class="fas fa-eye"></i> ดู</a>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>นางสาว นภาวรรณ แก้วใส</td>
                            <td>คณะศิลปกรรมศาสตร์ / ดนตรี</td>
                            <td>18/08/2568</td>
                            <td><span class="status-badge status-approved">อนุมัติ</span></td>
                            <td>
                                <a href="#" style="color: #007bff;" onclick="showApplicantDetail(6); return false;"><i class="fas fa-eye"></i> ดู</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="pagination">
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#"><i class="fas fa-chevron-right"></i></a>
        </div>
    </div>

    <div class="footer">
        <p>© 2025 มหาวิทยาลัยราชภัฏนครปฐม ระบบรายงานการรับสมัคร</p>
        <p>โทรศัพท์: 0-3423-3274 ต่อ 2111 | อีเมล: admission@npru.ac.th</p>
    </div>

    <!-- Applicant Detail Modal -->
    <div id="applicantModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000; justify-content: center; align-items: center;">
        <div style="background: #fff; border-radius: 15px; width: 90%; max-width: 800px; max-height: 90vh; overflow-y: auto; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
            <div style="background: linear-gradient(135deg, #FFD700, #FF4500); color: #000; padding: 20px; border-radius: 15px 15px 0 0; display: flex; justify-content: space-between; align-items: center;">
                <h2 style="margin: 0; font-weight: 700;"><i class="fas fa-user"></i> รายละเอียดผู้สมัคร</h2>
                <button onclick="closeModal()" style="background: none; border: none; color: #000; font-size: 1.5em; cursor: pointer;">&times;</button>
            </div>
            <div style="padding: 30px;">
                <div id="applicantDetailContent">
                    <!-- Content will be loaded here by JavaScript -->
                </div>
                <div style="text-align: center; margin-top: 30px;">
                    <button onclick="closeModal()" class="btn btn-secondary" style="padding: 12px 30px;">ปิด</button>
                </div>
            </div>
        </div>
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
        
        // Sample applicant data
        const applicantData = {
            1: {
                id: 1,
                title: "นาย",
                firstName: "สมชาย",
                lastName: "ใจดี",
                gender: "ชาย",
                idCard: "1-2345-67890-12-3",
                birthDate: "15/05/2540",
                address: "123 ถนนสุขุมวิท แขวงคลองเตย เขตคลองเตย กรุงเทพฯ 10110",
                province: "กรุงเทพฯ",
                postalCode: "10110",
                phone: "081-234-5678",
                email: "somchai@example.com",
                educationLevel: "ม.6",
                schoolName: "โรงเรียนสาธิตมหาวิทยาลัยราชภัฏนครปฐม",
                gpa: "3.75",
                graduationYear: "2567",
                faculty: "คณะวิทยาศาสตร์และเทคโนโลยี",
                program: "วิศวกรรมซอฟต์แวร์",
                status: "อนุมัติ",
                applicationDate: "15/08/2568"
            },
            2: {
                id: 2,
                title: "นางสาว",
                firstName: "สุนิสา",
                lastName: "รักเรียน",
                gender: "หญิง",
                idCard: "2-3456-78901-23-4",
                birthDate: "22/08/2541",
                address: "456 หมู่ 7 ตำบลพระปฐมเจดีย์ อำเภอเมือง จังหวัดนครปฐม 73000",
                province: "นครปฐม",
                postalCode: "73000",
                phone: "082-345-6789",
                email: "sunisa@example.com",
                educationLevel: "ปวส.",
                schoolName: "วิทยาลัยเทคนิคนครปฐม",
                gpa: "3.50",
                graduationYear: "2567",
                faculty: "คณะมนุษยศาสตร์และสังคมศาสตร์",
                program: "ภาษาอังกฤษ",
                status: "รอการตรวจสอบ",
                applicationDate: "16/08/2568"
            },
            3: {
                id: 3,
                title: "นาย",
                firstName: "วินัย",
                lastName: "พรหมมา",
                gender: "ชาย",
                idCard: "3-4567-89012-34-5",
                birthDate: "10/12/2540",
                address: "789 ซอยรัชดา แขวงห้วยขวาง เขตห้วยขวาง กรุงเทพฯ 10320",
                province: "กรุงเทพฯ",
                postalCode: "10320",
                phone: "083-456-7890",
                email: "winai@example.com",
                educationLevel: "ม.6",
                schoolName: "โรงเรียนปทุมวิไล",
                gpa: "3.20",
                graduationYear: "2567",
                faculty: "คณะวิทยาการจัดการ",
                program: "การตลาด",
                status: "อนุมัติ",
                applicationDate: "16/08/2568"
            },
            4: {
                id: 4,
                title: "นางสาว",
                firstName: "จิตรา",
                lastName: "แสงสว่าง",
                gender: "หญิง",
                idCard: "4-5678-90123-45-6",
                birthDate: "05/03/2542",
                address: "321 หมู่ 5 ตำบลสนามจันทร์ อำเภอเมือง จังหวัดนครปฐม 73000",
                province: "นครปฐม",
                postalCode: "73000",
                phone: "084-567-8901",
                email: "jittra@example.com",
                educationLevel: "ปวช.",
                schoolName: "วิทยาลัยสารพัดช่างนครปฐม",
                gpa: "2.80",
                graduationYear: "2567",
                faculty: "คณะพยาบาลศาสตร์",
                program: "พยาบาลศาสตร์",
                status: "ปฏิเสธ",
                applicationDate: "17/08/2568"
            },
            5: {
                id: 5,
                title: "นาย",
                firstName: "ธนากร",
                lastName: "ศรีสุข",
                gender: "ชาย",
                idCard: "5-6789-01234-56-7",
                birthDate: "18/07/2541",
                address: "654 ถนนเพชรเกษม แขวงบางแค เขตบางแค กรุงเทพฯ 10160",
                province: "กรุงเทพฯ",
                postalCode: "10160",
                phone: "085-678-9012",
                email: "thanakorn@example.com",
                educationLevel: "ม.6",
                schoolName: "โรงเรียนบ้านใหม่",
                gpa: "3.60",
                graduationYear: "2567",
                faculty: "คณะครุศาสตร์",
                program: "การสอนคณิตศาสตร์",
                status: "รอการตรวจสอบ",
                applicationDate: "17/08/2568"
            },
            6: {
                id: 6,
                title: "นางสาว",
                firstName: "นภาวรรณ",
                lastName: "แก้วใส",
                gender: "หญิง",
                idCard: "6-7890-12345-67-8",
                birthDate: "30/11/2541",
                address: "987 หมู่ 3 ตำบลลำพยา อำเภอเมือง จังหวัดนครปฐม 73000",
                province: "นครปฐม",
                postalCode: "73000",
                phone: "086-789-0123",
                email: "naphawan@example.com",
                educationLevel: "ปวส.",
                schoolName: "วิทยาลัยเทคนิคพุทธมณฑล",
                gpa: "3.90",
                graduationYear: "2567",
                faculty: "คณะศิลปกรรมศาสตร์",
                program: "ดนตรี",
                status: "อนุมัติ",
                applicationDate: "18/08/2568"
            }
        };
        
        // Function to show applicant detail
        function showApplicantDetail(applicantId) {
            const applicant = applicantData[applicantId];
            if (!applicant) return;
            
            const modal = document.getElementById('applicantModal');
            const content = document.getElementById('applicantDetailContent');
            
            content.innerHTML = `
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
                    <div>
                        <h3 style="color: #000; border-bottom: 1px solid #ffd7a0; padding-bottom: 10px; margin-bottom: 15px;">
                            <i class="fas fa-user"></i> ข้อมูลส่วนตัว
                        </h3>
                        <p><strong>ชื่อ-นามสกุล:</strong> ${applicant.title} ${applicant.firstName} ${applicant.lastName}</p>
                        <p><strong>เพศ:</strong> ${applicant.gender}</p>
                        <p><strong>เลขบัตรประชาชน:</strong> ${applicant.idCard}</p>
                        <p><strong>วันเกิด:</strong> ${applicant.birthDate}</p>
                    </div>
                    
                    <div>
                        <h3 style="color: #000; border-bottom: 1px solid #ffd7a0; padding-bottom: 10px; margin-bottom: 15px;">
                            <i class="fas fa-home"></i> ที่อยู่
                        </h3>
                        <p><strong>ที่อยู่:</strong> ${applicant.address}</p>
                        <p><strong>จังหวัด:</strong> ${applicant.province}</p>
                        <p><strong>รหัสไปรษณีย์:</strong> ${applicant.postalCode}</p>
                    </div>
                    
                    <div>
                        <h3 style="color: #000; border-bottom: 1px solid #ffd7a0; padding-bottom: 10px; margin-bottom: 15px;">
                            <i class="fas fa-phone"></i> ข้อมูลการติดต่อ
                        </h3>
                        <p><strong>เบอร์โทรศัพท์:</strong> ${applicant.phone}</p>
                        <p><strong>อีเมล:</strong> ${applicant.email}</p>
                    </div>
                    
                    <div>
                        <h3 style="color: #000; border-bottom: 1px solid #ffd7a0; padding-bottom: 10px; margin-bottom: 15px;">
                            <i class="fas fa-graduation-cap"></i> ข้อมูลการศึกษา
                        </h3>
                        <p><strong>ระดับการศึกษา:</strong> ${applicant.educationLevel}</p>
                        <p><strong>ชื่อสถานศึกษา:</strong> ${applicant.schoolName}</p>
                        <p><strong>เกรดเฉลี่ย:</strong> ${applicant.gpa}</p>
                        <p><strong>ปีที่จบ:</strong> ${applicant.graduationYear}</p>
                    </div>
                    
                    <div>
                        <h3 style="color: #000; border-bottom: 1px solid #ffd7a0; padding-bottom: 10px; margin-bottom: 15px;">
                            <i class="fas fa-university"></i> คณะและสาขาวิชา
                        </h3>
                        <p><strong>คณะที่สนใจ:</strong> ${applicant.faculty}</p>
                        <p><strong>สาขาวิชาที่สนใจ:</strong> ${applicant.program}</p>
                    </div>
                    
                    <div>
                        <h3 style="color: #000; border-bottom: 1px solid #ffd7a0; padding-bottom: 10px; margin-bottom: 15px;">
                            <i class="fas fa-info-circle"></i> สถานะ
                        </h3>
                        <p><strong>วันที่สมัคร:</strong> ${applicant.applicationDate}</p>
                        <p><strong>สถานะ:</strong> <span class="status-badge status-${applicant.status === 'อนุมัติ' ? 'approved' : applicant.status === 'รอการตรวจสอบ' ? 'pending' : 'rejected'}">${applicant.status}</span></p>
                    </div>
                </div>
            `;
            
            modal.style.display = 'flex';
        }
        
        // Function to close modal
        function closeModal() {
            document.getElementById('applicantModal').style.display = 'none';
        }
        
        // Function to update program options based on faculty selection
        function updateProgramOptions() {
            const facultySelect = document.getElementById('faculty');
            const programSelect = document.getElementById('program');
            const selectedFaculty = facultySelect.value;
            
            // Clear existing options
            programSelect.innerHTML = '';
            
            // Add default option
            const defaultOption = document.createElement('option');
            defaultOption.value = '';
            defaultOption.textContent = 'ทุกสาขาวิชา';
            programSelect.appendChild(defaultOption);
            
            if (selectedFaculty && facultyPrograms[selectedFaculty]) {
                // Add program options
                facultyPrograms[selectedFaculty].forEach(program => {
                    const option = document.createElement('option');
                    option.value = program;
                    option.textContent = program;
                    programSelect.appendChild(option);
                });
            }
        }
        
        // Add event listener to faculty select
        document.getElementById('faculty').addEventListener('change', updateProgramOptions);
        
        // Initialize program options
        document.addEventListener('DOMContentLoaded', function() {
            updateProgramOptions();
        });
    </script>
</body>
</html>