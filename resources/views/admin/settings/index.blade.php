@extends('admin.layout')

@section('content')
<div class="content-card">
    <div class="card-header">
        <div class="card-title">จัดการการตั้งค่าระบบ</div>
        <a href="{{ route('admin.settings.create') }}" class="btn btn-primary">เพิ่มการตั้งค่า</a>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <table>
        <thead>
            <tr>
                <th>ชื่อ</th>
                <th>คีย์</th>
                <th>ค่า</th>
                <th>ประเภท</th>
                <th>การจัดการ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($settings as $setting)
            <tr>
                <td>{{ $setting->name }}</td>
                <td>{{ $setting->key }}</td>
                <td>{{ Str::limit($setting->value, 50) }}</td>
                <td>{{ $setting->type }}</td>
                <td>
                    <a href="{{ route('admin.settings.edit', $setting->id) }}" class="btn btn-sm btn-primary">แก้ไข</a>
                    <form action="{{ route('admin.settings.destroy', $setting->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('คุณแน่ใจหรือไม่?')">ลบ</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection