@extends('admin.layout')

@section('content')
<div class="content-card">
    <div class="card-header">
        <div class="card-title">
            <i class="{{ $icon ?? 'fas fa-database' }}"></i>
            {{ $title ?? 'จัดการข้อมูล' }}
        </div>
        <button class="btn btn-primary" onclick="showCreateForm()">
            <i class="fas fa-plus"></i> เพิ่มข้อมูล
        </button>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif
    
    @if(session('error'))
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-triangle"></i> {{ session('error') }}
        </div>
    @endif
    
    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    @foreach($columns as $column)
                        <th>{{ $column['label'] }}</th>
                    @endforeach
                    <th>การจัดการ</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $item)
                <tr id="row-{{ $item->id }}">
                    @foreach($columns as $column)
                        <td>
                            @if(isset($column['type']) && $column['type'] === 'image')
                                @if($item->{$column['field']})
                                    <img src="{{ asset($item->{$column['field']}) }}" alt="Image" class="table-image">
                                @else
                                    <span class="text-muted">ไม่มีรูปภาพ</span>
                                @endif
                            @elseif(isset($column['type']) && $column['type'] === 'status')
                                @if($item->{$column['field']} == 'active' || $item->{$column['field']} == 1)
                                    <span class="status status-active">เปิดใช้งาน</span>
                                @else
                                    <span class="status status-pending">ปิดใช้งาน</span>
                                @endif
                            @else
                                {{ $item->{$column['field']} }}
                            @endif
                        </td>
                    @endforeach
                    <td>
                        <button class="btn btn-sm btn-primary edit-btn" data-id="{{ $item->id }}">
                            <i class="fas fa-edit"></i> แก้ไข
                        </button>
                        <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $item->id }}">
                            <i class="fas fa-trash"></i> ลบ
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="{{ count($columns) + 1 }}" class="text-center">
                        <i class="fas fa-inbox fa-2x mb-2"></i>
                        <p>ไม่พบข้อมูล</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal for Create/Edit Form -->
<div class="modal" id="dataModal" tabindex="-1" style="display: none; background: rgba(0,0,0,0.5); position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 1000;">
    <div class="modal-dialog" style="max-width: 600px; margin: 50px auto; background: white; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.3);">
        <div class="modal-header" style="padding: 20px; border-bottom: 1px solid #e0d0d0; display: flex; justify-content: space-between; align-items: center;">
            <h5 class="modal-title" id="modalTitle">เพิ่มข้อมูล</h5>
            <button type="button" class="close" onclick="hideModal()" style="background: none; border: none; font-size: 24px; cursor: pointer;">&times;</button>
        </div>
        <div class="modal-body" style="padding: 20px;">
            <form id="dataForm" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="itemId" name="id">
                <div id="formFields">
                    <!-- Form fields will be dynamically inserted here -->
                </div>
                <div class="form-group" style="margin-top: 20px; display: flex; gap: 10px; justify-content: flex-end;">
                    <button type="button" class="btn btn-secondary" onclick="hideModal()">ยกเลิก</button>
                    <button type="submit" class="btn btn-primary">บันทึก</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.table-image {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 5px;
    border: 1px solid #ddd;
}

.modal {
    display: none;
}

.modal.show {
    display: block;
}

.text-muted {
    color: #6c757d;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
</style>

<script>
// Add event listeners when the page loads
document.addEventListener('DOMContentLoaded', function() {
    // Add event listeners to edit buttons
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            editItem(id);
        });
    });
    
    // Add event listeners to delete buttons
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            deleteItem(id);
        });
    });
});

// Function to show create form
function showCreateForm() {
    document.getElementById('modalTitle').textContent = 'เพิ่มข้อมูล';
    document.getElementById('itemId').value = '';
    document.getElementById('dataForm').reset();
    
    // Clear previous form fields
    document.getElementById('formFields').innerHTML = '';
    
    // Generate form fields based on columns configuration
    // This will be implemented in the controller
    
    document.getElementById('dataModal').style.display = 'block';
}

// Function to edit an item
function editItem(id) {
    // Fetch item data via AJAX (this would be implemented in a real application)
    // For now, we'll just show the form with empty fields
    document.getElementById('modalTitle').textContent = 'แก้ไขข้อมูล';
    document.getElementById('itemId').value = id;
    
    // Clear previous form fields
    document.getElementById('formFields').innerHTML = '';
    
    // Generate form fields based on columns configuration
    // This will be implemented in the controller
    
    document.getElementById('dataModal').style.display = 'block';
}

// Function to delete an item
function deleteItem(id) {
    if (confirm('คุณแน่ใจหรือไม่ที่ต้องการลบข้อมูลนี้?')) {
        // In a real application, you would make an AJAX request to delete the item
        // For now, we'll just remove the row from the table
        document.getElementById('row-' + id).remove();
        alert('ลบข้อมูลเรียบร้อยแล้ว');
    }
}

// Function to hide the modal
function hideModal() {
    document.getElementById('dataModal').style.display = 'none';
}

// Handle form submission
document.getElementById('dataForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // In a real application, you would submit the form via AJAX
    // For now, we'll just show a success message and hide the modal
    alert('บันทึกข้อมูลเรียบร้อยแล้ว');
    hideModal();
    
    // Reload the page to show updated data
    location.reload();
});
</script>
@endsection