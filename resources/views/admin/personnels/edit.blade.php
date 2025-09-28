@extends('admin.layout')

@section('content')
<div class="container">
    <h1>แก้ไขข้อมูลบุคลากร</h1>
    <a href="{{ route('admin.personnels.index') }}" class="btn-list">รายการข้อมูล</a>

    <form action="{{ route('admin.personnels.update', $personnel->id) }}" method="POST" enctype="multipart/form-data" class="edit-form">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="form-group">
                <label for="name">ชื่อ-นามสกุล</label>
                <input type="text" id="name" name="name" value="{{ $personnel->name }}" required>
            </div>
            <div class="form-group">
                <label for="position">ตำแหน่ง</label>
                <input type="text" id="position" name="position" value="{{ $personnel->position }}" required>
            </div>
            <div class="form-group">
                <label for="email">อีเมล</label>
                <input type="email" id="email" name="email" value="{{ $personnel->email }}">
            </div>
            <div class="form-group image-upload">
                <label>รูปภาพ</label>
                <div class="file-control">
                    <input type="file" id="image-file" name="image-file" class="hidden-file-input">
                    <button type="button" class="btn-choose" onclick="document.getElementById('image-file').click()">Choose File</button>
                    <span class="file-name">No file chosen</span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <label for="phone">โทรศัพท์</label>
                <input type="tel" id="phone" name="phone" value="{{ $personnel->phone }}">
            </div>
            <div class="form-group date-input-group">
                <label for="created_at">วันที่สร้าง</label>
                <input type="text" id="created_at" name="created_at" value="{{ $personnel->created_at->format('d/m/Y') }}" placeholder="dd/mm/yyyy" readonly>
                <span class="calendar-icon">📅</span>
            </div>
            <div class="form-group">
                <label for="status">สถานะ</label>
                <select id="status" name="status">
                    <option value="ทำงาน" {{ $personnel->status == 'ทำงาน' ? 'selected' : '' }}>ทำงาน</option>
                    <option value="ลาออก" {{ $personnel->status == 'ลาออก' ? 'selected' : '' }}>ลาออก</option>
                </select>
            </div>
            <div class="form-group profile-image-container">
                <img src="{{ $personnel->image_url ?? 'https://via.placeholder.com/150x150?text=Profile+Photo' }}" alt="รูปภาพโปรไฟล์" class="profile-image">
            </div>
        </div>

        <div class="row full-row">
            <div class="form-group textarea-group">
                <label for="bio">ข้อมูลส่วนตัว</label>
                <textarea id="bio" name="bio">{{ $personnel->bio }}</textarea>
            </div>
        </div>

        <div class="row button-row">
            <button type="submit" class="btn-primary">บันทึกการแก้ไข</button>
            <button type="button" class="btn-secondary" onclick="resetForm()">ล้างค่า</button>
        </div>
    </form>
</div>

<style>
    /* CSS สำหรับจัดรูปแบบ */
    .container {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(139, 0, 0, 0.1);
        width: 100%;
        max-width: 900px;
        margin: 20px auto;
    }

    h1 {
        color: #8B0000;
        font-size: 24px;
        margin-bottom: 20px;
        font-weight: 600;
    }

    /* ปุ่ม 'รายการข้อมูล' */
    .btn-list {
        background: linear-gradient(135deg, #f7b731, #f5a623);
        color: #333;
        padding: 8px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        margin-bottom: 20px;
        display: inline-block;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-list:hover {
        background: linear-gradient(135deg, #f5a623, #f7b731);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(139, 0, 0, 0.2);
    }

    .edit-form {
        display: flex;
        flex-direction: column;
    }

    .row {
        display: flex;
        gap: 20px;
        margin-bottom: 15px;
        align-items: flex-start;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        flex: 1;
        min-width: 150px;
    }

    /* การจัดกลุ่มพื้นที่ */
    .row > .form-group:not(.profile-image-container) {
        flex-basis: 25%;
    }

    /* กลุ่มรูปภาพ: พื้นที่แสดงรูปภาพ */
    .profile-image-container {
        flex-basis: 150px;
        display: flex;
        justify-content: flex-end;
        align-items: flex-start;
        padding-top: 15px;
    }

    .profile-image {
        width: 150px;
        height: 150px;
        border: 1px solid #ddd;
        border-radius: 4px;
        object-fit: cover;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    /* แถวรายละเอียด (ความกว้างเต็ม) */
    .full-row {
        width: 100%;
    }
    
    .textarea-group {
        width: 75%;
    }

    label {
        margin-bottom: 5px;
        font-size: 14px;
        color: #666;
        font-weight: 500;
    }

    input[type="text"], 
    input[type="tel"],
    input[type="email"],
    select,
    textarea {
        padding: 10px;
        border: 1px solid #d0c0c0;
        border-radius: 4px;
        font-size: 16px;
        width: 100%;
        box-sizing: border-box;
        transition: all 0.3s ease;
        background: #fafafa;
    }

    input[type="text"]:focus,
    input[type="tel"]:focus,
    input[type="email"]:focus,
    select:focus,
    textarea:focus {
        border-color: #8B0000;
        outline: none;
        box-shadow: 0 0 0 2px rgba(139, 0, 0, 0.2);
        background: #fff;
    }

    textarea {
        resize: vertical;
        min-height: 100px;
    }

    /* ช่องวันที่: เพิ่มไอคอนปฏิทิน */
    .date-input-group {
        position: relative;
    }

    .date-input-group input {
        padding-right: 30px;
    }

    .calendar-icon {
        position: absolute;
        right: 10px;
        bottom: 10px;
        pointer-events: none;
        color: #666;
    }

    /* การจัดการรูปภาพอัพโหลด */
    .image-upload {
        flex-basis: 25%;
    }

    .file-control {
        display: flex;
        border: 1px solid #d0c0c0;
        border-radius: 4px;
        overflow: hidden;
        height: 38px;
        align-items: center;
        background: #fafafa;
    }

    .hidden-file-input {
        display: none;
    }

    .btn-choose {
        background: linear-gradient(135deg, #e0e0e0, #d0d0d0);
        border: none;
        padding: 0 10px;
        height: 100%;
        cursor: pointer;
        flex-shrink: 0;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    .btn-choose:hover {
        background: linear-gradient(135deg, #d0d0d0, #c0c0c0);
    }

    .file-name {
        padding: 0 10px;
        color: #666;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        font-size: 14px;
    }

    /* ปุ่มด้านล่างฟอร์ม */
    .button-row {
        margin-top: 30px;
        display: flex;
        gap: 10px;
    }

    .btn-primary {
        background: linear-gradient(135deg, #8B0000, #A0522D);
        color: white;
        padding: 12px 25px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(139, 0, 0, 0.3);
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #A0522D, #8B0000);
        transform: translateY(-2px);
        box-shadow: 0 6px 8px rgba(139, 0, 0, 0.4);
    }

    .btn-secondary {
        background: linear-gradient(135deg, #ccc, #bbb);
        color: #333;
        padding: 12px 25px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        transition: all 0.3s ease;
    }

    .btn-secondary:hover {
        background: linear-gradient(135deg, #bbb, #aaa);
        transform: translateY(-2px);
    }

    @media (max-width: 768px) {
        .row {
            flex-direction: column;
        }
        
        .form-group {
            flex-basis: 100%;
        }
        
        .profile-image-container {
            justify-content: flex-start;
        }
        
        .textarea-group {
            width: 100%;
        }
    }
</style>

<script>
    // Update file name when file is selected
    document.getElementById('image-file').addEventListener('change', function() {
        const fileName = this.files[0] ? this.files[0].name : 'No file chosen';
        document.querySelector('.file-name').textContent = fileName;
    });

    // Reset form function
    function resetForm() {
        document.querySelector('.edit-form').reset();
        document.querySelector('.file-name').textContent = 'No file chosen';
        // Reset image to default
        document.querySelector('.profile-image').src = 'https://via.placeholder.com/150x150?text=Profile+Photo';
    }
</script>
@endsection