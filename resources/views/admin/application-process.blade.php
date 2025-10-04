@extends('admin.layout')

@section('content')
<div class="content-card">
    <h1 class="page-title">ขั้นตอนการสมัคร</h1>

    <!-- Edit button to switch to edit mode -->
    <div style="text-align: right; margin-bottom: 20px;">
        <button id="editButton" class="btn btn-primary" onclick="toggleEditMode()">
            <i class="fas fa-edit"></i> แก้ไขข้อมูล
        </button>
    </div>

    <!-- Display mode -->
    <div id="displayMode">
        <div class="process-steps">
            @foreach($steps as $step)
            <div class="step-card">
                <div class="step-header">
                    <div class="step-number">{{ $step['number'] }}</div>
                    <h2 class="step-title">{{ $step['title'] }}</h2>
                </div>
                <p class="step-description">{{ $step['description'] }}</p>
                <div class="step-details">
                    <h4><i class="fas fa-info-circle"></i> รายละเอียดขั้นตอน</h4>
                    <ul>
                        @foreach($step['details'] as $detail)
                        <li>{{ $detail }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endforeach
        </div>

        <div class="content-card">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-phone"></i> ติดต่อสอบถามข้อมูลเพิ่มเติม</h3>
            </div>
            <div class="contact-details">
                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div>
                        <strong>ที่อยู่:</strong><br>
                        มหาวิทยาลัยราชภัฏนครปฐม<br>
                        85 หมู่ 2 ถนนมาลัยแมน ตำบลพระปฐมเจดีย์ อำเภอเมือง จังหวัดนครปฐม 73000
                    </div>
                </div>
                
                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div>
                        <strong>โทรศัพท์:</strong><br>
                        0-3423-3274 ต่อ 2111
                    </div>
                </div>
                
                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <strong>อีเมล:</strong><br>
                        admission@npru.ac.th
                    </div>
                </div>
                
                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <div>
                        <strong>เว็บไซต์:</strong><br>
                        www.npru.ac.th
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit mode -->
    <div id="editMode" style="display: none;">
        <form id="applicationProcessForm" action="{{ route('admin.application.process.update') }}" method="POST" class="edit-form">
            @csrf
            @method('PUT')
            
            <div class="form-section">
                <div class="card-header">
                    <h2 class="card-title">
                        <i class="fas fa-edit"></i> แก้ไขขั้นตอนการสมัคร
                    </h2>
                </div>
                
                <div class="section-content">
                    <div id="stepsContainer">
                        @foreach($steps as $index => $step)
                        <div class="step-edit-card" data-step-id="{{ $step['number'] }}">
                            <div class="step-header">
                                <div class="step-number">{{ $step['number'] }}</div>
                                <input type="text" name="steps[{{ $index }}][title]" value="{{ $step['title'] }}" class="form-control step-title-input" placeholder="ชื่อขั้นตอน">
                            </div>
                            <div class="form-group">
                                <label>คำอธิบาย:</label>
                                <textarea name="steps[{{ $index }}][description]" class="form-control step-description-input" placeholder="คำอธิบายขั้นตอน">{{ $step['description'] }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>รายละเอียดขั้นตอน:</label>
                                <div class="details-container">
                                    @foreach($step['details'] as $detailIndex => $detail)
                                    <div class="detail-item">
                                        <input type="text" name="steps[{{ $index }}][details][{{ $detailIndex }}]" value="{{ $detail }}" class="form-control detail-input" placeholder="รายละเอียด">
                                        <button type="button" class="btn-remove-detail" onclick="removeDetail(this)">✖</button>
                                    </div>
                                    @endforeach
                                    <button type="button" class="btn-add-detail" onclick="addDetail(<?php echo e($index); ?>)">+ เพิ่มรายละเอียด</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <button type="button" class="btn-add-step" onclick="addStep()">+ เพิ่มขั้นตอน</button>
                </div>
            </div>
            
            <div class="form-section">
                <div class="card-header">
                    <h2 class="card-title">
                        <i class="fas fa-phone"></i> ข้อมูลการติดต่อ
                    </h2>
                </div>
                
                <div class="section-content">
                    <div class="form-group">
                        <label>ที่อยู่:</label>
                        <textarea name="contact[address]" class="form-control" placeholder="ที่อยู่">มหาวิทยาลัยราชภัฏนครปฐม
85 หมู่ 2 ถนนมาลัยแมน ตำบลพระปฐมเจดีย์ อำเภอเมือง จังหวัดนครปฐม 73000</textarea>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label>โทรศัพท์:</label>
                            <input type="text" name="contact[phone]" value="0-3423-3274 ต่อ 2111" class="form-control" placeholder="โทรศัพท์">
                        </div>
                        
                        <div class="form-group">
                            <label>อีเมล:</label>
                            <input type="email" name="contact[email]" value="admission@npru.ac.th" class="form-control" placeholder="อีเมล">
                        </div>
                        
                        <div class="form-group">
                            <label>เว็บไซต์:</label>
                            <input type="text" name="contact[website]" value="www.npru.ac.th" class="form-control" placeholder="เว็บไซต์">
                        </div>
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

<style>
    .process-steps {
        display: flex;
        flex-direction: column;
        gap: 25px;
        margin-bottom: 40px;
    }

    .step-card {
        background: white;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(139, 0, 0, 0.15);
        padding: 30px;
        border: 1px solid #e8d8d8;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .step-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 15px rgba(139, 0, 0, 0.25);
    }

    .step-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 5px;
        height: 100%;
        background: linear-gradient(135deg, #8B0000, #A0522D);
    }

    .step-header {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 20px;
    }

    .step-number {
        background: linear-gradient(135deg, #8B0000, #A0522D);
        color: white;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 1.5em;
        box-shadow: 0 4px 10px rgba(139, 0, 0, 0.3);
    }

    .step-title {
        font-size: 1.5em;
        font-weight: 700;
        color: #000;
    }

    .step-description {
        font-size: 1.1em;
        margin-bottom: 20px;
        color: #5a5a5a;
        font-weight: 500;
    }

    .step-details {
        background: #f8f0f0;
        border-radius: 10px;
        padding: 20px;
        border-left: 4px solid #8B0000;
    }

    .step-details h4 {
        color: #000;
        margin-bottom: 15px;
        font-size: 1.2em;
        display: flex;
        align-items: center;
        gap: 10px;
        font-weight: 700;
    }

    .step-details ul {
        list-style: none;
        padding-left: 0;
    }

    .step-details li {
        padding: 8px 0 8px 30px;
        position: relative;
        border-bottom: 1px solid #f0e0e0;
        font-weight: 500;
    }

    .step-details li:last-child {
        border-bottom: none;
    }

    .step-details li::before {
        content: "✓";
        color: #8B0000;
        position: absolute;
        left: 0;
        font-weight: bold;
    }

    .contact-details {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .contact-item {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 15px;
        background: #f8f0f0;
        border-radius: 10px;
        font-weight: 500;
    }

    .contact-icon {
        background: linear-gradient(135deg, #8B0000, #A0522D);
        color: white;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2em;
        box-shadow: 0 2px 5px rgba(139, 0, 0, 0.3);
    }

    /* Edit mode styles */
    .form-section {
        background: white;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(139, 0, 0, 0.15);
        padding: 0;
        margin-bottom: 30px;
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
        margin-bottom: 25px;
    }

    .form-group label {
        margin-bottom: 12px;
        font-size: 16px;
        color: #5a5a5a;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .form-control {
        padding: 16px 20px;
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

    textarea.form-control {
        resize: vertical;
        min-height: 120px;
        padding-top: 20px;
        padding-bottom: 20px;
    }

    .step-edit-card {
        background: #f8f5f5;
        border-radius: 12px;
        padding: 25px;
        margin-bottom: 25px;
        border: 1px solid #d0c0c0;
    }

    .step-title-input {
        font-size: 1.5em;
        font-weight: 700;
        color: #000;
        border: 2px solid #d0c0c0;
        border-radius: 8px;
        padding: 12px 15px;
    }

    .step-description-input {
        min-height: 80px;
    }

    .details-container {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .detail-item {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .detail-input {
        flex: 1;
        padding: 12px 15px;
    }

    .btn-remove-detail, .btn-add-detail, .btn-add-step {
        background: linear-gradient(135deg, #6c757d, #495057);
        color: white;
        border: none;
        border-radius: 8px;
        padding: 10px 15px;
        cursor: pointer;
        font-weight: 600;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-remove-detail {
        background: linear-gradient(135deg, #dc3545, #bd2130);
        padding: 10px;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        justify-content: center;
    }

    .btn-remove-detail:hover, .btn-add-detail:hover, .btn-add-step:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .btn-add-detail, .btn-add-step {
        align-self: flex-start;
        margin-top: 10px;
    }

    .form-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }

    .button-row {
        display: flex;
        gap: 20px;
        justify-content: center;
        margin-top: 20px;
        padding: 20px;
    }

    @media (max-width: 768px) {
        .step-header {
            flex-direction: column;
            text-align: center;
            gap: 15px;
        }
        
        .step-number {
            width: 60px;
            height: 60px;
            font-size: 2em;
        }
        
        .contact-details {
            grid-template-columns: 1fr;
        }
        
        .form-row {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 576px) {
        .step-title {
            font-size: 1.3em;
        }
        
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
            editButton.innerHTML = '<i class="fas fa-edit"></i> แก้ไขข้อมูล';
            editButton.className = 'btn btn-primary';
        } else {
            displayMode.style.display = 'none';
            editMode.style.display = 'block';
            editButton.innerHTML = '<i class="fas fa-times"></i> ยกเลิกการแก้ไข';
            editButton.className = 'btn btn-secondary';
        }
    }
    
    // Add a new step
    function addStep() {
        const stepsContainer = document.getElementById('stepsContainer');
        const stepCount = stepsContainer.children.length + 1;
        
        const stepCard = document.createElement('div');
        stepCard.className = 'step-edit-card';
        stepCard.setAttribute('data-step-id', stepCount);
        stepCard.innerHTML = `
            <div class="step-header">
                <div class="step-number">${stepCount}</div>
                <input type="text" name="steps[${stepCount-1}][title]" class="form-control step-title-input" placeholder="ชื่อขั้นตอน">
            </div>
            <div class="form-group">
                <label>คำอธิบาย:</label>
                <textarea name="steps[${stepCount-1}][description]" class="form-control step-description-input" placeholder="คำอธิบายขั้นตอน"></textarea>
            </div>
            <div class="form-group">
                <label>รายละเอียดขั้นตอน:</label>
                <div class="details-container">
                    <div class="detail-item">
                        <input type="text" name="steps[${stepCount-1}][details][0]" class="form-control detail-input" placeholder="รายละเอียด">
                        <button type="button" class="btn-remove-detail" onclick="removeDetail(this)">✖</button>
                    </div>
                    <button type="button" class="btn-add-detail" onclick="addDetail(${stepCount-1})">+ เพิ่มรายละเอียด</button>
                </div>
            </div>
        `;
        
        stepsContainer.appendChild(stepCard);
    }
    
    // Add a new detail to a step
    function addDetail(stepIndex) {
        const stepCard = document.querySelector(`.step-edit-card[data-step-id="${stepIndex+1}"]`);
        const detailsContainer = stepCard.querySelector('.details-container');
        const detailItems = detailsContainer.querySelectorAll('.detail-item');
        const detailCount = detailItems.length;
        
        const detailItem = document.createElement('div');
        detailItem.className = 'detail-item';
        detailItem.innerHTML = `
            <input type="text" name="steps[${stepIndex}][details][${detailCount}]" class="form-control detail-input" placeholder="รายละเอียด">
            <button type="button" class="btn-remove-detail" onclick="removeDetail(this)">✖</button>
        `;
        
        // Insert before the add button
        const addButton = detailsContainer.querySelector('.btn-add-detail');
        detailsContainer.insertBefore(detailItem, addButton);
    }
    
    // Remove a detail
    function removeDetail(button) {
        const detailItem = button.parentElement;
        detailItem.remove();
    }
    
    // Form submission
    document.getElementById('applicationProcessForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // In a real application, you would send the form data to the server here
        // For this example, we'll just show a success message
        alert('บันทึกข้อมูลเรียบร้อยแล้ว!');
        
        // Switch back to display mode
        toggleEditMode();
    });
</script>
@endsection