@extends('admin.layout')

@section('content')
<div class="custom-container">
    <div class="header-section">
        <h1>รายการข้อมูล</h1>
        <p class="subtitle">จัดการและดูข้อมูลทั้งหมดในระบบ</p>
    </div>

    <div class="controls-section">
        <div class="action-buttons">
            <a href="{{ route('admin.custom.add') }}" class="btn-green">
                <span class="btn-icon">+</span> เพิ่มข้อมูล
            </a>
            <button class="btn-blue-light">
                <span class="btn-icon">📊</span> รายงาน
            </button>
        </div>

        <div class="search-area">
            <div class="search-group">
                <label for="search-input">ใส่ข้อมูลเพื่อค้นหา</label>
                <div class="search-controls">
                    <input type="text" id="search-input" class="search-input" placeholder="ค้นหา...">
                    <button class="btn-search">ค้นหา</button>
                    <button class="btn-clear">เคลียร์</button>
                </div>
            </div>
        </div>
    </div>

    <div class="table-container">
        <table class="data-table">
            <thead>
                <tr>
                    <th>รหัส</th>
                    <th>เลขบัตรประจำตัวประชาชน</th>
                    <th>ชื่อ - สกุล</th>
                    <th>วัน/เดือน/ปี เกิด</th>
                    <th>โทรศัพท์</th>
                    <th>การจัดการ</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>9</td>
                    <td>1576557774437</td>
                    <td>นายtest9 test9</td>
                    <td>06/03/2565</td>
                    <td>012345678</td>
                    <td>
                        <div class="action-btns">
                            <button class="btn-update">แก้ไข</button>
                            <button class="btn-delete">ลบ</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>1997673957671</td>
                    <td>นายทดสอบ6 สกุล6</td>
                    <td>14/03/2565</td>
                    <td>023456789</td>
                    <td>
                        <div class="action-btns">
                            <button class="btn-update">แก้ไข</button>
                            <button class="btn-delete">ลบ</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="pagination-section">
        <div class="pagination-info">
            แสดง 1 ถึง 2 จากทั้งหมด 2 รายการ
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

<style>
    /* CSS สำหรับจัดรูปแบบ */
    .custom-container {
        background: linear-gradient(135deg, #f8f5f5 0%, #f0e6e6 100%);
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(139, 0, 0, 0.15);
        width: 100%;
        max-width: 1200px;
        margin: 20px auto;
        border: 1px solid rgba(139, 0, 0, 0.1);
    }

    .header-section {
        text-align: center;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 2px solid rgba(139, 0, 0, 0.1);
    }

    h1 {
        color: #8B0000;
        font-size: 32px;
        margin-bottom: 10px;
        font-weight: 700;
        background: linear-gradient(135deg, #8B0000, #A0522D);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .subtitle {
        color: #7f8c8d;
        font-size: 16px;
        margin: 0;
    }

    /* === ส่วนควบคุม === */
    .controls-section {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin-bottom: 30px;
        padding: 20px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(139, 0, 0, 0.08);
        border: 1px solid rgba(139, 0, 0, 0.05);
    }

    .action-buttons {
        display: flex;
        gap: 15px;
        align-items: center;
    }

    .btn-icon {
        margin-right: 8px;
        font-size: 18px;
    }

    .btn-green {
        background: linear-gradient(135deg, #28a745, #1e7e34);
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-weight: bold;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        transition: all 0.3s ease;
        box-shadow: 0 4px 10px rgba(40, 167, 69, 0.3);
        border: 1px solid rgba(40, 167, 69, 0.3);
    }

    .btn-green:hover {
        background: linear-gradient(135deg, #1e7e34, #28a745);
        transform: translateY(-3px);
        box-shadow: 0 6px 15px rgba(40, 167, 69, 0.4);
    }

    .btn-blue-light {
        background: linear-gradient(135deg, #17a2b8, #117a8b);
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-weight: bold;
        display: inline-flex;
        align-items: center;
        transition: all 0.3s ease;
        box-shadow: 0 4px 10px rgba(23, 162, 184, 0.3);
        border: 1px solid rgba(23, 162, 184, 0.3);
    }

    .btn-blue-light:hover {
        background: linear-gradient(135deg, #117a8b, #17a2b8);
        transform: translateY(-3px);
        box-shadow: 0 6px 15px rgba(23, 162, 184, 0.4);
    }

    /* === ส่วนค้นหา === */
    .search-area {
        margin-left: auto;
        flex: 1;
        min-width: 300px;
    }

    .search-group label {
        font-size: 16px;
        color: #555;
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
    }

    .search-controls {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .search-input {
        padding: 12px 15px;
        border: 2px solid #d0c0c0;
        border-radius: 8px;
        width: 100%;
        font-size: 16px;
        transition: all 0.3s ease;
        background: #fafafa;
    }

    .search-input:focus {
        border-color: #8B0000;
        outline: none;
        box-shadow: 0 0 0 3px rgba(139, 0, 0, 0.2);
        background: #fff;
    }

    .btn-search {
        background: linear-gradient(135deg, #007bff, #0056b3);
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        transition: all 0.3s ease;
        box-shadow: 0 4px 10px rgba(0, 123, 255, 0.3);
        border: 1px solid rgba(0, 123, 255, 0.3);
        white-space: nowrap;
    }

    .btn-search:hover {
        background: linear-gradient(135deg, #0056b3, #007bff);
        transform: translateY(-3px);
        box-shadow: 0 6px 15px rgba(0, 123, 255, 0.4);
    }

    .btn-clear {
        background: linear-gradient(135deg, #6c757d, #545b62);
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        transition: all 0.3s ease;
        box-shadow: 0 4px 10px rgba(108, 117, 125, 0.3);
        border: 1px solid rgba(108, 117, 125, 0.3);
        white-space: nowrap;
    }

    .btn-clear:hover {
        background: linear-gradient(135deg, #545b62, #6c757d);
        transform: translateY(-3px);
        box-shadow: 0 6px 15px rgba(108, 117, 125, 0.4);
    }

    /* === ตารางข้อมูล === */
    .table-container {
        background: white;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 4px 15px rgba(139, 0, 0, 0.08);
        border: 1px solid rgba(139, 0, 0, 0.05);
        overflow-x: auto;
    }

    .data-table {
        width: 100%;
        border-collapse: collapse;
        margin: 0;
    }

    .data-table th,
    .data-table td {
        padding: 15px 12px;
        text-align: left;
        border-bottom: 1px solid #eee;
        font-size: 15px;
    }

    .data-table th {
        background: linear-gradient(135deg, #f8f0f0, #f0e0e0);
        color: #8B0000;
        font-weight: 600;
        border-top: 2px solid #8B0000;
        border-bottom: 2px solid #8B0000;
        white-space: nowrap;
    }

    .data-table tbody tr {
        transition: all 0.3s ease;
    }

    .data-table tbody tr:hover {
        background-color: #f8f0f0;
        transform: scale(1.01);
    }

    .data-table tbody tr:last-child td {
        border-bottom: none;
    }

    /* จัดความกว้างคอลัมน์ */
    .data-table th:nth-child(1),
    .data-table td:nth-child(1) {
        width: 5%;
    }

    .data-table th:nth-child(2),
    .data-table td:nth-child(2) {
        width: 25%;
    }

    .data-table th:nth-child(6),
    .data-table td:nth-child(6) {
        width: 15%;
    }

    /* ปุ่มจัดการ (Update/Delete) */
    .action-btns {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .btn-update {
        background: linear-gradient(135deg, #ffc107, #d39e00);
        color: #333;
        padding: 8px 15px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-weight: bold;
        transition: all 0.3s ease;
        box-shadow: 0 3px 8px rgba(255, 193, 7, 0.3);
        border: 1px solid rgba(255, 193, 7, 0.3);
        font-size: 14px;
    }

    .btn-update:hover {
        background: linear-gradient(135deg, #d39e00, #ffc107);
        transform: translateY(-2px);
        box-shadow: 0 5px 12px rgba(255, 193, 7, 0.4);
    }

    .btn-delete {
        background: linear-gradient(135deg, #dc3545, #bd2130);
        color: white;
        padding: 8px 15px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-weight: bold;
        transition: all 0.3s ease;
        box-shadow: 0 3px 8px rgba(220, 53, 69, 0.3);
        border: 1px solid rgba(220, 53, 69, 0.3);
        font-size: 14px;
    }

    .btn-delete:hover {
        background: linear-gradient(135deg, #bd2130, #dc3545);
        transform: translateY(-2px);
        box-shadow: 0 5px 12px rgba(220, 53, 69, 0.4);
    }

    /* === ส่วนแบ่งหน้า (Pagination) === */
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

    @media (max-width: 768px) {
        .custom-container {
            padding: 20px;
            margin: 10px;
        }
        
        .controls-section {
            flex-direction: column;
        }
        
        .action-buttons {
            flex-wrap: wrap;
        }
        
        .search-area {
            margin-left: 0;
            width: 100%;
        }
        
        .search-controls {
            flex-direction: column;
            align-items: stretch;
        }
        
        .pagination-section {
            flex-direction: column;
            text-align: center;
        }
        
        .pagination {
            justify-content: center;
        }
        
        .data-table {
            min-width: 600px;
        }
    }
</style>
@endsection