@extends('layouts.app')

@section('title', 'Quản lý tin tức')

@section('styles')
<style>
    .admin-wrapper {
        display: flex;
        min-height: 100vh;
    }

    .sidebar {
        width: 250px;
        background-color: #2c3e50;
        color: #ecf0f1;
        padding-top: 20px;
        position: fixed;
        height: 100%;
        overflow-y: auto;
    }

    .sidebar .sidebar-brand {
        font-size: 1.5rem;
        font-weight: 700;
        padding: 1rem;
        text-align: center;
        color: #fff;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .sidebar .nav-link {
        display: flex;
        align-items: center;
        padding: 0.75rem 1rem;
        color: #ecf0f1;
        transition: background-color 0.3s;
    }

    .sidebar .nav-link:hover {
        background-color: #34495e;
        color: #fff;
    }

    .sidebar .nav-link.active {
        background-color: #3498db;
        color: #fff;
    }

    .sidebar .nav-link i {
        margin-right: 0.5rem;
    }

    .main-content {
        margin-left: 250px;
        flex: 1;
        padding: 2rem;
        background-color: #f5f6fa;
    }

    .content-header h1 {
        font-weight: 700;
        color: #333;
    }
</style>
@endsection

@section('content')
<div class="admin-wrapper">

    <!-- Main Content -->
    <div class="main-content">
        <div class="content-header">
            <h1>Quản lý tin tức</h1>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <a href="{{ route('admin.news.create') }}" class="btn btn-primary mb-3">Thêm tin tức</a>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Tiêu đề</th>
                    <th>Danh mục</th>
                    <th>Ngày đăng</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse($news as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->category->name ?? 'N/A' }}</td>
                    <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('admin.news.edit', $item->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                        <form action="{{ route('admin.news.delete', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa tin tức này?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Không có tin tức nào.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection