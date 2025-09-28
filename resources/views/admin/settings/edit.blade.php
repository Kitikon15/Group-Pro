@extends('admin.layout')

@section('content')
<div class="container">
    <h1>แก้ไขการตั้งค่าระบบ</h1>
    <a href="{{ route('admin.settings.index') }}" class="btn-list">รายการข้อมูล</a>

    <form action="{{ route('admin.settings.update', $setting->id) }}" method="POST" class="edit-form">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="form-group">
                <label for="name">ชื่อการตั้งค่า</label>
                <input type="text" id="name" name="name" value="{{ $setting->name }}" required>
            </div>
            <div class="form-group">
                <label for="key">คีย์ (Key)</label>
                <input type="text" id="key" name="key" value="{{ $setting->key }}" required>
            </div>
            <div class="form-group">
                <label for="type">ประเภท</label>
                <select id="type" name="type">
                    <option value="string" {{ $setting->type == 'string' ? 'selected' : '' }}>ข้อความสั้น</option>
                    <option value="text" {{ $setting->type == 'text' ? 'selected' : '' }}>ข้อความยาว</option>
                    <option value="boolean" {{ $setting->type == 'boolean' ? 'selected' : '' }}>ค่าจริง/เท็จ</option>
                    <option value="integer" {{ $setting->type == 'integer' ? 'selected' : '' }}>ตัวเลข</option>
                </select>
            </div>
        </div>

        <div class="row full-row">
            <div class="form-group textarea-group">
                <label for="value">ค่า</label>
                <textarea id="value" name="value">{{ $setting->value }}</textarea>
            </div>
        </div>

        <div class="row full-row">
            <div class="form-group textarea-group">
                <label for="description">คำอธิบาย</label>
                <textarea id="description" name="description">{{ $setting->description }}</textarea>
                <small class="form-text">ใช้สำหรับเรียกใช้งานการตั้งค่านี้ในระบบ</small>
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
        flex-basis: 33.33%;
    }

    /* แถวรายละเอียด (ความกว้างเต็ม) */
    .full-row {
        width: 100%;
    }
    
    .textarea-group {
        width: 100%;
    }

    label {
        margin-bottom: 5px;
        font-size: 14px;
        color: #666;
        font-weight: 500;
    }

    input[type="text"], 
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

    .form-text {
        margin-top: 5px;
        font-size: 12px;
        color: #999;
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
        
        .textarea-group {
            width: 100%;
        }
    }
</style>

<script>
    // Reset form function
    function resetForm() {
        document.querySelector('.edit-form').reset();
    }
</script>
@endsection