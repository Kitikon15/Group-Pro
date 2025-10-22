@extends('admin.layout')

@section('title', 'จัดการข่าวสารและกิจกรรม')

@section('content')
<div class="page-title">
    <span>จัดการข่าวสารและกิจกรรม</span>
    <div>
        <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> เพิ่มข่าวสาร
        </a>
        <button class="btn btn-secondary btn-sm" onclick="location.reload()">
            <i class="fas fa-sync-alt"></i> รีเฟรช
        </button>
    </div>
</div>

<div class="content-card">
    <div class="card-header">
        <div class="card-title">รายการข่าวสารและกิจกรรม</div>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>หัวข้อ</th>
                    <th>ประเภท</th>
                    <th>วันที่โพสต์</th>
                    <th>สถานะ</th>
                    <th>การดำเนินการ</th>
                </tr>
            </thead>
            <tbody>
                @forelse($news as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->type }}</td>
                    <td>{{ $item->publish_date->format('d/m/Y') }}</td>
                    <td>
                        @if($item->status == 'เผยแพร่')
                            <span class="status status-active">เผยแพร่</span>
                        @else
                            <span class="status status-pending">ร่าง</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.news.edit', $item) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i> แก้ไข
                        </a>
                        <form action="{{ route('admin.news.destroy', $item) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('คุณแน่ใจหรือไม่ที่จะลบข้อมูลนี้?')">
                                <i class="fas fa-trash"></i> ลบ
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">ไม่พบข้อมูลข่าวสาร</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection