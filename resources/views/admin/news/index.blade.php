@extends('admin.layout')

@section('content')
<div class="content-card">
    <div class="card-header">
        <div class="card-title">จัดการข่าวสารและกิจกรรม</div>
        <a href="{{ route('admin.news.create') }}" class="btn btn-primary">เพิ่มข้อมูลและแก้ไข</a>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <table>
        <thead>
            <tr>
                <th>หัวข้อ</th>
                <th>ประเภท</th>
                <th>วันที่โพสต์</th>
                <th>สถานะ</th>
                <th>การจัดการ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($news as $item)
            <tr>
                <td>{{ $item->title }}</td>
                <td>{{ $item->type }}</td>
                <td>{{ $item->publish_date }}</td>
                <td>
                    @if($item->status == 'เผยแพร่')
                        <span class="status status-active">{{ $item->status }}</span>
                    @else
                        <span class="status status-pending">{{ $item->status }}</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.news.edit', $item->id) }}" class="btn btn-sm btn-primary">แก้ไข</a>
                    <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" style="display: inline;">
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