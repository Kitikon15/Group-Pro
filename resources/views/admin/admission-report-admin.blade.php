@extends('admin.layout')

@section('content')
<div class="breadcrumb">
    <a href="{{ route('admin.dashboard') }}">หน้าหลัก</a>
    <span class="separator">/</span>
    <span>รายงานการรับสมัคร</span>
</div>

<div class="content-card">
    <div class="page-title">
        <span>รายงานการรับสมัคร</span>
        <div>
            <button id="editButton" class="btn btn-primary" onclick="toggleEditMode()">
                <i class="fas fa-edit"></i> <span class="btn-text">แก้ไขข้อมูล</span>
            </button>
        </div>
    </div>

    <!-- Display mode -->
    <div id="displayMode">
        <div class="report-filters content-card">
            <h3><i class="fas fa-filter"></i> ตัวกรองข้อมูล</h3>
            <div class="filter-row">
                <div class="filter-group">
                    <label for="faculty">คณะ</label>
                    <select id="faculty" class="form-control">
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
                    <select id="program" class="form-control">
                        <option value="">ทุกสาขาวิชา</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label for="status">สถานะ</label>
                    <select id="status" class="form-control">
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
                    <input type="date" id="date-from" class="form-control">
                </div>
                <div class="filter-group">
                    <label for="date-to">ถึงวันที่</label>
                    <input type="date" id="date-to" class="form-control">
                </div>
            </div>
            <div class="filter-buttons">
                <button class="btn btn-secondary"><i class="fas fa-redo"></i> รีเซ็ต</button>
                <button class="btn btn-primary"><i class="fas fa-search"></i> ค้นหา</button>
            </div>
        </div>

        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-icon">👥</div>
                <div class="stat-info">
                    <h3>1,248</h3>
                    <p>จำนวนผู้สมัครทั้งหมด</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">⏳</div>
                <div class="stat-info">
                    <h3>312</h3>
                    <p>รอการตรวจสอบ</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">✅</div>
                <div class="stat-info">
                    <h3>856</h3>
                    <p>อนุมัติ</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">❌</div>
                <div class="stat-info">
                    <h3>80</h3>
                    <p>ปฏิเสธ</p>
                </div>
            </div>
        </div>

        <div class="content-card">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-list"></i> รายชื่อผู้สมัคร</h3>
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
                        @foreach($applicants as $applicant)
                        <tr>
                            <td>{{ $applicant['id'] }}</td>
                            <td>{{ $applicant['title'] }} {{ $applicant['firstName'] }} {{ $applicant['lastName'] }}</td>
                            <td>{{ $applicant['faculty'] }} / {{ $applicant['program'] }}</td>
                            <td>{{ $applicant['applicationDate'] }}</td>
                            <td>
                                @if($applicant['status'] === 'รอการตรวจสอบ')
                                    <span class="status status-pending">รอการตรวจสอบ</span>
                                @elseif($applicant['status'] === 'อนุมัติ')
                                    <span class="status status-active">อนุมัติ</span>
                                @else
                                    <span class="status status-rejected">ปฏิเสธ</span>
                                @endif
                            </td>
                            <td>
                                <a href="#" style="color: #007bff;" onclick="showApplicantDetail(<?php echo e($applicant['id']); ?>); return false;"><i class="fas fa-eye"></i> ดู</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="pagination-section">
            <div class="pagination-info">
                แสดง 1 ถึง 6 จากทั้งหมด 6 รายการ
            </div>
            <div class="pagination">
                <a href="#" class="page-link active">1</a>
                <a href="#" class="page-link">2</a>
                <a href="#" class="page-link">3</a>
                <a href="#" class="page-link">4</a>
                <a href="#" class="page-link">5</a>
            </div>
        </div>
    </div>

    <!-- Edit mode -->
    <div id="editMode" style="display: none;">
        <form id="admissionReportForm" action="{{ route('admin.admission.report.update') }}" method="POST" class="edit-form">
            @csrf
            @method('PUT')
            
            <div class="form-section">
                <div class="card-header">
                    <h2 class="card-title">
                        <i class="fas fa-edit"></i> แก้ไขข้อมูลรายงานการรับสมัคร
                    </h2>
                </div>
                
                <div class="section-content">
                    <div class="stats-container">
                        <div class="stat-card">
                            <div class="stat-icon">👥</div>
                            <div class="stat-info">
                                <input type="number" id="totalApplicants" name="total_applicants" value="1248" class="form-control" style="width: 100px; font-size: 24px; font-weight: bold; border: none; background: transparent;">
                                <p>จำนวนผู้สมัครทั้งหมด</p>
                            </div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-icon">⏳</div>
                            <div class="stat-info">
                                <input type="number" id="pendingApplicants" name="pending_applicants" value="312" class="form-control" style="width: 100px; font-size: 24px; font-weight: bold; border: none; background: transparent;">
                                <p>รอการตรวจสอบ</p>
                            </div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-icon">✅</div>
                            <div class="stat-info">
                                <input type="number" id="approvedApplicants" name="approved_applicants" value="856" class="form-control" style="width: 100px; font-size: 24px; font-weight: bold; border: none; background: transparent;">
                                <p>อนุมัติ</p>
                            </div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-icon">❌</div>
                            <div class="stat-info">
                                <input type="number" id="rejectedApplicants" name="rejected_applicants" value="80" class="form-control" style="width: 100px; font-size: 24px; font-weight: bold; border: none; background: transparent;">
                                <p>ปฏิเสธ</p>
                            </div>
                        </div>
                    </div>
                    
                    <h3 style="margin: 20px 0 15px 0; color: #8B0000; font-weight: 600;">รายชื่อผู้สมัคร:</h3>
                    <div id="applicantsContainer">
                        @foreach($applicants as $index => $applicant)
                        <div class="applicant-edit-section" data-applicant-id="{{ $index }}">
                            <div class="applicant-header">
                                <h4>ผู้สมัครลำดับที่ {{ $applicant['id'] }}</h4>
                            </div>
                            
                            <div class="applicant-edit-content">
                                <div class="form-row">
                                    <div class="form-group">
                                        <label>คำนำหน้า:</label>
                                        <input type="text" name="applicants[{{ $index }}][title]" value="{{ $applicant['title'] }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>ชื่อ:</label>
                                        <input type="text" name="applicants[{{ $index }}][firstName]" value="{{ $applicant['firstName'] }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>นามสกุล:</label>
                                        <input type="text" name="applicants[{{ $index }}][lastName]" value="{{ $applicant['lastName'] }}" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group">
                                        <label>คณะ:</label>
                                        <input type="text" name="applicants[{{ $index }}][faculty]" value="{{ $applicant['faculty'] }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>สาขาวิชา:</label>
                                        <input type="text" name="applicants[{{ $index }}][program]" value="{{ $applicant['program'] }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>วันที่สมัคร:</label>
                                        <input type="text" name="applicants[{{ $index }}][applicationDate]" value="{{ $applicant['applicationDate'] }}" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>สถานะ:</label>
                                    <select name="applicants[{{ $index }}][status]" class="form-control">
                                        <option value="รอการตรวจสอบ" {{ $applicant['status'] === 'รอการตรวจสอบ' ? 'selected' : '' }}>รอการตรวจสอบ</option>
                                        <option value="อนุมัติ" {{ $applicant['status'] === 'อนุมัติ' ? 'selected' : '' }}>อนุมัติ</option>
                                        <option value="ปฏิเสธ" {{ $applicant['status'] === 'ปฏิเสธ' ? 'selected' : '' }}>ปฏิเสธ</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <div class="button-row">
                <button type="button" class="btn btn-secondary" onclick="toggleEditMode()">
                    <i class="fas fa-times"></i> ยกเลิก
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> บันทึกการเปลี่ยนแปลง
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Applicant Detail Modal -->
<div id="applicantModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000; justify-content: center; align-items: center;">
    <div style="background: #fff; border-radius: 15px; width: 90%; max-width: 800px; max-height: 90vh; overflow-y: auto; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
        <div style="background: linear-gradient(135deg, #8B0000, #A0522D); color: #fff; padding: 20px; border-radius: 15px 15px 0 0; display: flex; justify-content: space-between; align-items: center;">
            <h2 style="margin: 0; font-weight: 700;"><i class="fas fa-user"></i> รายละเอียดผู้สมัคร</h2>
            <button onclick="closeModal()" style="background: none; border: none; color: #fff; font-size: 1.5em; cursor: pointer;">&times;</button>
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

<style>
    /* Edit mode styles */
    .form-section {
        background: white;
        border-radius: 10px;
        padding: 0;
        margin-bottom: 30px;
        box-shadow: 0 4px 10px rgba(139, 0, 0, 0.15);
        border: 1px solid #e8d8d8;
        overflow: hidden;
        transition: all 0.4s ease;
    }

    .form-section:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 15px rgba(139, 0, 0, 0.25);
    }

    .section-content {
        padding: 30px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
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
        box-sizing: border-box;
    }

    .form-control:focus {
        border-color: #8B0000;
        outline: none;
        box-shadow: 0 0 0 2px rgba(139, 0, 0, 0.2);
    }

    .form-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
        margin-bottom: 15px;
    }

    .applicant-edit-section {
        background: #f8f5f5;
        border-radius: 12px;
        padding: 25px;
        margin-bottom: 25px;
        border: 1px solid #d0c0c0;
    }

    .applicant-header h4 {
        margin: 0 0 15px 0;
        color: #8B0000;
        font-weight: 700;
        border-bottom: 1px solid #d0c0c0;
        padding-bottom: 10px;
    }

    .applicant-edit-content {
        background: white;
        border-radius: 8px;
        padding: 20px;
        border: 1px solid #d0c0c0;
    }

    .button-row {
        display: flex;
        gap: 20px;
        justify-content: center;
        margin-top: 20px;
        padding: 20px;
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
        border: 2px solid #d0c0c0;
        border-radius: 8px;
        font-size: 16px;
        background: #fafafa;
        box-sizing: border-box;
    }

    .filter-group select:focus,
    .filter-group input:focus {
        border-color: #8B0000;
        outline: none;
        box-shadow: 0 0 0 3px rgba(139, 0, 0, 0.2);
        background: #fff;
    }

    .filter-buttons {
        display: flex;
        gap: 15px;
        justify-content: flex-end;
    }

    .table-content {
        overflow-x: auto;
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

    .status-rejected {
        background: #f8d7da;
        color: #721c24;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 500;
    }

    .pagination-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 30px;
        padding: 20px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(139, 0, 0, 0.08);
        border: 1px solid rgba(139, 0, 0, 0.05);
        flex-wrap: wrap;
        gap: 15px;
    }

    .pagination-info {
        color: #5a5a5a;
        font-weight: 500;
    }

    .pagination {
        display: flex;
        gap: 8px;
    }

    .page-link {
        padding: 10px 15px;
        margin: 0;
        border: 2px solid #d0c0c0;
        border-radius: 8px;
        text-decoration: none;
        color: #007bff;
        font-weight: bold;
        background-color: #fff;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .page-link.active {
        background: linear-gradient(135deg, #007bff, #0056b3);
        color: white;
        border-color: #007bff;
        transform: scale(1.05);
    }

    .page-link:hover:not(.active) {
        background-color: #f0f0f0;
        transform: translateY(-2px);
        border-color: #8B0000;
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
        
        .form-row {
            grid-template-columns: 1fr;
        }
        
        .pagination-section {
            flex-direction: column;
            text-align: center;
        }
        
        .pagination {
            justify-content: center;
        }
        
        .button-row {
            flex-direction: column;
            align-items: center;
        }
        
        .btn {
            width: 100%;
            justify-content: center;
        }
        
        .btn-text {
            display: none;
        }
    }

    @media (max-width: 576px) {
        .button-row {
            flex-direction: column;
            align-items: center;
        }
        
        .btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<script>
    // Toggle between display and edit modes
    function toggleEditMode() {
        const displayMode = document.getElementById('displayMode');
        const editMode = document.getElementById('editMode');
        const editButton = document.getElementById('editButton');
        
        if (displayMode.style.display === 'none') {
            displayMode.style.display = 'block';
            editMode.style.display = 'none';
            editButton.innerHTML = '<i class="fas fa-edit"></i> <span class="btn-text">แก้ไขข้อมูล</span>';
            editButton.className = 'btn btn-primary';
        } else {
            displayMode.style.display = 'none';
            editMode.style.display = 'block';
            editButton.innerHTML = '<i class="fas fa-times"></i> <span class="btn-text">ยกเลิกการแก้ไข</span>';
            editButton.className = 'btn btn-secondary';
        }
    }
    
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
    
    // Sample applicant data (in a real application, this would come from the server)
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
                    <h3 style="color: #000; border-bottom: 1px solid #d0c0c0; padding-bottom: 10px; margin-bottom: 15px;">
                        <i class="fas fa-user"></i> ข้อมูลส่วนตัว
                    </h3>
                    <p><strong>ชื่อ-นามสกุล:</strong> ${applicant.title} ${applicant.firstName} ${applicant.lastName}</p>
                    <p><strong>เพศ:</strong> ${applicant.gender}</p>
                    <p><strong>เลขบัตรประชาชน:</strong> ${applicant.idCard}</p>
                    <p><strong>วันเกิด:</strong> ${applicant.birthDate}</p>
                </div>
                
                <div>
                    <h3 style="color: #000; border-bottom: 1px solid #d0c0c0; padding-bottom: 10px; margin-bottom: 15px;">
                        <i class="fas fa-home"></i> ที่อยู่
                    </h3>
                    <p><strong>ที่อยู่:</strong> ${applicant.address}</p>
                    <p><strong>จังหวัด:</strong> ${applicant.province}</p>
                    <p><strong>รหัสไปรษณีย์:</strong> ${applicant.postalCode}</p>
                </div>
                
                <div>
                    <h3 style="color: #000; border-bottom: 1px solid #d0c0c0; padding-bottom: 10px; margin-bottom: 15px;">
                        <i class="fas fa-phone"></i> ข้อมูลการติดต่อ
                    </h3>
                    <p><strong>เบอร์โทรศัพท์:</strong> ${applicant.phone}</p>
                    <p><strong>อีเมล:</strong> ${applicant.email}</p>
                </div>
                
                <div>
                    <h3 style="color: #000; border-bottom: 1px solid #d0c0c0; padding-bottom: 10px; margin-bottom: 15px;">
                        <i class="fas fa-graduation-cap"></i> ข้อมูลการศึกษา
                    </h3>
                    <p><strong>ระดับการศึกษา:</strong> ${applicant.educationLevel}</p>
                    <p><strong>ชื่อสถานศึกษา:</strong> ${applicant.schoolName}</p>
                    <p><strong>เกรดเฉลี่ย:</strong> ${applicant.gpa}</p>
                    <p><strong>ปีที่จบ:</strong> ${applicant.graduationYear}</p>
                </div>
                
                <div>
                    <h3 style="color: #000; border-bottom: 1px solid #d0c0c0; padding-bottom: 10px; margin-bottom: 15px;">
                        <i class="fas fa-university"></i> คณะและสาขาวิชา
                    </h3>
                    <p><strong>คณะที่สนใจ:</strong> ${applicant.faculty}</p>
                    <p><strong>สาขาวิชาที่สนใจ:</strong> ${applicant.program}</p>
                </div>
                
                <div>
                    <h3 style="color: #000; border-bottom: 1px solid #d0c0c0; padding-bottom: 10px; margin-bottom: 15px;">
                        <i class="fas fa-info-circle"></i> สถานะ
                    </h3>
                    <p><strong>วันที่สมัคร:</strong> ${applicant.applicationDate}</p>
                    <p><strong>สถานะ:</strong> <span class="status ${applicant.status === 'อนุมัติ' ? 'status-active' : applicant.status === 'รอการตรวจสอบ' ? 'status-pending' : 'status-rejected'}">${applicant.status}</span></p>
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
    
    // Form submission
    document.getElementById('admissionReportForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // In a real application, you would send the form data to the server here
        // For this example, we'll just show a success message
        alert('บันทึกข้อมูลเรียบร้อยแล้ว!');
        
        // Switch back to display mode
        toggleEditMode();
    });
</script>
@endsection