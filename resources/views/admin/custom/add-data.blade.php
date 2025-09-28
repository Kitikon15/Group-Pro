@extends('admin.layout')

@section('content')
<div class="custom-container">
    <div class="header-section">
        <div class="header-content">
            <div class="header-text">
                <h1>เพิ่มข้อมูล</h1>
                <p class="subtitle">กรุณากรอกข้อมูลให้ครบถ้วนตามแบบฟอร์มด้านล่าง</p>
            </div>
            <div class="header-icon">
                <span class="icon">📝</span>
            </div>
        </div>
    </div>
    
    <a href="{{ route('admin.custom.list') }}" class="btn-list">← กลับไปยังรายการข้อมูล</a>

    <form action="#" method="post" enctype="multipart/form-data" class="add-form">
        @csrf

        <div class="form-section">
            <div class="section-header">
                <h2 class="section-title">
                    <span class="title-icon">👤</span>
                    ข้อมูลส่วนตัว
                </h2>
                <div class="section-divider"></div>
            </div>
            
            <div class="section-content">
                <div class="row">
                    <div class="column">
                        <div class="form-group">
                            <label for="title" class="required">คำนำหน้าชื่อ</label>
                            <div class="input-wrapper">
                                <select id="title" name="title" class="form-control">
                                    <option value="">-- เลือก --</option>
                                    <option value="นาย">นาย</option>
                                    <option value="นาง">นาง</option>
                                    <option value="นางสาว">นางสาว</option>
                                </select>
                                <span class="input-icon">📋</span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="fname" class="required">ชื่อ</label>
                            <div class="input-wrapper">
                                <input type="text" id="fname" name="fname" class="form-control" placeholder="กรุณากรอกชื่อ">
                                <span class="input-icon">🔤</span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="lname" class="required">สกุล</label>
                            <div class="input-wrapper">
                                <input type="text" id="lname" name="lname" class="form-control" placeholder="กรุณากรอกสกุล">
                                <span class="input-icon">🔤</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="column">
                        <div class="form-group">
                            <label for="id-card" class="required">เลขบัตรประจำตัวประชาชน</label>
                            <div class="input-wrapper">
                                <input type="text" id="id-card" name="id-card" class="form-control" maxlength="13" placeholder="กรุณากรอกเลขบัตร 13 หลัก">
                                <span class="input-icon">💳</span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="dob" class="required">วัน/เดือน/ปี เกิด</label>
                            <div class="input-wrapper">
                                <input type="text" id="dob" name="dob" class="form-control" placeholder="dd/mm/yyyy">
                                <span class="input-icon">📅</span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="phone" class="required">โทรศัพท์</label>
                            <div class="input-wrapper">
                                <input type="tel" id="phone" name="phone" class="form-control" placeholder="กรุณากรอกเบอร์โทรศัพท์">
                                <span class="input-icon">📱</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="column profile-column">
                        <div class="profile-section">
                            <h3 class="profile-title">รูปภาพโปรไฟล์</h3>
                            <div class="profile-image-container">
                                <div class="profile-placeholder">
                                    <span class="placeholder-icon">👤</span>
                                    <span class="placeholder-text">ไม่มีรูปภาพ</span>
                                </div>
                            </div>
                            <div class="file-upload-section">
                                <div class="file-control">
                                    <input type="file" id="image-file" name="image-file" class="hidden-file-input">
                                    <button type="button" class="btn-choose" onclick="document.getElementById('image-file').click()">
                                        <span class="upload-icon">📁</span> เลือกไฟล์
                                    </button>
                                    <span class="file-name">ยังไม่ได้เลือกไฟล์</span>
                                </div>
                                <p class="file-hint">รองรับไฟล์ JPG, PNG ขนาดไม่เกิน 2MB</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-section">
            <div class="section-header">
                <h2 class="section-title">
                    <span class="title-icon">📋</span>
                    รายละเอียดเพิ่มเติม
                </h2>
                <div class="section-divider"></div>
            </div>
            
            <div class="section-content">
                <div class="form-group full-width">
                    <label for="details" class="required">รายละเอียด</label>
                    <div class="input-wrapper textarea-wrapper">
                        <textarea id="details" name="details" class="form-control" placeholder="กรุณากรอกรายละเอียดเพิ่มเติม..."></textarea>
                        <span class="input-icon textarea-icon">💬</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="button-row">
            <button type="submit" class="btn-primary">
                <span class="btn-icon">💾</span> บันทึกข้อมูล
            </button>
            <button type="reset" class="btn-secondary">
                <span class="btn-icon">🔄</span> ล้างข้อมูล
            </button>
        </div>
    </form>
</div>

<style>
    /* CSS สำหรับจัดรูปแบบ */
    .custom-container {
        background: linear-gradient(135deg, #f8f5f5 0%, #f0e6e6 100%);
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 15px 40px rgba(139, 0, 0, 0.2);
        width: 100%;
        max-width: 1200px;
        margin: 20px auto;
        border: 1px solid rgba(139, 0, 0, 0.15);
        position: relative;
        overflow: hidden;
    }

    .custom-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background: linear-gradient(90deg, #8B0000, #A0522D, #f7b731);
    }

    .header-section {
        margin-bottom: 30px;
        padding-bottom: 25px;
        border-bottom: 2px solid rgba(139, 0, 0, 0.1);
    }

    .header-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
    }

    .header-text h1 {
        color: #8B0000;
        font-size: 36px;
        margin-bottom: 10px;
        font-weight: 800;
        background: linear-gradient(135deg, #8B0000, #A0522D);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        line-height: 1.2;
    }

    .subtitle {
        color: #7f8c8d;
        font-size: 18px;
        margin: 0;
        font-weight: 500;
    }

    .header-icon {
        font-size: 48px;
        background: linear-gradient(135deg, #f8f0f0, #f0e0e0);
        width: 100px;
        height: 100px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 8px 20px rgba(139, 0, 0, 0.15);
        border: 3px solid #8B0000;
    }

    /* ปุ่ม 'รายการข้อมูล' */
    .btn-list {
        background: linear-gradient(135deg, #f7b731, #f5a623);
        color: #333;
        padding: 14px 25px;
        border: none;
        border-radius: 12px;
        cursor: pointer;
        font-weight: bold;
        margin-bottom: 30px;
        display: inline-block;
        text-decoration: none;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 0 6px 15px rgba(247, 183, 49, 0.4);
        border: 2px solid rgba(247, 183, 49, 0.7);
        font-size: 16px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .btn-list:hover {
        background: linear-gradient(135deg, #f5a623, #f7b731);
        transform: translateY(-4px) scale(1.02);
        box-shadow: 0 10px 25px rgba(247, 183, 49, 0.6);
        color: #000;
    }

    /* Form Sections */
    .form-section {
        background: white;
        border-radius: 16px;
        padding: 0;
        margin-bottom: 30px;
        box-shadow: 0 8px 25px rgba(139, 0, 0, 0.12);
        border: 1px solid rgba(139, 0, 0, 0.08);
        overflow: hidden;
        transition: all 0.4s ease;
    }

    .form-section:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 35px rgba(139, 0, 0, 0.18);
    }

    .section-header {
        background: linear-gradient(135deg, #8B0000, #A0522D);
        padding: 20px 25px;
        color: white;
    }

    .section-title {
        font-size: 24px;
        margin: 0;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .title-icon {
        font-size: 28px;
    }

    .section-divider {
        height: 3px;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.5), transparent);
        margin-top: 15px;
        border-radius: 2px;
    }

    .section-content {
        padding: 30px;
    }

    .row {
        display: flex;
        gap: 30px;
        margin-bottom: 0;
    }

    .column {
        flex: 1;
        min-width: 0;
    }

    .profile-column {
        flex: 0 0 300px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        margin-bottom: 25px;
    }

    .form-group.full-width {
        width: 100%;
    }

    label {
        margin-bottom: 12px;
        font-size: 16px;
        color: #5a5a5a;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* เครื่องหมาย * สีแดง */
    .required::after {
        content: '*';
        color: #e74c3c;
        margin-left: 6px;
        font-size: 20px;
    }

    .input-wrapper {
        position: relative;
        display: flex;
        align-items: center;
    }

    .form-control {
        padding: 16px 20px 16px 50px;
        border: 2px solid #d0c0c0;
        border-radius: 12px;
        font-size: 16px;
        width: 100%;
        box-sizing: border-box;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        background: #fafafa;
        color: #333;
        font-weight: 500;
    }

    .form-control:focus {
        border-color: #8B0000;
        outline: none;
        box-shadow: 0 0 0 4px rgba(139, 0, 0, 0.25);
        background: #fff;
        transform: translateY(-2px);
    }

    .input-icon {
        position: absolute;
        left: 18px;
        font-size: 20px;
        color: #8B0000;
        pointer-events: none;
    }

    textarea.form-control {
        resize: vertical;
        min-height: 180px;
        padding-top: 20px;
        padding-bottom: 20px;
    }

    .textarea-wrapper {
        position: relative;
    }

    .textarea-icon {
        top: 20px;
    }

    /* Profile Section */
    .profile-section {
        text-align: center;
    }

    .profile-title {
        color: #8B0000;
        font-size: 18px;
        margin-bottom: 20px;
        font-weight: 600;
    }

    .profile-image-container {
        width: 200px;
        height: 200px;
        margin: 0 auto 25px;
        display: flex;
        justify-content: center;
        align-items: center;
        border: 3px dashed #d0c0c0;
        border-radius: 15px;
        text-align: center;
        box-sizing: border-box;
        background: #fafafa;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .profile-image-container:hover {
        border-color: #8B0000;
        background: #f5f0f0;
        transform: scale(1.02);
    }

    .profile-placeholder {
        display: flex;
        flex-direction: column;
        align-items: center;
        color: #999;
    }

    .placeholder-icon {
        font-size: 60px;
        margin-bottom: 15px;
    }

    .placeholder-text {
        font-size: 16px;
        font-weight: 500;
    }

    .file-upload-section {
        text-align: center;
    }

    .file-control {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 15px;
        justify-content: center;
    }

    .hidden-file-input {
        display: none;
    }

    .btn-choose {
        background: linear-gradient(135deg, #8B0000, #A0522D);
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 10px;
        cursor: pointer;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 10px rgba(139, 0, 0, 0.2);
    }

    .btn-choose:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(139, 0, 0, 0.3);
    }

    .file-name {
        font-size: 14px;
        color: #7f8c8d;
        font-weight: 500;
        max-width: 150px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .file-hint {
        font-size: 13px;
        color: #95a5a6;
        margin: 0;
        font-style: italic;
    }

    /* Buttons */
    .button-row {
        display: flex;
        gap: 20px;
        justify-content: center;
        margin-top: 20px;
    }

    .btn-primary, .btn-secondary {
        padding: 16px 35px;
        border: none;
        border-radius: 12px;
        cursor: pointer;
        font-weight: bold;
        font-size: 18px;
        display: flex;
        align-items: center;
        gap: 12px;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }

    .btn-primary {
        background: linear-gradient(135deg, #8B0000, #A0522D);
        color: white;
    }

    .btn-secondary {
        background: linear-gradient(135deg, #95a5a6, #7f8c8d);
        color: white;
    }

    .btn-primary:hover {
        transform: translateY(-4px) scale(1.03);
        box-shadow: 0 10px 25px rgba(139, 0, 0, 0.4);
    }

    .btn-secondary:hover {
        transform: translateY(-4px) scale(1.03);
        box-shadow: 0 10px 25px rgba(119, 136, 153, 0.4);
    }

    .btn-icon {
        font-size: 20px;
    }

    /* Responsive Design */
    @media (max-width: 992px) {
        .row {
            flex-direction: column;
        }
        
        .profile-column {
            flex: 1;
        }
        
        .profile-image-container {
            width: 150px;
            height: 150px;
        }
        
        .header-content {
            flex-direction: column;
            text-align: center;
        }
        
        .header-icon {
            width: 80px;
            height: 80px;
            font-size: 36px;
        }
    }

    @media (max-width: 768px) {
        .custom-container {
            padding: 20px;
        }
        
        .section-content {
            padding: 20px;
        }
        
        .header-text h1 {
            font-size: 28px;
        }
        
        .subtitle {
            font-size: 16px;
        }
        
        .section-title {
            font-size: 20px;
        }
        
        .form-control {
            padding: 14px 18px 14px 45px;
        }
        
        .input-icon {
            left: 15px;
            font-size: 18px;
        }
    }

    @media (max-width: 576px) {
        .button-row {
            flex-direction: column;
            align-items: center;
        }
        
        .btn-primary, .btn-secondary {
            width: 100%;
            justify-content: center;
        }
        
        .header-icon {
            width: 70px;
            height: 70px;
            font-size: 30px;
        }
    }
</style>
@endsection