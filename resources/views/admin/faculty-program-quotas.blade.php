@extends('admin.layout')

@section('content')
<div class="content-card">
    <h1 class="page-title">สาขาและจำนวนที่รับสมัคร</h1>

    <!-- Edit button to switch to edit mode -->
    <div style="text-align: right; margin-bottom: 20px;">
        <button id="editButton" class="btn btn-primary" onclick="toggleEditMode()">
            <i class="fas fa-edit"></i> แก้ไขข้อมูล
        </button>
    </div>

    <!-- Display mode -->
    <div id="displayMode">
        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-icon">🏫</div>
                <div class="stat-info">
                    <h3>{{ count($facultyPrograms) }}</h3>
                    <p>จำนวนคณะทั้งหมด</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">📚</div>
                <div class="stat-info">
                    <h3>
                        @php
                            $totalPrograms = 0;
                            foreach($facultyPrograms as $faculty) {
                                $totalPrograms += count($faculty['programs']);
                            }
                            echo $totalPrograms;
                        @endphp
                    </h3>
                    <p>จำนวนสาขาวิชาทั้งหมด</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">👥</div>
                <div class="stat-info">
                    <h3>
                        @php
                            $totalQuota = 0;
                            foreach($facultyPrograms as $faculty) {
                                foreach($faculty['programs'] as $program) {
                                    $totalQuota += $program['quota'];
                                }
                            }
                            echo $totalQuota;
                        @endphp
                    </h3>
                    <p>จำนวนที่นั่งทั้งหมด</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">📝</div>
                <div class="stat-info">
                    <h3>
                        @php
                            $totalRegistered = 0;
                            foreach($facultyPrograms as $faculty) {
                                foreach($faculty['programs'] as $program) {
                                    $totalRegistered += $program['registered'];
                                }
                            }
                            echo $totalRegistered;
                        @endphp
                    </h3>
                    <p>จำนวนผู้สมัครทั้งหมด</p>
                </div>
            </div>
        </div>

        @foreach($facultyPrograms as $faculty)
        <div class="content-card">
            <div class="card-header">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <i class="fas fa-university"></i>
                    <h2 style="margin: 0; color: #8B0000; font-weight: 700;">{{ $faculty['faculty'] }}</h2>
                </div>
            </div>
            
            <table>
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

    <!-- Edit mode -->
    <div id="editMode" style="display: none;">
        <form id="facultyProgramForm" action="{{ route('admin.faculty.program.quotas.update') }}" method="POST" class="edit-form">
            @csrf
            @method('PUT')
            
            <div class="form-section">
                <div class="card-header">
                    <h2 class="card-title">
                        <i class="fas fa-edit"></i> แก้ไขข้อมูลคณะและสาขา
                    </h2>
                </div>
                
                <div class="section-content">
                    <div id="facultiesContainer">
                        @foreach($facultyPrograms as $facultyIndex => $faculty)
                        <div class="faculty-edit-section" data-faculty-id="{{ $facultyIndex }}">
                            <div class="faculty-header">
                                <i class="fas fa-university"></i>
                                <input type="text" name="faculties[{{ $facultyIndex }}][faculty]" value="{{ $faculty['faculty'] }}" class="form-control faculty-name-input" placeholder="ชื่อคณะ">
                            </div>
                            
                            <div class="programs-container">
                                <h3 style="margin: 20px 0 15px 0; color: #8B0000; font-weight: 600;">สาขาวิชา:</h3>
                                @foreach($faculty['programs'] as $programIndex => $program)
                                <div class="program-edit-row" data-program-id="{{ $programIndex }}">
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label>ชื่อสาขา:</label>
                                            <input type="text" name="faculties[{{ $facultyIndex }}][programs][{{ $programIndex }}][name]" value="{{ $program['name'] }}" class="form-control" placeholder="ชื่อสาขา">
                                        </div>
                                        <div class="form-group">
                                            <label>จำนวนที่รับ:</label>
                                            <input type="number" name="faculties[{{ $facultyIndex }}][programs][{{ $programIndex }}][quota]" value="{{ $program['quota'] }}" class="form-control" placeholder="จำนวนที่รับ" min="1">
                                        </div>
                                        <div class="form-group">
                                            <label>จำนวนผู้สมัคร:</label>
                                            <input type="number" name="faculties[{{ $facultyIndex }}][programs][{{ $programIndex }}][registered]" value="{{ $program['registered'] }}" class="form-control" placeholder="จำนวนผู้สมัคร" min="0">
                                        </div>
                                        <div class="form-group" style="display: flex; align-items: flex-end;">
                                            <button type="button" class="btn-remove-program" onclick="removeProgram(this)">✖ ลบสาขา</button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <button type="button" class="btn-add-program" onclick="addProgram(<?php echo e($facultyIndex); ?>)">+ เพิ่มสาขา</button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <button type="button" class="btn-add-faculty" onclick="addFaculty()">+ เพิ่มคณะ</button>
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

    .faculty-edit-section {
        background: #f8f5f5;
        border-radius: 12px;
        padding: 25px;
        margin-bottom: 25px;
        border: 1px solid #d0c0c0;
    }

    .faculty-header {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 20px;
    }

    .faculty-name-input {
        font-size: 1.5em;
        font-weight: 700;
        color: #8B0000;
        border: 2px solid #d0c0c0;
        border-radius: 8px;
        padding: 12px 15px;
        width: auto;
        min-width: 300px;
        background: #fafafa;
    }

    .faculty-name-input:focus {
        border-color: #8B0000;
        outline: none;
        box-shadow: 0 0 0 3px rgba(139, 0, 0, 0.2);
        background: #fff;
    }

    .programs-container {
        margin-top: 20px;
        padding: 20px;
        background: white;
        border-radius: 10px;
        border: 1px solid #d0c0c0;
    }

    .program-edit-row {
        background: #f8f0f0;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 15px;
        border: 1px solid #d0c0c0;
    }

    .form-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
        align-items: end;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group label {
        margin-bottom: 8px;
        font-size: 14px;
        color: #5a5a5a;
        font-weight: 600;
    }

    .form-control {
        padding: 12px 15px;
        border: 2px solid #d0c0c0;
        border-radius: 8px;
        font-size: 16px;
        width: 100%;
        box-sizing: border-box;
        transition: all 0.3s ease;
        background: #fafafa;
        color: #333;
        font-weight: 500;
    }

    .form-control:focus {
        border-color: #8B0000;
        outline: none;
        box-shadow: 0 0 0 3px rgba(139, 0, 0, 0.2);
        background: #fff;
    }

    .btn-remove-program, .btn-add-program, .btn-add-faculty {
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

    .btn-remove-program {
        background: linear-gradient(135deg, #dc3545, #bd2130);
    }

    .btn-remove-program:hover, .btn-add-program:hover, .btn-add-faculty:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .btn-add-program, .btn-add-faculty {
        align-self: flex-start;
        margin-top: 15px;
    }

    .button-row {
        display: flex;
        gap: 20px;
        justify-content: center;
        margin-top: 20px;
        padding: 20px;
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
        color: #5a5a5a;
    }

    @media (max-width: 768px) {
        .form-row {
            grid-template-columns: 1fr;
        }
        
        .faculty-name-input {
            min-width: 200px;
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
            editButton.innerHTML = '<i class="fas fa-edit"></i> แก้ไขข้อมูล';
            editButton.className = 'btn btn-primary';
        } else {
            displayMode.style.display = 'none';
            editMode.style.display = 'block';
            editButton.innerHTML = '<i class="fas fa-times"></i> ยกเลิกการแก้ไข';
            editButton.className = 'btn btn-secondary';
        }
    }
    
    // Add a new faculty
    function addFaculty() {
        const facultiesContainer = document.getElementById('facultiesContainer');
        const facultyCount = facultiesContainer.children.length;
        
        const facultySection = document.createElement('div');
        facultySection.className = 'faculty-edit-section';
        facultySection.setAttribute('data-faculty-id', facultyCount);
        facultySection.innerHTML = `
            <div class="faculty-header">
                <i class="fas fa-university"></i>
                <input type="text" name="faculties[${facultyCount}][faculty]" class="form-control faculty-name-input" placeholder="ชื่อคณะ">
            </div>
            
            <div class="programs-container">
                <h3 style="margin: 20px 0 15px 0; color: #8B0000; font-weight: 600;">สาขาวิชา:</h3>
                <div class="program-edit-row" data-program-id="0">
                    <div class="form-row">
                        <div class="form-group">
                            <label>ชื่อสาขา:</label>
                            <input type="text" name="faculties[${facultyCount}][programs][0][name]" class="form-control" placeholder="ชื่อสาขา">
                        </div>
                        <div class="form-group">
                            <label>จำนวนที่รับ:</label>
                            <input type="number" name="faculties[${facultyCount}][programs][0][quota]" class="form-control" placeholder="จำนวนที่รับ" min="1">
                        </div>
                        <div class="form-group">
                            <label>จำนวนผู้สมัคร:</label>
                            <input type="number" name="faculties[${facultyCount}][programs][0][registered]" class="form-control" placeholder="จำนวนผู้สมัคร" min="0">
                        </div>
                        <div class="form-group" style="display: flex; align-items: flex-end;">
                            <button type="button" class="btn-remove-program" onclick="removeProgram(this)">✖ ลบสาขา</button>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-add-program" onclick="addProgram(${facultyCount})">+ เพิ่มสาขา</button>
            </div>
        `;
        
        facultiesContainer.appendChild(facultySection);
    }
    
    // Add a new program to a faculty
    function addProgram(facultyIndex) {
        const facultySection = document.querySelector(`.faculty-edit-section[data-faculty-id="${facultyIndex}"]`);
        const programsContainer = facultySection.querySelector('.programs-container');
        const programRows = programsContainer.querySelectorAll('.program-edit-row');
        const programCount = programRows.length;
        
        const programRow = document.createElement('div');
        programRow.className = 'program-edit-row';
        programRow.setAttribute('data-program-id', programCount);
        programRow.innerHTML = `
            <div class="form-row">
                <div class="form-group">
                    <label>ชื่อสาขา:</label>
                    <input type="text" name="faculties[${facultyIndex}][programs][${programCount}][name]" class="form-control" placeholder="ชื่อสาขา">
                </div>
                <div class="form-group">
                    <label>จำนวนที่รับ:</label>
                    <input type="number" name="faculties[${facultyIndex}][programs][${programCount}][quota]" class="form-control" placeholder="จำนวนที่รับ" min="1">
                </div>
                <div class="form-group">
                    <label>จำนวนผู้สมัคร:</label>
                    <input type="number" name="faculties[${facultyIndex}][programs][${programCount}][registered]" class="form-control" placeholder="จำนวนผู้สมัคร" min="0">
                </div>
                <div class="form-group" style="display: flex; align-items: flex-end;">
                    <button type="button" class="btn-remove-program" onclick="removeProgram(this)">✖ ลบสาขา</button>
                </div>
            </div>
        `;
        
        // Insert before the add button
        const addButton = programsContainer.querySelector('.btn-add-program');
        programsContainer.insertBefore(programRow, addButton);
    }
    
    // Remove a program
    function removeProgram(button) {
        const programRow = button.closest('.program-edit-row');
        programRow.remove();
    }
    
    // Form submission
    document.getElementById('facultyProgramForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // In a real application, you would send the form data to the server here
        // For this example, we'll just show a success message
        alert('บันทึกข้อมูลเรียบร้อยแล้ว!');
        
        // Switch back to display mode
        toggleEditMode();
    });
</script>
@endsection